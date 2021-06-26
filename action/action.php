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
        case 'get_dashboard_stats':
            include 'get_dashboard_stats.php';
            getDashboardStats($oConnection);
            break;
    }	
}
?>