<?php

include('includes/db.php');

if (empty ($_SESSION['user']) ) {
header('Location:./');
die();
}

if ( !empty($_POST) ) {
$pdo->query('INSERT INTO topics (creation, creatorId, title, description) VALUES (' . '"' . date('Y-m-d H:i:s') . '", "' . $_SESSION['user']['id'] . '", "' . $_POST['title'] . '", "' . $_POST['description'] . '");');
header('Location:accueil.php');
die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'> 
  <link href='https://fonts.googleapis.com/css?family=Hind:400,300,600,500,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
      <title>Accueil</title>
      <link rel="stylesheet" href="css/accueil.css"/>
</head>
<body>
<div id="head">
      <div class="users"> Bonjour <?=$_SESSION['user']['pseudo']?>
      <input type="button" value="deconnexion" onclick="self.location='deconnexion.php'">
      <input type="button" value="Mon profil" onclick="self.location='mon-profil.php'">
      </div>
</div>	

<div class="container-page">
      <h3>Forum de discussion</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident veritatis magni expedita necessitatibus vitae animi, numquam quas facere sunt, quibusdam, a eius excepturi iusto quae repudiandae. Porro sequi unde, aliquid!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident veritatis magni expedita necessitatibus vitae animi, numquam quas facere sunt, quibusdam, a eius excepturi iusto quae repudiandae. Porro sequi unde, aliquid!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident veritatis magni expedita necessitatibus vitae animi, numquam quas facere sunt, quibusdam, a eius excepturi iusto quae repudiandae. Porro sequi unde, aliquid!</p>
      <form action="accueil.php" method="post">
        <div class="container">
        <h1>Nouveau sujet</h1>
            <input type="text" name="title" placeholder="titre du topic">
            <textarea name="description" placeholder="Description"></textarea>
            <input type="submit" value="Créer" id="btn" onclick="self.location='accueil.php'">
        </div>
      </form>

<h2>Liste des sujets</h2>
<div class="bloc">
               <div class="content">
                   <table>
                       <thead>
                           <tr>
                               <th>Titre</th>
                               <th>Description</th>
                               <th>Auteur</th>
                               <th>Date</th>
                           </tr>
                       </thead>
                       <tbody>

<?php

$request = $pdo->query('SELECT * FROM topics ORDER BY creation DESC;');
$results = $request->fetchAll();
foreach ( $results as $result ) {
?>

                           <tr>
                              <td><a href="message.php?id=<?=$result['id']?>"><?=$result['title']?></a></td>
                               <td><?=$result['description']?></td>
                               <td><?php


$request = $pdo->query('SELECT * FROM users WHERE id = ' . $result['creatorId']);
$resultB = $request->fetchAll();
echo $resultB[0]['pseudo'];


?></td>
                               <td><?=$result['creation']?></td>
                           </tr>

<?php

}

?>
</div>
</tbody>
</table>
<footer>
</footer>	

</body>
</html>