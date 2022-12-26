<?php
    session_start();
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : die('Usuário não autenticado!'); 
    $info = $_SESSION['info_login'];
    if( $user && $user->statu_ != 1 ){
        $response.AddHeader("Set-Cookie", "HttpOnly;Secure;SameSite=Strict");
        header("Location:/plateforme/login.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Jempson Louis Jean" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="../../css/index.css">
    
    <title>Painel de Controle</title>
</head>
<body>
    <div class='container'>
        <h1>Dashboard</h1>
        <button type="submit"> <a href="../../plateforme/in/logout.php">Deconecter</a></button>
        <hr>

        <br>

        <div class="groupe">
            <form action="">
                <input type="text" id="nome" placeholder="Votre Nome">
                <input type="text" id="nome" placeholder="Votre Nome">
            </form>
        </div>

    </div>

</body>
</html>