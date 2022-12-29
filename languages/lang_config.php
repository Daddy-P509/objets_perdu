<?php 
	session_start();

	//Check whether the language is set in session or not
	//Vérifiez si la langue est définie dans la session ou non
	if(!isset($_SESSION['lang'])){
		//If Language is not set in session thfr set default language as frglish
		//Si la langue n'est pas définie dans la session, définissez la langue par défaut sur le français

		$_SESSION['lang'] = 'fr';
	}else if(isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){

		if($_GET['lang'] == 'fr'){
			$_SESSION['lang'] = 'fr';
		}else if($_GET['lang'] == 'cr') {
			$_SESSION['lang'] = 'cr';		
		}else if($_GET['lang'] == 'pt') {
			$_SESSION['lang'] = 'pt';
		}
	}

	require_once $_SESSION['lang']. '.php';
?>