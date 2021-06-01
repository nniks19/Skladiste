<?php
header('Content-Type: application/json; charset=utf-8');
function addKategorija($oConnection){
    $NazivKategorije = $_POST['nazivkat'];
    $sQuery = "INSERT Into Kategorija (Kategorija_Naziv) VALUES ('$NazivKategorije');";
    unset($_POST['nazivkat']);
    $oRecord = $oConnection->prepare($sQuery);
    $oRecord->execute();
    $arr = array('success'  => $oRecord->rowCount());
    echo json_encode($arr);
}
?>