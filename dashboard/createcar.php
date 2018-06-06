<?php 
session_start();
	include ('../data/conn.inc.php');
if(!isset($_SESSION['user']))
{
  header('location: ../user/signin.php');
}
try{
  
    $targa=$_POST['targa'];
    $marca=$_POST['marca'];
    $modello=$_POST['modello'];
    $id=$_SESSION['user'];
    $anno=$_POST['anno'];
     $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("insert into auto(targa,marca,modello,idAutista,anno) values (:targa,:marca,:modello,:idAutista,:anno);");
        $stm->bindValue(":targa",$targa);
        $stm->bindValue(":marca",$marca);
        $stm->bindValue(":modello",$modello);
        $stm->bindValue(":idAutista",$id);
        $stm->bindValue(":anno",$anno);
    
      if( $stm->execute())
      {
     
      header('location: automobile.php?success=1');
      }
         else
         {
           header('location: automobile.php?err=1');
         }
  
  
  
  
   } 
  catch (PDOException $e) {
    header('location: automobile.php?err=1');
    
  }
?>