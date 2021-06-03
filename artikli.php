<!DOCTYPE html>
<html lang="hr">
<head>
    <title>VUV gradnja d.o.o - Artikli</title>
    <meta charset="utf‐8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="assets/jquery-3.6.0.js"></script>
    <script src="assets/angular.js"></script>
    <script src="assets/jquery.dataTables.min.js"></script>
    <script src="assets/natural.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/angular-datatables.min.js"></script>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link href="css/artikli.css" rel="stylesheet">
</head>
<body ng-app="skladiste-app">
<headernav></headernav>
<div class="container-fluid containerarticle" ng-controller="listaArtikala">
    <table class="table table-dark table-striped" id="tablicaartikli" datatable="ng">
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
    <tr ng-repeat="oData in Artikli">
      <td>{{oData.Artikl.sArtikl_Sifra}}</td>
      <td>{{oData.Artikl.sArtikl_Naziv}}</td>
      <td>{{oData.Artikl.sArtikl_JedMj}}</td>
      <td>{{oData.Artikl.dArtikl_Cijena}}</td>
      <td>{{oData.KolicinaUlaz}}</td>
      <td>{{oData.IznosUlaz}}</td>
      <td>{{oData.KolicinaIzlaz}}</td>
      <td>{{oData.IznosIzlaz}}</td>
      <td>{{oData.StanjeKolicina}}</td>
      <td>{{oData.StanjeIznos}}</td>
    </tr>
  </tbody>
    </table>
</div>

<footercopy class="footer text-center mt-auto"></footercopy>
<script src="js/app.js"></script>
</body>
</html>