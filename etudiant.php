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
include "connexion-pdo.php";
$query = $conn->query(
    "SELECT code FROM groupe"
);
$groupeFetch = $query->fetchAll(PDO::FETCH_NUM);
$groupes = array_merge(...$groupeFetch);
?>
<h2>Ajouter un étudiant</h2>
<form method="post" action="etudiant.php">
    <label>Code permanent:</label>
    <input type="text" name="codePermanent" required/><br>
    <label>Nom complet:</label>
    <input type="text" name="nomComplet" required/><br>
    <label>Adresse</label>
    <input type="text" name="adresse" required/><br>
    <label>Téléphone</label>
    <input type="tel" name="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required/><br>
    <label>Moyenne</label>
    <input type="float" name="moyenne" required/><br>    
    <label for="groupe">Choisir un groupe</label>
        <select id="groupe" name="codeGroupe">
        <?php foreach($groupes as $groupe){
                echo '<option value="' . $groupe . '">' . $groupe . '</option>';
            }
        ?>
        </select>
    <input type="submit" name="etudiant" value="Ajouter"/>
</form>
<?php
include "connexion-pdo.php";
if(isset($_POST["etudiant"])){
    //préparation des données
    $codePermanent = $_POST["codePermanent"];
    $nomComplet = $_POST["nomComplet"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $moyenne = $_POST["moyenne"];
    $codeGroupe = $_POST["codeGroupe"];
   
    //préparation de la requete
    $insertionProjet = $conn->prepare(
        "INSERT INTO etudiant (codePermanent, nomComplet, adresse, telephone, moyenne, codeGroupe)
        VALUES (:codePermanent, :nomComplet, :adresse, :telephone, :moyenne, :codeGroupe)"
    );
    //liasion des marqueurs nommés avec les variables qui contiennent les vraies données
    $insertionProjet->bindParam(':codePermanent', $codePermanent);
    $insertionProjet->bindParam(':nomComplet', $nomComplet);
    $insertionProjet->bindParam(':adresse', $adresse);
    $insertionProjet->bindParam(':telephone', $telephone);
    $insertionProjet->bindParam(':moyenne', $moyenne);
    $insertionProjet->bindParam(':codeGroupe', $codeGroupe);

    //execution
    $insertionProjet->execute();
    echo "<p>L'étudiant(e) " . $_POST['nomComplet'] . " a été ajouté(e) avec succès.<p><br>";
}
include "footer.php";
?>
<p class="revenir">Revenir vers  <a href='accueil.php'>l'accueil.</a><p>
</div>
</body>
</html>