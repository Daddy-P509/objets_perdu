<?php

include('../languages/lang_config.php');
$user = isset($_SESSION['user']) ? $_SESSION['user'] : die('Usuário não autenticado!'); 
// var_dump($$_SESSION);die;

$info = $_SESSION['info_login'];

if( $user && $user->statu_ != 1 ){
	header("Location:./systheme/in/logout.php");
}


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

	<script src="../MDB5/js/mdb.min.js"></script>

    <title><?php echo $lang['logo'] ?></title>
</head>
<body>
	<!-- Navbar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container justify-content-between">
			<div class="d-flex">
				<!-- Logo -->
				<a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
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
						<i class="fas fa-bell fa-lg"></i>
						<span class="badge rounded-pill badge-notification bg-danger">12</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
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
			</ul>

			<!-- LANGUAGES -->
			<ul class="navbar-nav flex-row">
				<li class="nav-item me-3 me-lg-1">
					<a class="nav-link" href="../plateforme/admin/dashboard.php?lang=fr">
						<span><i class="flag flag-france"></i><?php echo $lang['francais'] ?></span>
					</a>
				</li>
				<li class="nav-item me-3 me-lg-1">
					<a class="nav-link" href="../plateforme/admin/dashboard.php?lang=cr">
						<span><i class="flag flag-haiti"></i><?php echo $lang['creole'] ?></span>
					</a>
				</li>
				<li class="nav-item me-3 me-lg-1">
					<a class="nav-link" href="../plateforme/admin/dashboard.php?lang=pt">
						<span><i class="flag flag-brazil"></i><?php echo $lang['portugues'] ?></span>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> 
					<i class="fas fa-cog"></i>
						<?php echo $lang['parametre'] ?> 
					</a>
					<!-- Dropdown menu -->
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li>
							<a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> <?php echo $lang['profile'] ?></a>
						</li>

						<li>
							<a class="dropdown-item" href="../plateforme/in/logout.php"><i class="fas fa-power-off"></i> <?php echo $lang['logout'] ?></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>

	<br>
	<div class="container">
		<h3><?php echo $lang['contact'] ?></h3>
		<hr>
	</div>
</body>
</html>