<?php
// header("Content-type: application/json; charset=utf-8");
require_once './../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$sql = "SELECT COUNT(id) AS cantite FROM user WHERE active = 0";
$stmt = $db->prepare($sql);
$stmt->execute();
$rest = $stmt->fetch(PDO::FETCH_OBJ);
echo json_encode($rest);