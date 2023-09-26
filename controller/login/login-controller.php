<?php
    require_once('../../includes/db.php'); 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST['type'] == 1)
        {
            $username = $_POST['username'];
            $GetPassword = $_POST['password'];
            $PasswordMD5 = md5($GetPassword);                    
            $check=mysqli_query($conn,"select * from `employee_details` where username='$username' and password='$PasswordMD5'");           
            if(mysqli_num_rows($check)>0){
                if(!isset($_SESSION)) 
                { 
                   ob_start();
                   session_start();
                } 
                $rows=$check->fetch_assoc();
                $_SESSION["login"] = true;
                $_SESSION["username"] = $username;
                $_SESSION['user_id'] = $rows['id'];
                $_SESSION['role'] = $rows['role'];
                $_SESSION['profileFileName'] = $rows['profileFileName'];
                echo json_encode(array("statusCode"=>200));
            }
            else{
                echo json_encode(array("statusCode"=>201));
            }
            mysqli_close($conn);
        }
    }
?>