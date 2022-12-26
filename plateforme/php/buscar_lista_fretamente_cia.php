<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../../plateform/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();

$db->exec("set names utf8");
$stmt = $db->prepare("SELECT rf.id, rf.cia, rf.preco, rf.passagem, rf.origim, rf.dataOr, rf.horasOr, rf.condicao, ic.name, ic.content, ic.type, ic.registra_fretamente_id FROM registra_fretamente AS rf
INNER JOIN image_cia AS ic ON rf.id = ic.registra_fretamente_id ORDER BY rf.id");
$stmt->execute();
$arquivos = $stmt->fetchAll(PDO::FETCH_OBJ);
$usuario = [];
$array = [];
foreach ($arquivos as $arquivo) {

    $array[] = (object)[
        "id" => $arquivo->id,
        "cia" => $arquivo->cia,
        "preco" => $arquivo->preco,
        "passagem" => $arquivo->passagem,
        "origim" => $arquivo->origim,
        "dataOr" => $arquivo->dataOr,
        "horasOr" => $arquivo->horasOr,
        "condicao" => $arquivo->condicao,
        "name" => $arquivo->name,
        "type" => $arquivo->type,
        "registra_fretamente_id" => $arquivo->registra_fretamente_id,
        "url"=> "http://localhost/omega/plateform/php/abril_image_cia.php?id=".$arquivo->registra_fretamente_id
    ];
}

$message = 'Nâo tem imagen gadastra';

if(!$arquivos){
    echo json_encode( (object) [ "error" => 200 , "message" => "Nâo tem imagem cadastra..." ] );
}else{
    echo json_encode($array);
}