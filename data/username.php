<?php //controllo dati se user o email nella tabella autista è già in uso
	include ('conn.inc.php');
try{
  $dbh = new PDO($conn, $user, $pass);
  	if (isset($_POST['username_check'])) {
  	$username = $_POST['username'];
  	$sql =$dbh->prepare("SELECT * FROM Autista WHERE username=:user");
  	$sql->bindValue(":user", $username);
	$sql->execute();
  	if ($sql->rowCount()>0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  }
	  if (isset($_POST['email_check'])) {
		$email = $_POST['email'];
		$sql =$dbh->prepare("SELECT * FROM Autista WHERE email=:email");
		$sql->bindValue(":email", $email);
		$sql->execute();
		if ($sql->rowCount()>0){
		  echo "taken";	
		}else{
		  echo 'not_taken';
		}
		exit();
	  }
  } 
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>