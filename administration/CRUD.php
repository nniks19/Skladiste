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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/natural.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
   <link href="../css/crud.css" rel="stylesheet">
</head>
<body class="p-3 mb-2 bg-secondary text-white">
<headerpanelnav></headerpanelnav>
<div class="crudbuttons">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" onclick="divArtikli()" id="btnradio1" autocomplete="off" checked>
        <label class="btn btn-outline-dark" for="btnradio1">Artikli</label>
        <input type="radio" class="btn-check" name="btnradio" onclick="divIzdatnice()" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-dark" for="btnradio2">Izdatnice</label>
        <input type="radio" class="btn-check" name="btnradio" onclick="divPrimke()"id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-dark" for="btnradio3">Primke</label>
    </div>
</div>
<div class="crudcontainer" id="divtablica">
    
</div>

<script src="../js/app.js"></script>
<script src="../js/crud.js"></script>
</body>
</html>