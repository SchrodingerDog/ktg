<?php 
require 'dbConn.inc.php';
require 'config.inc.php';
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Kamil Prosciewicz">
    <link rel="shortcut icon" href="favicon.gif">

    <title>KTG\Wyjazdy</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom style -->
    <link href="style.css" rel="stylesheet">

  </head>

  <body>
    <div class = "bg" style="display:none"></div>
    <div class="container">
      
      <?php require 'header.php'; ?>
      <!-- <div class="row">
        <div class="col-sm-3 col-md-3">
          <div class="thumbnail" style="background-color : rgba(255,255,255,0.80);">
            <img src="galerie/1/thumbs/0.jpg" alt="...">
            <div class="caption">
              <h3 style="margin-top:0px;">Nazwa</h3>
             <!-  <p>...</p> -
              <p><a href="galeria.php?id=1" class="btn btn-primary" role="button">Przejdź do galerii</a></p>
            </div>
          </div>
        </div>
      </div> -->
      

      <!-- <div class="panel panel-primary col-md-3">
        <div class="panel-title">Nazwa<br></div>
        <div class="panel-body"><img src="galerie/11/thumbs/1.jpg"/><br></div>
      </div> -->
      <?php $wyjazdy = $pdo->query("SELECT * FROM wyprawy ORDER BY data DESC")->fetchAll();
      foreach ($wyjazdy as $key => $value) {
        $thumby = scandir("galerie/".$value["id"]."/thumbs/");
        if($key%4===0 || $key === 0){
          echo '
        <div class="row">';
        }
        echo '
        <div class="col-sm-3 col-md-3">
          <div class="thumbnail" style="background-color : rgba(255,255,255,0.80);">
            <img src="galerie/'.$value["id"].'/thumbs/'.$thumby[2].'" alt="...">
            <div class="caption">
              <h3 style="margin-top:0px;">'.$value["cel"].'</h3>
             <!--  <p>...</p> -->
              <p><a href="galeria.php?id='.$value["id"].'" class="btn btn-primary" role="button">Przejdź do galerii</a></p>
            </div>
          </div>
        </div>
        ';
        if($key%4===3 || $key === 3){
          echo '
        </div>';
        }
      }
      ?>

      
      
    </div><!-- /.container -->
    <?php require 'footer.php'; ?>

    <script language="JavaScript" type="text/javascript" src="bootstrap/assets/js/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="background.js"></script>
    <script language="JavaScript" type="text/javascript" src="table.js"></script>
    <!-- // <script language="JavaScript" type="text/javascript" src="table_randoms.js"></script> -->


  </body>
</html>
