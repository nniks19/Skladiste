<?php
header('Content-Type: application/json; charset=utf-8');
function updateArtikl($oConnection){
    // kasnije dodaj ucitavanje u klasu i ispis iz klase
    $IdArtikla = $_POST['idar'];
    $NazivArtikla = $_POST['nazivar'];
    $OpisArtikla = $_POST['opisar'];
    $JMJArtikla = $_POST['jmjar'];
    $CijenaArtikla = $_POST['cijenaar'];
    $KategorijaArtikla = $_POST['katar'];
    $URLArtikla = $_POST['urlar'];
    $sQuery = "UPDATE Artikl SET Naziv = '$NazivArtikla', Opis = '$OpisArtikla',  Jed_Mj = '$JMJArtikla', Cijena = '$CijenaArtikla', Kategorija_Id = '$KategorijaArtikla',  URL = '$URLArtikla' WHERE Sifra = '$IdArtikla';";
    unset($_POST['idar']);
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