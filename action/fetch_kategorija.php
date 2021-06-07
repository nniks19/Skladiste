<?php


include('../connection.php');
include('../classes/kategorija.php');

$query = "SELECT * FROM Kategorija;";
$statement = $oConnection->prepare($query);
$data = [];
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$oKategorija = new Kategorija(
			$row['Kategorija_Id'],
			$row['Kategorija_Naziv']
		);
		array_push($data, $oKategorija);
	}

	echo json_encode($data);
}

?>