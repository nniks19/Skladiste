<?php

include('../connection.php');
include('../classes/kategorija.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = [];

if($form_data->action == 'dohvati_kategoriju')
{
	$data = array(
		':KategorijaId'		=>	$form_data->Kategorija_Id
	);
	$query = "SELECT * FROM Kategorija WHERE Kategorija_Id=:KategorijaId";
	$statement = $oConnection->prepare($query);
	$statement->execute($data);
	$result = $statement->fetchAll();
	$output = [];
	foreach($result as $row)
	{
		$oKategorija = new Kategorija(
			$row['Kategorija_Id'],
			$row['Kategorija_Naziv']
		);
		array_push($output, $oKategorija);
	}
}
elseif($form_data->action == "Delete")
{
	$data = array(
		':KategorijaId'		=>	$form_data->id
	);
	$query = "
	DELETE FROM Kategorija WHERE Kategorija_Id=:KategorijaId";
	$statement = $oConnection->prepare($query);
	try{
		if($statement->execute($data))
		{

		}
	}
	catch(Exception $e){
	}
	if ($statement->rowCount() > 0){
        $output['message'] = 'Kategorija je uspješno obrisana!';
    } else {
        $output['error'] = 'Nije moguće obrisati kategoriju jer barem jedan artikl ima ovu kategoriju.';
    }
}
elseif($form_data->action == 'DODAJ'){
	if(empty($form_data->Kategorija_Naziv))
	{
		$output['error'] = 'Obavezan je unos naziva kategorije';
	}
	else
	{
		$Kategorija_Naziv = $form_data->Kategorija_Naziv;
	}
	if(empty($output['error']))
	{
		if($form_data->action == 'DODAJ')
		{
			$data = array(
				':Kategorija_Naziv'		=>	$Kategorija_Naziv
			);
			$query = "
			INSERT INTO Kategorija (Kategorija_Naziv) VALUES (:Kategorija_Naziv)
			";
			$statement = $oConnection->prepare($query);
			if($statement->execute($data))
			{
				$output['message'] = 'Kategorija je uspješno dodana!';
			}
		}
	}
	else
	{
		$validation_error = implode(", ", $error);
	}	
} elseif($form_data->action == 'UREDI') {
	if(empty($form_data->Kategorija_Id))
	{
		$output['error'] = 'Obavezan je ID kategorije!';
	}
	else
	{
		$Kategorija_Id = $form_data->Kategorija_Id;
	}

	if(empty($form_data->Kategorija_Naziv))
	{
		$output['error'] = 'Obavezan je unos naziva kategorije!';
	}
	else
	{
		$Kategorija_Naziv = $form_data->Kategorija_Naziv;
	}
	if(empty($output['error']))
	{
		if($form_data->action == 'UREDI')
		{
			$data = array(
				':Kategorija_Naziv'	=>	$Kategorija_Naziv,
				':Kategorija_Id'			=>	$form_data->Kategorija_Id
			);
			$query = "
			UPDATE Kategorija
			SET Kategorija_Naziv = :Kategorija_Naziv
			WHERE Kategorija_Id = :Kategorija_Id
			";

			$statement = $oConnection->prepare($query);
			if($statement->execute($data))
			{
				$output['message'] = 'Kategorija uspješno uređena!';
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