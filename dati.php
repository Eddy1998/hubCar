<?php
include 'conn.inc.php';

  try{  
    
       $dbh = new PDO($conn,$user,$pass);
     $stm=$dbh->prepare("SELECT id_province,nome_province FROM province limit 50"); //preparazione Query da esguire
     $stm->execute();//esecuzione della query 
    if($stm->rowCount()>0)//se il risultato e' maggiore di 0
    { 
      $array = array();
      $array['dati'][]=$stm->fetchAll();
     $risultato=json_encode($array);
      echo $risultato;
     
    }
  }
catch(PDOException $e)
{
  echo "connection failed : " . $e->getMessage();
}
?>