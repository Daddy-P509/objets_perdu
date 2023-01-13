<?php
include('../languages/lang_config.php');
$user = isset($_SESSION['user']) ? $_SESSION['user'] : die('Usuário não autenticado!'); 
$info = $_SESSION['info_login'];

if( $user && $user->statu_ != 1 ){
	header("Location:./systheme/in/logout.php");
}

require_once './../plateforme/conect/ConexaoMySQL.php';
$db = ConexaoMySQL::getInstance();
$sql = "SELECT COUNT(id) AS cantite FROM user WHERE active = 0";
$stmt = $db->prepare($sql);
$stmt->execute();
$rest = $stmt->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Jempson Louis Jean" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="../MDB5/css/mdb.min.css">
	<link rel="stylesheet" href="../css/index.css">

	<script src="../MDB5/js/mdb.min.js"></script>

    <title><?php echo $lang['logo'] ?></title>
</head>
<body>
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container justify-content-between">
				<div class="d-flex">
					<!-- Logo -->
					<a class="navbar-brand me-2 mb-1 d-flex align-items-center logo" href="../plateforme/admin/dashboard.php?accueil">
						<?php echo $lang['logo'] ?>
					</a>
				</div>
	
				<!-- Menu -->
				<ul class="navbar-nav flex-row d-none d-md-flex">
					<li class="nav-item me-3 me-lg-1 active">
						<a class="nav-link" href="../plateforme/admin/dashboard.php?accueil">
							<span><i class="fas fa-home"></i></span>
							<?php echo $lang['accueil'] ?>
						</a>
					</li>
					<li class="nav-item me-3 me-lg-1">
						<a class="nav-link" href="../pages/apropos.php?apropos">
							<span><i class="far fa-user"></i></span>
							<?php echo $lang['apropos'] ?>
						</a>
					</li>
					<li class="nav-item me-3 me-lg-1">
						<a class="nav-link" href="../pages/contact.php?contact">
							<span><i class="fas fa-envelope-open-text"></i></span>
							<?php echo $lang['contact'] ?>
						</a>
					</li>
				</ul>
	
				<!-- Right elements -->
				<ul class="navbar-nav flex-row">
					<!-- <li class="nav-item me-3 me-lg-1">
						<a class="nav-link d-sm-flex align-items-sm-center" href="#">
							<img src="./img/oeuil.png" height="20" alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
							<strong class="d-none d-sm-block ms-1">JEMPSON LOUIS JEAN</strong>
						</a>
					</li> -->
					<li class="nav-item dropdown me-3 me-lg-1">
						<a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
							<i class="fas fa-comments fa-lg"></i>
							<span class="badge rounded-pill badge-notification bg-danger">6</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" >
							<li>
								<a class="dropdown-item" href="#">Some news</a>
							</li>
							<li>
								<a class="dropdown-item" href="#">Another news</a>
							</li>
							<li>
								<a class="dropdown-item" href="#">Something else here</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown me-3 me-lg-3">
						<a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false" >
							<i class="fas fa-bell fa-lg" title="<?php echo $lang['soliciter_Ac'] ?>"></i>
							<span class="badge rounded-pill badge-notification bg-danger"><?php echo $rest->cantite ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
							<li>
								<a class="dropdown-item" href="../pages/active_compts.php"><?php echo $lang['soliciter_Ac'] ?></a>
							</li>
							
						</ul>
					</li>
				</ul>
				<ul class="navbar-nav flex-row lang">
					<!-- LANGUAGES -->
					<li class="nav-item me-3 me-lg-0">
						<a class="nav-link" href="../plateforme/admin/dashboard.php?lang=fr">
							<i class="flag flag-france" title="<?php echo $lang['francais'] ?>"></i>
						</a>
					</li>
					<li class="nav-item me-3 me-lg-0">
						<a class="nav-link" href="../plateforme/admin/dashboard.php?lang=cr">
							<i class="flag flag-haiti" title="<?php echo $lang['creole'] ?>"></i>
						</a>
					</li>
					<li class="nav-item me-3 me-lg-0">
						<a class="nav-link" href="../plateforme/admin/dashboard.php?lang=pt">
							<i class="flag flag-brazil" title="<?php echo $lang['portugues'] ?>"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> 
						<i class="fas fa-cog"></i>
							<?php echo $lang['parametre'] ?> 
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<li>
								<a class="dropdown-item" href="../pages/profile.php"><i class="fas fa-user-edit"></i> <?php echo $lang['profile'] ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="../pages/modepasse.php"><i class="fas fa-lock-open"></i> <?php echo $lang['btn_modifye_password'] ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="../plateforme/in/logout.php"><i class="fas fa-power-off"></i> <?php echo $lang['logout'] ?></a>
							</li>
						</ul>
					</li>
	
				</ul>
			</div>
		</nav>
	
		<nav class="navbar navbar-light" style="background-color: #e5e5e5d6;">
			<div class="container justify-content-between" style="background-color: #dfdfdf75;">
				<div class="d-flex">
					<h5><?php echo $lang['apropos'] ?></h5>
				</div>
				<ul class="navbar-nav flex-row">
					<li class="nav-item me-3 me-lg-1">
						<a class="nav-link d-sm-flex align-items-sm-center" href="#">
							<i class="fas fa-user me-lg-3"> | <?php echo $lang['presente'] ?>,
							<strong class="d-sm-block"><?php echo $user->nome ?></strong></i>
							<input type="hidden" id="idUs" value="<?php echo $user->id ?>"/>
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<br>
	<div class="container">
		<div class='content '>
			<h4 class="title"><i class="fas fa-cogs me-lg-2"></i><?php echo $lang['btn_modifye_password'] ?></h4>
			<div class="group">
				<div class="left shadow-2">

				</div>
				<div class="right">
					<div class="cors_rht">
						<?php
							date_default_timezone_set('America/Sao_Paulo');
							$date = date('d/m/Y');
						?>
						<label>
							<i class="fas fa-calendar-alt me-lg-1"></i>
							<span class="me-lg-3"><?= strtoupper($date) ?></span>
						</label>
						<i class="fas fa-exchange-alt me-lg-3"></i>
						<label>
							<i class="far fa-clock me-lg-1"></i><span class="heur"></span>
						</label>
					</div>
					<hr>
					
					<br>
					<hr>
				</div>
			</div>

		</div>
	</div>

</body>
</html>