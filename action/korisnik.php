<?php

include('../connection.php');
session_start();

$form_data = json_decode(file_get_contents("php://input"));

$error = [];

if($form_data->Korisnik_TipPodatka == 'ime')
{
    if (empty($form_data->Korisnik_Podatak)){
        $output['error'] = 'Obavezan je unos imena korisnika!';
    }
    if(empty($output['error']))
	{
	    $data = array(
            ':Id' => $_SESSION['id'],
		    ':Ime' => $form_data->Korisnik_Podatak
	    );
	    $query = "UPDATE Korisnici SET ime = :Ime WHERE id=:Id";
        $statement = $oConnection->prepare($query);
        if($statement->execute($data))
        {
            $output['message'] = 'Korisnikovo ime je uspješno uređeno!';
        }
    }
}else if($form_data->Korisnik_TipPodatka == 'prezime')
{
    if (empty($form_data->Korisnik_Podatak)){
        $output['error'] = 'Obavezan je unos prezimena korisnika!';
    }
    if(empty($output['error']))
	{
	    $data = array(
            ':Id' => $_SESSION['id'],
		    ':Prezime' => $form_data->Korisnik_Podatak
	    );
	    $query = "UPDATE Korisnici SET prezime = :Prezime WHERE id=:Id";
        $statement = $oConnection->prepare($query);
        if($statement->execute($data))
        {
            $output['message'] = 'Korisnikovo prezime je uspješno uređeno!';
        }
    }
}else if($form_data->Korisnik_TipPodatka == 'državu')
{
    if (empty($form_data->Korisnik_Podatak)){
        $output['error'] = 'Obavezan je unos države korisnika!';
    }
    if(empty($output['error']))
	{
	    $data = array(
            ':Id' => $_SESSION['id'],
		    ':Drzava' => $form_data->Korisnik_Podatak
	    );
	    $query = "UPDATE Korisnici SET drzava = :Drzava WHERE id=:Id";
        $statement = $oConnection->prepare($query);
        if($statement->execute($data))
        {
            $output['message'] = 'Korisnikova država je uspješno uređena!';
        }
    }
}else if($form_data->Korisnik_TipPodatka == 'grad')
{
    if (empty($form_data->Korisnik_Podatak)){
        $output['error'] = 'Obavezan je unos grada korisnika!';
    }
    if(empty($output['error']))
	{
	    $data = array(
            ':Id' => $_SESSION['id'],
		    ':Grad' => $form_data->Korisnik_Podatak
	    );
	    $query = "UPDATE Korisnici SET grad = :Grad WHERE id=:Id";
        $statement = $oConnection->prepare($query);
        if($statement->execute($data))
        {
            $output['message'] = 'Korisnikov grad je uspješno uređen!';
        }
    }
}else if($form_data->Korisnik_TipPodatka == 'broj mobitela')
{
    if (empty($form_data->Korisnik_Podatak)){
        $output['error'] = 'Obavezan je unos broja mobitela korisnika!';
    }
    if(empty($output['error']))
	{
	    $data = array(
            ':Id' => $_SESSION['id'],
		    ':BrMob' => $form_data->Korisnik_Podatak
	    );
	    $query = "UPDATE Korisnici SET broj_mobitela = :BrMob WHERE id=:Id";
        $statement = $oConnection->prepare($query);
        if($statement->execute($data))
        {
            $output['message'] = 'Korisnikov broj mobitela je uspješno uređen!';
        }
    }
}else if($form_data->Korisnik_TipPodatka == 'email')
{
    if (empty($form_data->Korisnik_Podatak)){
        $output['error'] = 'Obavezan je unos emaila korisnika!';
    }
    if(empty($output['error']))
	{
	    $data = array(
            ':Id' => $_SESSION['id'],
		    ':Email' => $form_data->Korisnik_Podatak
	    );
	    $query = "UPDATE Korisnici SET email = :Email WHERE id=:Id";
        $statement = $oConnection->prepare($query);
        if($statement->execute($data))
        {
            $output['message'] = 'Korisnikov email je uspješno uređen!';
        }
    }
}



echo json_encode($output);

?>