<?php
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();

$idAc = isset($_REQUEST['idAc']) ? $_REQUEST['idAc'] : die('Precisa de um id');
$adm_active = isset($_REQUEST['adm_active']) ? $_REQUEST['adm_active'] : die('Precisa de um id');

$sql ="UPDATE user SET active = ?, user_id = ? WHERE id = ?";

$arrayParametros = [
    1,
    $adm_active,
    $idAc
];

$stmt = $db->prepare($sql);
$stmt->execute($arrayParametros);
$repons = array('success'=>true);
echo json_encode($repons);
