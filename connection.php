<?php
	include 'classes/configuration.php';
	$oConfig = new Configuration();
try
{
 $oConnection = new PDO("mysql:host=$oConfig->host;dbname=$oConfig->dbname", $oConfig->username, $oConfig->password);
}
catch (PDOException $pe)
{
 die("Neuspjeli pokušaj povezivanja na bazu $oConfig->dbname :" . $pe->getMessage());
}
?>