<?php
include '../action/checklogin.php';
?>

<!DOCTYPE html>
<html lang="hr" ng-app="skladiste-panel" ng-controller="dashboardController">
<head>
    <title>VUV gradnja d.o.o - <?=$_SESSION['name']?></title>
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
            <h1>Nadzorna ploča</h1>
            <hr>
        </div>
        <div class="row">
            <div class="col text-center" ng-repeat="stat in Statistika">
                <h4 id="BrKr"><br>Ukupan broj korisnika: {{stat.BrKr}} <!--Count preko SQL-a koliko ima korisnika u bazi --></h4> 
                <h4 id="BrKa"><br>Ukupan broj kategorija: {{stat.BrKa}}<!--Count preko SQL-a koliko ima kategorija u bazi --></h4>
                <h4 id="UkBrAr"><br>Ukupan broj artikala:  {{stat.UkBrAr}}<!-- Count preko SQL-a koliko ima artikala u bazi --></h4>
                <h4 id="UkBrDo"><br>Ukupan broj dokumenata:  {{stat.UkBrDo}}<!-- Count preko SQL-a koliko ima dokumenata u bazi --></h4>
                <h4 id="UkBrIz"><br>Ukupan broj izdatnica:  {{stat.UkBrIz}}<!-- Count preko SQL-a koliko ima izdatnica u bazi --></h4>
                <h4 id="UkBrPr"><br>Ukupan broj primki:  {{stat.UkBrPr}}<!-- Count preko SQL-a koliko ima primka u bazi --></h4>
                <h4 id="UkKoAr"><br>Ukupna količina dostupnih artikala: {{stat.UkKoAr}} <!-- Count * Stanje koliko ih ima --></h4>
                <h4 id="UkCiAr"><br>Ukupna cijena dostupnih artikala:  {{stat.UkCiAr}} kn<!-- zbrojih svih (cijena pojedinog artikla * koliko ga ima)  --></h4>
                <h4 id="CiMaAr"><br>Cijena najskupljeg artikla: {{stat.CiMaAr}} kn<!--Max preko SQL-a--></h4>
                <h4 id="CiMiAr"><br>Cijena najjeftinijeg artikla: {{stat.CiMiAr}} kn<!--Min preko SQL-a--></h4>           </div>
        </div>
    </div>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>