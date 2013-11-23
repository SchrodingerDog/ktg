<?php 
require 'dbConn.inc.php';
require 'config.inc.php';
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
    <link rel="stylesheet" href="bootstrap/assets/js/jquery-ui-1.10.3/jquery-ui-1.10.3/themes/base/jquery-ui.css" />
    <!-- Custom style -->
    <link href="style.css" rel="stylesheet">
  </head>

  <body>
    <div class = "bg" style="display:none"></div>
    
    <div class="container">
      <?php require 'header.php'; ?>
      <div id="dialog-form" title="Edytuj post" style="display:none">  
        <form>
        <fieldset>
          <label for="imie">Imie</label>
          <input type="text" class="imie" pole = "1"><br>
          <label for="nazwisko">Nazwisko</label>
          <input type="text" class="nazwisko" pole = "1"><br>
          <label for="nazwisko">Opis</label>
          <textarea type="text" class="opis" pole = "1"></textarea><br>
          Zdjecia nie da się tu edytować, trzeba wejśc w panel admina
        </fieldset>
        </form>
      </div>
      <div class="wrapper">
      <?php
       

      // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
      $members = $pdo->query('SELECT * FROM members ORDER BY ord');

      if(!is_null($members)){
        foreach($members->fetchAll() as $row){
          echo '<div class="row" id = "'.$row['id'].'">';
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
            if(isset($_SESSION['login'])){
              echo '<div class="przyciski col-md-3" style = "display:none">';
              echo '<button type="button" style="margin-right:15px" onclick="removeMember('.$row['id'].')" class="btn btn-info">Usuń</button>';
              echo '<button type="button" style="margin-right:15px" onclick="editMember('.$row['id'].')" class="btn btn-info">Edytuj</button>';
              echo '</div>';
            }
          echo '</div>';
        }
      }
      
      ?>
      </div>
    </div><!-- /.container -->
    <?php require 'footer.php'; ?>

    <script language="JavaScript" type="text/javascript" src="bootstrap/assets/js/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bootstrap/assets/js/jquery-ui-1.10.3/jquery-ui-1.10.3/ui/jquery-ui.js"></script>
    <script language="JavaScript" type="text/javascript" src="background.js"></script>
    <?php
    if(isset($_SESSION['login'])){
      echo '<script type="text/javascript" src="sort.js"></script>';
      echo '<script type="text/javascript" src="hover.js"></script>';
    }
    ?>
  </body>
</html>
