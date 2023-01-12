<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$db->exec("set names utf8");

$id = isset($_REQUEST['idPub']) ? $_REQUEST['idPub'] : die('Precisa de um id');
$delete = 1;


$sql ="UPDATE objets SET delete_ = ? WHERE id = ?";
$arrayParametros = [
    $delete,
    $id
];

// var_dump($arrayParametros);die;

$stmt = $db->prepare($sql);
$res = $stmt->execute($arrayParametros);
$repons = array('success'=>true);
echo json_encode($repons);
