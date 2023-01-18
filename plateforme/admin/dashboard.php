<?php
    include('../../languages/lang_config.php');
    // session_start();
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : die('Usuário não autenticado!'); 
    $info = $_SESSION['info_login'];
    if( $user && $user->statu_ != 1 ){
        $response.AddHeader("Set-Cookie", "HttpOnly;Secure;SameSite=Strict");
        header("Location:/plateforme/login.php");
    }

	require_once '../../plateforme/conect/ConexaoMySQL.php';
	$db = ConexaoMySQL::getInstance();
	$languer = $_SESSION['lang'];
	$sql = "SELECT COUNT(id) AS cantite FROM user WHERE active = 0";
	// $sql = "SELECT description FROM categorie WHERE lang = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $rest = $stmt->fetch(PDO::FETCH_OBJ);
	
	// var_dump($rest);die;
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="../../MDB5/css/mdb.min.css">

	<script src="../../MDB5/js/mdb.min.js"></script>
    <!-- <script src="../../plateforme/js/boostrap.js"></script> -->
    
    <title><?php echo $lang['logo'] ?></title>
</head>
<body>
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container justify-content-between">
				<div class="d-flex">
					<!-- Logo -->
					<a class="navbar-brand me-2 mb-1 d-flex align-items-center logo" href="../../plateforme/admin/dashboard.php?accueil">
						<?php echo $lang['logo'] ?>
					</a>
				</div>
	
				<!-- Menu -->
				<ul class="navbar-nav flex-row d-none d-md-flex">
					<li class="nav-item me-3 me-lg-1 active">
						<a class="nav-link" href="../../plateforme/admin/dashboard.php?accueil">
							<span><i class="fas fa-home"></i></span>
							<?php echo $lang['accueil'] ?>
						</a>
					</li>
					<li class="nav-item me-3 me-lg-1">
						<a class="nav-link" href="../../pages/apropos.php?apropos">
							<span><i class="far fa-user"></i></span>
							<?php echo $lang['apropos'] ?>
						</a>
					</li>
					<li class="nav-item me-3 me-lg-1">
						<a class="nav-link" href="../../pages/contact.php?contact">
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
								<a class="dropdown-item" href="../../pages/active_compts.php"><?php echo $lang['soliciter_Ac'] ?></a>
							</li>
							
						</ul>
					</li>
				</ul>
				<ul class="navbar-nav flex-row lang">
					<!-- LANGUAGES -->
					<li class="nav-item me-3 me-lg-0">
						<a class="nav-link" href="../../plateforme/admin/dashboard.php?lang=fr">
							<i class="flag flag-france" title="<?php echo $lang['francais'] ?>"></i>
						</a>
					</li>
					<li class="nav-item me-3 me-lg-0">
						<a class="nav-link" href="../../plateforme/admin/dashboard.php?lang=cr">
							<i class="flag flag-haiti" title="<?php echo $lang['creole'] ?>"></i>
						</a>
					</li>
					<li class="nav-item me-3 me-lg-0">
						<a class="nav-link" href="../../plateforme/admin/dashboard.php?lang=pt">
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
								<a class="dropdown-item" href="../../pages/profile.php"><i class="fas fa-user-edit"></i> <?php echo $lang['profile'] ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="../../pages/modepasse.php"><i class="fas fa-lock-open"></i> <?php echo $lang['btn_modifye_password'] ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="../../plateforme/in/logout.php"><i class="fas fa-power-off"></i> <?php echo $lang['logout'] ?></a>
							</li>
						</ul>
					</li>
	
				</ul>
			</div>
		</nav>
	
		<nav class="navbar navbar-light" style="background-color: #e5e5e5d6;">
			<div class="container justify-content-between" style="background-color: #dfdfdf75;">
				<div class="d-flex">
					<h5><?php echo $lang['accueil'] ?></h5>
				</div>
				<p style="display: none;" class="lg"><?php echo $languer ?></p>
				<div class="d-flex">
					<h5><a id="abril_form" href="#"> <i class="far fa-file-alt"></i> <?php echo $lang['title_post'] ?></a></h5>
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
	
	<div class="container">
		<div class='content '>
			<div class="group">
				<div class="left shadow-2">
					<div class="grp_publication">
						<div class="">
							<h5 class="title"> <i class="fas fa-list"></i> <?php echo $lang['list_doc_ret'] ?></h5>
							<hr>
							<div class="linhas"></div>
						</div>
					</div>
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
			
			<!-- ############################## MODAL DELETE PUBLICATION ######################  -->
			<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="top: 280px;">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"></h5>
						</div>
						<div class="modal-body" style="color: red;">
							<h6></h6>
						</div>
						<div class="modal-footer">
							<button type="button" id="non" value="false" class="btn btn-secondary btn-sm" data-dismiss="modal">Non</button>
							<button type="button" id="oui" value="true" class="btn btn-primary btn-sm">Oui</button>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- ############################## MODAL FORMULAIRE ######################  -->
		<div class="modal fade" id="mod_formulaire" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['form'] ?></h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row mb-4">
							<div class="col-md-12">
								<div class="form-outline">
									<label class="form-label" for="nom"><?php echo $lang['form_nom'] ?></label>
									<input type="text" id="nom" class="form-control form-control-sm" placeholder="<?php echo $lang['form_nom'] ?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-outline">
									<label class="form-label" for="select_pais"><?php echo $lang['msg_select'] ?></label>
									<select id="select_pais" class="form-control form-control-sm">
										<option value=""><?php echo $lang['msg_select'] ?></option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-outline">
									<!-- <input type="text" id="categorie" class="form-control form-control-sm" placeholder="<?php echo $lang['form_categorie'] ?>"/> -->
									<label class="form-label" for="categorie"><?php echo $lang['form_categorie'] ?></label>
									<select id="categorie" class="form-control form-control-sm">
										<option value=""><?php echo $lang['form_categorie'] ?></option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-outline">
									<label class="form-label" for="description"><?php echo $lang['form_description'] ?></label>
									<textarea class="form-control form-control-sm" id="description" rows="2" placeholder="<?php echo $lang['form_description'] ?>"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-outline">
									<label class="form-label" for="telefone"><?php echo $lang['telefone_log'] ?></label>
									<input type="number" id="telefone" class="form-control form-control-sm" placeholder="<?php echo $lang['telefone_log'] ?>"/>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-outline">
									<label class="form-label" for="form_observation"><?php echo $lang['form_observation'] ?></label>
									<textarea class="form-control form-control-sm" id="observation" rows="3" placeholder="<?php echo $lang['form_observation'] ?>"></textarea>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-outline">
									<label class="form-label" for="form_vis_img"><?php echo $lang['form_vis_img'] ?></label>
									<div class="visol">
										<img id="imgVisor" src="#" alt="">
									</div>
								</div>
							</div>

						</div>

						<div class="row mb-4">
							<div class="col-md-6">
								<label class="form-label" for="nom">--------------------</label>
								<div class="form-outline">
									<label class="form-check-label" for="form6Example8"><?php echo $lang['form_recupere'] ?></label>
									<input class="form-check-input me-2" type="checkbox" value="0" id="recupere" />
								</div>
							</div>
							<div class="col-md-6">
								<label class="form-label" for="nom"><?php echo $lang['form_img'] ?></label>
								<div class="form-outline">
									<input type="file" class="form-control form-control-sm" id="fichero" />
								</div>
							</div>

						</div>
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="publier" class="btn btn-primary btn-sm"><?php echo $lang['btn_form'] ?></button>
					<button type="button" id="limpar" class="btn btn-danger btn-sm"><?php echo $lang['btn_vide_camp'] ?></button>
				</div>
			</div>
		</div>
	</div>

	<script src="../../plateforme/js/jquery.js"></script>
    <script src="../../plateforme/js/main.js"></script>
</body>
</html>