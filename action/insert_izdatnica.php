<?php
function insertIzdatnica($oConnection){
    // SELECT SELECT CONCAT(CONCAT(Year(CURRENT_TIMESTAMP),'-'),COALESCE(max((SUBSTRING(Dokument.Dok_Sifra, 6, LENGTH(Dokument.Dok_Sifra)-1) + 1)),1)) AS NextID FROM Dokument WHERE Dokument.Dok_Sifra LIKE '%2021%'
    // Stavlja 1 ako nema dokumenata ove godine, ako ima povecava ID nakon - za 1

    $sQuery = "
    INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum) VALUES ((SELECT CONCAT(CONCAT(Year(CURRENT_TIMESTAMP),'-'),COALESCE(max((SUBSTRING(dok.Dok_Sifra, 6, LENGTH(dok.Dok_Sifra)-1) + 1)),1)) AS NextID FROM Dokument AS dok WHERE dok.Dok_Sifra LIKE '%2021%'), 'IZD', current_timestamp);
    

    ";
    try
    {
        $oStatement=$oConnection->prepare($sQuery);
        $oStatement->execute($oData);
        echo 1;
    }
    catch(PDOException $error)
    {
        echo $error;
        echo 0;
    }		
}
?>
