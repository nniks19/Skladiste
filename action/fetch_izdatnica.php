<?php
include '../classes/izdatnica.php';
include '../connection.php';
header('Content-Type: application/json; charset=utf-8');
$sQuery = "SELECT dokument.Dok_Sifra, dokument.Dok_Tip, dokument.Dok_Datum, (SELECT sum(Iznos) FROM artikl_dokument WHERE artikl_dokument.Dok_Sifra = dokument.Dok_Sifra) as Iznos, (SELECT sum(Kolicina) FROM artikl_dokument WHERE artikl_dokument.Dok_Sifra = dokument.Dok_Sifra) as Kolicina, (SELECT GROUP_CONCAT(artikl_dokument.Artikl_Sifra) FROM artikl_dokument WHERE dokument.Dok_Sifra = artikl_dokument.Dok_Sifra) as Artikl_Sifra FROM Dokument WHERE dokument.Dok_Tip = 'IZD'";
$oRecord = $oConnection->query($sQuery);
$arrayIzdatnice = array();
while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
    $oIzdatnica=new Izdatnica(
        $oRow['Dok_Sifra'],
        $oRow['Dok_Tip'],
        $oRow['Dok_Datum'],
        $oRow['Kolicina'],
        $oRow['Artikl_Sifra'],
        0,
        $oRow['Iznos'],
        );
    array_push($arrayIzdatnice, $oIzdatnica);
}
echo json_encode($arrayIzdatnice,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>