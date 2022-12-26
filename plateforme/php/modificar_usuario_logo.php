<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
require_once '../../plateform/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$login = $_REQUEST['login'];
$nome = $_REQUEST['nome'];
$sobrenome = $_REQUEST['sobrenome'];
$cpf = $_REQUEST['cpf'];
$email = $_REQUEST['email'];
$empresa = $_REQUEST['empresa'];
$executivo = $_REQUEST['executivo'];
$telefone = $_REQUEST['telefone'];
$statu = $_REQUEST['statu'];
$active = $_REQUEST['active'];
$cep = $_REQUEST['cep'];
$endereco = $_REQUEST['endereco'];
$num = $_REQUEST['num'];
$bairro = $_REQUEST['bairro'];
$cidade = $_REQUEST['cidade'];
$estado = $_REQUEST['estado'];
$loginCadastra = $_REQUEST['loginCadastra'];
$id = isset($_GET['id']) ? $_GET['id'] : die('Precisa de um id');

$db->exec("set names utf8");
$stmt = $db->prepare("SELECT id, name, type, size, content FROM fotos_login WHERE id_user = ?");
$stmt->execute([$id]);
$arquivo = $stmt->fetchAll(PDO::FETCH_OBJ);

$message = 'Nâo tem imagen gadastra';

if(!$arquivo){
    echo json_encode( (object) [ "error" => 200 , "message" => "Nâo tem imagem cadastra..." ] );

}

$sql ="UPDATE user SET login = ?, nome = ?, sobrenome = ?, cpf = ?, email = ?, empresa = ?, executivo_id = ?, telefono = ?, 
statu_ = ?, active = ?, cep = ?, endereco = ?, num = ?, bairro = ?, cidade = ?, estado = ? WHERE id = ?";

$arrayParametros = [
    $login,
    $nome,
    $sobrenome,
    $cpf,
    $email,
    $empresa,
    $executivo,
    $telefone,
    $statu,
    $active,
    $cep,
    $endereco,
    $num,
    $bairro,
    $cidade,
    $estado,
    $id
];

$stmt = $db->prepare($sql);
$stmt->execute($arrayParametros);
