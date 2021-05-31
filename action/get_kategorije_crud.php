<?php
include '../classes/kategorija.php';
header('Content-Type: application/json; charset=utf-8');
function getKategorijeCrud($oConnection){
    $sQuery = "SELECT * FROM Kategorija";
    $oRecord = $oConnection->query($sQuery);
    $arrayKategorije = array();
    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
        $oKategorija=new Kategorija(
            $oRow['Kategorija_Id'],
            $oRow['Kategorija_Naziv']
        );
        array_push($arrayKategorije, $oKategorija);
    }
    echo json_encode($arrayKategorije,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
?>