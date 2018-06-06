<?php 
session_start();
	include ('../data/conn.inc.php');
if(!isset($_SESSION['user']))
{
  header('location: ../user/signin.php');
}
try{

    $id=$_SESSION['user'];
     $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("DELETE FROM auto WHERE idAutista=:id;");
        $stm->bindValue(":id",$id);

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