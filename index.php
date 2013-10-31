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

    <title>KTG\Główna</title>

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
    <div class = "bg" style="display:none"></div>
    <div class="container">
      
    <?php require 'header.php'; ?>

	<?php
	if (!isset($_GET['page'])) {
		$_GET['page']=1;
	}

	
	$tbl_name="posts";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 2;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$zapytanie = $pdo->query("SELECT * FROM posts");
    $total_pages = $zapytanie->rowCount();


	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$posts = $pdo->query("SELECT * FROM $tbl_name ORDER BY id DESC LIMIT $start, $limit");
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	if ($lastpage<$page) {
		header('Location: error.page.php');
	}

	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<ul class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$prev\"> << </a></li>";
		else
			$pagination.= "<li><span class=\"disabled\"> << </span></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li><span class=\"current\">$counter</span></li>";
				else
					$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span class=\"current\">$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><span class=\"disabled\"> ... </span></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
				$pagination.= "<li><span class=\"disabled\"> ... </span></li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span class=\"current\">$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><span class=\"disabled\"> ... </span></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
				$pagination.= "<li><span class=\"disabled\"> ... </span></li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span class=\"current\">$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$next\"> >> </a></li>";
		else
			$pagination.= "<li><span class=\"disabled\"> >> </span></li>";
		$pagination.= "</ul>\n";		
	}
?>

	<?php
		$licznik = 0;
		foreach($posts->fetchAll() as $row){
				
	            echo '<div id = "row">';
	            if ($licznik%2==1) {
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
	            $licznik++;
	        }
	?>

</div><!-- /.container -->
	<?php echo '<center>'.$pagination.'</center>'; ?>

    <?php require 'footer.php'; ?>
    <script language="JavaScript" type="text/javascript" src="bootstrap/assets/js/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="background.js"></script>
    
  </body>
</html>
