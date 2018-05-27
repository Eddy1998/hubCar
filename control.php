<?php 
session_start();
include 'conn.inc.php';
$_SESSION['pass']="ciao";
$_SESSION['user']="eddy";
if(isset($_SESSION['driver'])&&isset($_SESSION['user']))
   {
  ?>
<div class="wrapper">
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand page-scroll" href="#main"><img src="logo/logo.png" width="115" height="30" alt="iLand" />Autista</a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a class="page-scroll" href="#main">Home</a></li>
            <li><a class="page-scroll" href="#cerca">Cerca</a></li>
            <li><a class="page-scroll" href="#funzione">Come Funziona</a></li>
            <li>
              <a class="page-scroll" href="#funzione">
                <?php echo $_SESSION['user']; ?>
              </a>
            </li>
            <li><a class="page-scroll" href="#funzione"> Crea viaggio</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar-collapse -->
  </div>
</div>
<?php
   }
if(isset($_SESSION['pass'])&&isset($_SESSION['user']))
   {
  ?>
     <div class="wrapper">
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand page-scroll" href="#main"><img src="logo/logo.png" width="115" height="30" alt="iLand" />Autista</a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a class="page-scroll" href="#main">Home</a></li>
            <li><a class="page-scroll" href="#cerca">Cerca</a></li>
            <li><a class="page-scroll" href="#funzione">Come Funziona</a></li>
            <li>
              <a class="page-scroll" href="#funzione">
                <?php echo $_SESSION['user']; ?>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar-collapse -->
  </div>
</div>
<?php
  }
if(!isset($_SESSION['pass'])&&!isset($_SESSION['user'])) {
  ?>
      <div class="wrapper">
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand page-scroll" href="#main"><img src="logo/logo.png" width="115" height="30" alt="iLand" /></a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a class="page-scroll" href="#main">Home</a></li>
            <li><a class="page-scroll" href="#cerca">Cerca</a></li>
			<li><a class="page-scroll" href="#funzione">Come Funziona</a></li>
			<li><a class="page-scroll" href="#register">Registrati</a></li>
            <li><a class="page-scroll" href="#login">Accedi</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar-collapse --> 
  </div>
</div>
        <?php
  }
?>
