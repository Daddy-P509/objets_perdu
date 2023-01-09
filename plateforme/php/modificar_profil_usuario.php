<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$db->exec("set names utf8");

$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$pays = $_REQUEST['pays'];
$telefone = $_REQUEST['telefone'];
$adresse = $_REQUEST['adresse'];
$numero = $_REQUEST['numero'];
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : die('Precisa de um id');

// var_dump($id);die;

$sql ="UPDATE user SET nome = ? , email = ?, telefone = ?, pays = ?, adresse = ?, numero = ? WHERE id = ?";

$arrayParametros = [
    $nome,
    $email,
    $telefone,
    $pays,
    $adresse,
    $numero,
    $id
];

$stmt = $db->prepare($sql);
$stmt->execute($arrayParametros);
$repons = array('success'=>true);
echo json_encode($repons);
