<?php
    session_start();
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : die('Usuário não autenticado!'); 
    $info = $_SESSION['info_login'];
    
    if( $user && $user->status = 0 ){
        $response.AddHeader("Set-Cookie", "HttpOnly;Secure;SameSite=Strict");
        header("Location:/caravana/loging.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Jempson Louis Jean" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">

    <title>Utilisateur</title>
</head>
<body>
    <div class="container">
        <h1>Utilisateur</h1>
        <button type="submit"> <a href="./plateforme/in/logout.php">Deconecter</a></button>
        <hr>

    </div>

</body>
</html>