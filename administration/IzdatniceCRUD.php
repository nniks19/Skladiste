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

</html>

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
                            <p>Količina artikla (dostupno: {{OdabraniArtikl.DostupnaKolicina}}): <input id="{{OdabraniArtikl.SifraArtikla}}" type="number" min="1"
                                    name="Artikl_Kolicina" ng-model="Artikl_Kolicina" ng-change="checkRange(this)" class="form-control" /> <button
                                    ng-click="deleteArtikl(OdabraniArtikl.SifraArtikla)">Obriši</button></p>

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