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
<body class="p-3 mb-2 bg-secondary">
<headerpanelnav></headerpanelnav>
<div class="crudbuttons">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" onclick="divArtikli()" id="btnradio1" autocomplete="off" checked>
        <label class="btn btn-outline-dark" for="btnradio1">Artikli</label>
        <input type="radio" class="btn-check" name="btnradio" onclick="divIzdatnice()" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-dark" for="btnradio2">Izdatnice</label>
        <input type="radio" class="btn-check" name="btnradio" onclick="divPrimke()"id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-dark" for="btnradio3">Primke</label>
        <input type="radio" class="btn-check" name="btnradio" onclick="divKategorije()" id="btnradio4" autocomplete="off">
        <label class="btn btn-outline-dark" for="btnradio4">Kategorije</label>
    </div>
</div>
<div class="crudcontainer" id="divtablica">
</div>

<!-- Modal Uredi Kategoriju -->
<div class="modal fade" id="modalEditKategorija" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditKategorijaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditKategorijaLabel">Uredi kategoriju</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>ID Kategorije: <a id="editkategorijaid"></a></p>
      <p>Naziv kategorije: <input type="text" name="Naziv kategorije" id="editkategorijanaziv"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="button" class="btn btn-primary" onclick="urediSpremiKategoriju()">Spremi promjene</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Dodaj Kategoriju -->
<div class="modal fade" id="modalAddKategorija" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddKategorijaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddKategorijaLabel">Dodaj kategoriju</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Naziv kategorije: <input type="text" name="Naziv kategorije" id="addkategorijanaziv"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="button" class="btn btn-primary" onclick="dodajNovuKategoriju()">Dodaj kategoriju</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Dodaj Artikl -->
<div class="modal fade" id="modalAddArtikl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddArtiklLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddArtiklLabel">Dodaj artikl</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Naziv Artikla: <input type="text" name="Naziv artikla" id="addartiklnaziv"></p>
      <p>Opis Artikla: <input type="text" name="Opis artikla" id="addartiklopis"></p>
      <p>JMJ: <input type="text" name="JMJ artikla" id="addartikljmj"></p>
      <p>Cijena: <input type="text" name="Cijena artikla" id="addartiklcijena" onkeypress="return isNumberKey(event)"></p>
      <p>URL Slike artikla: <input type="text" name="URL Slike artikla" id="addartiklurl"></p>
      <p>Odaberite kategoriju artikla: <select id="addartiklkategorija"></select></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="button" class="btn btn-primary" onclick="dodajNoviArtikl()">Dodaj artikl</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Uredi Artikl -->
<div class="modal fade" id="modalEditArtikl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditArtiklLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditArtiklLabel">Uredi artikl</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>ID Artikla: <a id="editartiklid"></a></p>
      <p>Naziv Artikla: <input type="text" name="Naziv artikla" id="editartiklnaziv"></p>
      <p>Opis Artikla: <input type="text" name="Opis artikla" id="editartiklopis"></p>
      <p>JMJ: <input type="text" name="JMJ artikla" id="editartikljmj"></p>
      <p>Cijena: <input type="text" name="Cijena artikla" id="editartiklcijena" onkeypress="return isNumberKeyd(event)"></p>
      <p>URL Slike artikla: <input type="text" name="URL Slike artikla" id="editartiklurl"></p>
      <p>Odaberite kategoriju artikla: <select id="editartiklkategorija"></select></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="button" class="btn btn-primary" onclick="urediSpremiArtikl()">Spremi promjene</button>
      </div>
    </div>
  </div>
</div>

<script src="../js/app.js"></script>
<script src="../js/crud.js"></script>
</body>
</html>