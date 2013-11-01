<?php 
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
      
      
      

      <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <td>#</td>
          <td>Cel</td>
          <td>Data</td>
        </tr>
      </thead>
      <?php
      $wyjazdy = $pdo->query('SELECT * FROM wyprawy');
        foreach($wyjazdy->fetchAll(PDO::FETCH_ASSOC) as $row){
          echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['cel'].'</td>';
            echo '<td>'.$row['data'].'</td>';
          echo '</tr>';
          echo '<tr style="display:none" class="niewidoczny"><td>nananan</td></tr>';
      //     echo '<div class="row">';
      //       echo '<div class="col-md-4">';
      //         echo '<img class ="media-object" src = "'.$row['thumb'].'">';
      //       echo '</div>';
      //       echo '<div class="panel col-md-3">';
      //       echo '<div class="panel-title">';
      //         echo $row['nazwisko'].' '.$row['imie'].'<br>';
      //       echo '</div>';
      //         echo '<div class="panel-body">';
      //           echo $row['opis'].'<br>';
      //         echo '</div>'; 
      //       echo '</div>';
      //     echo '</div>';
        }
      ?>
      </table>
      
    </div><!-- /.container -->
    <?php require 'footer.php'; ?>

    <script language="JavaScript" type="text/javascript" src="bootstrap/assets/js/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="background.js"></script>
    <script language="JavaScript" type="text/javascript" src="table.js"></script>


  </body>
</html>
