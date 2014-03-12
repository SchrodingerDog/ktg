<?php 
require 'dbConn.inc.php';
require'config.inc.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Kamil Prosciewicz">
    <link rel="shortcut icon" href="favicon.gif">

    <title>KTG\Galeria</title>

    <!-- Bootstrap core CSS -->
    
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
      
    <?php require 'header.php'; ?>
    <?php 
    if (isset($_GET['id'])) {
		  $id = $_GET['id'];
    }
	// <center><div class="panel" style="position:relative"><br><br><br><br><br><br><br><br><br><br>Witaj w galerii nr <?php echo $id; <br><br><br><br><br><br><br><br><br><br></div></center> -->
    $wyjazdy = $pdo->query('SELECT ilosc_zdj FROM galeries WHERE id ='.$id);
    $ilosc_zdj = $wyjazdy->fetch()[0];
    for ($i=0; $i < $ilosc_zdj; $i++) { 
      // <a class="fancybox" style="display:inline; margin-left:15px;" rel="group" href="/galerie/$id/$i.jpg"><img src="/galerie/$id/thumbs/$i.jpg" alt="" /></a>
      echo '<a class="fancybox" style="display:inline; margin-left:15px;" rel="group" href="galerie/'.$id.'/'.$i.'.jpg"><img style=" border: 1px white solid;" src="galerie/'.$id.'/thumbs/'.$i.'.jpg" alt="" /></a>';
    }
    ?>
    <?php require 'footer.php'; ?>

    <script src="bootstrap/assets/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js"></script>

    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
    <script src="galeria.js"></script>

  </body>
</html>
