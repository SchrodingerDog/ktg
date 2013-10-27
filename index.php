<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Kamil Prosciewicz">
    <link rel="shortcut icon" href="bootstrap/assets/ico/favicon.png">

    <title>Bootstrap_X0X0</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom style -->
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/assets/js/html5shiv.js"></script>
      <script src="bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class = "bg"></div>
    <div class="container">
      
      <?php require 'header.php'; 
      require 'pagination.inc.php';?>


      <?php
      try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        // echo 'Połączono z bazą';
      }catch(PDOException $e){
        // echo 'Ups, cos poszlo nie tak ';
      }
      $zapytanie = $pdo->query("SELECT * FROM posts");
      $posty_len = $zapytanie->rowCount();

      define('ONPAGE',10);
      define('ONSHOW',4);

      $paginacja = Pagination($posty_len,1,'index.php/');

      print_r($paginacja);
      

      $posts = $pdo->query('SELECT * FROM posts ORDER BY id DESC');

      if(!is_null($posts)){
        foreach($posts->fetchAll() as $row){
            echo '<div id = "row">';
            if ($row['id']%2==1) {
              echo '<div class="col-md-6">';
            }else{
              echo '<div class="col-md-6 col-md-offset-6">';
            }
            echo '<div class="panel panel-default">';
            echo  '<div class="panel-heading">';
            echo   '<h3 class="panel-title">'.$row['tytul'].'</h3>';
            echo  '</div>';
            echo  '<div class="panel-body">';
            echo    $row['tresc'].'<br>';
            echo  '</div>';
            echo  '<div class="panel-footer">';
            if (isset($_SESSION['login'])) {
                echo $row['id'].' (ID potrzebne do usuwania i edycji)';
            }
            echo    '<div class = "created"><i>'.$row['created'].'</i></div>';
            echo  '</div>';//footer
            echo  '</div>';//panel panel-default
            echo  '</div>';//col
            echo '</div>';//row
        }
      }

      if(!empty($paginacja)){ 
      echo '<div class="Pagination"><nav><ul>';
          if(!empty($paginacja['prev'])) {
              echo '<li class="Arrow Left">
                    <a href="'.$paginacja['prev'].'" title="Poprzednia strona">&laquo;</a>
                    </li>';
          }
          if(!empty($paginacja['list'])) {
              foreach($paginacja['list'] as $l) {
                  if(empty($l['link'])) {
                      echo '<li><strong>'.$l['nr'].'</strong></li>';
                  }else{
                      echo '<li><a href="'.$l['link'].'">'.$l['nr'].'</a></li>';
                  }
              }
          }
          if(!empty($paginacja['next'])) {
              echo '<li class="Arrow Right">
                    <a href="'.$paginacja['next'].'" title="Następna strona">&raquo;</a>
                    </li>';
          }
      echo '</ul></nav></div>';
      }
      
      
      ?>
    </div><!-- /.container -->
    <?php require 'footer.php'; ?>

    <script src="bootstrap/assets/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
