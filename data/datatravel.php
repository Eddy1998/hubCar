<?php //controllo dati se user o email nella tabella autista è già in uso
	include ('conn.inc.php');
try{
  $dbh = new PDO($conn, $user, $pass);
  	if (isset($_POST['FoundTravel'])) {
     $arrivo=$_POST['arrivo'];
      $partenza= $_POST['partenza'];
  	$sql =$dbh->prepare("SELECT * FROM Viaggio WHERE partenza=:partenza AND arrivo=:arrivo");
  	$sql->bindValue(":arrivo", $arrivo);
      $sql->bindValue(":partenza", $partenza);
	$sql->execute();
  	if ($sql->rowCount()>0) {
  	  $dati = $sql->fetchAll();
      echo json_encode($dati);
  	}else{
  	  echo 'not_found';
  	}
  	exit();
  }

  } 
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>