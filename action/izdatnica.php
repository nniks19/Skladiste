<?php

include('../connection.php');
include('../classes/izdatnica.php');
session_start();
$form_data = json_decode(file_get_contents("php://input"));

$error = [];
$message = '';
$validation_error = '';

if($form_data->action == "dohvati_artikl"){
    $data = array(
        ':sArtikl_Sifra' =>$form_data->Artikl_Sifra
    );
    $query = "SELECT Artikl.Sifra, Artikl.Naziv, Artikl.Cijena,
    (Select SUM(Kolicina) FROM artikl_dokument
         INNER JOIN dokument ON artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'PRM' 
         WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra) AS KolicinaUlaz,
    (Select SUM(Kolicina) FROM artikl_dokument
         INNER JOIN dokument ON artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'IZD' 
         WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra) AS KolicinaIzlaz
    FROM Artikl WHERE Artikl.Sifra = :sArtikl_Sifra;";
	$statement = $oConnection->prepare($query);
	$statement->execute($data);
	$result = $statement->fetchAll();
	$output = [];
	foreach($result as $row)
	{
        if ($row['KolicinaUlaz'] == null){
            $row['KolicinaUlaz'] = 0;
        } if ($row['KolicinaIzlaz'] == null){
            $row['KolicinaIzlaz'] = 0;
        }
        $output['sArtikl_Sifra']= $row['Sifra'];
        $output['sArtikl_Naziv'] = $row['Naziv'];
        $output['DostupnaKolicina'] = intval($row['KolicinaUlaz']) - intval($row['KolicinaIzlaz']);
        $output['Artikl_Cijena'] = $row['Cijena'];
	}
} 
elseif($form_data->action == "Delete")
{
	$query = "DELETE FROM Dokument WHERE dokument.Dok_Sifra='".$form_data->id."';";
	$statement = $oConnection->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Izdatnica je uspješno obrisana!';
	}
}
elseif($form_data->action == 'DODAJ'){
    if (empty($form_data->Artikli)){
        $output['error'] = 'Obavezno je odabrati barem jedan artikl.';
    } else {
        foreach ($form_data->Artikli as $Artikl){
            if ($Artikl->DostupnaKolicina < $Artikl->UnosKolicina){
                $output['error'] = 'Vaš dokument nije spremljen! Postoji artikl koji nema dovoljnu dostupnu količinu!';
            }
            if (empty($Artikl->UnosKolicina)){
                $output['error'] = 'Jednom od artikala koje ste naveli niste upisali količinu.';
            }
        }
    }
	if(empty($output['error']))
	{
		if($form_data->action == 'DODAJ')
		{
			$data = array(
				':Korisnik' =>$_SESSION['id']
			);
			$query = "
            INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum, Dok_Kreirao) VALUES ((SELECT CONCAT(CONCAT(Year(CURRENT_TIMESTAMP),'-'),COALESCE(max((SUBSTRING(dok.Dok_Sifra, 6, LENGTH(dok.Dok_Sifra)-1) + 1)),1)) AS NextID FROM Dokument AS dok WHERE dok.Dok_Sifra LIKE '%2021%'), 'IZD', current_timestamp, :Korisnik);
			";
            foreach ($form_data->Artikli as $Artikl){
                $query .= "INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ((SELECT Dok_Sifra From Dokument ORDER BY Dok_Datum DESC LIMIT 1), '$Artikl->SifraArtikla', $Artikl->UnosKolicina, ($Artikl->UnosKolicina * $Artikl->Artikl_Cijena));";
            }
			$statement = $oConnection->prepare($query);
			if($statement->execute($data))
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