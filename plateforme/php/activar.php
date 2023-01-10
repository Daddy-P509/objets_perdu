<?php
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$sql = "SELECT id, nome, email, pays, active, telefone, date_ FROM user  WHERE active = 0";
$stmt = $db->query($sql);
$rest = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($rest);