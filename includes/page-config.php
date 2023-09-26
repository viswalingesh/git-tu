<?php
 date_default_timezone_set('Asia/Kolkata');
 $all_access=[8,7];
 if(!isset($_SESSION)) 
 { 
   ob_start();
   session_start();
 } 
require_once('includes/db.php');
$getFileName = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$getFileName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $getFileName);
$getRoleid = $_SESSION['role'];
$DefaultPages = array('profile','dashboard');
$pageEnable = '';
if(in_array($getFileName, $DefaultPages) || $getRoleid == 1)
{
   $pageEnable = 1;
}
else{
   $check = mysqli_query($conn, "SELECT * FROM `page_mapping` WHERE `page_file_name` = '$getFileName' AND `role` = $getRoleid");
      $pageEnable = mysqli_num_rows($check);         
}
if(!isset($_SESSION["login"]))
{
   header("location: index.php");
}
else{
   if($pageEnable == 0) 
   {
     header("location: index.php");
   }
}
