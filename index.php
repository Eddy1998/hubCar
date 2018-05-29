<?php
  session_start();
  include 'data/conn.inc.php';
  $dbh = new PDO($conn, $user, $pass);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>hubcar</title>
    <link rel="icon" href="logo/favicon.ico" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel='stylesheet' href='css/icomoon/style.css'>
    <link rel='shortcut icon' href='icons/favicon.ico'>
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
  </head>

  <body>
    <div class="wrapper">
      <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php
          if(isset($_SESSION["driver"]))
          {
            $stm = $dbh->prepare("SELECT * FROM Autista WHERE idAutista=:id limit 1");
            $stm->bindValue(":id", $_SESSION["driver"]);
            $stm->execute();
            if($stm->rowCount()>0)
            {
              $row = $stm->fetch();
            }
            ?>
              <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="#main"><img src="logo/logo.png" width="115" height="30" alt="iLand" /></a>Autista </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a class="page-scroll" href="#main">Home</a></li>
                  <li><a class="page-scroll" href="#cerca">Cerca</a></li>
                  <li><a class="page-scroll" href="#funzione">Come Funziona</a></li>
                  <li>
                    <a class="page-scroll" href="#funzione">
                      <?php echo $row['nome']; ?>
                    </a>
                  </li>
                  <li><a class="page-scroll" href="#funzione">Aggiungi viaggio</a></li>
                  <li><a class="page-scroll" href="#funzione">Log Out</a></li>
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
                <h1 class="wow fadeInUp" data-wow-delay="0.1s">Ciao <?php echo $row['nome']." ".$row['cognome'];?> </h1>
                <p class="wow fadeInUp" data-wow-delay="0.2s">Aggiungi una destinazione e viaggia</p>

              </div>
            </div>
          </div>
        </div>


        <?php    
        }
        if(isset($_SESSION["user"]))    
        {
          
            $stm = $dbh->prepare("SELECT * FROM Passeggero WHERE idPasseggero=:id limit 1");
            $stm->bindValue(":id", $_SESSION["user"]);
            $stm->execute();
            if($stm->rowCount()>0)
            {
              $row = $stm->fetch();
            }
            ?>
              <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="#main"><img src="logo/logo.png" width="115" height="30" alt="iLand" /></a>Passeggero </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a class="page-scroll" href="#main">Home</a></li>
                  <li><a class="page-scroll" href="#cerca">Cerca</a></li>
                  <li><a class="page-scroll" href="#funzione">Come Funziona</a></li>
                  <li><a class="page-scroll" href="#funzione"> <?php echo $row['nome']; ?> </a></li>  
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
                <h1 class="wow fadeInUp" data-wow-delay="0.1s">Ciao <?php echo $row['nome']." ".$row['cognome'];?> </h1>
                <p class="wow fadeInUp" data-wow-delay="0.2s">Aggiungi una destinazione e viaggia</p>

              </div>
            </div>
          </div>
        </div>
        <?php
        }
        if(!isset($_SESSION["driver"])&&!isset($_SESSION["p"]))
        {
          ?>
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
    <!-- /.container-fluid -->

    <div class="main app form" id="main">
      <!-- Main Section-->
      <div class="hero-section">
        <div class="container nopadding">

          <div class="col-md-12">
            <div class="hero-content text-center">
              <h1 class="wow fadeInUp" data-wow-delay="0.1s">Cerca la tua destinazione e Viaggia</h1>
              <p class="wow fadeInUp" data-wow-delay="0.2s"> In totale comodità</p>

            </div>
          </div>
        </div>
      </div>
      <?php
        }
            ?>
       

      <!-- Client Section -->

      <div class="app-features text-center" id="cerca">
        <div class="container">
          <form class="subscribe-form wow zoomIn" action="#" method="post">
            <div id="fh5co-contact" class="wow fadeInUp">
              <div class="col-md-12">
                <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                  <div class="pitch-content">
                    <h1>Parti da</h1>
                    <select name="partenza" class="form-control" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;">
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
                    <h1>Arrivi a </h1>
                    <select name="arrivo" class="form-control" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;">
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
                    <a href="#" class="btn btn-action wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">cerca</a> </div>

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









      <div id="funzione" class="review-section">
        <div class="container">
          <div class="col-md-10 col-md-offset-1">
            <div class="reviews owl-carousel owl-theme">
              <div class="review-single">

                <div class="pitch-intro">
                  <h1 class="wow fadeInDown" data-wow-delay="0.2s">Guadagna con hubCar</h1>
                  <p class="wow fadeInDown" data-wow-delay="0.2s"> Offrendo un passaggio</p>
                </div>
                <div class="col-md-12">
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pitch-icon"> <i class="ion-android-create"></i> </div>
                    <div class="pitch-content">
                      <h1>Pubblica un viaggio</h1>
                      <p>Scegli dove andare, la data e l'orario</p>
                    </div>
                  </div>
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pitch-icon"> <i class="ion-android-car"></i> </div>
                    <div class="pitch-content">
                      <h1>Viaggia</h1>
                      <p>Nell'orario indicato, insieme agli utenti che ti hanno scelto</p>
                    </div>
                  </div>
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pitch-icon"> <i class="ion-cash"></i> </div>
                    <div class="pitch-content">
                      <h1>Guadagna</h1>
                      <p>In base a quanti passegggeri porti con te</p>
                    </div>
                  </div>
                </div>

              </div>
              <div class="review-single">
                <div class="pitch-intro">
                  <h1 class="wow fadeInDown" data-wow-delay="0.2s">Viaggia con hubCar</h1>
                  <p class="wow fadeInDown" data-wow-delay="0.2s"> Segui i seguenti passaggi, è semplice</p>
                </div>
                <div class="col-md-12">
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pitch-icon"> <i class="ion-ios-search"></i> </div>
                    <div class="pitch-content">
                      <h1>Cerca</h1>
                      <p>Fra tutti i viaggi disponibili, quello che ha la destinazione che desideri</p>
                    </div>
                  </div>
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pitch-icon"> <i class="ion-android-create"></i> </div>
                    <div class="pitch-content">
                      <h1>Prenota</h1>
                      <p>Il viaggio più adatto a te</p>
                    </div>
                  </div>
                  <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pitch-icon"> <i class="ion-android-car"></i> </div>
                    <div class="pitch-content">
                      <h1>Viaggia</h1>
                      <p>Nell'orario concordato e arriva alla tua destinazione facilmente </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <?php
      if(!isset($_SESSION["autista"])&&!isset($_SESSION["passeggero"]))
      
      {
        ?>
      <div id="register" class="pricing-section text-center">
        <div class="container">
          <div class="col-md-12 col-sm-12 nopadding">
            <div class="pricing-intro">
              <h1 class="wow fadeInUp" data-wow-delay="0s">Registrazione</h1>
              <p class="wow fadeInUp" data-wow-delay="0.2s"> Facile e sicuro, puoi registrati come Autista oppure come passeggero </p>
            </div>
            <div class="col-sm-6">
              <div class="table-left wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="icon" style=" padding-top: 0px; padding-bottom: 0px;"> <i class="ion-android-car"></i> </div>
                <div class="pricing-details">
                  <h2>Diventa Autista</h2>
                  <ul>
                    <li>Offri un passaggio</li>
                    <li>Guadagna</li>
                  </ul>
                  <a class="btn btn-primary btn-action btn-fill" href="driver/signup.php"  type="button">Autista</a>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="table-right wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="icon" style=" padding-top: 0px; padding-bottom: 0px;"> <i class="ion-ios-personadd-outline"></i> </div>
                <div class="pricing-details">
                  <h2>Viaggia come Passeggero</h2>
                  <ul>
                    <li>Cerca un viaggio e prenota</li>
                    <li>Viaggia </li>
                  </ul>
                  <button class="btn btn-primary btn-action btn-fill">Passeggero</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="login" class="pricing-section text-center">
        <div class="container">
          <div class="col-md-12 col-sm-12 nopadding">
            <div class="pricing-intro">
              <h1 class="wow fadeInUp" data-wow-delay="0s">Accedi</h1>
              <p class="wow fadeInUp" data-wow-delay="0.2s">Benvenuto, scegli il tipo di utente per accedere</p>
            </div>
            <div class="col-sm-6">
              <div class="table-left wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="icon" style=" padding-top: 0px; padding-bottom: 0px;"> <i class="ion-android-car"></i> </div>
                <div class="pricing-details">
                  <h2>Autista</h2>

                  <button class="btn btn-primary btn-action btn-fill">Autista</button>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="table-right wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="icon" style=" padding-top: 0px; padding-bottom: 0px;"> <i class="ion-ios-personadd-outline"></i> </div>
                <div class="pricing-details">
                  <h2>Passeggero</h2>
                  <button class="btn btn-primary btn-action btn-fill">Passeggero</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>

      <!-- Footer Section -->
      <div class="footer">
        <div class="container">
          <div class="col-md-12"> <img src="logo/logo.png" width="105" height="30" alt="Image" />
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
    <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script src="js/jquery.subscribe.js"></script>
  </body>

  </html>