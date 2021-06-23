<?php
include '../classes/korisnik.php';
include '../connection.php';
$sQuery = "SELECT * FROM Korisnici;";
    $oRecord = $oConnection->query($sQuery);
    $arrayKorisnici = array();
    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
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
        array_push($arrayKorisnici, $oKorisnik);
    }
    echo json_encode($arrayKorisnici,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

?>