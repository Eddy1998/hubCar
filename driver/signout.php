<?php
session_start();
if(isset($_SESSION['driver']))
{ session_destroy();}
header("location: ../index.php");
?>
