<?php
include '../connection.php';
include '../classes/primka.php';
header('Content-Type: application/json; charset=utf-8');
$sQuery = "SELECT dokument.Dok_Sifra, dokument.Dok_Tip, dokument.Dok_Datum, (SELECT sum(Iznos) FROM artikl_dokument WHERE artikl_dokument.Dok_Sifra = dokument.Dok_Sifra) as Iznos, (SELECT sum(Kolicina) FROM artikl_dokument WHERE artikl_dokument.Dok_Sifra = dokument.Dok_Sifra) as Kolicina, (SELECT GROUP_CONCAT(artikl_dokument.Artikl_Sifra) FROM artikl_dokument WHERE dokument.Dok_Sifra = artikl_dokument.Dok_Sifra) as Artikl_Sifra, Dokument.Dok_Kreirao, Korisnici.ime, Korisnici.prezime FROM Dokument  LEFT JOIN korisnici ON Dokument.Dok_Kreirao = korisnici.id WHERE dokument.Dok_Tip = 'PRM'";
$oRecord = $oConnection->query($sQuery);
$arrayPrimke = array();
while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
    $oPrimka=new Primka(
        $oRow['Dok_Sifra'],
        $oRow['Dok_Tip'],
        $oRow['Dok_Datum'],
        $oRow['Kolicina'],
        $oRow['Artikl_Sifra'],
        array('Korisnik_Id' => $oRow['Dok_Kreirao'], 'Korisnik_Ime' => $oRow['ime'], 'Korisnik_Prezime' =>$oRow['prezime']),
        $oRow['Iznos'],
        0
    );
    array_push($arrayPrimke, $oPrimka);
}
echo json_encode($arrayPrimke,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

?>