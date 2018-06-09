<?php
session_start();
include 'data/conn.inc.php';
$dbh = new PDO($conn,$user,$pass);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>hubCar - Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="logo/favicon.ico" type="image/png" sizes="16x16">




    <!-- To support old sizes -->
    <link rel='apple-touch-icon' sizes='57x57' href='logo/logo57.png'>
    <link rel='apple-touch-icon' sizes='72x72' href='logo/logo72.png'>
    <link rel='apple-touch-icon' sizes='114x114' href='logo/logo114.png'>
    <link rel='apple-touch-icon' sizes='144x144' href='logo/logo144.png'>

    <!-- To support new sizes -->
    <link rel='apple-touch-icon' sizes='60×60' href='logo/logo60.png'>
    <link rel='apple-touch-icon' sizes='76×76' href='logo/logo76.png'>
    <link rel='apple-touch-icon' sizes='120×120' href='logo/logo120.png'>
    <link rel='apple-touch-icon' sizes='152×152' href='logo/logo152.png'>
    <link rel='apple-touch-icon' sizes='180×180' href='logo/logo180.png'>

    <!-- To support Android -->
    <link rel='icon' sizes='192×192' href='logo/logo192.png'>
    <link rel='icon' sizes='128×128' href='logo/logo128.png'>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Resource style -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Resource style -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/control-search-travel.js"></script>


  </head>

  <body>
    <div class="wrapper" style="width: auto;">
      <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand page-scroll" href="index"><img src="logo/logo.png" width="135" height="30" alt="hubCar" /></a>Search</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a class="page-scroll" href="index">Home</a></li>
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
                <h1 class="wow fadeInUp" data-wow-delay="0.1s">Cerca il tuo Viaggio</h1>
                <p class="wow fadeInUp" data-wow-delay="0.2s"> Seleziona la tua citt&#224; di partenza e quella di destinazione</p>

              </div>
            </div>
          </div>
        </div>

        <!-- Client Section -->

       <div class="app-features text-center" id="cerca">
          <div class="container">
            <form class="subscribe-form wow zoomIn" action="#" method="post" name="modulo">
              <div id="fh5co-contact" class="wow fadeInUp">
                <div class="col-md-12">
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pitch-content">
                      <h1>Partenza da</h1>
                      <select name="partenza" class="form-control" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8; -webkit-appearance: none;">
                        <option ></option>
                      <?php
                      $stm=$dbh->prepare('SELECT * FROM province');
                      $stm->execute();
                      if($stm->rowCount()>0)
                      {
                        
                        while($row= $stm->fetch())
                        {
                            echo "<option value'" . $row['nome_province'] . "'>" . $row['nome_province'] . "</option>";
                        }
                      }  
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">

                    <div class="pitch-content">
                      <h1>Arrivo a </h1>
                      <select name="arrivo" class="form-control" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8; -webkit-appearance: none;">
                      <option></option>
                    <?php
                      $stm=$dbh->prepare('SELECT * FROM province');
                      $stm->execute();
                      if($stm->rowCount()>0)
                      {
                        
                        while($row= $stm->fetch())
                        {
                            echo "<option value'" . $row['nome_province'] . "'>" . $row['nome_province'] . "</option>";
                        }
                      }  
                      ?>
                    </select>
                    </div>
                  </div>
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s" style="text-align:center;">
                    <div class="pitch-content" style="padding-top: 66px;">
                      <a id="cercaviaggio" class="btn btn-action wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">cerca</a> </div>

                  </div>

                </div>
              </div>
            </form>

            <div class="col-md-4 features-left">
              <div class="col-md-12 wow fadeInDown" data-wow-delay="0.2s">
                <div class="icon"> <i class="ion-clock"></i> </div>
                <div class="feature-single">
                  <h1>Veloce</h1>
                  <p> Basta cercare un viaggio con la tua destinazione </p>
                </div>
              </div>


            </div>
            <div class="col-md-4 features-left" data-wow-delay="0.5s">
              <div class="col-md-12 wow fadeInDown" data-wow-delay="0.3s">
                <div class="icon"> <i class="ion-checkmark-circled"></i> </div>
                <div class="feature-single">
                  <h1>Facile</h1>
                  <p>Gestione facile e prenotazioni con semplici click </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 features-left">
              <div class="col-md-12 wow fadeInDown" data-wow-delay="0.4s">
                <div class="icon"> <i class="ion-android-compass"></i> </div>
                <div class="feature-single">
                  <h1>Preciso</h1>
                  <p> Arrivi al luogo esatto, ovunque </p>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- Footer Section -->
        <div class="footer">
          <div class="container">
            <div class="col-md-12"> <img src="logo/logo.png" width="125" height="28" alt="Image" />
              <div class="footer-text">
                <p> Copyright © 2018 hubCar Tutti i diritti riservati.</p>
              </div>
            </div>

          </div>
        </div>

 <a id="back-top" class="back-to-top page-scroll" href="#main"> <i class="ion-ios-arrow-thin-up"></i> </a>


      </div>
      <!-- Main Section -->
    </div>
    <!-- Wrapper-->


    <!-- Jquery and Js Plugins -->


    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <!-- Bootstrap -->







  </body>

  </html>