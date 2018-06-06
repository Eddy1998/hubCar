<?php 
session_start();
	include ('../data/conn.inc.php');
try{
       
       if(isset($_POST['insertauto'])){

       $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("insert * FROM auot WHERE (email=:u||username=:u) AND password=MD5(:p);");
       $stm->bindValue(":u",$_POST['email']);
       $stm->bindValue(":p",$_POST['password']);
       $stm->execute();
      if($stm->rowCount()>0)
      { 
        $row=$stm->fetch();
       $_SESSION['user']=$row['idUtente'];
       
      header('location: ../index.php');
      }
         else
         {
           header('location: signin.php?err=1');
         }
       }
  
        if(isset($_POST['updateauto'])){

       $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("update * FROM auto WHERE (email=:u||username=:u) AND password=MD5(:p);");
       $stm->bindValue(":u",$_POST['email']);
       $stm->bindValue(":p",$_POST['password']);
       $stm->execute();
      if($stm->rowCount()>0)
      { 
        $row=$stm->fetch();
       $_SESSION['user']=$row['idUtente'];
       
      header('location: ../index.php');
      }
         else
         {
           header('location: signin.php?err=1');
         }
       }
  } 
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>