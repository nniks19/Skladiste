<?php
session_start();
// Ako korisnik nije prijavljen prebacujem ga na stranicu za Prijavu
if (!isset($_SESSION['id'])) {
	header('Location: ../prijava.php');
	exit;
}
?>