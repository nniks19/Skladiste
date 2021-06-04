<?php
include '../action/checklogin.php';
?>

<!DOCTYPE html>
<html lang="hr">

<head>
        <title>VUV gradnja d.o.o - <?=$_SESSION['name']?></title>
        
    <meta charset="utf‐8">
        
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="../assets/jquery-3.6.0.js"></script>
    <script src="../assets/angular.js"></script>
    <script src="../assets/jquery.dataTables.min.js"></script>
    <script src="../assets/natural.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/angular-datatables.min.js"></script>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link href="../css/crud.css" rel="stylesheet">
</head>

<body class="p-3 mb-2 bg-secondary" ng-app="skladiste-panel">
    <headerpanelnav></headerpanelnav>
    <div class="crudcontainer" id="divtablica">
        <div class="crudbuttons">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                <label class="btn btn-outline-dark" for="btnradio1"
                    ng-click="ctablicaArtikli.ucitajArtikle()">Artikli</label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-dark" for="btnradio2">Izdatnice</label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-dark" for="btnradio3">Primke</label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                <label class="btn btn-outline-dark" for="btnradio4">Kategorije</label>
            </div>
        </div>
        <div ng-controller="ctablicaArtikli">
            <table class='table table-dark table-striped' datatable="ng">
                <thead>
                    <tr>
                        <th scope='col'>Šifra artikla</th>
                        <th scope='col'>Naziv artikla</th>
                        <th scope='col'>Opis Artikla</th>
                        <th scope='col'>JMJ</th>
                        <th scope='col'>Cijena</th>
                        <th scope='col'>URL Slike Artikla</th>
                        <th scope='col'>Naziv kategorije</th>
                        <th scope='col'></th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="oData in Artikli">
                        <td>{{oData.sArtikl_Sifra}}</td>
                        <td>{{oData.sArtikl_Naziv}}</td>
                        <td>{{oData.sArtikl_Opis}}</td>
                        <td>{{oData.sArtikl_JedMj}}</td>
                        <td>{{oData.dArtikl_Cijena}}</td>
                        <td class="cell">{{oData.sArtikl_URL}}</td>
                        <td id="{{oData.sArtikl_Kategorija.sArtikl_KategorijaId}}">
                            {{oData.sArtikl_Kategorija.sArtikl_Kategorija}}</td>
                        <td id="{{oData.sArtikl_Sifra}}"><svg data-bs-toggle="modal" data-bs-target="#modalEditArtikl"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></td>
                        <td id="{{oData.sArtikl_Sifra}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></td>
                    </tr>
                </tbody>
            </table>
            <button type='button' data-bs-toggle='modal' data-bs-target='#modalAddArtikl' class='btn btn-primary'>Dodaj
                Artikl</button>
        </div>
        <div ng-controller="ctablicaIzdatnice">
            <table class='table table-dark table-striped' datatable="ng">
                <thead>
                    <tr>
                        <th scope='col'>Šifra dokumenta</th>
                        <th scope='col'>Tip dokumenta</th>
                        <th scope='col'>Datum izdavanja dokumenta</th>
                        <th scope='col'>Količina primanja</th>
                        <th scope='col'>Šifre artikala</th>
                        <th scope='col'>Iznos ulaz</th>
                        <th scope='col'>Iznos izlaz</th>
                        <th scope='col'></th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="oData in Izdatnice">
                        <td>{{oData.sSifraDokumenta}}</td>
                        <td>{{oData.sTipDokumenta}}</td>
                        <td>{{oData.dDatumDokumenta}}</td>
                        <td>{{oData.nKolicina}}</td>
                        <td>{{oData._Artikli}}</td>
                        <td>{{oData.dIznosUlaz}}</td>
                        <td>{{oData.dIznosIzlaz}}</td>
                        <td id="{{oData.sSifraDokumenta}}"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></td>
                        <td id="{{oData.sSifraDokumenta}}"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></td>
                    </tr>
                </tbody>
            </table><button type='button' class='btn btn-primary'>Dodaj Primku</button>
        </div>
        <div ng-controller="ctablicaPrimke">
            <table class='table table-dark table-striped' datatable="ng">
                <thead>
                    <tr>
                        <th scope='col'>Šifra dokumenta</th>
                        <th scope='col'>Tip dokumenta</th>
                        <th scope='col'>Datum izdavanja dokumenta</th>
                        <th scope='col'>Količina izdavanja</th>
                        <th scope='col'>Šifre artikala</th>
                        <th scope='col'>Iznos ulaz</th>
                        <th scope='col'>Iznos izlaz</th>
                        <th scope='col'></th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="oData in Primke" id="{{oData.sSifraDokumenta}}">
                        <td>{{oData.sSifraDokumenta}}</td>
                        <td>{{oData.sTipDokumenta}}</td>
                        <td>{{oData.dDatumDokumenta}}</td>
                        <td>{{oData.nKolicina}}</td>
                        <td>{{oData._Artikli}}</td>
                        <td>{{oData.dIznosUlaz}}</td>
                        <td>{{oData.dIznosIzlaz}}</td>
                        <td id="{{oData.sSifraDokumenta}}"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></td>
                        <td id="{{oData.sSifraDokumenta}}"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></td>
                    </tr>
                </tbody>
            </table><button type='button' class='btn btn-primary'>Dodaj Izdatnicu</button>
        </div>
        <div ng-controller="ctablicaKategorije">
            <table class='table table-dark table-striped' datatable="ng">
                <thead>
                    <tr>
                        <th scope='col'>ID Kategorije</th>
                        <th scope='col'>Naziv kategorije</th>
                        <th scope='col'></th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="oData in Kategorije">
                        <td>{{oData.nIdKategorije}}</td>
                        <td>{{oData.sNazivKategorije}}</td>
                        <td id="{{oData.nIdKategorije}}"><svg data-bs-toggle="modal"
                                data-bs-target="#modalEditKategorija" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></td>
                        <td id="{{oData.nIdKategorije}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></td>
                    </tr>
                </tbody>
            </table><button type='button' class='btn btn-primary'>Dodaj Primku</button>
        </div>
    </div>

    <!-- Modal Uredi Kategoriju -->
    <div class="modal fade" id="modalEditKategorija" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalEditKategorijaLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" onclick="urediSpremiKategoriju()">Spremi
                        promjene</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dodaj Kategoriju -->
    <div class="modal fade" id="modalAddKategorija" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalAddKategorijaLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" onclick="dodajNovuKategoriju()">Dodaj
                        kategoriju</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dodaj Artikl -->
    <div class="modal fade" id="modalAddArtikl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalAddArtiklLabel" aria-hidden="true">
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
                    <p>Cijena: <input type="text" name="Cijena artikla" id="addartiklcijena"
                            onkeypress="return isNumberKey(event)"></p>
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
    <div class="modal fade" id="modalEditArtikl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalEditArtiklLabel" aria-hidden="true">
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
                    <p>Cijena: <input type="text" name="Cijena artikla" id="editartiklcijena"
                            onkeypress="return isNumberKeyd(event)"></p>
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
</body>

</html>