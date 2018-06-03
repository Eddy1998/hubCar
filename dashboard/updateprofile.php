<?php
session_start();
 if(!isset($_SESSION['user']))
 { 
   header('location: ../index.php');
 }
  include ('../data/conn.inc.php');
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$nascita=$_POST['datanascita'];
$email=$_POST['email'];
$username=$_POST['username'];
$telefono=$_POST['telefono'];
$patente;
if (empty($_POST['patente'])){
  $patente =NULL;
}
else {
  $patente=$_POST['patente'];
}
$id=$_SESSION['user'];

try{
      $dbh = new PDO($conn,$user,$pass);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $query=$dbh->prepare("UPDATE utente SET cognome=:cognome, nome=:nome, email=:email, username=:username, telefono=:telefono, dataNascita=:datanascita,patente=:patente WHERE idUtente=:idUtente");
      $query->bindValue(":cognome",$cognome);
      $query->bindValue(":nome",$nome);
      $query->bindValue(":email",$email);
      $query->bindValue(":datanascita",$nascita);
      $query->bindValue(":username",$username);
      $query->bindValue(":telefono",$telefono);
      $query->bindValue(":patente",$patente);
   $query->bindValue(":idUtente",$id);
      if(!$query->execute())
      {
        header('location: profile.php?err=1');
      }
       else
       {
        
         header('location: profile.php?success=1',true);
       }   
  } 
  catch (PDOException $e) {
     header('location: profile.php?err=1');
   
  }




?>