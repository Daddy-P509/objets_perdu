<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$db->exec("set names utf8");

$users = $_REQUEST['users'];
$password = $_REQUEST['modepass'];

if($password){
    $novaSenCript = md5($password);
}else{
    $novaSenCript = md5('Docpd123@');
}

$sql ="UPDATE user SET password = ? WHERE id = ?";

$arrayParametros = [
    $novaSenCript,
    $users
];

$stmt = $db->prepare($sql);
$stmt->execute($arrayParametros);
$repons = array('success'=>true);
echo json_encode($repons);