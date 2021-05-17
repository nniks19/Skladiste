<?php
function getWarehouseData($oConnection){
    $sQuery = "SELECT Artikl.Sifra, Artikl.Naziv, Artikl.Jed_Mj, Artikl.Cijena, 
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
        $row = array(
            'sifra' => $oRow['Sifra'],
            'naziv'=>$oRow['Naziv'], 
            'JMJ' => $oRow['Jed_Mj'],
            'Cijena' => $oRow['Cijena'],
            'KolicinaUlaz' =>$oRow['KolicinaUlaz'],
            'IznosUlaz' =>$oRow['IznosUlaz'],
            'KolicinaIzlaz'=> $oRow['KolicinaIzlaz'],
            'IznosIzlaz' => $oRow['IznosIzlaz']
        );
        array_push($arrayArtikli, $row);
    }
    echo json_encode($arrayArtikli);
}
?>