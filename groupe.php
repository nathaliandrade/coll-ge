<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Projet Synthèse</title>
<meta charset="utf-8">
</head>
<body class="cadre">
<div class="cadre2">
<?php
include "header.php";
?>
<h2>Ajouter un groupe</h2>
<form method="post" action="groupe.php">
    <label>Code</label>
    <input type="text" name="code" required/><br>
    <label>Nom</label>
    <input type="text" name="nom" required/><br>
    <label for="type">Choisir un type</label>
        <select id="type" name="type">
             <option value="En ligne">En ligne</option>
            <option value="En classe">En classe</option>
            <option value="Hybride">Hybride</option>
        </select>
    <input type="submit" name="groupe" value="Ajouter"/>
</form>
<?php
include "connexion-pdo.php";
if(isset($_POST["groupe"])){
    //préparation des données
    $code = $_POST["code"];
    $nom = $_POST["nom"];
    $type = $_POST["type"];
   
    //préparation de la requete
    $insertionProjet = $conn->prepare(
        "INSERT INTO groupe (code, nom, type)
        VALUES (:code, :nom, :type)"
    );
    //liasion des marqueurs nommés avec les variables qui contiennent les vraies données
    $insertionProjet->bindParam(':code', $code);
    $insertionProjet->bindParam(':nom', $nom);
    $insertionProjet->bindParam(':type', $type);

    //execution
    $insertionProjet->execute();
    echo "<p>Le groupe " . $_POST['nom'] . " a été ajouté avec succès.<p><br>";
}
include "footer.php";
?>
<p class="revenir">Revenir vers  <a href='accueil.php'>l'accueil.</a><p>
</div>
</body>
</html>