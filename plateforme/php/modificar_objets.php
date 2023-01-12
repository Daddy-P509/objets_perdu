<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$db->exec("set names utf8");

$nom = $_REQUEST['nom'];
$telefone = $_REQUEST['telefone'];
$pays = $_REQUEST['pays'];
$categorie = $_REQUEST['categorie'];
$description = $_REQUEST['description'];
$observation = $_REQUEST['observation'];
$recupere = $_REQUEST['recupere'];

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : die('Precisa de um id');


$sql ="UPDATE objets SET nome = ? , categorie = ?, telefone = ?, pays = ?, description = ?, observation = ?, recupere =? WHERE id = ?";

$arrayParametros = [
    $nom,
    $categorie,
    $telefone,
    $pays,
    $description,
    $observation,
    $recupere,
    $id
];

// var_dump($arrayParametros);die;

$stmt = $db->prepare($sql);
$stmt->execute($arrayParametros);
$repons = array('success'=>true);
echo json_encode($repons);
