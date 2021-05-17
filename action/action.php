<?php
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
ini_set('memory_limit', '2048M');
include '../connection.php';
if (isset($_GET['action_id'])) {
	$sQuery = $_GET['action_id'];
	switch($sQuery)
    {
        case 'get_warehouse_inventory':
        include 'getinventory.php';
        getWarehouseData($oConnection);
        break;
        case 'insert_izdatnica':
        include 'insert_izdatnica.php';
        insertIzdatnica($oConnection);
        break;
        case 'insert_primka':
        include 'insert_primka.php';
        insertPrimka($oConnection);
        break;
    }	
}

?>