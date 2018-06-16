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
        $stm=$dbh->prepare("SELECT posti,idPrenotazione FROM prenotazione WHERE idViaggio=:id;");
        $stm->bindValue(":id",$id);

      if( $stm->execute())
      {
          $row=$stm->fetch();
           $add=$row['posti'];
           $idprenotazione=$row['idPrenotazione'];
           $sql=$dbh->prepare("DELETE FROM prenotazione WHERE idViaggio=:id AND idPrenotazione=:idpre");
           $sql->bindValue(":id",$id);
            $sql->bindValue(":idpre",$idprenotazione);
            if($sql->execute())
            {
              $sq=$dbh->prepare("UPDATE viaggio SET postidisponibili = postidisponibili + :mas WHERE idViaggio=:idViaggio");
           $sq->bindValue(":idViaggio",$id);
            $sq->bindValue(":mas",$add);
              if($sq->execute())
              {
                header('location: book?success=1');
              }
            }
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
