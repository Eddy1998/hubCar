<?php 
session_start();
date_default_timezone_set("Europe/Rome");


	include ('conn.inc.php');
try{
           $dbh = new PDO($conn, $user, $pass);
       if (isset($_POST['offers'])) 
        {
              
                  $jsondataT=array();

                  $data=date("Y-m-d");
                  $sqlu =$dbh->prepare("SELECT *,DATE_FORMAT(data,  '%d-%m-%Y' ) AS dataviaggio, TIME_FORMAT(oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( oraArrivo,  '%H:%i' ) AS oArrivo from viaggio where idAutista=:idAutista AND data>:data ORDER BY data, oraPartenza ASC");
                
                   $sqlu->bindValue(":idAutista", $_SESSION['user']); 
                    $sqlu->bindValue(":data", $data);
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
             
                  $jsondataT=array();

                  $data=date("Y-m-d");
                  $sqlu =$dbh->prepare("SELECT *, DATE_FORMAT(data,  '%d/%m/%Y' ) AS dataviaggio, TIME_FORMAT(oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( oraArrivo,  '%H:%i' ) AS oArrivo from viaggio where idAutista=:idAutista AND data<:data  ORDER BY data, oraPartenza DESC");
                 // $sqlu->bindValue(":arrivo", $arrivoT);
                  //  $sqlu->bindValue(":partenza", $partenzaT);
                   $sqlu->bindValue(":idAutista", $_SESSION['user']); 
                    $sqlu->bindValue(":data", $data);
                     $sqlu->execute();
                    if ($sqlu->rowCount()>0)
                    { 
                        while($row=$sqlu->fetch())
                        {   

                            $jsondataT[]=$row;
                             echo json_encode($jsondataT);
                        }                         
                    }
                   else
                   {  
                        echo json_encode("not_found");
                   }
                    exit();
                  
      }
     if (isset($_POST['pass_in_travel'])) {
                  $vi=$_POST['viaggio'];
                   
                  $jsondata=array();
                  $sql =$dbh->prepare("SELECT u.idUtente, u.cognome, u.nome, u.email, u.sesso, u.nazionalita, u.telefono,u.dataNascita  FROM utente u inner join prenotazione p on u.idUtente=p.idUtente inner join viaggio v on v.idViaggio=p.idViaggio  WHERE v.idViaggio=:idViaggio");
                  $sql->bindValue(":idViaggio", $vi);
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
       if (isset($_POST['book'])) {
                    
                     
                       $data=date("Y-m-d");

                      $jsondata=array();
                      $sql =$dbh->prepare("SELECT v.*,DATE_FORMAT(v.data,  '%d/%m/%Y' ) AS dataviaggio, TIME_FORMAT( v.oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( v.oraArrivo,  '%H:%i' ) AS oArrivo from utente u inner join prenotazione p on p.idUtente=u.idUtente inner join viaggio v on v.idViaggio=p.idViaggio WHERE u.idUtente=:id AND v.data>:data  ORDER BY data, oraPartenza ASC");
                      $sql->bindValue(":id", $_SESSION['user']);
                       $sql->bindValue(":data", $data);
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
            
               if (isset($_POST['book_past'])) {

                       $data=date("Y-m-d");

                      $jsondata=array();
                      $sql =$dbh->prepare("SELECT v.*,DATE_FORMAT(v.data,  '%d/%m/%Y' ) AS dataviaggio, TIME_FORMAT( v.oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( v.oraArrivo,  '%H:%i' ) AS oArrivo from utente u inner join prenotazione p on p.idUtente=u.idUtente inner join viaggio v on v.idViaggio=p.idViaggio WHERE u.idUtente=:id AND v.data<:data  ORDER BY data, oraPartenza DESC");
                      $sql->bindValue(":id", $_SESSION['user']);
                       $sql->bindValue(":data", $data);
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
         if (isset($_POST['travel_data'])) 
         {
                  $vi=$_POST['idViaggio'];

                  $jsondata=array();

                  $data=date("Y-m-d");
                  $sqlu =$dbh->prepare("SELECT v.*,DATE_FORMAT(v.data,  '%d-%m-%Y' ) AS dataviaggio, TIME_FORMAT(v.oraPartenza,  '%H:%i' ) AS oPartenza,TIME_FORMAT( v.oraArrivo,  '%H:%i' ) AS oArrivo from viaggio v where v.idAutista=:idAutista AND idViaggio=:idViaggio LIMIT 1");
                
                   $sqlu->bindValue(":idAutista", $_SESSION['user']); 
                    
                    $sqlu->bindValue(":idViaggio", $vi);
                     $sqlu->execute();
                    if ($sqlu->rowCount()>0)
                    { 
                        while($row=$sqlu->fetch())
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