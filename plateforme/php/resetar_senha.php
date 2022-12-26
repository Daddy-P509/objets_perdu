<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
require_once '../../plateform/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$db->exec("set names utf8");

$login = $_REQUEST['login'];
$senhaPadrao = $_REQUEST['senhaPadrao'];
$novaSenCript = md5($senhaPadrao);

// var_dump($novaSenCript);die;

$sql ="UPDATE user SET senha = ?WHERE login = ?";

$arrayParametros = [
    $novaSenCript,
    $login
];

$stmt = $db->prepare($sql);
$stmt->execute($arrayParametros);
$repons = array('success'=>true);
echo json_encode($repons);