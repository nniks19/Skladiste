<!DOCTYPE html>
<html lang="hr" ng-app="skladiste-app">
<head>
    <title>VUV gradnja d.o.o - Prijava</title>
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
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="text-center">
<login><login>
<script src="js/app.js"></script>
</body>
</html>
<?php
session_start();
if (isset($_SESSION['id'])) {
	header('Location: administration/dashboard.php');
	exit;
} else {
    if (isset($_SESSION['error'])){
        echo '<script>alert("'.$_SESSION['error'].'")</script>';
        session_destroy();
    }
}
?>