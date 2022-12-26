<?php

try{
    $pdo = new PDO ("mysql:host=localhost;dbname=objets_db","root","");
}catch(Exception $e){
    die("Erreur de la base de donnée" .$e->getMessage());
}

?>