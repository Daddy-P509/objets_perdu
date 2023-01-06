<?php
require_once '../../plateforme/conect/ConexaoMySQL.php';
header('Access-Control-Allow-Origin: *');
$file = $_FILES["file"];
$objet_id = $_REQUEST["idOb"];
$db = ConexaoMySQL::getInstance();

if($file){
    $name = $file['name'];
    $tipo = $file['type'];
    $tamanho = $file['size'];
    $arquivo = $file['tmp_name'];
    $fp = fopen($arquivo, "rb");
    $arquivo = fread($fp, $tamanho);
    insertFile($db, $name, $tipo, $arquivo, $tamanho, $objet_id);
}

function insertFile($db, $name, $tipo, $arquivo, $tamanho, $objet_id){
    $sql = " INSERT INTO images (name, type, content, size, objets_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name, $tipo, $arquivo, $tamanho, $objet_id]);
    $repons = array('success'=>true);
    echo json_encode($repons);
}