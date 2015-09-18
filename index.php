<?php

include('includes/db.php');

$error = '';
if ( !empty($_POST) ) {

	$request = $pdo->query('SELECT * FROM users WHERE email = "' . $_POST['email'] . '" AND password = "' . $_POST['password'] . '";');
	$result = $request->fetchAll();
	if ( $result ) {
		$_SESSION['user'] = $result[0];
		header('Location: accueil.php');
		die();
	}
	$error = 'Email ou mot de passe invalide !';
}

?><!DOCTYPE html> 
 <html> 
 <head> 
 	<title>forum</title> 
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
 	<link rel="stylesheet" type="text/css" href="css/index2.css"> 
 	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'> 
 	<link href='https://fonts.googleapis.com/css?family=Hind:400,300,600,500,700' rel='stylesheet' type='text/css'>
 	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
 	<script type="text/javascript" src='js/app.js'></script> 
 </head> 
 <body> 
 	<nav class="connexion">
 		<div class="container-nav">
 		<form action="index.php" method="post">
 			<p class="text">FBjeux</p>
 			<a>Adresse Email<input type="email" id="email" name="email"></a>
 			<a>Mot de passe<input type="password" id="pwd1" name="password"></a>
	 			<div class="btn">
		             <input type="submit" value="Se connecter" id="btn">
		        </div>
 		</form>	
 		</div>
 	</nav>
 		 
 		 <header id="photo">
	 	<div class="bg-photo">
	 	</div>

 	</header> 
 	<div class="header-content">
 		<h1>Bienvenue sur la nouvelle plateforme</br>dédiée aux jeux vidéo</h1>
 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident veritatis magni expedita necessitatibus vitae animi, numquam quas facere sunt, quibusdam, a eius excepturi iusto quae</p>
 		<!-- <div class="header-btns">
 			<a><input href="#fond" type="button" value="S'incrire" id="btn-2"></a>
 	</div> -->
 	<div class="scroll-down">
 		<a href="#fond"><img src="images/scrollDown5.png"></a>	
 	</div>
 </div>
<?php
include('includes/conect.php')
?>
 	<!DOCTYPE html> 
 	<section class="content" id="fond">
 		<img src="images/4.jpg" alt="">
	 </section>
	 <div class="container-form">
	 	<form action="index.php" method="post">
	 		<h2>Inscription</h2>
	 		<a>Pseudo</br><input type="pseudo" id="pseudo" name="pseudo"></a>
	 		<a>Email</br><input type="email" id="email2" name="email"></a>
	 		<a>Mot de passe</br><input type="password" name="password" id="password2"></a>
	 		<a>Retappez mot de passe</br><input type="password"  name="password_" id="password2"></a>
	 		<div class="btn3">
	 		<input type="submit" value="S'inscrire" id="btn3">
	 	</div>
	 	</form>
	 </div>
 </body> 
 </html> 