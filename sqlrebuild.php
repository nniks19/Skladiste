<?php
include 'connection.php';
$sqlCommand = "
CREATE TABLE Kategorija (
    Kategorija_Id INT AUTO_INCREMENT,
    Kategorija_Naziv text,
    CONSTRAINT PK_Kategorija PRIMARY KEY (Kategorija_Id)
);
CREATE TABLE Artikl (
    Sifra varchar(10) NOT NULL,
    Naziv TEXT,
    Opis TEXT,
    Jed_Mj TEXT,
    Cijena DECIMAL(15,2),
    Kategorija_Id INT,
    URL TEXT,
    CONSTRAINT PK_Artikl PRIMARY KEY (Sifra),
    CONSTRAINT FK_Kategorija FOREIGN KEY(Kategorija_Id) REFERENCES Kategorija(Kategorija_Id)
);
CREATE TABLE Dokument (
    Dok_Sifra VARCHAR(10),
    Dok_Tip VARCHAR(10),
    Dok_Datum DATETIME,
    Iznos DECIMAL(15,2),
    CONSTRAINT PK_Dokument PRIMARY KEY (Dok_Sifra)
);
CREATE TABLE Artikl_Dokument (
    Dok_Sifra VARCHAR(10),
    Artikl_Sifra VARCHAR(10),
    Kolicina INT,
    CONSTRAINT FK_Artikl FOREIGN KEY(Artikl_Sifra) REFERENCES Artikl(Sifra),
    CONSTRAINT FK_Dokument FOREIGN KEY(Dok_Sifra) REFERENCES Dokument(Dok_Sifra)
);";
function recursiveFunction($oConnection, $sqlCommand){
try{
    $oConnection->query($sqlCommand);
    echo "Baza je uspješno kreirana";
} catch (Exception $e){
    if ($e->getcode() == "42S01"){
        $sqlCommand2 = "
            SET FOREIGN_KEY_CHECKS = 0;
            DROP TABLE IF EXISTS Kategorija;
            DROP TABLE IF EXISTS Dokument;
            DROP TABLE IF EXISTS Artikl;
            DROP TABLE IF EXISTS Artikl_Dokument;
        ";
        $oConnection->query($sqlCommand2);
        recursiveFunction($oConnection, $sqlCommand);
    } else {
    echo $e;
    }
}
}
recursiveFunction($oConnection, $sqlCommand);
?>