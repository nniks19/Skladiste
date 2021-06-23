<?php
include '../connection.php';
$hashed_password = password_hash('test', PASSWORD_DEFAULT);
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
CREATE TABLE Korisnici (
    id int(11) NOT NULL AUTO_INCREMENT,
    korisnicko_ime varchar(50) NOT NULL,
    lozinka varchar(255) NOT NULL,
    email varchar(100) NOT NULL,
    ime varchar(255),
    prezime varchar(255),
    drzava varchar(255),
    grad varchar(255),
    broj_mobitela varchar(255),
    datum_kreiranja timestamp,
    CONSTRAINT PK_Korisnici PRIMARY KEY (id)
);
CREATE TABLE Dokument (
    Dok_Sifra VARCHAR(10),
    Dok_Tip VARCHAR(10),
    Dok_Datum TIMESTAMP,
    Dok_Kreirao INT(11),
    CONSTRAINT PK_Dokument PRIMARY KEY (Dok_Sifra),
    CONSTRAINT FK_Kreirao FOREIGN KEY(Dok_Kreirao) REFERENCES Korisnici(id)
);
CREATE TABLE Artikl_Dokument (
    Dok_Sifra VARCHAR(10),
    Artikl_Sifra VARCHAR(10),
    Kolicina INT,
    Iznos DECIMAL(15,2),
    CONSTRAINT FK_Artikl FOREIGN KEY(Artikl_Sifra) REFERENCES Artikl(Sifra) ON DELETE CASCADE,
    CONSTRAINT FK_Dokument FOREIGN KEY(Dok_Sifra) REFERENCES Dokument(Dok_Sifra) ON DELETE CASCADE
);
INSERT INTO Korisnici (korisnicko_ime, lozinka, email, ime, prezime, drzava, grad, broj_mobitela, datum_kreiranja) VALUES ('nikolastjepanovic', '$hashed_password' , 'nikola.stjepanovic@vuv.hr', 'Nikola', 'Stjepanović', 'Hrvatska', 'Suhopolje', '+385993518898', current_timestamp);
INSERT INTO Kategorija (Kategorija_Naziv) VALUES ('BETONSKI I PROTUPOTRESNI BLOKOVI');
INSERT INTO Kategorija (Kategorija_Naziv) VALUES ('BITUMENSKE LJEPENKE ZA HIDROIZOLACIJU');
INSERT INTO Kategorija (Kategorija_Naziv) VALUES('CEMENT I VAPNO');
INSERT INTO Kategorija (Kategorija_Naziv) VALUES ('PUR PJENE');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR1', 'Betonski blok 39x19x14 cm', 'Betonski blokovi namijenjeni su zidanju, izrađeni su od drobljenog kamena i cementa tehnikom vibracija i prešanja.

Karakteristike: 

visoka čvrstoća i stabilnost
postojanost
brza ugradnja', 'kom', 5.61, 1, 'https://www.ikoma.hr/content/product/image/m/blok-betonski.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR2', 'Betonski blok 39x19x19 cm', 'Betonski blokovi namijenjeni su zidanju, izrađeni su od drobljenog kamena i cementa tehnikom vibracija i prešanja.

Karakteristike: 

visoka čvrstoća i stabilnost
postojanost
brza ugradnja', 'kom', 6.78, 1, 'https://www.ikoma.hr/content/product/image/m/blok-betonski.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR3', 'Betonski blok 39x19x24 cm', 'Betonski blokovi namijenjeni su zidanju, izrađeni su od drobljenog kamena i cementa tehnikom vibracija i prešanja.

Karakteristike: 

visoka čvrstoća i stabilnost
postojanost
brza ugradnja', 'kom', 7.95, 1, 'https://www.ikoma.hr/content/product/image/m/blok-betonski.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR4', 'Betonski blok 39x19x29 cm', 'Betonski blokovi namijenjeni su zidanju, izrađeni su od drobljenog kamena i cementa tehnikom vibracija i prešanja.

Karakteristike: 

visoka čvrstoća i stabilnost
postojanost
brza ugradnja', 'kom', 9.92, 1, 'https://www.ikoma.hr/content/product/image/m/blok-betonski.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR5', 'Betonski blok protupotresni, kutni 20x19x40 cm - crveni','Dimenzije:

    dužina: 40 cm
    visina: 19 cm
    širina: 20 cm
    Betonski blokovi namijenjeni su zidanju, izrađeni su od drobljenog kamena i cementa tehnikom vibracija i prešanja.
    
    Karakteristike: 
    
    visoka čvrstoća i stabilnost
    postojanost
    brza ugradnja', 'kom', 9.83, 1, 'https://www.ikoma.hr/Content/product/image/m/betonski-blok-protupotresni-kutni.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR6', 'Betonski blok protupotresni, kutni 25x19x40 cm - crveni', 'Dimenzije:

        dužina: 40 cm
        visina: 19 cm
        širina: 20 cm
        Betonski blokovi namijenjeni su zidanju, izrađeni su od drobljenog kamena i cementa tehnikom vibracija i prešanja.
        
        Karakteristike: 
        
        visoka čvrstoća i stabilnost
        postojanost
        brza ugradnja', 'kom', 10.40, 1, 'https://www.ikoma.hr/Content/product/image/m/betonski-blok-protupotresni-kutni.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR7', 'Betonski blok protupotresni, kutni 25x23.8x38 cm - crveni', 'Dimenzije:

        dužina: 38 cm
        visina: 23.8 cm
        širina: 25 cm
        Betonski blokovi namijenjeni su zidanju, izrađeni su od drobljenog kamena i cementa tehnikom vibracija i prešanja.
        
        Karakteristike: 
        
        visoka čvrstoća i stabilnost
        postojanost
        brza ugradnja', 'kom', 12.64, 1, 'https://www.ikoma.hr/Content/product/image/m/betonski-blok-protupotresni-kutni.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR8', 'Betonski blok protupotresni, kutni 29x19x40 cm - crveni', 'Dimenzije:

            dužina: 40 cm
            visina: 19 cm
            širina: 29 cm
            Betonski blokovi namijenjeni su zidanju, izrađeni su od drobljenog kamena i cementa tehnikom vibracija i prešanja.
            
            Karakteristike: 
            
            visoka čvrstoća i stabilnost
            postojanost
            brza ugradnja', 'kom', 12.72, 1, 'https://www.ikoma.hr/Content/product/image/m/betonski-blok-protupotresni-kutni.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR9', 'Bitumenski temeljni premaz, 10L - SIKA Igoflex P01', 'Bitumenski temeljni premaz, 10 L - SIKA Igoflex P01

Jednokomponentni, brzo stvrdnjavajući bitumenski predpremaz bez otapala.

za poboljšanje prionjivosti bitumenskih premaza i membrana na betonu, žbuki ili zidanim konstrukcijama
potrošnja ovisi o podlozi i kreće se oko 0,2 l/min
Proizvođač: Sika - pouzdana, inovativna, održiva i dugotrajna rješenja u građevinskoj i proizvodnoj industriji.', 'kom', 145.02, 2, 'https://www.ikoma.hr/Content/product/image/m/bitumenski-temeljni-premaz-10-l-sika-igoflex-p01.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR10', 'Čepasta folija 1 x 20 m (20 m2)', 'Čepasta folija dimenzija 1 x 20 m', 'kom', 7.95, 2, 'https://www.ikoma.hr/content/product/image/m/cepasta.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR11', 'Čepasta folija 1,5 x 20 m (30 m2)', 'Čepasta folija dimenzija 1.5 x 20 m', 'kom', 7.95, 2, 'https://www.ikoma.hr/content/product/image/m/cepasta.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR12', 'Čepasta folija 2 x 20 m (40 m2)', 'Čepasta folija dimenzija 2 x 20 m', 'kom', 7.95, 2, 'https://www.ikoma.hr/content/product/image/m/cepasta.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR13', 'Čepasta folija 2.5 x 20 m (50 m2)', 'Čepasta folija dimenzija 2.5 x 20 m', 'kom', 7.95, 2, 'https://www.ikoma.hr/content/product/image/m/cepasta.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR14', 'Cement 42,5 - 25 kg, BEREMEND', 'Cement od 25 kg - BEREMEND',  'kom', 0.89, 3, 'https://www.ikoma.hr/Content/product/image/m/cement-beremend-425.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR15', 'Cement 42,5 - 25 kg, Dalmacijacement ULTIMO', 'Dalmacijacement ULTIMO – cement vrhunskih performansi za najveće zahtjeve.',  'kom', 0.99, 3, 'https://www.ikoma.hr/Content/product/image/m/dalmacijacement-ultimo.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR16', 'Vapno hidratizirano 25 kg', 'Hidratizirano vapno u vrećama od 25 kg. Upotreba: za izradu mortova i žbuka.',  'kom', 0.87, 3, 'https://www.ikoma.hr/Content/product/image/m/vapno-sirac.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR17', 'Čistač pur pjene 500 ml - WÜRTH EXtraMont', 'Sredstvo za čišćenje pištolja za PUR pjenu - bezbojna tekućina na bazi organskih otapala.', 'kom', 39.83, 4, 'https://www.ikoma.hr/Content/product/image/m/k8921225a-2.jpg');
INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('AR18', 'Pištolj za pur pjenu 400 g - CON:P', 'Pištolj za pur pjenu s preciznim regulatorom za savršen posao.', 'kom', 104.55, 4, 'https://www.ikoma.hr/Content/product/image/m/cb27430.jpg');
INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum, Dok_Kreirao) VALUES ('2021-1', 'PRM', '2021-05-17 11:46:27', 1);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-1', 'AR1', 100, (SELECT Cijena from artikl WHERE Sifra = 'AR1') * 100);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-1', 'AR5', 500, (SELECT Cijena from artikl WHERE Sifra = 'AR5') * 500);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-1', 'AR10', 800, (SELECT Cijena from artikl WHERE Sifra = 'AR10') * 800);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-1', 'AR11', 1250, (SELECT Cijena from artikl WHERE Sifra = 'AR11') * 1250);
INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum, Dok_Kreirao) VALUES ('2021-2', 'PRM', '2021-05-17 12:30:00', 1);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-2', 'AR2', 1000, (SELECT Cijena from artikl WHERE Sifra = 'AR2') * 1000);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-2', 'AR6', 10000, (SELECT Cijena from artikl WHERE Sifra = 'AR6') * 10000);
INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum, Dok_Kreirao) VALUES ('2021-3', 'PRM', '2021-05-17 13:00:00', 1);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-3', 'AR18', 11000, (SELECT Cijena from artikl WHERE Sifra = 'AR18') * 11000);
INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum, Dok_Kreirao) VALUES ('2021-4', 'PRM', '2021-05-17 13:30:15', 1);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-4', 'AR10', 1000, (SELECT Cijena from artikl WHERE Sifra = 'AR10') * 1000);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-4', 'AR11', 1000, (SELECT Cijena from artikl WHERE Sifra = 'AR11') * 1000);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-4', 'AR12', 1000, (SELECT Cijena from artikl WHERE Sifra = 'AR12') * 1000);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-4', 'AR13', 1000, (SELECT Cijena from artikl WHERE Sifra = 'AR13') * 1000);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-4', 'AR14', 1000, (SELECT Cijena from artikl WHERE Sifra = 'AR14') * 1000);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-4', 'AR15', 85000, (SELECT Cijena from artikl WHERE Sifra = 'AR15') * 85000);
INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum, Dok_Kreirao) VALUES ('2021-5', 'PRM', '2021-05-17 14:00:25', 1);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-5', 'AR4', 18579, (SELECT Cijena from artikl WHERE Sifra = 'AR4') * 18579);
INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum, Dok_Kreirao) VALUES ('2021-6', 'IZD', '2021-05-17 14:03:25', 1);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-6', 'AR18', 1000, (SELECT Cijena from Artikl where Sifra='AR18')* 1000);
INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('2021-6', 'AR4', 1000, (SELECT Cijena from Artikl where Sifra='AR4')* 1000);
    ";
function recursiveFunction($oConnection, $sqlCommand){
try{
    $oConnection->query($sqlCommand);
    echo "Baza je uspješno kreirana";
} catch (Exception $e){
    if ($e->getcode() == "42S01"){
        $sqlCommand2 = "
            SET FOREIGN_KEY_CHECKS = 0;
            DROP TABLE IF EXISTS Korisnici;
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