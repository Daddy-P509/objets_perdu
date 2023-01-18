<?php
require_once '../../plateforme/conect/ConexaoMySQL.php';
$id = $_REQUEST['id_like'];
$idUser = $_REQUEST['idUser'];

$db = ConexaoMySQL::getInstance();
try {
    $sql = "SELECT * FROM like_objets WHERE post_id = ?  AND user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id, $idUser]);
    $rest = $stmt->fetchAll(PDO::FETCH_OBJ);

    if(!$rest){
        $sql ="INSERT INTO like_objets VALUES (NULL, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id, $idUser]);
        $repons = array('success'=>true);
        echo json_encode($repons);
    }else{
        echo 'Ja tem';
    }


} catch (Exception $e) {
    echo json_encode((object)[ "message" => $e->getMessage() ]);
}