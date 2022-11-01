<?php
include "connexion-pdo.php";

$query = $conn->query(
    "SELECT code FROM groupe"
);
$groupeFetch = $query->fetchAll(PDO::FETCH_NUM);
$groupes = array_merge(...$groupeFetch);


if(isset($_POST["afficherResultats"])){
    //préparation des données
    $groupeSelectionne = $_POST["codeGroupe"];
    $typeTri = $_POST["typeTri"];

    //préparation de la requete
    $queryResult = $conn->query(
        "SELECT * FROM etudiant WHERE codeGroupe='$groupeSelectionne' ORDER BY moyenne $typeTri"
    );

    $resultats = $queryResult->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Afficher resultats</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body class="cadre">
<div class="cadre2">
<?php
include "header.php";
?>
    <div id="results" class="zone-affichage">
        <?php
            if(!isset($_POST['afficherResultats'])) {
                ?>
                <style type="text/css">#results{
                display:none;
                }</style>
                <?php
            }    
	    ?>
        <h2>Resultats: </h2>
        <table class="tableau">
            <tr  valign="center">
            <th>Code Permanant</th>
            <th>Nom Complet</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Moyenne</th>
            <th>Groupe</th>
            </tr>	
            <?php foreach($resultats as $resultat)
                {
                    echo '<tr><td>' . $resultat['codePermanent']. '</td>';
                    echo '<td>' . $resultat['nomComplet']. '</td>';
                    echo '<td>' . $resultat['adresse']. '</td>';
                    echo '<td>' . $resultat['telephone']. '</td>';
                    echo '<td>' . $resultat['moyenne']. '</td>';
                    echo '<td>' . $resultat['codeGroupe']. '</td></tr>';
                }
            ?>
        </table>	
    </div>

    <form method="post" action="afficher.php">
    <div class="zone-filtre">
        <h2>Veuillez appliquer vos filtres</h2>
            <label for="groupe">Choisir un groupe: </label>
            <select type="select" id="groupe" name="codeGroupe">
                <?php foreach($groupes as $groupe)
                    {
                        echo '<option value="' . $groupe . '">' . $groupe . '</option>';
                    }
                ?>
            </select>
            <label for="tri">Tri sur la moyenne: </label>
            <select id="tri" name="typeTri">
                <option value="ASC">Ascendant</option>
                <option value="DESC">Descendant</option>
            </select>
            <input type="submit" name="afficherResultats" value="Afficher Resultats"/>
    </div>
</form>
<p class="revenir">Revenir vers  <a href='accueil.php'>l'accueil.</a><p>
    <?php
    include "footer.php"
    ?>
</div>
</body>
</html> 