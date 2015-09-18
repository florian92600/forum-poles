<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
  header('Location: index.php');
  die();
}


if ( !empty($_POST) ) {
  $pdo->query(
    'INSERT INTO messages (creation, creatorId, topicId, message) VALUES (' .
    '"' . date('Y-m-d H:i:s') . '", "' . $_SESSION['user']['id'] . '", "' . $_GET['id'] . '", "' . $_POST['message'] . '");'
  );
  header('Location: ./message.php?id=' . $_GET['id']);
  die();
}


$res = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id']);
$topic = $res->fetch();


?><!DOCTYPE html>
<html>
    <head>
        <title>message</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/message.css"> 
    </head>
    <body>
  

 
    <div id="head">
          <div class="users"> Bonjour <?=$_SESSION['user']['pseudo']?>
          <input type="button" value="deconnexion" onclick="self.location='deconnexion.php'">
          <input type="button" value="Mon profil" onclick="self.location='mon-profil.php'">
          </div>
    </div>  



    <div class="container-page2">




                    
                      <h1><?=$topic['title']?></h1>
                      <input type="button" value="Liste des sujets" onclick="self.location='accueil.php'">
                    <table>
                        <tbody>


      <?php

        $request = $pdo->query('SELECT * FROM messages WHERE topicId = ' . $_GET['id'] . ' ORDER BY creation ASC;');
        $results = $request->fetchAll();
        $topic['message'] = $topic['description'];
        array_unshift($results, $topic);
        foreach ( $results as $result ) {

      ?>

                            <tr>
                            
                                <td>
                                    <p>
                                    <div class="date"> Poster le <?=$result['creation']?></div><br/>
                                        <strong><a href="#"><?php


          $request = $pdo->query('SELECT * FROM users WHERE id = ' . $result['creatorId']);
          $resultB = $request->fetchAll();?>
          
<a> <?php echo $resultB[0]['pseudo']; ?> </a>
<!-- href='autre-profil.php?id=<?=$result[$i]['creatorId']?>'> -->


        </strong><br/>

                                         
          <?=$result['message']?>
                                    </p>
                                </td>
                            </tr>

      <?php

        }

      ?>



                        </tbody>
                    </table>
                </div>
            </div>












    
    <form action="message.php?id=<?=$_GET['id']?>" method="post">
                <h4>Répondre</h4>
                <div class="content">
                <div class="input textarea">
                <textarea id="textarea1" rows="7" cols="4" name="message"></textarea>
                    </div>

                <div class="submit">
                                <input type="submit" value="Envoyer">
                            </div>

                </div>
    </form>

