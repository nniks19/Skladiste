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

<body ng-app="skladiste-app"  ng-controller="listaArtikala">
    <headernav></headernav>
    <div class="container-fluid containerarticle">
        <table class="table table-dark table-striped" id="tablicaartikli" datatable="ng">
            <thead>
                <tr>
                    <th scope="col">Šifra artikla</th>
                    <th scope="col">Naziv artikla</th>
                    <th scope="col">JMJ</th>
                    <th scope="col">Cijena (kn)</th>
                    <th scope="col">Količina ulaz (suma)</th>
                    <th scope="col">Iznos ulaz (suma)</th>
                    <th scope="col">Količina izlaz (suma)</th>
                    <th scope="col">Iznos izlaz (suma)</th>
                    <th scope="col">Stanje količina</th>
                    <th scope="col">Stanje cijena (kn)</th>
                    <th scope="col">Info</th>
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
                    <td ng-click="openModal(oData.Artikl.sArtikl_Sifra, oData.Artikl.sArtikl_Naziv, oData.Artikl.sArtikl_JedMj, oData.Artikl.dArtikl_Cijena, oData.Artikl.sArtikl_URL)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg></td>
                </tr>
            </tbody>
        </table>
    </div>

    <footercopy class="footer text-center mt-auto"></footercopy>
    <script src="js/app.js"></script>
</body>
<div class="modal fade" tabindex="-1" id="artiklmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Prikaz artikla</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zatvori"></button>
                </div>
                <div class="modal-body">
                <h3>Šifra artikla: <h5>{{sifraartikla}}</h5><h3>
                <h3>Naziv artikla: <h5>{{nazivartikla}}</h5></h3>
                <h3>Jedinična mjera: <h5>{{jedmjartikla}}</h5></h3>
                <h3>Cijena: <h5>{{cijenaartikla}} kn</h5></h3>
                <h3><img ng-src="{{urlartikla}}"></img></h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                </div>
        </div>
    </div>
</div>
</html>
