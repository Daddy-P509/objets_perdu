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
			<h4 class="title"><i class="fas fa-check me-lg-2"></i><?php echo $lang['active_compts'] ?></h4>
			<hr>

			<div class="group">
				<div class="left shadow-2">
					<div class='card'>
						<div class='card-body'>
							<h5 class="card-title"><?php echo $lang['list_compts_act'] ?></h5>
							<hr>
							<div class="table-responsive">
								<table class="table-sm align-middle mb-0 bg-white">
									<thead class="bg-light">
										<tr>
											<th><?php echo $lang['_nom'] ?> & <?php echo $lang['_email'] ?></th>
											<th><?php echo $lang['_pays'] ?></th>
											<th><?php echo $lang['_status'] ?></th>
											<th><?php echo $lang['_telefone'] ?></th>
											<th><?php echo $lang['_date'] ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
										<td>
											<div class="d-flex align-items-center">
											<img
												src="https://mdbootstrap.com/img/new/avatars/8.jpg"
												alt=""
												style="width: 45px; height: 45px"
												class="rounded-circle"
												/>
											<div class="ms-3">
												<p class="fw-bold mb-1">John Doe</p>
												<p class="text-muted mb-0">john.doe@gmail.com</p>
											</div>
											</div>
										</td>
										<td>
											<p class="fw-normal mb-1">Software engineer</p>
											<p class="text-muted mb-0">IT department</p>
										</td>
										<td>
											<span class="badge badge-success rounded-pill d-inline">Active</span>
										</td>
										<td>Senior</td>
										<td>
											<button type="button" class="btn btn-link btn-sm btn-rounded">
											Edit
											</button>
										</td>
										</tr>
										<tr>
										<td>
											<div class="d-flex align-items-center">
											<img
												src="https://mdbootstrap.com/img/new/avatars/6.jpg"
												class="rounded-circle"
												alt=""
												style="width: 45px; height: 45px"
												/>
											<div class="ms-3">
												<p class="fw-bold mb-1">Alex Ray</p>
												<p class="text-muted mb-0">alex.ray@gmail.com</p>
											</div>
											</div>
										</td>
										<td>
											<p class="fw-normal mb-1">Consultant</p>
											<p class="text-muted mb-0">Finance</p>
										</td>
										<td>
											<span class="badge badge-primary rounded-pill d-inline"
												>Onboarding</span
											>
										</td>
										<td>Junior</td>
										<td>
											<button
													type="button"
													class="btn btn-link btn-rounded btn-sm fw-bold"
													data-mdb-ripple-color="dark"
													>
											Edit
											</button>
										</td>
										</tr>
										<tr>
										<td>
											<div class="d-flex align-items-center">
											<img
												src="https://mdbootstrap.com/img/new/avatars/7.jpg"
												class="rounded-circle"
												alt=""
												style="width: 45px; height: 45px"
												/>
											<div class="ms-3">
												<p class="fw-bold mb-1">Kate Hunington</p>
												<p class="text-muted mb-0">kate.hunington@gmail.com</p>
											</div>
											</div>
										</td>
										<td>
											<p class="fw-normal mb-1">Designer</p>
											<p class="text-muted mb-0">UI/UX</p>
										</td>
										<td>
											<span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
										</td>
										<td>Senior</td>
										<td>
											<button
													type="button"
													class="btn btn-link btn-rounded btn-sm fw-bold"
													data-mdb-ripple-color="dark"
													>
											Edit
											</button>
										</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="right shadow">
					<div>
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

	<!-- <script src="../lib/jquery/jquery.js"></script>
	<link href="../dist/zabuto_calendar.min.css" rel="stylesheet">
	<script src="../dist/zabuto_calendar.min.js"></script> -->

	<script src="../plateforme/js/jquery.js"></script>
    <script src="../plateforme/js/profil.js"></script>
</body>
</html>