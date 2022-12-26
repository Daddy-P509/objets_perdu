<?php
require_once '../plateform/conect/ConexaoMySQL.php';
header('Access-Control-Allow-Origin: *');
$file = $_FILES["file"];
$id = $_REQUEST["id"];
$db = ConexaoMySQL::getInstance();

if($file){
    $name = $file['name'];
    $tipo = $file['type'];
    $tamanho = $file['size'];
    $arquivo = $file['tmp_name'];
    $fp = fopen($arquivo, "rb");
    $arquivo = fread($fp, $tamanho);
    insertFile($db, $name, $tipo, $arquivo, $tamanho, $id);
}

function insertFile($db, $name, $tipo, $arquivo, $tamanho, $id){
    $sql = " INSERT INTO fotos_login (name, type, content, size, id_user) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name, $tipo, $arquivo, $tamanho, $id]);
    $repons = array('success'=>true);
    echo json_encode($repons);
}