<!DOCTYPE html>
<html>
<head>
<title>Projet Synthèse</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body class="cadre">
<div class="cadre2">
<?php
include "header.php";
?>
<div class="accueil">
<h2>Veuillez faire un choix</h2>
    <a href="groupe.php">Ajouter un groupe</a><br>
    <a href="etudiant.php">Ajouter un étudiant</a><br>
    <a href="afficher.php">Afficher données<a><br>
</div>
<?php
include "connexion-pdo.php";
include "footer.php";
?>
</div>
</body>
</html>