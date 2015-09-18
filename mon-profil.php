<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
  header('Location: index.php');
  die();
}
if ( !empty($_POST) ) {
  $pdo->query(
    'UPDATE users SET email = "' . $_POST['email'] . '", pseudo = "' . $_POST['pseudo'] . '" WHERE id = ' . $_SESSION['user']['id']
  );
  header('Location: modification-profil.php');
  die();
}
$req = $pdo->query('SELECT * FROM users WHERE id = ' . $_SESSION['user']['id']);
$result = $req->fetchAll();
$user = $result[0];
?><!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'> 
  <link href='https://fonts.googleapis.com/css?family=Hind:400,300,600,500,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
      <title>Accueil</title>
      <link rel="stylesheet" href="css/mon-profil.css"/>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
 	<script type="text/javascript" src='js/app.js'></script> 
</head>
<body>
<header id="photo">
	 	<div class="bg-photo">
	 	</div>

 	</header> 	
<div class="container">
      
<h2>Mon profil</h2><br>
<a><b>Pseudo</b> : <?=$result[0]['pseudo']?></a><br>
<a><b>Email</b> : <?=$result[0]['email']?></a>
	<div class="bouton">
		<input type="button" value="Retour" onclick="self.location='accueil.php'">
		<input type="submit" value="Modifier profil" onclick="self.location='modification-profil.php'">
	</div>
</div>

</body>
</html>
