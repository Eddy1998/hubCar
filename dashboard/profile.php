<?php
session_start();
if(!isset($_SESSION['user']))
{
  header("location : ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>hubCar - Profilo</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../logo/favicon.ico" type="image/png" sizes="16x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='../css/icomoon/style.css'>
  <link rel='shortcut icon' href='../icons/favicon.ico'>
  <!-- To support old sizes -->
  <link rel='apple-touch-icon' sizes='57x57' href='../logo/logo57.png'>
  <link rel='apple-touch-icon' sizes='72x72' href='../logo/logo72.png'>
  <link rel='apple-touch-icon' sizes='114x114' href='../logo/logo114.png'>
  <link rel='apple-touch-icon' sizes='144x144' href='../logo/logo144.png'>

  <!-- To support new sizes -->
  <link rel='apple-touch-icon' sizes='60×60' href='../logo/logo60.png'>
  <link rel='apple-touch-icon' sizes='76×76' href='../logo/logo76.png'>
  <link rel='apple-touch-icon' sizes='120×120' href='../logo/logo120.png'>
  <link rel='apple-touch-icon' sizes='152×152' href='../logo/logo152.png'>
  <link rel='apple-touch-icon' sizes='180×180' href='../logo/logo180.png'>

  <!-- To support Android -->
  <link rel='icon' sizes='192×192' href='../logo/logo192.png'>
  <link rel='icon' sizes='128×128' href='../logo/logo128.png'>

  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,500,600,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/animate.css">
  <!-- Resource style -->
  <link rel="stylesheet" href="../css/owl.carousel.css">
  <link rel="stylesheet" href="../css/owl.theme.css">
  <link rel="stylesheet" href="../css/ionicons.min.css">
  <!-- Resource style -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript" src="../js/dataprofile.js"></script>
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="#main"><img src="../logo/logo.png" width="115" height="30" alt="hubcarimg" /></a>Profilo </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

              <li><a class="page-scroll" href="../foundtravel.php">Cerca</a></li>
              <li><a class="page-scroll" href="#funzione">Aggiungi viaggio</a></li>
              <li><a class="page-scroll" href="#funzione">Password</a></li>
              <li><a class="page-scroll" href="#funzione">Automobile</a></li>
              <li><a class="page-scroll" href="../user/signout.php">Sign Out</a></li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->

    <div class="main app form" id="main">
      <!-- Main Section-->
      <div class="hero-section">
        <div class="container nopadding">

          <div class="col-md-12">
            <div class="hero-content text-center">

              <h1 class="wow fadeInUp" data-wow-delay="0.1s" id="profilo"></h1>

            </div>
          </div>
        </div>
      </div>

      <!-- Client Section -->

      <div class="app-features text-center" id="cerca">
        <div class="container">
          <form action="modprofile.php" method="POST">
            <?php if(@$_GET['success']==1)
            {?>
                <h1 class="text-center" style="color:#1eb858;">Dati modificati con successo</h1>
           <?php }?>
             <?php if(@$_GET['err']==1)
            {?>
                <h1 class="text-center" style="color:#d9534f;">Errore durante la modifica</h1>
           <?php }?>
          
            <div class="col-md-4 features-left">
                <hr>
              <div class="col-md-12 wow fadeInDown" data-wow-delay="0.2s">
                <h1>Dati anagrafici:</h1>
                <div class="feature-single">

                </div>
                <div class="feature-single">
                  <h1>sesso</h1>
                  <p style="font-size:15px" id="sesso" > </p>
                </div>
                
                <div class="feature-single">
                  <h1>Nome:</h1>
                  <p style="font-size:15px" id="nome" > </p>

                </div>
                <div class="feature-single">
                  <h1>cognome:</h1>
                  <p style="font-size:15px" id="cognome" > </p>

                </div>
                <div class="feature-single">
                  <h1>data nascita</h1>
                  <p style="font-size:15px" id="nascita" > </p>

                </div>
                <div class="feature-single">
                  <h1>Nazionalità</h1>
                  <p style="font-size:15px" id="nazionalita" > </p>

                </div>
              </div>


            </div>
            <div class="col-md-4 features-left" data-wow-delay="0.5s">
              <hr>
              <div class="col-md-12 wow fadeInDown" data-wow-delay="0.3s">
                <h1>Dati dell'account:</h1>
                <div class="feature-single">

                </div>
                <div class="feature-single">
                  <h1>Username</h1>
                  <p style="font-size:15px" id="username" ></p>
                </div>
                <div class="feature-single">
                  <h1>email</h1>
                  <p style="font-size:15px" id="email" ></p>
                </div>

                <div class="feature-single">
                  <h1>telefono</h1>
                  <p style="font-size:15px" id="telefono" > </p>
                </div>

                <div class="feature-single">
                  <h1>Patente</h1>
                  <p style="font-size:15px" id="patente" ></p>
                </div>

                <div class="feature-single">
                  <h1>Data Registrazione</h1>
                  <p style="font-size:15px" id="dataregistrazione" ></p>
                </div>
                 <div class="feature-single">
                 <button class="btn  btn-action" type="submit"> Modifica Profilo</button>
                  <hr>
                 

                </div>

              </div>
            </div>
            <div class="col-md-4 features-left">
              <hr>
              <div class="col-md-12 wow fadeInDown" data-wow-delay="0.4s">

                <h1 >Automobile:</h1>
                <div class="feature-single">

                </div>
                <!----->
                <div id="automobile">
              <!--dati automobile, max 2-->
                </div>
                
                <!----->
                <div class="feature-single">
                  <button class="btn btn-primary btn-action btn-fill">Modifica Auto</button>

                </div>
              </div>
              <hr>
            </div>
             <input id="sesso2" type="hidden" name="sesso" />
                <input id="nome2" type="hidden" name="nome" />
                <input id="cognome2" type="hidden" name="cognome" />
                <input id="nascita2" type="hidden" name="nascita" />
                <input id="nazionalita2" type="hidden" name="nazionalita" />
                <input id="username2" type="hidden" name="username" />
              <input id="email2" type="hidden" name="email" />
                <input id="telefono2" type="hidden" name="telefono"/>
              <input id="patente2" type="hidden" name="patente"/>
              <input id="data2" type="hidden" name="data"/>
              
               
                
               
          </form>
        </div>
      </div>
      









        <!-- Footer Section -->
        <div class="footer">
          <div class="container">
            <div class="col-md-12"> <img src="../logo/logo.png" width="105" height="30" alt="Image" />
              <div class="footer-text">
                <p> Copyright © 2018 hubCar Tutti i diritti riservati.</p>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Scroll To Top -->

      <a id="back-top" class="back-to-top page-scroll" href="#main"> <i class="ion-ios-arrow-thin-up"></i> </a>

      <!-- Scroll To Top Ends-->

    </div>
    <!-- Main Section -->
  </div>
  <!-- Wrapper-->

  <!-- Jquery and Js Plugins -->
  <script type="text/javascript" src="../js/jquery-2.1.1.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../js/plugins.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
  <script type="text/javascript" src="../js/custom.js"></script>
  <script src="../js/jquery.subscribe.js"></script>
</body>

</html>