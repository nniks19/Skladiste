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

<body class="p-3 mb-2 bg-secondary" ng-app="skladiste-panel" ng-controller="kategorijeCRUD">
    <headerpanelnav></headerpanelnav>
    <div class="crudbuttons">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <div>
				<button type="button" name="add_button" ng-click="addData()" class="btn-info">Dodaj kategoriju</button>
			</div>
			</div>
        </div>
        
    <div class="crudcontainer" ng-init="dohvatiKategorije()">
			<div class="table-responsive" style="overflow-x: unset;">
				<table datatable="ng" dt-options="vm.dtOptions" class="table table-dark table-striped">
					<thead>
						<tr>
							<th>ID Kategorije</th>
							<th>Naziv Kategorije</th>
							<th>Uredi</th>
							<th>Obriši</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="Kategorija in Kategorije">
							<td>{{Kategorija.nIdKategorije}}</td>
							<td>{{Kategorija.sNazivKategorije}}</td>
							<td><button type="button" ng-click="fetchSingleData(Kategorija.nIdKategorije)" class="btn btn-light">Uredi</button></td>
							<td><button type="button" ng-click="deleteData(Kategorija.nIdKategorije)" class="btn btn-danger">Obriši</button></td>
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
	<div class="modal-dialog">
    	<div class="modal-content">
    		<form method="post" ng-submit="submitForm()">
	      		<div class="modal-header">
                  <h4 class="modal-title">{{modalNaslov}}</h4>
	        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zatvori"></button>
	      		</div>
	      		<div class="modal-body">
					<div class="form-group">
						<label>Naziv kategorije:</label>
						<input type="text" name="Kategorija_Naziv" ng-model="Kategorija_Naziv" class="form-control" />
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