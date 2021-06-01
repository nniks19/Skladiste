<?php
header('Content-Type: application/json; charset=utf-8');
function updateKategorija($oConnection){
    $SifraKategorije = $_POST['sifrakat'];
    $NazivKategorije = $_POST['nazivkat'];
    $sQuery = "UPDATE Kategorija SET Kategorija_Naziv = '$NazivKategorije' WHERE Kategorija_Id = '$SifraKategorije';";
    unset($_POST['sifrakat']);
    unset($_POST['nazivkat']);
    $oRecord = $oConnection->prepare($sQuery);
    $oRecord->execute();
    $arr = array('success'  => $oRecord->rowCount());
    echo json_encode($arr);
}
?>