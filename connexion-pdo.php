<?php

$servname = "localhost"; $dbname = "hzol3721_osullivan"; $user = "hzol3721_osullivan"; $pass = "Np030218!";
try{
    $conn = new PDO("mysql:host=$servname;dbname=$dbname;port=$port", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    }
    ?>
