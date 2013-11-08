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
      
    <?php require 'header.php'; ?>
    <?php if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	?>
	<center><div class="panel" style="position:relative"><br><br><br><br><br><br><br><br><br><br>Witaj w sprawozdaniu nr <?php echo $id; ?><br><br><br><br><br><br><br><br><br><br></div></center>

    <?php require 'footer.php'; ?>

    <script src="bootstrap/assets/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
