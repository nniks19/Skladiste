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

<body class="p-3 mb-2 bg-secondary" ng-app="skladiste-panel" ng-controller="izdatniceCRUD">
    <headerpanelnav></headerpanelnav>
    <div class="crudbuttons">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <div>
                <button type="button" name="add_button" ng-click="addData()" class="btn-info">Dodaj Izdatnicu</button>
            </div>
        </div>
    </div>

    <div class="crudcontainer" ng-init="dohvatiIzdatnice()">
        <div class="table-responsive" style="overflow-x: unset;">
            <table datatable="ng" dt-options="vm.dtOptions" class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope='col'>Šifra dokumenta</th>
                        <th scope='col'>Tip dokumenta</th>
                        <th scope='col'>Datum izdavanja dokumenta</th>
                        <th scope='col'>Količina primanja</th>
                        <th scope='col'>Šifre artikala</th>
                        <th scope='col'>Iznos ulaz</th>
                        <th scope='col'>Iznos izlaz</th>
                        <th scope='col'>Dokument kreirao/la</th>
                        <th scope='col'>Pregled</th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="Izdatnica in Izdatnice">
                        <td>{{Izdatnica.sSifraDokumenta}}</td>
                        <td>{{Izdatnica.sTipDokumenta}}</td>
                        <td>{{Izdatnica.dDatumDokumenta}}</td>
                        <td>{{Izdatnica.nKolicina}}</td>
                        <td>{{Izdatnica._Artikli}}</td>
                        <td>{{Izdatnica.dIznosUlaz}}</td>
                        <td>{{Izdatnica.dIznosIzlaz}}</td>
                        <td>{{Izdatnica.oKorisnik.Korisnik_Ime}} {{Izdatnica.oKorisnik.Korisnik_Prezime}}</td>
                        <td ng-click="openModalPregled(Izdatnica.sSifraDokumenta, Izdatnica.dDatumDokumenta, Izdatnica.dIznosIzlaz, Izdatnica.oKorisnik.Korisnik_Ime, Izdatnica.oKorisnik.Korisnik_Prezime)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-zoom-in" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                <path
                                    d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z" />
                                <path fill-rule="evenodd"
                                    d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z" />
                            </svg></td>
                        <td><button type="button" ng-click="deleteData(Izdatnica.sSifraDokumenta)"
                                class="btn btn-danger">Obriši</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="../js/app.js"></script>
</body>
<div class="modal fade" tabindex="-1" id="pregledmodal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title d-print-none">Prikaz izdatnice</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zatvori"></button>
                </div>
                <div class="modal-body text-center">
                    <h3>Izdao: <h5>{{ime}} {{prezime}}</h5></h3>
                    <h3>Sifra dokumenta: <h5>{{sifradok}}</h5><h3>
                    <h3>Tip dokumenta: <h5>Izdatnica</h5></h3>
                    <h3>Datum izdavanja dokumenta: <h5>{{datumdok}}</h5></h3>
                    <h3>Ukupan iznos (ulaz): <h5>{{dokiznosulaz}} kn</h5></h3>
                    <h3>Ukupan iznos (izlaz): <h5>{{dokiznosizlaz}} kn</h5></h3>
                    <h3>Artikli:</h3>
                    <hr>
                    <div class="row">
                        <div ng-repeat="Artik in dArtikli" class="col">
                            <h5>Sifra artikla: {{Artik.Artikl_Sifra}}</h5>
                            <h5>Naziv artikla: {{Artik.Naziv}}</h5>
                            <h5>Kolicina artikla: {{Artik.Kolicina}}</h5>
                            <h5>Iznos artikla: {{Artik.Iznos}} kn</h5>
                        </div>
                    </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                    <button type="button" class="btn btn-secondary d-print-none" data-bs-dismiss="modal">{{Zatvori}}</button>
                    <button type="button" class="btn btn-primary d-print-none" ng-click="printaj()">{{Printaj}}</button>
                </div>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="crudmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" ng-submit="submitForm()">
                <div class="modal-header">
                    <h4 class="modal-title">{{modalNaslov}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zatvori"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Šifra dokumenta će biti automatski dodijeljena kao prva slijedeća slobodna</label>
                        <label>Datum će biti odabran od trenutka kada pritisnete gumb "Dodaj"</label>
                        <label>Tip dokumenta će biti izdatnica, odnosno "IZD"</label>
                        <hr>
                        <label>Odaberite Artikle koji želite dodati:</label>
                        <select name="ArtiklS" ng-model="ArtiklS" ng-change="onChangeArtikl()">
                            <option ng-repeat="Artikl in Artikli" value="{{Artikl.sArtikl_Sifra}}">
                                {{Artikl.sArtikl_Naziv}}</option>
                        </select>
                        <div ng-repeat="OdabraniArtikl in OdabraniArtikli">
                            <hr>
                            <label>Naziv artikla: {{OdabraniArtikl.NazivArtikla}}</label>
                            <p>Količina artikla (dostupno: {{OdabraniArtikl.DostupnaKolicina}}): <input
                                    id="{{OdabraniArtikl.SifraArtikla}}" type="number" min="1" name="Artikl_Kolicina"
                                    ng-model="Artikl_Kolicina" ng-change="checkRange(this)" class="form-control" />
                                <button ng-click="deleteArtikl(OdabraniArtikl.SifraArtikla)">Obriši</button></p>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="{{submit_button}}" />
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                </div>
            </form>
        </div>
    </div>
</div>
</html>
