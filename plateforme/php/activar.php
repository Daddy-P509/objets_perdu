<?php
header("Content-type: application/json; charset=utf-8");
require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$sql = "SELECT id, nome FROM user";
$stmt = $db->query($sql);
$rest = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($rest);