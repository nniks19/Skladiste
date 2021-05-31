<?php
header('Content-Type: application/json; charset=utf-8');
function deleteIzdatnica($oConnection){
    $SifraDokumenta = $_POST['sifradok'];
    $sQuery = "DELETE FROM Dokument WHERE dokument.Dok_Sifra = '$SifraDokumenta';";
    unset($_POST['sifradok']);
    $oRecord = $oConnection->prepare($sQuery);
    $oRecord->execute();
    $arr = array('success'  => $oRecord->rowCount());
    echo json_encode($arr);
}
?>