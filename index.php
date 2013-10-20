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
    <style type="text/css">
    *{
      margin: 0;
      padding: 0;
    }    
    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
    #container {
      min-height:100%;
      position:relative;
    }
    footer{
      text-align: center;
      color: #606060;
      background: #C0C0C0;
    }
    #row{
      padding-bottom: 15px;
    }
    .created{
      text-align: right;

    }
    

</style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/assets/js/html5shiv.js"></script>
      <script src="bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
    <div class="container">
      
      <?php require 'header.html'; ?>

      <div class="starter-template">
        <h1>Strona Główna</h1>
        <p class="lead">Witaj na stronie głównej!</p>
      </div>
      
      <?php
      try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        // echo 'Połączono z bazą';
      }catch(PDOException $e){
        // echo 'Ups, cos poszlo nie tak ';
      }

      $posts = $pdo->query('SELECT * FROM posts');

      if(!is_null($posts)){
        foreach($posts->fetchAll() as $row)
        {
          echo '<div id = "row">';
            if ($row['id']%2==1) {
              echo '<div class="col-md-4">';
            }else{
              echo '<div class="col-md-4 col-md-offset-8">';
            }
              echo $row['tytul'].'<br>';
              echo $row['tresc'].'<br>';
              echo '<div class = "created"><i>'.$row['created'].'</i></div><br>';
            echo '</div>';
          echo '</div>';
        }
      }
      
      
      ?>
    </div><!-- /.container -->
    <?php require 'footer.php'; ?>

    <script src="bootstrap/assets/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
