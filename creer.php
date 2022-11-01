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
<h2>Veuillez créer un compte</h2>
<form method="post" action="creer.php">
    <label>Nom Complet</label>
    <input type="text" name="nomComplet" required/><br>
    <label>Username</label>
    <input type="text" name="username" required/><br>
    <label>Code Postal</label>
    <input type="text" name="codePostal" required/><br>
    <label>Email</label>
    <input type="text" name="email" required/><br>
    <label>Mot de passe</label>
    <input type="password" name="motDePasse" required/><br>
    <input type="submit" name="creer" value="S'enregistrer"/>
</form>
<?php
include "connexion-pdo.php";
if(isset($_POST["creer"])){
    //préparation des données
    $nomComplet = $_POST["nomComplet"];
    $username = $_POST["username"];
    $codePostal = $_POST["codePostal"];
    $email = $_POST["email"];
    $motDePasse = $_POST["motDePasse"];

    //préparation de la requete
    $insertionProjet = $conn->prepare(
        "INSERT INTO utilisateur (nomComplet, username, codePostal, email, motDePasse)
        VALUES (:nomComplet, :username, :codePostal, :email, :motDePasse)"
    );
    //liasion des marqueurs nommés avec les variables qui contiennent les vraies données
    $insertionProjet->bindParam(':nomComplet', $nomComplet);
    $insertionProjet->bindParam(':username', $username);
    $insertionProjet->bindParam(':codePostal', $codePostal);
    $insertionProjet->bindParam(':email', $email);
    $insertionProjet->bindParam(':motDePasse', $motDePasse);
    //execution
    $insertionProjet->execute();
    echo "<p>" . $_POST['nomComplet'] . ", votre compte a été créée, vous pouvez vous <a href='connexion.php'>connecter</a><p>";
}
//??? if(isset($_POST["submit"])){
   // echo "<p>" . $_POST['nomComplet'] . ", votre compte a été créée, vous pouvez vous conecter " . "</p>";
 //}
include "footer.php";
?>
</div>
</body>
</html>