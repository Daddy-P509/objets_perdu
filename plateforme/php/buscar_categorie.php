<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
$lang = $_REQUEST['lang'];

require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();

$db->exec("set names utf8");
$stmt = $db->prepare("SELECT * FROM categorie WHERE lang =?");
$stmt->execute([$lang]);
$rest = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($rest);
