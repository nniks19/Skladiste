<?php
include '../../connection.php';
include('../../classes/kategorija.php');
include('../../classes/artikl.php');
include('../../classes/korisnik.php');
include('../../classes/primka.php');
include('../../classes/izdatnica.php');
$data = json_decode(file_get_contents("php://input"));
$query = "SELECT * FROM Kategorija;";
$statement = $oConnection->prepare($query);
$_Kategorije = [];
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$oKategorija = new Kategorija(
			$row['Kategorija_Id'],
			$row['Kategorija_Naziv']
		);
		array_push($_Kategorije, $oKategorija);
	}
}

$query = "SELECT * FROM Artikl;";
$_Artikli = [];
$statement = $oConnection->prepare($query);
if($statement->execute())
{
    while($oRow = $statement->fetch(PDO::FETCH_ASSOC)){
        $oArtikl=new Artikl(
            $oRow['Sifra'],
            $oRow['Naziv'],
            $oRow['Opis'],
            $oRow['Jed_Mj'],
            $oRow['Cijena'],
            $oRow['Kategorija_Id'],
            $oRow['URL']
        );
        array_push($_Artikli, $oArtikl);
    }
}

$query = "SELECT * FROM Korisnici;";
$_Korisnici = [];
$statement = $oConnection->prepare($query);
if($statement->execute())
{
    while($oRow = $statement->fetch(PDO::FETCH_ASSOC)){
        $oKorisnik = new Korisnik(
            $oRow['id'],
            $oRow['korisnicko_ime'],
            $oRow['lozinka'],
            $oRow['email'],
            $oRow['ime'],
            $oRow['prezime'],
            $oRow['drzava'],
            $oRow['grad'],
            $oRow['broj_mobitela'],
            $oRow['datum_kreiranja']
    );
    array_push($_Korisnici, $oKorisnik);
    }
}

$query = 'SELECT * FROM Dokument;';
$_Dokumenti = [];
$statement = $oConnection->prepare($query);
if($statement->execute())
{
    while($oRow=$statement->fetch(PDO::FETCH_BOTH)){
        $oDokument=array(
            'Dok_Sifra' => $oRow['Dok_Sifra'],
            'Dok_Tip' => $oRow['Dok_Tip'],
            'Dok_Datum' => $oRow['Dok_Datum'],
            'Dok_Kreirao' =>$oRow['Dok_Kreirao'],
        );
        array_push($_Dokumenti, $oDokument);
    }
}

$query = 'SELECT * FROM Artikl_Dokument;';
$_ArtiklDokument = [];
$statement = $oConnection->prepare($query);
if($statement->execute())
{
    while($oRow=$statement->fetch(PDO::FETCH_BOTH)){
        $oDokument=array(
            'Dok_Sifra' => $oRow['Dok_Sifra'],
            'Artikl_Sifra' => $oRow['Artikl_Sifra'],
            'Kolicina' => $oRow['Kolicina'],
            'Iznos' =>$oRow['Iznos'],
        );
        array_push($_ArtiklDokument, $oDokument);
    }
}

$sBackupKategorije = "ALTER TABLE Kategorija AUTO_INCREMENT = 1;\n";
$sBackupArtikli = "";
$sBackupKorisnici = "ALTER TABLE Korisnici AUTO_INCREMENT = 1;\n";
$sBackupDokumenti = "";
$sBackupArtiklDokument  = "";
foreach ($_Kategorije as $Kategorija){
    $sBackupKategorije .= "INSERT INTO Kategorija (Kategorija_Naziv) VALUES ('$Kategorija->sNazivKategorije'); \n";
}
foreach ($_Artikli as $Artikl){
    $sBackupArtikli .= "INSERT INTO Artikl (Sifra, Naziv, Opis, Jed_Mj, Cijena, Kategorija_Id, URL) VALUES ('$Artikl->sArtikl_Sifra', '$Artikl->sArtikl_Naziv', '$Artikl->sArtikl_Opis', '$Artikl->sArtikl_JedMj', $Artikl->dArtikl_Cijena, $Artikl->sArtikl_Kategorija, '$Artikl->sArtikl_URL');\n";
}
foreach ($_Korisnici as $Korisnik){
    $sBackupKorisnici .= "INSERT INTO Korisnici (korisnicko_ime, lozinka, email, ime, prezime, drzava, grad, broj_mobitela, datum_kreiranja) VALUES ('$Korisnik->sKorisnicko_Ime', '$Korisnik->sLozinka', '$Korisnik->sEmail', '$Korisnik->sIme', '$Korisnik->sPrezime', '$Korisnik->sDrzava','$Korisnik->sGrad','$Korisnik->sBroj_Mobitela','$Korisnik->sDatum_Kreiranja');\n";
}
foreach ($_Dokumenti as $Dokument){
    $Dok_Sifra = $Dokument['Dok_Sifra'];
    $Dok_Tip = $Dokument['Dok_Tip'];
    $Dok_Datum = $Dokument['Dok_Datum'];
    $Dok_Kreirao = $Dokument['Dok_Kreirao'];
    $sBackupDokumenti .="INSERT INTO Dokument (Dok_Sifra, Dok_Tip, Dok_Datum, Dok_Kreirao) VALUES ('$Dok_Sifra', '$Dok_Tip', '$Dok_Datum', $Dok_Kreirao);\n";
}
foreach ($_ArtiklDokument as $ArtiklDokument){
    $Dok_Sifra = $ArtiklDokument['Dok_Sifra'];
    $Artikl_Sifra = $ArtiklDokument['Artikl_Sifra'];
    $Kolicina = $ArtiklDokument['Kolicina'];
    $Iznos = $ArtiklDokument['Iznos'];
    $sBackupArtiklDokument.="INSERT INTO Artikl_Dokument (Dok_Sifra, Artikl_Sifra, Kolicina, Iznos) VALUES ('$Dok_Sifra', '$Artikl_Sifra', $Kolicina, $Iznos);\n";
}
if($data->req == 'txtsvi'){
$myFile = fopen($data->req.'.txt', "w") or die("Nije moguće kreirati datoteku");
$sBackupText = $sBackupKategorije. $sBackupArtikli . $sBackupKorisnici . $sBackupDokumenti . $sBackupArtiklDokument;
fwrite($myFile, $sBackupText);
fclose($myFile);
readfile($data->req.'.txt');
exit;
} else if($data->req == 'txtkategorije'){
    $myFile = fopen($data->req.'.txt', "w") or die("Nije moguće kreirati datoteku");
    $sBackupText = $sBackupKategorije;
    fwrite($myFile, $sBackupText);
    fclose($myFile);
    readfile($data->req.'.txt');
    exit;
} else if($data->req == 'txtartikli'){
    $myFile = fopen($data->req.'.txt', "w") or die("Nije moguće kreirati datoteku");
    $sBackupText = $sBackupArtikli;
    fwrite($myFile, $sBackupText);
    fclose($myFile);
    readfile($data->req.'.txt');
    exit;
} else if($data->req == 'txtkorisnici'){
    $myFile = fopen($data->req.'.txt', "w") or die("Nije moguće kreirati datoteku");
    $sBackupText = $sBackupKorisnici;
    fwrite($myFile, $sBackupText);
    fclose($myFile);
    readfile($data->req.'.txt');
    exit;
} else if($data->req == 'txtdokumenti'){
    $myFile = fopen($data->req.'.txt', "w") or die("Nije moguće kreirati datoteku");
    $sBackupText = $sBackupDokumenti;
    fwrite($myFile, $sBackupText);
    fclose($myFile);
    readfile($data->req.'.txt');
    exit;
} else if($data->req == 'txtartikldokument'){
    $myFile = fopen($data->req.'.txt', "w") or die("Nije moguće kreirati datoteku");
    $sBackupText = $sBackupArtiklDokument;
    fwrite($myFile, $sBackupText);
    fclose($myFile);
    readfile($data->req.'.txt');
    exit;
}
?>