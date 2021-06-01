<?php
header('Content-Type: application/json; charset=utf-8');
function addArtikl($oConnection){
    $NazivArtikla = $_POST['nazivar'];
    $OpisArtikla = $_POST['opisar'];
    $JMJArtikla = $_POST['jmjar'];
    $CijenaArtikla = $_POST['cijenaar'];
    $KategorijaArtikla = $_POST['katar'];
    $URLArtikla = $_POST['urlar'];
    $sQuery = "INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES (CONCAT('AR',(SELECT max( CAST(SUBSTRING(R.Sifra, 3, LENGTH(R.Sifra)-2) AS UNSIGNED)+1 ) FROM Artikl AS R)), '$NazivArtikla', '$OpisArtikla', '$JMJArtikla', $CijenaArtikla, $KategorijaArtikla, '$URLArtikla');";
    unset($_POST['nazivar']);
    unset($_POST['opisar']);
    unset($_POST['jmjar']);
    unset($_POST['cijenaar']);
    unset($_POST['katar']);
    unset($_POST['urlar']);
    $oRecord = $oConnection->prepare($sQuery);
    $oRecord->execute();
    $arr = array('success'  => $oRecord->rowCount());
    echo json_encode($arr);
}
?>