<?php //inserimento dati di un viaggio dopo aver passato i controlli, si deve traformare i format delle date e ore
session_start();
	include ('../data/conn.inc.php');
if(!isset($_SESSION['user']))
{
  header('location: ../user/signin.php');
}
try{
      $rawdate = htmlentities($_POST['dataViaggio']);
      $date = date('Y-m-d', strtotime($rawdate));
      $partenza=$_POST['partenza'];
      $oraPartenza=$_POST['oraPartenza'];
      $arrivo=$_POST['arrivo'];
      $oraArrivo=$_POST['oraArrivo'];
      $passeggeri=$_POST['passeggeri'];
      $prezzo=$_POST['costo'];
      $idViaggio=$_POST['idViaggio'];
      
      
      $postiattuali=$_POST['postiattuali'];
      $macchina=$_POST['postomacchina'];
      $posti=$postiattuali-$macchina+$passeggeri;
    if (empty($_POST['commento'])){
      $commento =NULL;
    }
    else {
      $commento=$_POST['commento'];
   }
    $idAutista=$_SESSION['user'];
   echo $postidisponibili;
     $dbh = new PDO($conn,$user,$pass);
       $stm=$dbh->prepare("UPDATE viaggio SET data=:data,oraPartenza=:oraPartenza,oraArrivo=:oraArrivo,partenza=:partenza,arrivo=:arrivo,posti=:posti,postidisponibili=:postidisponibili,importo=:importo,commento=:commento WHERE idViaggio=:idViaggio AND idAutista=:idAutista");
        $stm->bindValue(":idAutista",$idAutista);
        $stm->bindValue(":idViaggio",$idViaggio);
        $stm->bindValue(":oraPartenza",$oraPartenza);
        $stm->bindValue(":oraArrivo",$oraArrivo);
        $stm->bindValue(":data",$date);
        $stm->bindValue(":partenza",$partenza);
        $stm->bindValue(":arrivo",$arrivo);
        $stm->bindValue(":posti",$posti);
        $stm->bindValue(":postidisponibili",$passeggeri);
        $stm->bindValue(":importo",$prezzo);
        $stm->bindValue(":commento",$commento);    
       if( $stm->execute())
      {
          header('location: offers.php?success=1');   
         }
         else
         {
          header('location: offers.php?err=1');
     
         }
   } 
  catch (PDOException $e) {
   header('location: offers.php?err=1');
    }
?>