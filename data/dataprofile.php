<?php
session_start();
//get dei dati dellutente dato l'id
	include ('conn.inc.php');
try{
  $dbh = new PDO($conn, $user, $pass);
  	
      if(isset($_SESSION['user'])&&isset($_SESSION['username']))
      {
        $jsondata=array();
        $username = $_SESSION['user'];
  	    $sql =$dbh->prepare("SELECT * FROM utente  WHERE idUtente=:user");
  	    $sql->bindValue(":user", $username);
	      $sql->execute();
  	    if ($sql->rowCount()>0) {
          while($row=$sql->fetch())
          {
  	          $jsondata['user']=$row;  
          }
         }
          $sql =$dbh->prepare("SELECT * FROM auto WHERE idAutista=:user");
  	    $sql->bindValue(":user", $username);
	      $sql->execute();
  	    if ($sql->rowCount()>0) {
           while($row=$sql->fetch())
          {
         
              
  	          $jsondata['user']['automobile'][]=$row;  
           }
  	         
  	    }
        else $jsondata['user']['automobile']="no";
       
        echo json_encode($jsondata);
  	     exit();
      }
     
  	
  }
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>