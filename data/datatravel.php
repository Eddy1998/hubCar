<?php 
session_start();

	include ('conn.inc.php');
try{
  $dbh = new PDO($conn, $user, $pass);
  	//if (isset($_POST['FoundTravel'])) {
     //$arrivo=$_POST['arrivo'];
      //$partenza= $_POST['partenza'];
    $jsondata=array();
    $partenza="Firenze";
    $arrivo="Pisa";
  	$sql =$dbh->prepare("SELECT v.*, u.idUtente, u.cognome, u.nome, u.email, u.sesso, u.nazionalita, u.telefono, u.dataNascita, u.patente FROM viaggio v inner join utente u on u.idUtente=v.idAutista WHERE v.partenza=:partenza AND v.arrivo=:arrivo ORDER BY v.data ASC LIMIT 0,30;");
  	$sql->bindValue(":arrivo", $arrivo);
      $sql->bindValue(":partenza", $partenza);
	$sql->execute();
  	 if ($sql->rowCount()>0) {
       $jsondata['travel']=array();
          while($row=$sql->fetch())
          {
  	          $jsondata['travel'][]=$row;  
          }
  echo json_encode($jsondata);
         }
  else{
  	  echo 'not_found';
  	}
  	exit();
 // }

  } 
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>