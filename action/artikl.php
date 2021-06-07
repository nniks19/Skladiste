<?php

include('../connection.php');
include('../classes/artikl.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = [];
$message = '';
$validation_error = '';
$Artikl_Sifra= '';
$Artikl_Naziv = '';
$Artikl_Opis = '';
$Artikl_JedMj = '';
$Artikl_Cijena = '';
$Artikl_URL = '';
$Artikl_Kategorija = '';

if($form_data->action == 'dohvati_artikl')
{
    $query = "SELECT Artikl.Sifra, Artikl.Naziv, Artikl.Opis, Artikl.Jed_Mj, Artikl.Cijena, Artikl.URL, Kategorija.Kategorija_Id, Kategorija.Kategorija_Naziv FROM Artikl  INNER JOIN Kategorija on Artikl.Kategorija_Id = Kategorija.Kategorija_Id WHERE Artikl.Sifra='".$form_data->Artikl_Sifra."';";
	$statement = $oConnection->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = [];
	foreach($result as $row)
	{
		$oArtikl=new Artikl(
            $row['Sifra'],
            $row['Naziv'],
            $row['Opis'],
            $row['Jed_Mj'],
            $row['Cijena'],
            array('sArtikl_Kategorija' => $row['Kategorija_Naziv'], 'sArtikl_KategorijaId' => $row['Kategorija_Id']),
            $row['URL']
        );
        array_push($output, $oArtikl);
	}
}
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM Artikl WHERE Sifra='".$form_data->id."';
	DELETE FROM Dokument WHERE NOT Exists (Select NULL FROM artikl_dokument ad WHERE ad.dok_sifra = dokument.dok_sifra);
	";
	$statement = $oConnection->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Artikl je uspješno obrisan! Ako je ovaj artikl bio jedini na nekom od dokumenata, onda je i taj dokument obrisan.';
	}
}
elseif($form_data->action == 'DODAJ'){
	if(empty($form_data->Artikl_Naziv))
	{
		$output['error'] = 'Obavezan je unos naziva artikla.';
	}
	if(empty($form_data->Artikl_Opis))
	{
		$output['error'] = 'Obavezan je unos opisa artikla.';
	}
	if(empty($form_data->Artikl_JedMj))
	{
		$output['error'] = 'Obavezan je unos jedinične mjere artikla.';
	}
	if(empty($form_data->Artikl_Cijena) || !is_numeric($form_data->Artikl_Cijena))
	{
		$output['error'] = 'Cijena nije u dobrom formatu.';
	}
	if(empty($form_data->Artikl_Kategorija)){
		$output['error'] = 'Obavezan je odabir kategorije.';
	}
	if (empty($form_data->Artikl_URL)){
		$output['error'] = 'Obavezan je unos URL-a slike!';
	} else if(!filter_var($form_data->Artikl_URL, FILTER_VALIDATE_URL)) {
		$output['error'] = 'URL Slike artikla nije ispravan.';
	}
	if(empty($output['error']))
	{
		if($form_data->action == 'DODAJ')
		{
			$data = array(
				':sArtikl_Naziv' =>$form_data->Artikl_Naziv,
				':sArtikl_Opis' =>$form_data->Artikl_Opis,
				':sArtikl_JedMj' =>$form_data->Artikl_JedMj,
				':dArtikl_Cijena' =>$form_data->Artikl_Cijena,
				':sArtikl_Kategorija' =>$form_data->Artikl_Kategorija,
				':sArtikl_URL' =>$form_data->Artikl_URL
			);
			$query = "
			INSERT INTO Artikl (Sifra,Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES (CONCAT('AR',(SELECT max( CAST(SUBSTRING(R.Sifra, 3, LENGTH(R.Sifra)-2) AS UNSIGNED)+1 ) FROM Artikl AS R)),:sArtikl_Naziv, :sArtikl_Opis, :sArtikl_JedMj, :dArtikl_Cijena, :sArtikl_Kategorija, :sArtikl_URL);
			";
			$statement = $oConnection->prepare($query);
			if($statement->execute($data))
			{
				$output['message'] = 'Artikl je uspješno dodan!';
			}
		}
	}
	else
	{
		$validation_error = implode(", ", $error);
	}	
} elseif($form_data->action == 'UREDI') {
	if(empty($form_data->Artikl_Sifra)){
		$output['error'] = 'Neispravna šifra artikla';
	}
	if(empty($form_data->Artikl_Naziv))
	{
		$output['error'] = 'Obavezan je unos naziva artikla.';
	}
	if(empty($form_data->Artikl_Opis))
	{
		$output['error'] = 'Obavezan je unos opisa artikla.';
	}
	if(empty($form_data->Artikl_JedMj))
	{
		$output['error'] = 'Obavezan je unos jedinične mjere artikla.';
	}
	if(empty($form_data->Artikl_Cijena) || !is_numeric($form_data->Artikl_Cijena))
	{
		$output['error'] = 'Cijena nije u dobrom formatu.';
	}
	if(empty($form_data->Artikl_Kategorija)){
		$output['error'] = 'Obavezan je odabir kategorije.';
	}
	if (empty($form_data->Artikl_URL)){
		$output['error'] = 'Obavezan je unos URL-a slike!';
	} else if(!filter_var($form_data->Artikl_URL, FILTER_VALIDATE_URL)) {
		$output['error'] = 'URL Slike artikla nije ispravan.';
	}
	if(empty($output['error']))
	{
		if($form_data->action == 'UREDI')
		{
			$data = array(
				':sArtikl_Sifra' =>$form_data->Artikl_Sifra,
				':sArtikl_Naziv' =>$form_data->Artikl_Naziv,
				':sArtikl_Opis' =>$form_data->Artikl_Opis,
				':sArtikl_JedMj' =>$form_data->Artikl_JedMj,
				':dArtikl_Cijena' =>$form_data->Artikl_Cijena,
				':sArtikl_Kategorija' =>$form_data->Artikl_Kategorija,
				':sArtikl_URL' =>$form_data->Artikl_URL
			);
			$query = "
			UPDATE Artikl SET
			Naziv = :sArtikl_Naziv,
			Opis = :sArtikl_Opis,
			Jed_Mj = :sArtikl_JedMj,
			Cijena = :dArtikl_Cijena,
			Kategorija_Id = :sArtikl_Kategorija,
			URL = :sArtikl_URL
			WHERE Sifra = :sArtikl_Sifra;
			";

			$statement = $oConnection->prepare($query);
			if($statement->execute($data))
			{
				$output['message'] = 'Artikl uspješno uređen!';
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