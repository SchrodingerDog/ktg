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
      
      
      

      <table class="table table-bordered">
      <thead>
        <tr style="background-color: #EEE">
          <?php if(isset($_SESSION['login'])){
            echo '<td>ID</td>';
          }
          ?>
          <td>Cel</td>
          <td>Data</td>
        </tr>
      </thead>
      <tbody>
      <?php
      // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
      $wyjazdy = $pdo->query('SELECT * FROM wyprawy ORDER BY data DESC');
      
      $memb = array();

        foreach($wyjazdy->fetchAll(PDO::FETCH_ASSOC) as $row){
          $memb = array();
          echo '<tr style="background-color:#FFF">';
            if(isset($_SESSION['login'])){
              echo '<td>'.$row['id'].'</td>';
            }
            echo '<td>'.$row['cel'].'</td>';
            echo '<td>'.$row['data'].'</td>';
          echo '</tr>';

          echo '<tr style="display:none" class="niewidoczny">';
            echo '<td colspan = 3>';
            echo '<table style="width:100%; margin:0px" class="table table-bordered">';
              $uczestnicy = $pdo->query('SELECT 
                `members`.`nazwisko`, `members`.`imie` FROM
                `wyprawy`, `wyprawy_czlonkowie`, `members` WHERE
                `members`.`id`=`wyprawy_czlonkowie`.`czlonek_id` AND
                `wyprawy`.`id`= `wyprawy_czlonkowie`.`wyprawa_id` AND
                `wyprawy_czlonkowie`.`wyprawa_id` = '.$row['id'].' ORDER BY
                `members`.`nazwisko`');
              foreach($uczestnicy->fetchAll(PDO::FETCH_ASSOC) as $uczestnik){
                array_push($memb, $uczestnik['imie'].' '.$uczestnik['nazwisko']);
              }
              echo '<tr style="background-color:#FFDBDB">';
                if (empty($memb)) {
                  echo '<td colspan=3>Jeszcze nie podpięto uczestników wyjazdu</td>';
                }else{
                  echo '<td colspan=3>'.implode(', ', $memb).'</td>';
                }
              echo '</tr>';
              echo '<tr style="background-color:#FFDBDB">';
                echo '<td style="width:50%" align = "center"><a href="galeria.php?id='.$row['id'].'">Galeria</a></td>';
                echo '<td style="width:50%" align = "center"><a href="sprawozdanie.php?id='.$row['id'].'">Sprawozdanie</a></td>';
              echo "</tr>";
            echo '</table>';
            echo '</td>';
          echo '</tr>';

        }
      ?>
      </tbody>
      </table>
      
    </div><!-- /.container -->
    <?php require 'footer.php'; ?>

    <script language="JavaScript" type="text/javascript" src="bootstrap/assets/js/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="background.js"></script>
    <script language="JavaScript" type="text/javascript" src="table.js"></script>
    <!-- // <script language="JavaScript" type="text/javascript" src="table_randoms.js"></script> -->


  </body>
</html>
