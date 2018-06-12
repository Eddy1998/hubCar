<?php 
session_start();
	include ('conn.inc.php');
try{
           $dbh = new PDO($conn, $user, $pass);
         if (isset($_POST['offers'])) 
         {
                   $partenzaT= $_POST['partenzaT'];
                  $arrivoT=$_POST['arrivoT'];
          //$arrivoT='Pisa';
                 // $partenzaT= 'Fireasze';
                  $jsondataT=array();
                  $sqlu =$dbh->prepare("SELECT v.*,DATE_FORMAT(v.data,  '%d/%m/%Y' ) AS dataviaggio, TIME_FORMAT( v.oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( v.oraArrivo,  '%H:%i' ) AS oArrivo,  u.idUtente, u.cognome, u.nome, u.email, u.sesso, u.nazionalita, u.telefono,u.dataNascita , u.patente FROM viaggio v inner join utente u on u.idUtente=v.idAutista WHERE v.partenza=:partenza AND v.arrivo=:arrivo ORDER BY  v.data, v.oraPartenza ASC;");
                  $sqlu->bindValue(":arrivo", $arrivoT);
                    $sqlu->bindValue(":partenza", $partenzaT);
                     $sqlu->execute();
                    if ($sqlu->rowCount()>0)
                    {

                        while($row=$sqlu->fetch())
                        {
                            $jsondataT[]=$row;  
                        }
                          echo json_encode($jsondataT);
                       }
                   else
                   {  
                        echo json_encode("not_found");
                   }
                    exit();
         }
       if (isset($_POST['offers_past'])) 
       {
              $arrivoA=$_POST['arrivo'];
              //$arrivoA='Pisa';

              $jsondata=array();
              $sqld =$dbh->prepare("SELECT v.*,DATE_FORMAT(v.data,  '%d/%m/%Y' ) AS dataviaggio, TIME_FORMAT( v.oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( v.oraArrivo,  '%H:%i' ) AS oArrivo,  u.idUtente, u.cognome, u.nome, u.email, u.sesso, u.nazionalita, u.telefono,u.dataNascita , u.patente FROM viaggio v inner join utente u on u.idUtente=v.idAutista WHERE v.arrivo=:arrivo ORDER BY  v.data, v.oraPartenza ASC;");
              $sqld->bindValue(":arrivo", $arrivoA);
                 $sqld->execute();
                if ($sqld->rowCount()>0)
                {
                   
                    while($row=$sqld->fetch())
                    {
                        $jsondata[]=$row;  
                    }
                      echo json_encode($jsondata);
                   }
               else
               {    
                     echo json_encode("not_found");
               }
                exit();
      }
     if (isset($_POST['public'])) {

                  $partenzaP= $_POST['partenza'];
         // $partenzaP='Pisa';

                  $jsondata=array();
                  $sql =$dbh->prepare("SELECT v.*,DATE_FORMAT(v.data,  '%d/%m/%Y' ) AS dataviaggio, TIME_FORMAT( v.oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( v.oraArrivo,  '%H:%i' ) AS oArrivo,  u.idUtente, u.cognome, u.nome, u.email, u.sesso, u.nazionalita, u.telefono,u.dataNascita , u.patente FROM viaggio v inner join utente u on u.idUtente=v.idAutista WHERE v.partenza=:partenza ORDER BY  v.data, v.oraPartenza ASC;");
                  $sql->bindValue(":partenza", $partenzaP);
                     $sql->execute();
                    if ($sql->rowCount()>0)
                    {

                        while($row=$sql->fetch())
                        {
                            $jsondata[]=$row;  
                        }
                           echo json_encode($jsondata);
                      }
                      else
                     {
                           echo json_encode("not_found");
                     }
                      exit();
        }
        if (isset($_POST['public_past'])) {

                      $partenzaP= $_POST['partenza'];
             // $partenzaP='Pisa';

                      $jsondata=array();
                      $sql =$dbh->prepare("SELECT v.*,DATE_FORMAT(v.data,  '%d/%m/%Y' ) AS dataviaggio, TIME_FORMAT( v.oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( v.oraArrivo,  '%H:%i' ) AS oArrivo,  u.idUtente, u.cognome, u.nome, u.email, u.sesso, u.nazionalita, u.telefono,u.dataNascita , u.patente FROM viaggio v inner join utente u on u.idUtente=v.idAutista WHERE v.partenza=:partenza ORDER BY  v.data, v.oraPartenza ASC;");
                      $sql->bindValue(":partenza", $partenzaP);
                         $sql->execute();
                        if ($sql->rowCount()>0)
                        {

                            while($row=$sql->fetch())
                            {
                                $jsondata[]=$row;  
                            }
                               echo json_encode($jsondata);
                          }
                          else
                         {
                               echo json_encode("not_found");
                         }
                          exit();
            }

  } 
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>