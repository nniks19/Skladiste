<!DOCTYPE html>
<html lang="hr" ng-app="skladiste-app">
<head>
    <title>VUV gradnja d.o.o - Artikli</title>
    <meta charset="utf‐8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/natural.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="css/artikli.css" rel="stylesheet">
</head>
<body>
<headernav></headernav>
<div class="container-fluid containerarticle">
    <table class="table table-dark table-striped" id="tablicaartikli">
    <thead>
    <tr>
      <th scope="col">Šifra artikla</th>
      <th scope="col">Naziv artikla</th>
      <th scope="col">JMJ</th>
      <th scope="col">Cijena</th>
      <th scope="col">Količina ulaz (suma)</th>
      <th scope="col">Iznos ulaz (suma)</th>
      <th scope="col">Količina izlaz (suma)</th>
      <th scope="col">Iznos izlaz (suma)</th>
      <th scope="col">Stanje količina</th>
      <th scope="col">Stanje cijena</th>
    </tr>
  </thead>
  <tbody id="tablebodyarticles">
  </tbody>
    </table>
</div>

<footercopy class="footer text-center mt-auto"></footercopy>
<script src="js/app.js"></script>
<script src="js/artikli.js"></script>
</body>
</html>