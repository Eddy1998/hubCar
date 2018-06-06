<?php
session_start();
/*if(!isset($_SESSION['user']))
{
  header("location : ../index.php");
}*/


?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>hubCar - Profilo</title>
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



    <script type="text/javascript" src="../js/dataautomobile.js"></script>

  </head>

  <body>
    <div class="wrapper">
      <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand page-scroll" href="#main"><img src="../logo/logo.png" width="115" height="30" alt="hubcarimg" /></a>Automobile </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a class="page-scroll" href="../index.php">Home</a></li>
                <li><a class="page-scroll" href="../foundtravel.php">Cerca</a></li>
                <li><a class="page-scroll" href="#funzione">Aggiungi viaggio</a></li>
                <li><a class="page-scroll" href="#funzione">Password</a></li>
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

                <h1 class="wow fadeInUp" data-wow-delay="0.1s" id="profilo">Automobile di </h1>
                <p>
                  Puoi aggiungere solo un'automobile, puoi modificarlo in futuro
                </p>
                <?php if(@$_GET['success']==1)
            {?>
                <h2 id="true" style="color:green" class="wow fadeInUp" data-wow-delay="0.1s">
                  Operazione eseguita con successo
                </h2>
                 <script>setTimeout(function() { $("#true").hide(); }, 5000);</script>
           <?php }?>
             <?php if(@$_GET['err']==1)
            {?>
                <h2 id="false" style="color:red" class="wow fadeInUp" data-wow-delay="0.1s">
                  Errore durante l'operazione
                </h2>
                 <script>setTimeout(function() { $("#false").hide(); }, 5000);</script>
           <?php }?>
               
                
              </div>
            </div>
          </div>
        </div>

        <!-- Client Section -->
        <div id="fh5co-contact" class="container">
          <form action="#" method="POST" name="modulo">
            <div class="app-features text-center" id="cerca">
              <div class="container" id="auto">
                
                   <div class="col-md-12 features-left" data-wow-delay="0.5s" style="padding-top: 0px;">
                     <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                        
                     </div>
                              
                      <div id="bottoni" class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                        <div class="col-md-12">
                           <div id="add-car" class="pitch-icon" ><a><i class="ion-android-add" ></i></a> </div>
                        </div>
                       <div class="col-md-6">
                           <div id="insert-auto" class="pitch-icon" ><a ><i class="ion-ios-checkmark-empty" ></i></a> </div>
                        </div>
                        <div class="col-md-6">
                           <div id="cancel-add" class="pitch-icon" style="background:#d9534f;" ><a ><i class="ion-ios-close-empty" ></i></a> </div>
                        </div>
                     </div>
                      <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                       
                     </div>
                     

                     
                </div>

                <div id="autodata" class="col-md-12 features-left" data-wow-delay="0.5s" style="padding-top: 0px;">
                  <hr>
                 
                  <div class="col-md-3 wow fadeInDown" data-wow-delay="0.2s">


                    <div id="marcamsg" class="feature-single">
                      <h1 class="lab">Marca:</h1>
                      <input id="marca" type="text" class="form-control" name="marca" value="">
                      <p id="pmarca" style="font-size: 25px;"></p>
                    </div>

                  </div>

                  <div class="col-md-3 wow fadeInDown" data-wow-delay="0.2s">


                    <div id="modellomsg" class="feature-single">
                      <h1 class="lab">Modello:</h1>
                      <input id="modello" type="text" class="form-control" name="modello" value="">
                        <p id="pmodello" style="font-size: 25px;"></p>
                       
                    </div>

                  </div>
                  <div class="col-md-3 wow fadeInDown" data-wow-delay="0.2s">


                    <div id="annomsg" class="feature-single">
                      <h1 class="lab">Anno:</h1>
                      <input id="anno" type="text" class="form-control" name="anno" value="" >
                         <p id="panno" style="font-size: 25px;"></p>
                    </div>

                  </div>
                  <div class="col-md-3 wow fadeInDown" data-wow-delay="0.2s">


                    <div id="targamsg" class="feature-single">
                      <h1 class="lab">Targa:</h1>
                      <input id="targa" type="text" class="form-control" name="targa" value="" >
                        <p id="ptarga" style="font-size: 25px;"></p>
                    </div>
                    <div class="feature-single">
                      <div class="row">

                       <div id="config-option" class="col-md-12">
                          <div>
                             <div id="config-car" class="pitch-icon"><a><i class="ion-android-settings"></i></a> </div>
                          </div>
                         
                         
                        </div>
                        
                           <div  class="col-md-4">
                            <div id="update-car" class="pitch-icon" ><a ><i class="ion-ios-checkmark-empty" ></i></a> </div>
                        </div>
                        <div  class="col-md-4">
                            <div id="cancel-update" class="pitch-icon" style="background:#d9534f;"><a ><i class="ion-ios-close-empty" ></i></a> </div>
                        </div>
                           

                        <div  class="col-md-4">
                          <div name="delete-car" id="delete-car" class="pitch-icon" style="background:#d9534f;"><a><i class="ion-trash-b" ></i></a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
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