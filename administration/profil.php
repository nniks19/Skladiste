<?php
include '../action/checklogin.php';
if (isset($_SESSION['error'])){
    echo '<script>alert("'.$_SESSION['error'].'")</script>';
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="hr" ng-app="skladiste-panel" ng-controller="profilController">
<head>
    <title>VUV gradnja d.o.o - </title>
    <meta charset="utf‐8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="../assets/jquery-3.6.0.js"></script>
    <script src="../assets/angular.js"></script>
    <script src="../assets/jquery.dataTables.min.js"></script>
    <script src="../assets/natural.js"></script>
    <script src="../assets/angular-datatables.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/jquery.dataTables.css" rel="stylesheet" type="text/css">
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
            <div class="col text-center" ng-if="Korisnik.nId == $_SESSION['id']" ng-repeat="Korisnik in Korisnici">
                <h4>Ime: <h6> {{Korisnik.sIme}}</h6></h4>
                <h4>Prezime: <h6> {{Korisnik.sPrezime}}</h6></h4>
                <h4>Država: <h6> {{Korisnik.sDrzava}}</h6></h4>
                <h4>Grad: <h6> {{Korisnik.sGrad}}</h6></h4>
                <h4>Broj mobitela: <h6> {{Korisnik.sBroj_Mobitela}}</h6></h4>
                <h4>Email: <h6> {{Korisnik.sEmail}}</h6></h4>
                <hr>
                <h4>Korisničko ime: <br><?=$_SESSION['name']?></h4>
                <h4><br>Nova lozinka: </h4>
                <form method="post" action="../action/passwordchange.php" id="changepassform">
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
