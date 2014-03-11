<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">KTG</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li 
      <?php 
      if(endsWith($_SERVER['SCRIPT_NAME'], 'index.php')){
        echo 'class="active"';
      }
      ?>
      ><a href="index.php">Strona Główna</a></li>
      <li
       <?php 
      if(endsWith($_SERVER['SCRIPT_NAME'], 'toMy.php')){
        echo 'class="active"';
      }
      ?>
      ><a href="toMy.php">To my!</a></li>
      <li
       <?php 
      if(endsWith($_SERVER['SCRIPT_NAME'], 'wyjazdy.php')){
        echo 'class="active"';
      }
      ?>
      ><a href="wyjazdy.php">Wyjazdy</a></li>
      <!-- <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Galeria<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Galeria1</a></li>
          <li><a href="#">Galeria2</a></li>
          <li><a href="#">Galeria3</a></li>
          <li><a href="#">Galeria4</a></li>
          <li><a href="#">Galeria5</a></li>
        </ul>
      </li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if(isset($_SESSION['login'])){
      echo '<li><a href="logout.php"><span class="glyphicon glyphicon-ban-circle"> Logout</span></a></li>';
      echo '<li><a href="adminPanel.php"><span class="glyphicon glyphicon-cog"> Panel Admina</span></a></li>';
    }else{
      echo '<li><a href="login.php"><span class="glyphicon glyphicon-pencil"> Login</span></a></li>';
    } ?>
    </ul>

    <!-- <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul> -->
  </div><!-- /.navbar-collapse -->
</nav>