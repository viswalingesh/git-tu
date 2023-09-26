<?php
require_once('../../includes/db.php');
require_once('../../shared/master_data_load.php');
$UploadFilePath = '../../assets/profile/';
if ($_SERVER['REQUEST_METHOD'] == "POST") {


    if ($_POST['type'] == 1) {
        $uniquesavenameIn = rand(10000, 99999);
        if (isset($_FILES['profileUpload']['name'])) 
        {
           
            $profile = $_FILES['profileUpload']['name'];
            $profileFileName = $uniquesavenameIn . $profile;
            $rowid = $_POST['rowId'];
            $sql = "UPDATE `employee_details` SET `profileFileName`='$profileFileName' WHERE `id` = $rowid";
             if (mysqli_query($conn, $sql)) 
             { 
                if($_POST['imgName'])
                {
                    unlink($UploadFilePath.$_POST['imgName']);	
                }
                move_uploaded_file($_FILES["profileUpload"]["tmp_name"], $UploadFilePath.$profileFileName);
                echo json_encode(array("statuscode" => "200"));
            }
            else{
                echo json_encode(array("statuscode" => "202"));
            }
        }
    }
    if ($_POST['type'] == 2) {
        
        $prowid = $_POST['prowid'];

        $password = md5($_POST['password']);
        $password_view = $_POST['password'];
        $sql = "UPDATE `employee_details` SET `password`='$password', `password_view`='$password_view' WHERE `id` = $prowid";
        if (mysqli_query($conn, $sql)) 
        { 
            echo json_encode(array("statuscode" => "200"));
        }
        else{
            echo json_encode(array("statuscode" => "202"));
        }
    }
}
?>