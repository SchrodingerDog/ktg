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
      <div class="wrapper">
      <?php
       

      // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
      $members = $pdo->query('SELECT * FROM members ORDER BY id');

      if(!is_null($members)){
        foreach($members->fetchAll() as $row){
          echo '<div class="row" id = "row_'.$row['id'].'">';
            echo '<div class="col-md-4">';
              echo '<img class ="media-object" src = "'.$row['thumb'].'">';
            echo '</div>';
            echo '<div class="panel col-md-3">';
            echo '<div class="panel-title">';
              if(isset($_SESSION['login'])){
                echo '#'.$row['id'].' ';
              }
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
      </div>
    </div><!-- /.container -->
    <?php require 'footer.php'; ?>

    <script language="JavaScript" type="text/javascript" src="bootstrap/assets/js/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bootstrap/assets/js/jquery-ui-1.10.3/jquery-ui-1.10.3/ui/jquery-ui.js"></script>
    <script language="JavaScript" type="text/javascript" src="background.js"></script>
    <script type="text/javascript">
    $('.wrapper').sortable({
      axis:'y',
      out:function(event,ui){
        order = [];
        $('.wrapper').children('.row').each(function(idx, elm) {
          order.push(elm.id.split('_')[1])
        });
        //ajaxa tutaj, potem odkodowanie, zamiana id'ków w bazie, może nawet kombinacja z id przy etykiecie
      }
    });
    </script>
  </body>
</html>
