<?php
include('../connection.php');
include('../classes/artikl.php');
include('../classes/kategorija.php');
$sQuery = "SELECT Artikl.Sifra, Artikl.Naziv, Artikl.Opis, Artikl.Jed_Mj, Artikl.Cijena, Artikl.URL, Kategorija.Kategorija_Id, Kategorija.Kategorija_Naziv FROM Artikl INNER JOIN Kategorija on Artikl.Kategorija_Id = Kategorija.Kategorija_Id;";
$oRecord = $oConnection->query($sQuery);
$arrayArtikli = array();
while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
    $oKategorija = new Kategorija(
        $oRow['Kategorija_Id'],
        $oRow['Kategorija_Naziv']
    );
    $oArtikl=new Artikl(
        $oRow['Sifra'],
        $oRow['Naziv'],
        $oRow['Opis'],
        $oRow['Jed_Mj'],
        $oRow['Cijena'],
        $oKategorija,
        $oRow['URL']
    );
    array_push($arrayArtikli, $oArtikl);
}
echo json_encode($arrayArtikli,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

?>