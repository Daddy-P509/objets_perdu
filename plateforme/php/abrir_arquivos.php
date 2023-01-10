<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$id = isset($_GET['id']) ? $_GET['id'] : die('Precisa de um id');
// var_dump($db);die;

try {
    
    $sql = "SELECT id, name, type, size, content FROM images where objets_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $arquivo = $stmt->fetch(PDO::FETCH_OBJ);

    
    header("Content-Type: ".$arquivo->type); 
    header("Content-Length: ".$arquivo->size); 
    header("Content-Disposition: inline; filename=".$arquivo->name); 
    echo $arquivo->content;
    exit();

} catch (Exception $e) {
    echo $e->getMessage();
}