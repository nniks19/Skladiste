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
                <h4>Ime: <h6 id="ime"></h6></h4>
                <h4>Prezime: <h6 id="prezime"></h6></h4>
                <h4>Država: <h6 id="drzava"></h6></h4>
                <h4>Grad: <h6 id="grad"></h6></h4>
                <h4>Broj mobitela: <h6 id="brmob"></h6></h4>
                <h4>Email: <h6 id="email"></h6></h4>
                <hr>
                <h4>Korisničko ime: <br><?=$_SESSION['name']?></h4>
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
$sQuery = "SELECT ime,prezime,drzava,grad,broj_mobitela,email FROM Korisnici";
    $oRecord = $oConnection->query($sQuery);
    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH)){
        echo '<script>document.getElementById("ime").innerHTML = "'.$oRow["ime"].'";
        document.getElementById("prezime").innerHTML = "'.$oRow['prezime'].'";
        document.getElementById("drzava").innerHTML = "'.$oRow['drzava'].'";
        document.getElementById("grad").innerHTML = "'.$oRow['grad'].'";
        document.getElementById("brmob").innerHTML = "'.$oRow['broj_mobitela'].'";
        document.getElementById("email").innerHTML = "'.$oRow['email'].'";
        </script>';
    }
?>