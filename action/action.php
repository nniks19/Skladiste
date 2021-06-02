<?php
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
ini_set('memory_limit', '2048M');
include '../connection.php';
if (isset($_GET['action_id'])) {
	$sQuery = $_GET['action_id'];
	switch($sQuery)
    {
        case 'get_artikli':
            include 'get_artikli.php';
            getArtikli($oConnection);
            break;
        case 'get_artikli_crud':
            include 'get_artikli_crud.php';
            getArtikliCrud($oConnection);
            break;
        case 'get_izdatnice_crud':
            include 'get_izdatnice_crud.php';
            getIzdatniceCrud($oConnection);
            break;
        case 'get_kategorije_crud':
            include 'get_kategorije_crud.php';
            getKategorijeCrud($oConnection);
            break;
        case 'get_primke_crud':
            include 'get_primke_crud.php';
            getPrimkeCrud($oConnection);
            break;
        case 'get_dashboard_stats':
            include 'get_dashboard_stats.php';
            getDashboardStats($oConnection);
            break;
        case 'insert_izdatnica':
            include 'insert_izdatnica.php';
            insertIzdatnica($oConnection);
            break;
        case 'insert_primka':
            include 'insert_primka.php';
            insertPrimka($oConnection);
            break;
        case 'delete_artikl':
            include 'delete_artikl.php';
            deleteArtikl($oConnection);
            break;
        case 'delete_primka':
            include 'delete_primka.php';
            deletePrimka($oConnection);
            break;
        case 'delete_izdatnica':
            include 'delete_izdatnica.php';
            deleteIzdatnica($oConnection);
            break;
        case 'delete_kategorija':
            include 'delete_kategorija.php';
            deleteKategorija($oConnection);
            break;
        case 'update_kategorija':
            include 'update_kategorija.php';
            updateKategorija($oConnection);
            break;
        case 'add_kategorija':
            include 'add_kategorija.php';
            addKategorija($oConnection);
            break;
        case 'add_artikl':
            include 'add_artikl.php';
            addArtikl($oConnection);
            break;
        case 'update_artikl':
            include 'update_artikl.php';
            updateArtikl($oConnection);
            break;
    }	
}

?>