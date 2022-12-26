<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../../plateform/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();

$db->exec("set names utf8");
$stmt = $db->prepare("SELECT u.id, u.login, u.nome, sobrenome, u.senha, u.statu_, u.active, u.loginCadastra, u.empresa, u.email, 
u.telefono, e.desc, f.id AS id_Img, f.name, f.type, f.size FROM user AS u LEFT JOIN fotos_login AS f ON f.id_user = u.id
INNER JOIN executivo AS e ON e.id = u.executivo_id ORDER BY u.id");
$stmt->execute();
$arquivos = $stmt->fetchAll(PDO::FETCH_OBJ);
$usuario = [];
$array = [];
foreach ($arquivos as $arquivo) {

    $array[] = (object)[
        "id" => $arquivo->id,
        "login" => $arquivo->login,
        "nome" => $arquivo->nome,
        "sobrenome" => $arquivo->sobrenome,
        "senha" => $arquivo->senha,
        "statu_" => $arquivo->statu_,
        "active" => $arquivo->active,
        "loginCadastra" => $arquivo->loginCadastra,
        "empresa" => $arquivo->empresa,
        "email" => $arquivo->email,
        "telefono" => $arquivo->telefono,
        "executivo_id" => $arquivo->desc,
        "id_Img" => $arquivo->id_Img,
        "name" => $arquivo->name,
        "type" => $arquivo->type,
        "size" => $arquivo->size,
        "url"=> "http://localhost/omega/plateform/php/abrir_arquivos.php?id=".$arquivo->id_Img
    ];
}

$message = 'Nâo tem imagen gadastra';

if(!$arquivos){
    echo json_encode( (object) [ "error" => 200 , "message" => "Nâo tem imagem cadastra..." ] );
}else{


    echo json_encode($array);
}