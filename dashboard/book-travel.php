<?php 
session_start();
	include ('../data/conn.inc.php');
if(!isset($_SESSION['user']))
{
  header('location: ../user/signin.php');
}
try{
     $idViaggio=$_POST['idViaggio'];
    $idUtente=$_SESSION['user'];
  $posti=$_POST['posti'];
   
     $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("INSERT INTO prenotazione (idUtente,idViaggio,posti) VALUES(:id,:idViaggio,:posti)");
        $stm->bindValue(":id",$idUtente);
        $stm->bindValue(":idViaggio",$idViaggio);
        $stm->bindValue(":posti",$posti);
        
    
       if( $stm->execute())
      {
         $sql=$dbh->prepare("SELECT postidisponibili from viaggio WHERE idViaggio=:idViaggio");          
        $sql->bindValue(":idViaggio",$idViaggio);
        if($sql->execute())
        {
          $row=$sql->fetch();
          
          $nuovo=$row['postidisponibili']-$posti;
         
          $query=$dbh->prepare("UPDATE viaggio SET postidisponibili=:nuovo WHERE idViaggio=:idViaggio");          
          $query->bindValue(":nuovo",$nuovo);
           $query->bindValue(":idViaggio",$idViaggio);
          if($query->execute())
          {
            header('location: book?success=1');
          }
        }
      }
         else
         {
          header('location: book?err=1');
         }
  
  
  
  
   } 
  catch (PDOException $e) {
   header('location: book?err=1');
    
    
  }
?>