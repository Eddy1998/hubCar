<?php
session_start();
include 'conn.inc.php';
if(isset($_SESSION['driver'])||isset($_SESSION['user']))
header('location: index.php');
?>
<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>hubcar - Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	

  

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
    <script type="text/javascript" src="js/controldriver.js"></script>
   	<script type="text/javascript" src="js/jquery.YIWpasswordStrongTester.js"></script>
  

    <style>
      #result {
        border: 1px solid black;
        padding: 2px;
        width: auto;
        height: 8px;
      }

      .radius {
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
      }
    </style>
  </head>

  <body>
    <div class="wrapper" style= "width: auto;">
      <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand page-scroll" href="#main"><img src="logo/logo.png" width="135" height="30" alt="iLand" /></a> </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a class="page-scroll" href="#main">Home</a></li>
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
			  <div class="col-md-12 wow fadeInDown"  style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="nome">
						<legend>
                        <h1>Nome</h1>
						</legend>
                      <input autocomplete="given-name" type="text" class="form-control" placeholder="Nome" name="nome">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown"  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="cognome">
                      <legend>
                        <h1>Cognome*:</h1>
                      </legend>
                      <input autocomplete="family-name" type="text" class="form-control" placeholder="Cognome" name="cognome">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown"  style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="nascita">
                      <legend>
                        <h1>Data di Nascita*:</h1>
                      </legend>
                      <input type="text" class="form-control" placeholder="gg/mm/aaaa" maxlength="10" name="nascita">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown"  style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="sesso">
                      <legend><h1>Sesso*:</h1></legend>
					  <div class="row  text-center">
					  <div class="col-md-6">
                      <input type="radio" name="sesso" value="M" checked="checked"> <p>Maschile</p> 
					  </div>
					  <div class="col-md-6">
					  <input type="radio" name="sesso" value="F"> <p>Femminile</p>
                     </div>
						</div>
					</div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown"  style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="nazionalita">
                      <legend><h1>Nazionalità*:</h1></legend>
                      <select autocomplete="country-name" class="form-control" name="nazionalita" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;">
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
                        <h1>email*:</h1>
                      </legend>
                      <input autocomplete="email" type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown"  style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="username">
                      <legend>
                        <h1>Username*:</h1>
                      </legend>
                      <input autocomplete="username" type="text" class="form-control" placeholder="Username" name="user">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    
                      <div class="form-group" id="senha">
                        
                          <h1>Password:</h1>
                       
                        <input id="password" autocomplete="new-password" type="password" class="form-control" placeholder="Password" name="password" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;">
                      </div>

                      <div id="result" class="radius">
                        <div id="bar" class="radius"></div>
                      </div>

                    </div>
                  
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInDown;">

                  <div class="feature-single form-group" id="confsenha">
                    
                      <legend>
                        <h1>Conferma Password:</h1>
                      </legend>
                      <input autocomplete="new-password" type="password" class="form-control" placeholder="Conferma Password" name="conferma" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;">
                   
                  </div>
                </div>
				<div class="col-md-12 wow fadeInDown"  style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">

                  <div class="feature-single form-group" id="telefono">
                    
                      <legend>
                       <h1> Numero di telefono:</h1>
                      </legend>
                      <input class="form-control" autocomplete="tel-national" type="number" placeholder="Num. di Telefono" name="telefono" style="font-family: 'Open Sans', sans-serif;background: #F8F8F8;">
                    </div>
                  
                </div>
                <div class="col-md-12 wow fadeInDown" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="patente">
                      <legend>
                       <h1> Patente:</h1>
                      </legend>
                      <input type="text" class="form-control" placeholder="Num. della Patente" maxlength="10" name="patente">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 wow fadeInDown"  style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">

                  <div class="feature-single">
                    <div class="form-group" id="scadenza">
                      <legend><h1>Scadenza della Patente:</h1></legend>
                      <input type="text" class="form-control" placeholder="gg/mm/aaaa" name="scadenzaPatente">
                    </div>
                  </div>
                </div>
				<div class="col-md-12 wow fadeInDown" 	 style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">

                  <div class="feature-single form-group" id="scadenza">
                    
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
                    <input type='reset' value='Annulla' href="index.php" class=" btn-action btn-fill" style="color:#fff;background-color:#d9534f;border-color:#d43f3a; border-radius: 4px;">
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
          <div class="footer">
            <div class="container">
              <div class="col-md-12"> <img src="logo/logo.png" width="125" height="28" alt="Image" />
                <div class="footer-text">
                  <p> Copyright © 2018 hubCar Tutti i diritti riservati.</p>
                </div>
              </div>

            </div>
          </div>
        

  

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