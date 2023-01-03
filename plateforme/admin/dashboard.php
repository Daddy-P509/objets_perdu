<?php
    include('../../languages/lang_config.php');
    session_start();
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : die('Usuário não autenticado!'); 
    $info = $_SESSION['info_login'];
    if( $user && $user->statu_ != 1 ){
        $response.AddHeader("Set-Cookie", "HttpOnly;Secure;SameSite=Strict");
        header("Location:/plateforme/login.php");
    }
    // include('../../languages/lang_config.php');

    // var_dump($lang['logo']);die;
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
<header class="header">
		<div class="wrapper">
			<div class="logo">
				<h1><?php echo $lang['logo'] ?></h1>
			</div>

			<div class="menu">
				<ul>
					<li>
						<a href="<?php echo SITEURL; ?>../../plateforme/admin/dashboard.php"><?php echo $lang['accueil'] ?></a>
					</li>
					<li>
						<a href="../../plateforme/admin/dashboard.php?page=apropos"><?php echo $lang['apropos'] ?></a>
					</li>

					<?php 
						// include('menu.php');
					?>
					
					<li class="right">
						<a href="../../plateforme/admin/dashboard.php?lang=fr"><?php echo $lang['francais'] ?></a>
					</li>
					<li class="right">
						<a href="../../plateforme/admin/dashboard.php?lang=cr"><?php echo $lang['creole'] ?></a>
					</li>
					<li class="right">
						<a href="../../plateforme/admin/dashboard.php?lang=pt"><?php echo $lang['portugues'] ?></a>
					</li>
				</ul>

			</div>

			<div class="clearfix"></div>
		</div>
	</header>

    <div class='container'>
        <h1>Dashboard</h1>
        <button type="submit"> <a href="../../plateforme/in/logout.php">Deconecter</a></button>
        <hr>

    </div>

</body>
</html>