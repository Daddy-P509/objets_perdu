<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$db->exec("set names utf8");

$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['telefone'];
$pays = $_REQUEST['pays'];
$adresse = $_REQUEST['adresse'];
$numero = $_REQUEST['numero'];
$modepasse = $_REQUEST['modepasse'];
$criptModepasse = md5($modepasse);
date_default_timezone_set('America/Sao_Paulo');
$timestamp = date("Y-m-d H:i:s");

$sql = "INSERT INTO user VALUES (NULL, ?, ?, 0, 0, ?, ?, ?, ?, ?, NULL, ?)";
$arrayParametros = [
    $nome,
    $telefone,
    $pays,
    $adresse,
    $numero,
    $email,
    $criptModepasse,
    $timestamp
];

$stmt = $db->prepare($sql);
$stmt->execute($arrayParametros);
$repons = array('success'=>true);
echo json_encode($repons);