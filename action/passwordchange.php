<?php
include 'connection.php';
include '../connection.php';
session_start();
if (empty($_POST['newpassword'])) {
    $_SESSION['error'] = "Kako bi promijenili lozinku morate je prvo upisati u polje Nova lozinka!";
    header('Location: ../administration/profil.php');
    exit();
}
if (strlen($_POST['newpassword']) >= 1 && isset($_POST['newpassword']) == true){;
    $hashednewpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
    $userid = $_SESSION['id'];
    $sqlCommand = "UPDATE KORISNICI SET lozinka = '$hashednewpassword' WHERE id= $userid";
    try{
        $oConnection->query($sqlCommand);
        $_SESSION['error'] = "Lozinka je uspješno promijenjena!";
    } catch (Exception $e){
        $_SESSION['error'] = $e;
    }
    header('Location: ../administration/profil.php');
	exit();
}
?>