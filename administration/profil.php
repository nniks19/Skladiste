<?php
include '../action/checklogin.php';
?>

<!DOCTYPE html>
<html lang="hr" ng-app="skladiste-panel">
<head>
    <title>VUV gradnja d.o.o - <?=$_SESSION['name']?></title>
    <meta charset="utf‐8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="../css/dashboard.css" rel="stylesheet">
</head>
<body class="p-3 mb-2 bg-secondary text-white">
    <headerpanelnav></headerpanelnav>
    <div class="container containerstats">
    <div class="row">
        <div class="col text-center">
            <h1>Profil</h1>
            <hr>
        </div>
        <div class="row">
            <div class="col text-center">
                // moram dodat ispis iz baze
                <h4><br>Ime:</h4>
                <h4><br>Prezime</h4>
                <h4><br>Država</h4>
                <h4><br>Grad</h4>
                <h4><br>Broj mobitela</h4>
                <h4><br>Email</h4>
                // moram dodat ispis iz baze
                <h4><br>Korisničko ime: <?=$_SESSION['name']?></h4>
                <h4><br>Nova lozinka: </h4>
                <form method="post" action="/skladiste/action/passwordchange.php" id="changepassform">
                    <div class="form-floating">
                        <input type="password" id="newpassword" name="newpassword" placeholder="Nova lozinka"></input>
                    </div>
                    <button type="submit">Spremi</button>
                </form>
                <p>Naputak: Ako promijenite lozinku pri slijedećoj prijavi morate koristiti tu novu lozinku.</p>
            </div>
        </div>
    </div>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>
<?php
if (isset($_SESSION['error'])){
    echo '<script>alert("'.$_SESSION['error'].'")</script>';
    unset($_SESSION['error']);
}

?>