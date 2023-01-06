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
$user = $_REQUEST['user'];
$recupere = $_REQUEST['recupere'];

date_default_timezone_set('America/Sao_Paulo');
$timestamp = date("Y-m-d H:i:s");

$sql = "INSERT INTO objets VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$arrayParametros = [
    $nom,
    $telefone,
    $pays,
    $categorie,
    $description,
    $observation,
    $user,
    $recupere,
    $timestamp
];

// var_dump($arrayParametros);die;

$stmt = $db->prepare($sql);
$stmt->execute($arrayParametros);
$id = $db->lastInsertId();
echo json_encode( ["success" => true, "lastId" => $id] );
