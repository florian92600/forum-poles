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
<html>
    <head>
        <title>mon profil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/modification.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
    <script type="text/javascript" src='js/app.js'></script> 
    </head>
    <body>
            <header id="photo">
        <div class="bg-photo">
        </div>

    </header>   

            <div class="container">
                <h2> Modifier mon profil</h2>
                <form action="mon-profil.php" method="post">
                    <div class="input1">
                        <label>pseudo</label><br>
                        <input type="text"name="pseudo" value="<?=$user['pseudo']?>">
                    </div>
                    <div class="input2">
                        <label>email</label><br>
                        <input type="text"name="email" value="<?=$user['email']?>">
                    </div>


        <div class="submit">
                        <input type="submit" value="Enregistrer">
                        <input type="button" value="Retour" onclick="self.location='mon-profil.php'">
                    </div>

    </form>
            </div>







        </div>

    </body>
</html>