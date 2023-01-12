<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();

$db->exec("set names utf8");
$stmt = $db->prepare("SELECT ob.id, ob.nome, ob.telefone, ob.pays, ob.categorie, ob.description, ob.observation, ob.recupere, ob.date_, ob.delete_, im.name, im.type, us.nome 
AS user, im.objets_id FROM  objets AS ob
INNER JOIN images AS im ON im.objets_id = ob.id
INNER JOIN user AS us ON ob.user_id = us.id WHERE ob.recupere = 0 AND ob.delete_ = 0 ORDER BY ob.id DESC");

$stmt->execute();
$arquivos = $stmt->fetchAll(PDO::FETCH_OBJ);

$usuario = [];
$array = [];
foreach ($arquivos as $arquivo) {

    $array[] = (object)[
        "id" => $arquivo->id,
        "nome" => $arquivo->nome,
        "telefone" => $arquivo->telefone,
        "pays" => $arquivo->pays,
        "categorie" => $arquivo->categorie,
        "description" => $arquivo->description,
        "observation" => $arquivo->observation,
        "recupere" => $arquivo->recupere,
        "date_" => $arquivo->date_,
        "user" => $arquivo->user,
        "type" => $arquivo->type,
        "objets_id" => $arquivo->objets_id,
        "url"=> "http://localhost/objets_perdu/plateforme/php/abrir_arquivos.php?id=".$arquivo->objets_id
    ];
}

$message = 'Nâo tem imagen gadastra';

if(!$arquivos){
    echo json_encode( (object) [ "error" => 200 , "message" => "Nâo tem imagem cadastra..." ] );
}else{
    echo json_encode($array);
}