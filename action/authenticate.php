<?php
include '../connection.php';
if (empty($_POST['username']) || empty($_POST['password']) ) {
	// Ako netko proba otvoriti samo stranicu authenticate.php bez koristenja forme
	$_SESSION['error'] = "Potrebno je popuniti oba polja!";
	header('Location: ../prijava.php');
	exit();
}
if ($stmt = $oConnection->prepare('SELECT id, lozinka FROM korisnici WHERE korisnicko_ime = :username')) {
	// Spajanje parametara (s = string, i = int, b = blob, itd), ovdje je username u tipu string pa koristim s
	$stmt->bindparam(':username', $_POST['username'], PDO::PARAM_STR, 4);
	$stmt->execute();
}
$counter = 0;
while($row=$stmt->fetch()) {
	if (password_verify($_POST['password'], $row['lozinka'])) {
		// Provjera je uspješna, korisnik je uspješno prijavljen
		// Kreiranje sesije, da znamo da je korisnik prijavljen, ovo funkcionira kao kolačići samo što su podaci spremljeni na poslužiteljskoj strani
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $row['id'];
		header('Location: ../administration/dashboard.php');
		$counter = 1;
		exit;
	}
}
if($counter == 0){
	$_SESSION['error'] = "Pogrešno korisničko ime ili lozinka!";
	header('Location: ../prijava.php');
	exit();
}

?>