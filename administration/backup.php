<?php
include '../action/checklogin.php';
if (isset($_SESSION['error'])){
    echo '<script>alert("'.$_SESSION['error'].'")</script>';
    unset($_SESSION['error']);
}

?>

<!DOCTYPE html>
<html lang="hr" ng-app="skladiste-panel" ng-controller="backupController">

<head>
        <title>VUV gradnja d.o.o</title>
        
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

<body class="p-3 mb-2 bg-secondary">
    <headerpanelnav></headerpanelnav>
    <div class="container containerstats text-white">
        <div class="row">
            <div class="col text-center">
                <h1>Izrada sigurnosne kopije</h1>
                <hr>
            </div>
            <div class="row" ng-init="dohvatiInfo()">
                <div class="col text-center">
                    <h4><button type="button" class="btn btn-danger" ng-click="backup('txtsvi')">SQL Naredbe za Insert podataka iz svih tablica</button>
                        <button type="button" class="btn btn-danger" ng-click="backup('txtkategorije')">SQL Naredbe za Insert podataka iz tablice kategorija</button>
                        <button type="button" class="btn btn-danger" ng-click="backup('txtartikli')">SQL Naredbe za Insert podataka iz tablice artikala</button>
                    </h4>
                    <h4>
                        <button type="button" class="btn btn-danger" ng-click="backup('txtkorisnici')">SQL Naredbe za Insert podataka iz tablice korisnika</button>
                        <button type="button" class="btn btn-danger" ng-click="backup('txtdokumenti')">SQL Naredbe za Insert podataka iz tablice dokumenata</button>
                        <button type="button" class="btn btn-danger" ng-click="backup('txtartikldokument')">SQL Naredbe za Insert podataka iz tablice artikldokument</button>

                    </h4>
                    <hr>
                    <h4>
                    </h4>
                    <h4>
                    Vraćanje na početne podatke
                    </h4>
                    <hr>
                    <h4>
                    <button type="button" ng-click="dummyPodaci()" class="btn btn-danger"><a>Vrati na početne podatke</a></button>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>
