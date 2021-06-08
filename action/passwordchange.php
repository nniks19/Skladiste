<?php
include '../connection.php';
session_start();
if (empty($_POST['newpassword'])) {
    $_SESSION['error'] = "Kako bi promijenili lozinku morate je prvo upisati u polje Nova lozinka!";
    header('Location: ../administration/profil.php');
    exit();
}
if (strlen($_POST['newpassword']) >= 1 && isset($_POST['newpassword']) == true){;
    $hashednewpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
    $data = array(
		':hashedpass' =>$hashednewpassword,
        ':userid' =>$_SESSION['id']
	);
    $sqlCommand = "UPDATE KORISNICI SET lozinka = :hashedpass WHERE id= :userid";
    $statement = $oConnection->prepare($sqlCommand);
    if($statement->execute($data))
	{
        $_SESSION['error'] = "Lozinka je uspješno promijenjena!";
    }
    header('Location: ../administration/profil.php');
	exit();
}
?>