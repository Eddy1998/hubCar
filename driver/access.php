<?php 
session_start();
	include ('../data/conn.inc.php');
try{
      echo "ciaso23123";
       if(isset($_POST['logindriver'])){
      echo "ciao";
       $data = new PDO($conn,$user,$pass);
       $stm=$data->prepare("SELECT * FROM Autista WHERE (email=:u||username=:u) AND password=MD5(:p);");
       $stm->bindValue(":u",$_POST['email']);
       $stm->bindValue(":p",$_POST['password']);
       $stm->execute();
      if($stm->rowCount()>0)
      { 
        $row=$stm->fetch();
       $_SESSION['driver']=$row['idAutista'];
      header('location: ../index.php');
      }
         else
         {
           header('location: signin.php?err=1');
         }
       }
  } 
  catch (PDOException $e) 
  {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>