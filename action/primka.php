<?php

include('../connection.php');
include('../classes/primka.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = [];
$message = '';
$validation_error = '';

if($form_data->action == "dohvati_artikl"){
    $data = array(
        ':sArtikl_Sifra' =>$form_data->Artikl_Sifra
    );
    $query = "SELECT Artikl.Sifra, Artikl.Naziv, Artikl.Cijena
    FROM Artikl WHERE Artikl.Sifra = :sArtikl_Sifra;";
	$statement = $oConnection->prepare($query);
	$statement->execute($data);
	$result = $statement->fetchAll();
	$output = [];
	foreach($result as $row)
	{
        $output['sArtikl_Sifra']= $row['Sifra'];
        $output['sArtikl_Naziv'] = $row['Naziv'];
        $output['Artikl_Cijena'] = $row['Cijena'];
	}
} 
elseif($form_data->action == "Delete")
{
	$query = "DELETE FROM Dokument WHERE dokument.Dok_Sifra = '$form_data->id'
    AND (SELECT Count(*) FROM ( (SELECT ((Select IFNULL(SUM(Kolicina),0) FROM artikl_dokument INNER JOIN dokument ON artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'PRM' 
    WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra  AND artikl_dokument.Dok_Sifra != '$form_data->id') - (Select IFNULL(SUM(Kolicina),0) FROM artikl_dokument INNER JOIN dokument ON 
    artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'IZD' AND artikl_dokument.Dok_Sifra WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra)) AS Razlika FROM Artikl
    WHERE Sifra IN (SELECT artikl_sifra FROM artikl_dokument WHERE dok_sifra = '$form_data->id'))) final WHERE Razlika < 0) = 0";
	$statement = $oConnection->prepare($query);
    $statement->execute();
    if ($statement->rowCount() > 0){
        $output['message'] = 'Primka je uspješno obrisana!';
    } else {
        $output['error'] = 'Nije moguće obrisati primku jer količina artikala će biti manja od broja izdanih na izdatnicama.';
    }
}
elseif($form_data->action == 'DODAJ'){
    if (empty($form_data->Artikli)){
        $output['error'] = 'Obavezno je odabrati barem jedan artikl.';
    } else {
        foreach ($form_data->Artikli as $Artikl){
            if (empty($Artikl->UnosKolicina)){
                $output['error'] = 'Jednom od artikala koje ste naveli niste upisali količinu.';
            } else {
                if (!is_numeric($Artikl->UnosKolicina)){
                    $output['error'] = 'Količina koju ste upisali nije broj!';
                } else {
                    if ($Artikl->UnosKolicina < 0){
                        $output['error'] = 'Količina koju ste upisali mora biti veća od 0';
                    }
                }
            }
        }
    }
	if(empty($output['error']))
	{
		if($form_data->action == 'DODAJ')
		{
			$data = array(
				':Artikli' =>$form_data->Artikli
			);
			$query = "
            INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum) VALUES ((SELECT CONCAT(CONCAT(Year(CURRENT_TIMESTAMP),'-'),COALESCE(max((SUBSTRING(dok.Dok_Sifra, 6, LENGTH(dok.Dok_Sifra)-1) + 1)),1)) AS NextID FROM Dokument AS dok WHERE dok.Dok_Sifra LIKE '%2021%'), 'PRM', current_timestamp);
			";
            foreach ($form_data->Artikli as $Artikl){
                $query .= "INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ((SELECT Dok_Sifra From Dokument ORDER BY Dok_Datum DESC LIMIT 1), '$Artikl->SifraArtikla', $Artikl->UnosKolicina, ($Artikl->UnosKolicina * $Artikl->Artikl_Cijena));";
            }
			$statement = $oConnection->prepare($query);
			if($statement->execute())
			{
				$output['message'] = 'Dokument je uspješno dodan!';
			}
		}
	}
	else
	{
		$validation_error = implode(", ", $error);
	}	
}


echo json_encode($output);

?>