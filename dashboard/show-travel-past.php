<?php
session_start();
 include '../data/conn.inc.php';
  $dbh = new PDO($conn, $user, $pass);
 date_default_timezone_set("Europe/Rome");
/*if(!isset($_SESSION['user']))
{
  header("location : ../user/signin");
}*/
$id=$_REQUEST['idviaggio'];
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>hubCar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../logo/favicon.ico" type="image/png" sizes="16x16">




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
    <link rel="stylesheet" href="css/animate.css">
    <!-- Resource style -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <!-- Resource style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/show-travel.js"></script>
    



  </head>

  <body>
    <div class="container">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="#main"><img src="../logo/logo.png" width="115" height="30" alt="hubcarimg" /></a></div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a class="page-scroll" href="../index">Home</a></li>
              <li><a class="page-scroll" href="../foundtravel">Cerca</a></li>
              <li><a class="page-scroll" href="profile">Profilo</a></li>
              <li><a class="page-scroll" href="../user/signout">Sign Out</a></li>

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
              <h1 class="wow fadeInUp" data-wow-delay="0.1s">Il tuo viaggio</h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Client Section -->
      <div id="fh5co-contact" class="container">
        <form action="mod-travel" method="POST" name="modulo">
          <div class="app-features text-center" id="cerca">

            <div class="container">




              <div class="col-md-12 wow fadeInDown text-center features-left" data-wow-delay="0.2s">
                 <div class="col-md-9 wow fadeInDown text-center" data-wow-delay="0.2s">
                <div class="col-md-4 wow fadeInDown text-center" data-wow-delay="0.2s">
                  
                  <div id="datamsg" class="feature-single">
                    <input type='hidden' name='idViaggio' value="<?php echo $id;?>">
                    <h1 class="lab" style="text-transform:none">Data</h1>
                    <input id="data2" type="hidden" value="" name="data">
                    <h2 id="data"></h2>
                    
                  </div>
                   
                </div>
                  <div class="col-md-4 wow fadeInDown text-center" data-wow-delay="0.2s">
                     <div class="col-md-12 wow fadeInDown text-center" data-wow-delay="0.2s">

                    <div class="col-md-7 wow fadeInDown text-center" data-wow-delay="0.2s">

                      <div id="partenzamsg" class="feature-single">
                        <h1 style="text-transform:none">Luogo partenza</h1>
                        <h2 id="partenza"></h2>
                        <input id="partenza2" type="hidden" value="" name="partenza">
                      </div>
                    </div>
                    <div class="col-md-5 wow fadeInDown text-center" data-wow-delay="0.2s">

                      <div id="oraPartenzamsg" class="feature-single">
                        <h1 style="text-transform:none">Ora partenza</h1>
                        <h2 id="oraPartenza"></h2>
                        <input id="oraPartenza2" type="hidden" value="" name="oraPartenza">
                      </div>
                    </div>

                  </div>

                  <div class="col-md-12 wow fadeInDown text-center" data-wow-delay="0.2s">

                    <div class="col-md-7 wow fadeInDown text-center" data-wow-delay="0.2s">

                      <div id="arrivomsg" class="feature-single">
                        <h1 style="text-transform:none">Luogo d'arrivo</h1>
                        <h2 id="arrivo"></h2>
                        <input id="arrivo2" name="arrivo" type="hidden" value="">
                      </div>
                    </div>
                    <div class="col-md-5 wow fadeInDown text-center" data-wow-delay="0.2s">

                      <div id="oraArrivomsg" class="feature-single">
                        <h1 class="lab" style="text-transform:none;">Ora stimata d'arrivo</h1>
                        <h2 id="oraArrivo"> </h2>
                        <input id="oraArrivo2" name="oraArrivo" type="hidden" value="">
                      </div>
                    </div>
                    <div class="col-md-3 wow fadeInDown text-center" data-wow-delay="0.2s">

                    </div>
                  </div>
                </div>
                <div class="col-md-4 wow fadeInDown text-center" data-wow-delay="0.2s">
                      <div class="col-md-12 wow fadeInDown text-center feature-single" data-wow-delay="0.2s">

                    <div id="numPasseggeri">
                      <h1 class="lab" style="text-transform:none">Posti disponibili</h1>
                      <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s">
                      </div>
                      <div class="col-md-8 wow fadeInDown text-center" data-wow-delay="0.2s">
                        <h2 id="passeggeri"></h2>
                        <input id="passeggeri2" type="hidden" class="form-control" name="passeggeri" value="" min="1">
                      </div>
                      <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 wow fadeInDown text-center" data-wow-delay="0.2s">


                    <div id="costo" class="feature-single">
                      <h1 class="lab" style="text-transform:none">Costo per passeggero - €</h1>
                      <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s">
                      </div>
                      <div class="col-md-8 wow fadeInDown text-center" data-wow-delay="0.2s">
                        <h2 id="importo"></h2>
                        <input id="importo2" type="hidden" class="form-control" name="costo" value="" min="1">
                      </div>
                      <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s">
                      </div>

                    </div>
                  </div>
                  <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s">

                  </div>

          

                </div>
                
                 <div class="col-md-12 wow fadeInDown text-center" data-wow-delay="0.2s">
                <div class="col-md-4 wow fadeInDown">
                </div>
                <div class="col-md-4 wow fadeInDown">
                  <div class="feature-single">
                    <h1 class="lab" style="text-transform:none;">Commento per i passeggeri</h1>

                    <textarea id="commento" type="textarea" class="form-control" name="commento" value="" style="-webkit-appearance: none;resize: none;height: 100px;background-color: white;" rows="5" cols="10" readonly></textarea>

                  </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                </div>
                

              </div>
                </div>
                <div class="col-md-3 wow fadeInDown text-center" data-wow-delay="0.2s">
                   <div class="feature-single">
                    <h1>Conducente</h1>
                   <div class="feature-single">
                     <h2 id="nome"></h2>
                  </div>
                       <div class="feature-single">
                       <h1  class="lab" style="text-transform:none">Utente dal</h1>
                          <h2 id="dataregistrazione"></h2>   
                  </div>
                  </div>
                   <div class="feature-single">
                    <h1>Automobile</h1>
                   <div class="feature-single">
                     <h2 id="auto" > </h2>
                  </div>
                       
                         
                  </div>
                  </div>
                </div>
               
              </div>
              <div id="compagni" class="col-md-12 wow fadeInDown text-center features-left" data-wow-delay="0.2s" >
                <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s" >
                </div>
                  <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s" >
                    <div class="feature-single">
                      <h1 style='color:#1eb858'>Conducente</h1>
                      <div class="feature-single">
                       <h2 id="conducente"></h2>
                      </div>
                    </div>
                  </div>

              </div>


              

              
            
            </div>
          </div>
        </form>

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