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
            <h1>Nadzorna ploča</h1>
            <hr>
        </div>
        <div class="row">
            <div class="col text-center border-end">
                <h4><br>Ukupan broj artikala:  <!-- Count preko SQL-a koliko ima artikala u bazi --></h4>
                <h4><br>Ukupan broj dokumenata:  <!-- Count preko SQL-a koliko ima dokumenata u bazi --></h4>
                <h4><br>Ukupan broj izdatnica:  <!-- Count preko SQL-a koliko ima izdatnica u bazi --></h4>
                <h4><br>Ukupan broj primki:  <!-- Count preko SQL-a koliko ima primka u bazi --></h4>
                <h4><br>Ukupna količina artikala:  <!-- Count * Stanje koliko ih ima --></h4>
                <h4><br>Cijena artikala:  <!-- zbrojih svih (cijena pojedinog artikla * koliko ga ima)  --></h4>
                <h4><br>Cijena najskupljeg artikla: <!--Max preko SQL-a--></h4>
                <h4><br>Cijena najjeftinijeg artikla: <!--Min preko SQL-a--></h4>
            </div>
            <div class="col text-center">
                <h4><br>Ukupan broj korisnika: </h4> <!--Count preko SQL-a koliko ima korisnika u bazi --></h4>
                <h4><br>Ukupan broj sigurnosnih kopija:  <!-- Count preko SQL-a koliko ima backupa u bazi --></h4>
            </div>
        </div>
    </div>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>