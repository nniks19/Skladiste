<?php
header('Content-Type: application/json; charset=utf-8');
function deleteKategorija($oConnection){
    $SifraKategorije = $_POST['sifrakat'];
    $sQuery = "DELETE FROM Kategorija WHERE Kategorija_Id = $SifraKategorije AND (Select count(*) FROM Artikl WHERE Kategorija_Id = $SifraKategorije) = 0;";
    unset($_POST['sifrakat']);
    $oRecord = $oConnection->prepare($sQuery);
    $oRecord->execute();
    $arr = array('success'  => $oRecord->rowCount());
    echo json_encode($arr);
}
?>