<?php

$servname = "localhost"; $dbname = "Projet"; $port = 3306; $user = "root"; $pass = "";
try{
    $conn = new PDO("mysql:host=$servname;dbname=$dbname;port=$port", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8mb4");
    }
    catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    }
    ?>