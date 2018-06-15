<?php
session_start();
if(!isset($_SESSION['user'])&&!isset($_SESSION['username']))
{
   header("location: ../user/signin");
}
include '../data/conn.inc.php';
try{
    $id=$_POST['idViaggio'];
     $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("DELETE FROM viaggio WHERE idViaggio=:id;");
        $stm->bindValue(":id",$id);

      if( $stm->execute())
      {
    
      header('location: offers?success=1');
      }
         else
         {
          
           header('location: offers?err=1');
         }
   } 
  catch (PDOException $e) 
  {
    
    header('location: offers?err=1');
  }

?>
