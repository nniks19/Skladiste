<?php
include '../connection.php';
$form_data = json_decode(file_get_contents("php://input"));
if (empty($form_data->username) ) {
	// Ako netko proba otvoriti samo stranicu authenticate.php bez koristenja forme
	$output['error'] = "Za registraciju je potrebno popuniti polje gdje se upisuje korisničko ime!";
} else if (empty($form_data->password)){
    $output['error'] = "Za registraciju je potrebno popuniti polje gdje se upisuje lozinka!";
} else if (empty($form_data->email)){
    $output['error'] = "Za registraciju je potrebno popuniti polje gdje se upisuje email!";
}else if (empty($form_data->ime)){
    $output['error'] = "Za registraciju je potrebno popuniti polje gdje se upisuje ime!";
}else if (empty($form_data->prezime)){
    $output['error'] = "Za registraciju je potrebno popuniti polje gdje se upisuje prezime!";
}else if (empty($form_data->drzava)){
    $output['error'] = "Za registraciju je potrebno popuniti polje gdje se upisuje drzava!";
}else if (empty($form_data->grad)){
    $output['error'] = "Za registraciju je potrebno popuniti polje gdje se upisuje grad!";
}else if (empty($form_data->brojmobitela)){
    $output['error'] = "Za registraciju je potrebno popuniti polje gdje se upisuje broj mobitela!";
}
if (empty($output['error'])){
	$data = array(
		':Username'=>$form_data->username
	);
	$query = "SELECT count(*) as brojacUsername FROM Korisnici WHERE korisnicko_ime = :Username;";
	$statement = $oConnection->prepare($query);
	$statement->execute($data);
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		if ($row['brojacUsername'] > 0){
			$output['error'] = "Korisničko ime je zauzeto!";
		}
	}
	$data = array(
		':Email'=>$form_data->email
	);
	$query = "SELECT count(*) as brojacEmail FROM Korisnici WHERE email = :Email;";
	$statement = $oConnection->prepare($query);
	$statement->execute($data);
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		if($row['brojacEmail'] > 0){
			$output['error'] = "Email je zauzet!";	
		}
	}
	if (empty($output['error'])){
		//$output['message'] = "uspjeh";
		$hashed_password = password_hash($form_data->password, PASSWORD_DEFAULT);
		$data = array( 
			':Username' => $form_data->username,
		 	':Password' => $hashed_password,
			':Email'=> $form_data->email, 
			':Ime' => $form_data->ime, 
			':Prezime' => $form_data->prezime, 
			':Drzava' =>$form_data->drzava, 
			':Grad'=>$form_data->grad, 
			':Brojmobitela' =>$form_data->brojmobitela
		);
		$query = "INSERT INTO Korisnici (korisnicko_ime, lozinka, email, ime, prezime, drzava, grad, broj_mobitela, datum_kreiranja) VALUES (:Username, :Password , :Email, :Ime, :Prezime, :Drzava, :Grad, :Brojmobitela, current_timestamp);";
		$statement = $oConnection->prepare($query);
		if($statement->execute($data))
		{
			$output['message'] = 'Uspješno ste se registrirali!';
		}
	}
}
if (!empty($output)){
echo json_encode($output);
}
?>