<?php
require_once '../../plateforme/conect/ConexaoMySQL.php';
include('../../languages/lang_config.php');

header('Access-Control-Allow-Origin: *');
$file = $_FILES["file"];
$objet_id = $_REQUEST["idOb"];
$db = ConexaoMySQL::getInstance();

$stmtR = $db->prepare("SELECT id, name, type, content, size, objets_id FROM images WHERE objets_id =?");
$stmtR->execute([$objet_id]);
$rest = $stmtR->fetch(PDO::FETCH_OBJ);


if(!$rest){
    
    if($file){
        
        if($file){
            $name = $file['name'];
            $tipo = $file['type'];
            $tamanho = $file['size'];
            $arquivo = $file['tmp_name'];
            $fp = fopen($arquivo, "rb");
            $arquivo = fread($fp, $tamanho);
        }
        
        $sql = " INSERT INTO images (name, type, content, size, objets_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name, $tipo, $arquivo, $tamanho, $objet_id]);
        $repons = array('success'=>true);
        echo json_encode($repons);

    }
    
}else{
    echo $lang['msg_img'] . $rest->id;

}
