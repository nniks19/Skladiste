<?php
header('Content-Type: application/json; charset=utf-8');
function addKategorija($oConnection){
    // kasnije dodaj ucitavanje u klasu i ispis iz klase
    $NazivKategorije = $_POST['nazivkat'];
    $sQuery = "INSERT Into Kategorija (Kategorija_Naziv) VALUES ('$NazivKategorije');";
    unset($_POST['nazivkat']);
    $oRecord = $oConnection->prepare($sQuery);
    $oRecord->execute();
    $arr = array('success'  => $oRecord->rowCount());
    echo json_encode($arr);
}
?>