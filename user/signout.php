<?php
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['username']))
{ session_destroy();}
header("location: ../index.php");
?>
