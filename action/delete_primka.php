<?php
header('Content-Type: application/json; charset=utf-8');
function deletePrimka($oConnection){
    $SifraDokumenta = $_POST['sifradok'];
    $sQuery = "DELETE FROM Dokument WHERE dokument.Dok_Sifra = '$SifraDokumenta'
    AND (SELECT Count(*) FROM ( (SELECT ((Select IFNULL(SUM(Kolicina),0) FROM artikl_dokument INNER JOIN dokument ON artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'PRM' 
    WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra  AND artikl_dokument.Dok_Sifra != '$SifraDokumenta') - (Select IFNULL(SUM(Kolicina),0) FROM artikl_dokument INNER JOIN dokument ON 
    artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'IZD' AND artikl_dokument.Dok_Sifra WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra)) AS Razlika FROM Artikl
    WHERE Sifra IN (SELECT artikl_sifra FROM artikl_dokument WHERE dok_sifra = '$SifraDokumenta'))) final WHERE Razlika < 0) = 0";
    unset($_POST['sifradok']);
    $oRecord = $oConnection->prepare($sQuery);
    $oRecord->execute();
    $arr = array('success'  => $oRecord->rowCount());
    echo json_encode($arr);
}
?>