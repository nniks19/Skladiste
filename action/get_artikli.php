<?php
include '../classes/artikl.php';
include '../classes/izdatnica.php';
include '../classes/primka.php';
header('Content-Type: application/json; charset=utf-8');
function getArtikli($oConnection){
    $sQuery = "SELECT *, 
    (Select SUM(Kolicina) FROM artikl_dokument
         INNER JOIN dokument ON artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'PRM' 
         WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra) AS KolicinaUlaz,
    (Select SUM(Iznos) FROM artikl_dokument 
         INNER JOIN dokument ON artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'PRM'
         WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra) AS IznosUlaz,
    (Select SUM(Kolicina) FROM artikl_dokument
         INNER JOIN dokument ON artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'IZD' 
         WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra) AS KolicinaIzlaz,
    (Select SUM(Iznos) FROM artikl_dokument 
         INNER JOIN dokument ON artikl_dokument.Dok_Sifra = dokument.Dok_Sifra AND dokument.Dok_Tip = 'IZD'
         WHERE artikl_dokument.Artikl_Sifra = Artikl.Sifra) AS IznosIzlaz
    FROM Artikl";
    $oRecord = $oConnection->query($sQuery);
    $arrayArtikli = array();
    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
        $oArtikl=new Artikl(
            $oRow['Sifra'],
            $oRow['Naziv'],
            $oRow['Opis'],
            $oRow['Jed_Mj'],
            $oRow['Cijena'],
            $oRow['Kategorija_Id'],
            $oRow['URL']
        ); if ($oRow['IznosUlaz'] == null){
            $oRow['IznosUlaz'] = 0;
        } if ($oRow['IznosIzlaz']  == null){
            $oRow['IznosIzlaz'] = 0;
        } if ($oRow['KolicinaUlaz'] == null){
            $oRow['KolicinaUlaz'] = 0;
        } if ($oRow['KolicinaIzlaz'] == null){
            $oRow['KolicinaIzlaz'] = 0;
        }
        $row = array(
            'Artikl' => $oArtikl,
            'KolicinaUlaz' =>$oRow['KolicinaUlaz'],
            'IznosUlaz' =>$oRow['IznosUlaz'],
            'KolicinaIzlaz'=> $oRow['KolicinaIzlaz'],
            'IznosIzlaz' => $oRow['IznosIzlaz'],
            'StanjeKolicina' => intval($oRow['KolicinaUlaz']) - intval($oRow['KolicinaIzlaz']),
            'StanjeIznos' => doubleval($oRow['IznosUlaz']) - doubleval($oRow['IznosIzlaz'])
        );
        array_push($arrayArtikli, $row);
    }
    echo json_encode($arrayArtikli,JSON_UNESCAPED_UNICODE);
}
?>