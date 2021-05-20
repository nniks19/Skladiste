<?php
include '../connection.php';
if ( empty($_POST['username']) || empty($_POST['password']) ) {
	// Ako netko proba otvoriti samo stranicu authenticate.php bez koristenja forme
	exit('<div style="color:red; font-size:150px;">Potrebno je popuniti oba polja! <br> <a href="/skladiste/prijava.php"><button style="color:red;">Prijavi se ponovno!</button></a></div>');
}
if ($stmt = $oConnection->prepare('SELECT id, lozinka FROM korisnici WHERE korisnicko_ime = :username')) {
	// Spajanje parametara (s = string, i = int, b = blob, itd), ovdje je username u tipu string pa koristim s
	$stmt->bindparam(':username', $_POST['username'], PDO::PARAM_STR, 4);
	$stmt->execute();
}

while($row=$stmt->fetch()) {
	if (password_verify($_POST['password'], $row['lozinka'])) {
		// Provjera je uspješna, korisnik je uspješno prijavljen
		// Kreiranje sesije, da znamo da je korisnik prijavljen, ovo funkcionira kao kolačići samo što su podaci spremljeni na poslužiteljskoj strani
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $row['id'];
		echo 'Dobrodošli ' . $_SESSION['name'] . '!';
	} else {
		echo 'Pogrešno korisničko ime i/ili lozinka';
	}
}

?>