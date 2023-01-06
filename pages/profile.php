<?php
	include('../languages/lang_config.php');
	$user = isset($_SESSION['user']) ? $_SESSION['user'] : die('Usuário não autenticado!'); 
	
	$info = $_SESSION['info_login'];
	
	if( $user && $user->statu_ != 1 ){
		header("Location:./systheme/in/logout.php");
	}

	// require_once '../pages/conect/ConexaoMySQL.php';
	// $db = ConexaoMySQL::getInstance();
	// $sql = "SELECT COUNT(id) AS cantite FROM user WHERE active = 0";
    // $stmt = $db->prepare($sql);
    // $stmt->execute();
    // $rest = $stmt->fetch(PDO::FETCH_OBJ);

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
    <link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="../MDB5/css/mdb.min.css">

	<script src="../MDB5/js/mdb.min.js"></script>
    <!-- <script src="../../plateforme/js/boostrap.js"></script> -->
    
    <title><?php echo $lang['logo'] ?></title>
</head>
<body style="background-color: #ededed;">
	<!-- Navbar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container justify-content-between">
			<div class="d-flex">
				<!-- Logo -->
				<a class="navbar-brand me-2 mb-1 d-flex align-items-center logo" href="#">
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
						<span class="badge rounded-pill badge-notification bg-danger"></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
						<li>
							<a class="dropdown-item" href="#"><?php echo $lang['soliciter_Ac'] ?></a>
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
				<h5><?php echo $lang['profile'] ?></h5>
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

	<br>
	<div class="container justify-content-between">
		<div class=''>
			<h4 class="title"><i class="fas fa-cogs me-lg-2"></i><?php echo $lang['modifier_profile'] ?></h4>
			<hr>

			<div class="group">
				<div class="left shadow-2">
					<div class='card'>
						<div class='card-body'>
							<h5 class="card-title"><?php echo $lang['msg_donne_P'] ?></h5>
							<hr>
							<form>
								<div class="row mb-4">
									<div class="col-md-12">
										<div class="form-outline">
											<label class="form-label" for="nom"><?php echo $lang['form_nom'] ?></label>
											<input type="text" id="nom" class="form-control form-control-sm" value="<?php echo $user->nome ?>"/>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-outline">
											<label class="form-label" for="select_pais"><?php echo $lang['msg_select'] ?></label>
											<select id="select_pais" class="form-control form-control-sm">
												<option  value="<?php echo $user->nome ?>"><?php echo $lang['msg_select'] ?></option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-outline">
											<label class="form-label" for="telefone"><?php echo $lang['telefone_log'] ?></label>
											<input type="trxt" id="telefone" class="form-control form-control-sm" value="<?php echo $user->telefone ?>"/>
										</div>
									</div>
									<div class="col-md-8">
										<label class="form-label" for="adresse"><?php echo $lang['adresse'] ?></label>
										<div class="form-outline">
											<input type="text" id="adresse" class="form-control form-control-sm" value="<?php echo $user->adresse ?>"/>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-outline">
											<label class="form-label" for="numero"><?php echo $lang['numero'] ?></label>
											<input type="text" id="numero" class="form-control form-control-sm" value="<?php echo $user->numero ?>"/>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-outline">
											<label class="form-label" for="email"><?php echo $lang['email'] ?></label>
											<input type="text" id="email" class="form-control form-control-sm" value="<?php echo $user->email ?>"/>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-outline">
											<label class="form-label" for="mot_de_passe">-----------------------------</label>
											<input type="hidden" id="" class="form-control form-control-sm"/>
										</div>
									</div>
								</div>
		
								
								<button type="button" id="publier" class="btn btn-primary btn-sm"><?php echo $lang['btn_form'] ?></button>
								<button type="button" id="limpar" class="btn btn-danger btn-sm">Limpa Campos</button>
							</form>
							
						</div>
					</div>
				</div>
				<div class="right shadow">
					<span><i class="far fa-clock me-lg-2"></i><label class="heur"></label></span>
					<hr>
					<div id="demo-calendar-apppearance"></div>
					
					<br>
					<hr>
				</div>
			</div>
				
				
			
		</div>
	</div>

	<script src="../lib/jquery/jquery.js"></script>
	<link href="../dist/zabuto_calendar.min.css" rel="stylesheet">
	<script src="../dist/zabuto_calendar.min.js"></script>

	<script src="../plateforme/js/jquery.js"></script>
    <script src="../plateforme/js/profil.js"></script>
</body>
</html>