<?php
        session_start();
        include '../data/conn.inc.php';
        if(!isset($_SESSION['user']))
        {
        header('location: ../index.php');
        }
try{
 
         $dbh = new PDO($conn,$user,$pass);
        $password=$_POST['oldpassword'];
        $newpassword=$_POST['newpassword'];
        $id=$_SESSION['user'];
       $stm=$dbh->prepare("SELECT * FROM utente WHERE idUtente=:id AND password=MD5(:password);");
        $stm->bindValue(":password",$password);
        $stm->bindValue(":id",$id);
         $stm->execute();
           if($stm->rowCount()>0)
           {
               $sql=$dbh->prepare("UPDATE utente SET password=MD5(:newpassword) WHERE idUtente=:id AND password=MD5(:password);");
                $sql->bindValue(":newpassword",$newpassword);
                $sql->bindValue(":password",$password);
                $sql->bindValue(":id",$id);
                 if( $sql->execute())
                 {
                    session_destroy();
                   header('location: ../user/signin.php');
                 }
            }
      else{
       header('location: change.php?errore=1');
      }
}
catch (PDOException $e) {
    header('location: automobile.php?errore=2');
    
    
  }

?>