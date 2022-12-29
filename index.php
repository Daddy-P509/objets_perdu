<?php
// #######################################################################################################|
// ############################################## OBJETS PERDU ###########################################|
// #######################################################################################################|
// ############################################### VERSION 1.0 ###########################################|
// #######################################################################################################|
// #######################################################################################################|
// ############################################### JEMPSON LOUIS JEAN ####################################|
// ############################################# 2022-12-26 ##############################################|
// #######################################################################################################|
// #######################################################################################################|

include('./languages/lang_config.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Jempson Louis Jean" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">

    <title>Objets Perdu</title>
</head>
<body>
    <header class="header">
		<div class="wrapper">
			<div class="logo">
				<!-- <h1><?php echo $lang['logo'] ?></h1> -->
			</div>

			<div class="menu">
				<ul>
					<li>
						<!-- <a href="<?php echo SITEURL; ?>"><?php echo $lang['accueil'] ?></a> -->
						<a href=""><?php echo $lang['accueil'] ?></a>
					</li>
					<li>
						<a href="index.php?page=apropos"><?php echo $lang['apropos'] ?></a>
					</li>

					<?php 
						// include('menu.php');
					?>
					
					<li class="right">
						<a href="index.php?lang=fr"><?php echo $lang['francais'] ?></a>
					</li>
					<li class="right">
						<a href="index.php?lang=cr"><?php echo $lang['creole'] ?></a>
					</li>
					<li class="right">
						<a href="index.php?lang=pt"><?php echo $lang['portugues'] ?></a>
					</li>
				</ul>

			</div>

			<div class="clearfix"></div>
		</div>
	</header>
    <div class="container">
        <h1>OBETS PERDUS</h1>
    </div>
</body>
</html>