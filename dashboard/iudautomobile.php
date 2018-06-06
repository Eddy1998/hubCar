<?php 
session_start();
	include ('../data/conn.inc.php');
try{
       
       if(isset($_POST['insertauto']))
       {
          
       $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("insert insert into auto(targa,marca,modello,idAutista,anno) values (:targa,:marca,:modello,:idAutista,:anno);");
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
    if(isset($_POST['delete-car'])){
        $id = $_SESSION['user'];
       $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("DELETE FROM auto WHERE idAutista=:id;");
       $stm->bindValue(":id",$id);
       if($stm->execute())
       {
          echo "eseguito";
       }
         else
         {
           echo "errore-delete";
         }
       }
  } 
  catch (PDOException $e) {
    echo "errore-db";
    
  }
?>