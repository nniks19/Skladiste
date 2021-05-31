<?php
header('Content-Type: application/json; charset=utf-8');
function deleteArtikl($oConnection){
    $SifraArtikla = $_POST['idartikla'];
    $sQuery = 'DELETE FROM Artikl WHERE Sifra = "'.$SifraArtikla.'"; 
    DELETE FROM Dokument WHERE NOT Exists (Select NULL FROM artikl_dokument ad WHERE ad.dok_sifra = dokument.dok_sifra);';
    unset($_POST['idartikla']);
    $oRecord = $oConnection->prepare($sQuery);
    $oRecord->execute();
    $arr = array('success'  => $oRecord->rowCount());
    echo json_encode($arr);
}
?>