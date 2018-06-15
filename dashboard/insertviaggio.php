<?php
session_start();
 include '../data/conn.inc.php';
  $dbh = new PDO($conn, $user, $pass);
 date_default_timezone_set("Europe/Rome");
if(!isset($_SESSION['user']))
{
  header("location : ../user/signin");
}
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
    <script type="text/javascript" src="../js/control-insert-viaggio.js"></script>

    

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
              <h1 class="wow fadeInUp" data-wow-delay="0.1s">Crea un Viaggio </h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Client Section -->
      <div id="fh5co-contact" class="container">
        <form action="#" method="POST" name="modulo">
          <div class="app-features text-center" id="cerca">
            
            <div class="container">




              <div class="col-md-12 wow fadeInDown text-center features-left" data-wow-delay="0.2s">
                <div class="col-md-3 wow fadeInDown text-center" data-wow-delay="0.2s">
                    <div id="datamsg" class="feature-single">
                      <h1 class="lab" style="text-transform:none">Quando viaggi?</h1>
                      <input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="oggi">
                      <input id="dataViaggio" type="date" class="form-control" name="dataViaggio" min="<?php echo date("Y-m-d"); ?>" style="-webkit-appearance: none; font-family:sans-serif;">

                    </div>
                </div>
                <div class="col-md-6 wow fadeInDown text-center" data-wow-delay="0.2s">
                  <div class="col-md-12 wow fadeInDown text-center" data-wow-delay="0.2s">

                    <div class="col-md-7 wow fadeInDown text-center" data-wow-delay="0.2s">

                      <div id="partenzamsg" class="feature-single">
                        <h1 style="text-transform:none">Da dove parti?</h1>
                        <select name="partenza" class="form-control" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8; -webkit-appearance: none;">
                                <option ></option>
                                    <?php
                                    $stm=$dbh->prepare('SELECT * FROM province ORDER BY nome_province');
                                    $stm->execute();
                                     if($stm->rowCount()>0)
                                    {

                                      while($row= $stm->fetch())
                                      {
                                        ?>
                                          <option value="<?php echo $row['nome_province'] ?>"><?php echo $row['nome_province']?></option>
                                     <?php }
                                    } 
                                    ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-md-5 wow fadeInDown text-center" data-wow-delay="0.2s">

                      <div id="oraPartenzamsg" class="feature-single">
                        <h1 style="text-transform:none">A che ore?</h1>
                        <input id="oraPartenza" type="time" class="form-control" name="oraPartenza" value="" style="-webkit-appearance: none;">

                      </div>
                    </div>

                  </div>
                 
                  <div class="col-md-12 wow fadeInDown text-center" data-wow-delay="0.2s">

                    <div class="col-md-7 wow fadeInDown text-center" data-wow-delay="0.2s">

                      <div id="arrivomsg" class="feature-single">
                        <h1 style="text-transform:none">Dove vai?</h1>
                        <select name="arrivo" class="form-control" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8; -webkit-appearance: none;">
                                <option ></option>
                                    <?php
                                    $stm=$dbh->prepare('SELECT * FROM province ORDER BY nome_province');
                                    $stm->execute();
                                     if($stm->rowCount()>0)
                                    {

                                      while($row= $stm->fetch())
                                      {
                                        ?>
                                          <option value="<?php echo $row['nome_province'] ?>"><?php echo $row['nome_province']?></option>
                                     <?php }
                                    } 
                                    ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-md-5 wow fadeInDown text-center" data-wow-delay="0.2s">

                      <div id="oraArrivomsg" class="feature-single">
                        <h1 class="lab" style="text-transform:none;font-family:sans-serif">Ora stimata d'arrivo</h1>
                        <input id="oraArrivo" type="time" class="form-control" placeholder="bla" name="oraArrivo" value="" style="-webkit-appearance: none;">

                      </div>
                    </div>
                    <div class="col-md-3 wow fadeInDown text-center" data-wow-delay="0.2s">

                    </div>
                  </div>


                </div>
                <div class="col-md-3 wow fadeInDown text-center" data-wow-delay="0.2s">
                  
                  <div class="col-md-12 wow fadeInDown text-center feature-single" data-wow-delay="0.2s">
                    
                  <div id="numPasseggeri">
                    <h1 class="lab" style="text-transform:none">numero di passeggeri</h1>
                    <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s">
                    </div>
                    <div class="col-md-8 wow fadeInDown text-center" data-wow-delay="0.2s">
                      <select class="form-control" name="passeggeri" value="" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8; -webkit-appearance: none;">
                        <option></option>
                        <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                      </select>
                     
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
                        <input type="number" class="form-control" name="costo" value="" style="-webkit-appearance: none;" min="1">
                      </div>
                      <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s">
                      </div>

                  </div>
                  </div>
                  <div class="col-md-2 wow fadeInDown text-center" data-wow-delay="0.2s">

                  </div>


                </div>
              </div>


              <div class="col-md-12 wow fadeInDown text-center" data-wow-delay="0.2s">
                <div class="col-md-4 wow fadeInDown">
                </div>
                <div class="col-md-4 wow fadeInDown">
                  <div class="feature-single">
                    <h1 class="lab" style="text-transform:none">Lascia un commento per i passeggeri</h1>
                    <textarea placeholder="(Opzionale)" type="textarea" class="form-control" name="commento" value="" style="-webkit-appearance: none;resize: none;height: 200px;" rows="5" cols="10"></textarea>

                  </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                </div>

              </div>

              <div class="col-md-12 wow fadeInDown">
                <div class="col-md-4 wow fadeInDown" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">
                </div>
                <div class="col-md-4 features-left" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown; padding-top:0px;">
                  <div class="col-md-12 wow fadeInDown text-center" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">



                    <div class='col-md-5' style="padding-top: 32px;float:left;">
                      <div class='form-group text-center'>
                        <input type='button' value='Crea' onClick="Controllo()" class="btn btn-primary btn-action btn-fill" name="crea">
                      </div>
                    </div>
                    <div class='col-md-2'>

                    </div>
                    <div class='col-md-5' style="padding-top: 32px;float:left;float:right;">
                      <div class='form-group text-center heading-section'>

                        <div class='form-group'>
                          <input id="bottonedanger" type='button' value='Annulla' onClick="window.location.href='../index'" class="btn btn-danger btn-action btn-fill">
                        </div>


                      </div>

                    </div>

                  </div>
                </div>
                <div class="col-md-4 wow fadeInDown" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">
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