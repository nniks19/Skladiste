<?php
include '../classes/artikl.php';
header('Content-Type: application/json; charset=utf-8');
function getArtikliCrud($oConnection){
    $sQuery = "SELECT Artikl.Sifra, Artikl.Naziv, Artikl.Opis, Artikl.Jed_Mj, Artikl.Cijena, Artikl.URL, Kategorija.Kategorija_Id, Kategorija.Kategorija_Naziv FROM Artikl INNER JOIN Kategorija on Artikl.Kategorija_Id = Kategorija.Kategorija_Id;";
    $oRecord = $oConnection->query($sQuery);
    $arrayArtikli = array();
    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
        $oArtikl=new Artikl(
            $oRow['Sifra'],
            $oRow['Naziv'],
            $oRow['Opis'],
            $oRow['Jed_Mj'],
            $oRow['Cijena'],
            array('sArtikl_Kategorija' => $oRow['Kategorija_Naziv'], 'sArtikl_KategorijaId' => $oRow['Kategorija_Id']),
            $oRow['URL']
        );
        array_push($arrayArtikli, $oArtikl);
    }
    echo json_encode($arrayArtikli,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
?>