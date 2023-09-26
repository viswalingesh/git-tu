<?php
 if(!isset($_SESSION)) 
 { 
   ob_start();
   session_start();
 } 
$_SESSION["login"] = false;
unset($_SESSION["username"]);
unset($_SESSION['user_id']);
unset($_SESSION['role']);
unset($_SESSION['profileFileName']);
unset($_SESSION);
session_destroy();
if(!isset($_SESSION["login"])){
    header("location: index.php");
}
?>