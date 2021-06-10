<?php
include '../connection.php';
    $sQuery = "
    SELECT (SELECT COUNT(*) FROM   Artikl) AS UkBrAr,
    (SELECT COUNT(*) FROM Dokument) AS UkBrDo,
    (SELECT COUNT(*) FROM Dokument WHERE Dokument.Dok_Tip = 'IZD') AS UkBrIz,
    (SELECT COUNT(*) FROM Dokument WHERE Dokument.Dok_Tip = 'PRM') AS UkBrPr,
    (SELECT sum(artikl_dokument.Kolicina) - (SELECT sum(artikl_dokument.Kolicina) FROM artikl_dokument INNER JOIN Dokument ON Dokument.Dok_Tip = 'IZD' AND Dokument.Dok_Sifra = artikl_dokument.Dok_Sifra) FROM artikl_dokument)as UkKoAr,
        (SELECT sum(artikl_dokument.Iznos) - (SELECT sum(artikl_dokument.Iznos) FROM artikl_dokument INNER JOIN Dokument ON Dokument.Dok_Tip = 'IZD' AND Dokument.Dok_Sifra = artikl_dokument.Dok_Sifra) FROM artikl_dokument)as UkCiAr,
    (SELECT max(cijena) FROM Artikl) as CiMaAr,
    (SELECT min(cijena) FROM Artikl) as CiMiAr,
    (SELECT COUNT(*) FROM Korisnici) as BrKr,
    (SELECT COUNT(*) FROM Kategorija) as BrKa
    ";
    // U PHP-u za brojac koliko je necega bi se napravilo count($_NazivArraya);
    // U PHP-u za sumu bi spremio samo sve sume u jedan array i napisao array_sum($_NazivArraya);
    // U PHP-u za cijenu bi spremio samo sve iznose primki u jedan array i napisao array_sum($_NazivArraya) i taj array bi oduzeo od arraya sa sumom izdatnica
    // U PHP-u za maksimalnu i minimalnu cijenu artikla bih napravio array sa svim cijenama i pozvao funkcije min, max npr. $min = min($_NazivArraya);
    $oRecord = $oConnection->query($sQuery);
    $arrayStats = array();
    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
        $row = array(
            'UkBrAr' =>$oRow['UkBrAr'],
            'UkBrDo' =>$oRow['UkBrDo'],
            'UkBrIz' =>$oRow['UkBrIz'],
            'UkBrPr' =>$oRow['UkBrPr'],
            'UkKoAr' =>$oRow['UkKoAr'],
            'UkCiAr' =>$oRow['UkCiAr'],
            'CiMaAr' =>$oRow['CiMaAr'],
            'CiMiAr' =>$oRow['CiMiAr'],
            'BrKr' =>$oRow['BrKr'],
            'BrKa' =>$oRow['BrKa']
        );
        array_push($arrayStats, $row);
    }
    echo json_encode($arrayStats,JSON_UNESCAPED_UNICODE);
?>