<?php
header("Content-type: application/json; charset=utf-8");
require_once '../../plateform/conect/ConexaoMySQL.php';
$id = isset($_REQUEST['idUse']) ? $_REQUEST['idUse'] : die('Precisa de um id');
$db = ConexaoMySQL::getInstance();
$sql = "DELETE FROM user WHERE id = ?";

// echo $id; die;
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$repons = array('success'=>true);
echo json_encode($repons);