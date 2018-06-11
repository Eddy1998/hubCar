<?php
session_start();
include '../data/conn.inc.php';
if(isset($_SESSION['user']))
{
header('location: ../index.php');
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>hubCar - Sign Up</title>
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
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,500,600,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Resource style -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <!-- Resource style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/controluser.js"></script>
    <script type="text/javascript" src="../js/jquery.YIWpasswordStrongTester.js"></script>


    <style>
      #result {
        border: 1px solid black;
        padding: 2px;
        width: auto;
        height: 8px;
        margin-top:10px;
      }
      .radius {
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
      }
    </style>
  </head>

  <body>
    <div class="wrapper" style="width: auto;">
      <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand page-scroll" href="../index.php"><img src="../logo/logo.png" width="135" height="30" alt="hubCar" /></a></div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a class="page-scroll" href="../index.php">Home</a></li>
                <li><a class="page-scroll" href="../index.php">Aggiungi un viaggio</a></li>
                <li><a class="page-scroll" href="../foundtravel.php">Cerca</a></li>
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
                <h1 class="wow fadeInUp" data-wow-delay="0.1s">Modulo di registrazione</h1>
                <p class="wow fadeInUp" data-wow-delay="0.2s"> Compila i campi con i dati richiesti</p>

              </div>
            </div>
          </div>
        </div>

        <!-- Client Section -->

        <div class="app-features" id="cerca">



          <div id="fh5co-contact" class="container">

            <div class="col-md-4 features-left">

            </div>
            <div class="col-md-4 features-left">
              <form method="POST" name="modulo">
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="nome">
                      <legend>
                        <h1>Nome *</h1>
                      </legend>
                      <input autocomplete="given-name" type="text" class="form-control" placeholder="Nome" name="nome">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="cognome">
                      <legend>
                        <h1>Cognome *</h1>
                      </legend>
                      <input autocomplete="family-name" type="text" class="form-control" placeholder="Cognome" name="cognome">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="nascita">
                      <legend>
                        <h1>Data di Nascita *</h1>
                      </legend>
                      <input type="text" class="form-control" placeholder="gg/mm/aaaa" maxlength="10" name="nascita">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="sesso">
                      <legend>
                        <h1>Sono *</h1>
                      </legend>
                      <div class="row  text-center">
                        <div class="col-md-3" style="float:left">


                        </div>
                        <div class="col-md-3" style="float:left;">

                          <input type="radio" name="sesso" value="Maschile" checked="checked">
                          <p>Uomo</p>


                        </div>
                        <div class="col-md-3" style="float:right;">


                          <input type="radio" name="sesso" value="Femminile">
                          <p>Donna</p>

                        </div>
                        <div class="col-md-3" style="float:right;">

                        </div>
                      </div>
                     
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="nazionalita">
                      <legend>
                        <h1>Nazionalità *</h1>
                      </legend>
                      <select autocomplete="country-name" class="form-control" name="nazionalita" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;-webkit-appearance: none;">
                      <option></option>
                    <?php 
                          $dbh = new PDO($conn,$user,$pass);
                          $stm=$dbh->prepare('SELECT nome_stati FROM stati');
                          $stm->execute();
                          while ($row=$stm->fetch()) {
                              echo "<option value='".$row['nome_stati']."'>" . $row['nome_stati'] ."</option>";
                          }
                        
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="email">
                      <legend>
                        <h1>email *</h1>
                      </legend>
                      <input id="controlemail" autocomplete="email" type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="username">
                      <legend>
                        <h1>Username *</h1>
                      </legend>
                      <input id="controllouser" autocomplete="username" type="text" class="form-control" placeholder="Username" name="user">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">

                  <div class="feature-single">

                    <div class="form-group" id="senha">
                      <legend>
                        <h1>Password *</h1>
                      </legend>
                  

                      <input id="password" autocomplete="new-password" type="password" class="form-control" placeholder="Password" name="password" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;" onpaste="return false" oncut="return false" oncopy="return false">
                       <div id="result" class="radius">
                      <div id="bar" class="radius"></div>
                    </div>
                      <p>
                        Utilizza lettere maiuscole e minuscole, numeri e caratteri speciali come punti(.) o trattimi(- e _).
                      </p>

                    </div>

                   

                  </div>

                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInDown;">

                  <div class="feature-single form-group" id="confsenha">

                    <legend>
                      <h1>Conferma Password *</h1>
                    </legend>
                    <input autocomplete="new-password" type="password" class="form-control" placeholder="Conferma Password" name="conferma" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;" onpaste="return false" oncut="return false" oncopy="return false">

                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">

                  <div class="feature-single form-group" id="telefono">

                    <legend>
                      <h1> Telefono *</h1>
                    </legend>
                    <input class="form-control" autocomplete="tel-national" type="number" placeholder="Num. di Telefono" name="telefono" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;">
                  </div>

                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">
                  <div class="feature-single form-group">
                    <div class='col-md-5'>
                      <div class='form-group text-center'>
                        <input type='button' value='Registra' onClick="Modulo()" class="btn btn-primary btn-action btn-fill">
                      </div>
                    </div>
                    <div class='col-md-2'>
                    </div>
                    <div class='col-md-5'>
                      <div class='form-group text-center heading-section'>
                        <div class='form-group'>
                          <input id="bottonedanger" type='button' value='Annulla' onClick="window.location.href='../index.php'" class="btn btn-danger btn-action btn-fill">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-4 features-left">
            </div>
          </div>
        </div>
        <!-- Footer Section -->       
        <a id="back-top" class="back-to-top page-scroll" href="#main"> <i class="ion-ios-arrow-thin-up"></i> </a>
      </div>
      <!-- Main Section -->
    </div>
    <!-- Wrapper-->
    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/plugins.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <!-- Bootstrap -->
    </body>
  </html>