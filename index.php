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
<h2>Veuillez vous connecter</h2>
<form method="post" action="connexion.php">
  <label>Utilisateur</label>
  <input type="text" name="username" required/><br>
  <label>Mot de passe</label>
  <input type="password" name="motDePasse" required/><br>
  <input type="submit" name="connect" value="Se connecter"/>
<?php
include "connexion-pdo.php";
if(isset($_POST["connect"])){
  $username = $_POST["username"];
  $motDePasse = $_POST["motDePasse"];
  $verifUser = $conn->prepare(
    "SELECT COUNT(*) AS 'Nombre' FROM utilisateur WHERE username = :username AND motDePasse = :motDePasse"
  );

  $verifUser->bindParam(':username',$username);
  $verifUser->bindParam(':motDePasse',$motDePasse);

  $verifUser->execute();
  $result = $verifUser->fetch(PDO::FETCH_ASSOC);
  if($result["Nombre"] == 0) {
    echo "<p><b>Crédentiels invalides,<br> vérifiez vos informations de<br> connexion ou créez un compte</b><p>";
  } else{
    echo "<p><b>Crédentiels valides,<br> vous pouvez accéder a <a href='accueil.php'>l'accueil</a></b><p>";
  }
}
?>
<input type="button" onClick="location.href='creer.php' " value="Créer un compte"/>
</form>
<?php
include "footer.php";
?>
</div>
</body>
</html>