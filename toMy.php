<?php 
function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}
function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Kamil Prosciewicz">
    <link rel="shortcut icon" href="bootstrap/assets/ico/favicon.png">

    <title>KTG\To My</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom style -->
    <link href="style.css" rel="stylesheet">

  </head>

  <body>
    <div class = "bg" style="display:none"></div>
    <div class="container">
      
      <?php require 'header.php'; ?>
      
      
      <?php
      try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        // echo 'Połączono z bazą';
      }catch(PDOException $e){
        // echo 'Ups, cos poszlo nie tak ';
      }

      $members = $pdo->query('SELECT * FROM members ORDER BY id');

      if(!is_null($members)){
        foreach($members->fetchAll() as $row){
          echo '<div class="row">';
            echo '<div class="col-md-4">';
              echo '<img class ="media-object" src = "'.$row['thumb'].'">';
            echo '</div>';
            echo '<div class="panel col-md-3">';
            echo '<div class="panel-title">';
              echo $row['nazwisko'].' '.$row['imie'].'<br>';
            echo '</div>';
              echo '<div class="panel-body">';
                echo $row['opis'].'<br>';
              echo '</div>'; 
            echo '</div>';
          echo '</div>';
        }
      }
      
      ?>
    </div><!-- /.container -->
    <?php require 'footer.php'; ?>

    <script language="JavaScript" type="text/javascript" src="bootstrap/assets/js/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="background.js"></script>

  </body>
</html>
