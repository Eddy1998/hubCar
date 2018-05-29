<?php 
session_start();
 if(isset($_SESSION['user'])||isset($_SESSION['driver']))
 { 
   header('location: ../index.php');
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>hubCar - esito</title>
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
</head>
  <body>
  <div class="wrapper" >
    <div class="container">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="../index.php"><img src="../logo/logo.png" width="115" height="30" alt="hubcarlogo"></a>Passeggero </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a class="page-scroll" href="../index.php">Home</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->

    <div class="main app form" id="main">

<?php
  include ('../data/conn.inc.php');
 
  
      $nome=$_REQUEST["nome"];
    $cognome=$_REQUEST["cognome"];
    $nascita=$_REQUEST["nascita"];
    $nazionalita=$_REQUEST["nazionalita"];
    $email=$_REQUEST["email"];
    $username=$_REQUEST["user"];
    $password=$_REQUEST["password"];
    $telefono=$_REQUEST["telefono"];
    $sesso=$_REQUEST['sesso'];
  

  try{
      $dbh = new PDO($conn,$user,$pass);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $query=$dbh->prepare("INSERT INTO Passeggero(cognome,nome,email,username,password,telefono,dataNascita,sesso,nazionalita) VALUES(:cognome,:nome,:email,:username,MD5(:password),:telefono,:dataNascita,:sesso,:nazionalita)");
      $query->bindValue(":cognome",$cognome);
      $query->bindValue(":nome",$nome);
      $query->bindValue(":email",$email);
      $query->bindValue(":username",$username);
      $query->bindValue(":password",$password);
      $query->bindValue(":telefono",$telefono);
      $query->bindValue(":dataNascita",$nascita);
      $query->bindValue(":sesso",$sesso); 
      $query->bindValue(":nazionalita",$nazionalita);
      if(!$query->execute())
      {
        ?>
        <div class="hero-section">
        <div class="container nopadding" >

          <div class="col-md-12">
            <div class="hero-content text-center" style="padding-top: 100px;padding-bottom: 0px;">
              <h1 class="wow fadeInUp" data-wow-delay="0.1s">Qualcosa &#232; andato storto, riprova fra poco</h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Client Section -->

<div class="review-section" style="padding-top: 0px; padding-bottom: 0px;">
          <div class="container">
            <div class="col-md-10 col-md-offset-1">
              <div class="reviews owl-carousel owl-theme">
                <div class="review-single">

                  <div class="pitch-intro">
                     <h3 class="wow fadeInUp">
                       Grazie della pazienza
                    </h3>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-6 wow fadeInDown" data-wow-delay="0.2s">
                      <div class="pitch-icon"><a href="signup.php"><i class="ion-android-create"></i></a>  </div>
                      <div class="pitch-content">
                        <h1>Registrazione</h1>
                      
                      </div>
                    </div>
                    <div class="col-md-6 wow fadeInDown" data-wow-delay="0.2s">
                      <div class="pitch-icon"> <a href="../index.php"><i class="ion-home"></i> </a></div>
                      <div class="pitch-content">
                        <h1>Home</h1>
                        
                      </div>
                    </div>
                    
                  </div>

                </div>
                
              </div>
            </div>
          </div>
        </div>
      <?php 
      }        
      else { ?>
 


      <!-- Main Section-->
      <div class="hero-section">
        <div class="container nopadding" >

          <div class="col-md-12">
            <div class="hero-content text-center" style="padding-top: 100px;padding-bottom: 0px;">
              <h1 class="wow fadeInUp" data-wow-delay="0.1s">Grazie per la tua registrazione</h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Client Section -->

<div class="review-section" style="padding-top: 0px; padding-bottom: 0px;">
          <div class="container">
            <div class="col-md-10 col-md-offset-1">
              <div class="reviews owl-carousel owl-theme">
                <div class="review-single">

                  <div class="pitch-intro">
                     <h3 class="wow fadeInUp">
                       Ora puoi accedere al tuo account
                    </h3>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-6 wow fadeInDown" data-wow-delay="0.2s">
                      <div class="pitch-icon"><a href="signin.php"><i class="ion-key"></i></a>  </div>
                      <div class="pitch-content">
                        <h1>Signin</h1>
                      
                      </div>
                    </div>
                    <div class="col-md-6 wow fadeInDown" data-wow-delay="0.2s">
                      <div class="pitch-icon"> <a href="../index.php"><i class="ion-home"></i> </a></div>
                      <div class="pitch-content">
                        <h1>Home</h1>
                        
                      </div>
                    </div>
                    
                  </div>

                </div>
                
              </div>
            </div>
          </div>
        </div>

<?php } ?>
        
      <!-- Footer Section -->
      <div class="footer">
        <div class="container">
          <div class="col-md-12"> <img src="../logo/logo.png" width="125" height="28" alt="Image">
            <div class="footer-text">
              <p> Copyright © 2018 hubCar Tutti i diritti riservati.</p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Scroll To Top -->



    <!-- Scroll To Top Ends-->

  </div>


  <!-- Jquery and Js Plugins -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../js/plugins.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
  <script type="text/javascript" src="../js/custom.js"></script>
</body>

<?php
        
        
     
  } 
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
  ?>

</html>