<?php
require_once('../../includes/db.php');
require_once('../../shared/master_data_load.php');
$UploadFilePath = '../../assets/profile/';
if ($_SERVER['REQUEST_METHOD'] == "POST") {


    if ($_POST['type'] == 1) {
        $sql = "SELECT * FROM `employee_details` WHERE `id` != 7";
        if ($result = mysqli_query($conn, $sql)) 
        {
            $i = 1;
            while ($row = mysqli_fetch_array($result)) {   
                $datereleivedGet = '';
                if($row["datereleived"] != '0000-00-00'){
                    $datereleivedGet =  date("d-m-Y", strtotime($row["datereleived"]));
                }
                else{
                    $datereleivedGet = '';
                }
                ?>
                    <tr
                    data-id="<?php echo $row['id'];?>"
                    data-profileFileName="<?php echo $row['profileFileName'];?>"
                    data-password="<?php echo $row['password_view'];?>"
                    data-employee_name="<?php echo $row['employee_name'];?>"
                    data-employee_id="<?php echo $row['employee_id'];?>"
                    data-gender="<?php echo $row['gender'];?>"
                    data-dob="<?php echo date("d-m-Y", strtotime($row["dob"]))?>"
                    data-age="<?php echo $row['age'];?>"
                    data-address="<?php echo $row['address'];?>"
                    data-bloodgroup="<?php echo $row['bloodgroup'];?>"
                    data-aadharno="<?php echo $row['aadharno'];?>"
                    data-panno="<?php echo $row['panno'];?>"
                    data-contactno="<?php echo $row['contactno'];?>"
                    data-email="<?php echo $row['email'];?>"
                    data-datejoined="<?php echo date("d-m-Y", strtotime($row["datejoined"]))?>"
                    data-employeestatus="<?php echo $row['employeestatus'];?>"
                    data-datereleived="<?php echo $datereleivedGet; ?>"
                    data-currentsalary="<?php echo $row['currentsalary'];?>"
                    data-username="<?php echo $row['username'];?>"
                    data-department="<?php echo $row['department'];?>"
                    data-designation="<?php echo $row['designation'];?>"
                    data-role="<?php echo $row['role'];?>"
                    data-remarks="<?php echo $row['remarks'];?>"

                    >					
                        <td class="text-center"><?php echo $i;?></td>
                        <td class="text-center"><i class="bi bi-pencil-square icon-2x text-success cursor-pointer EditEmployee"></i></td>
                        <td class="prof_img"> 
                        <?php
                            if($row['profileFileName'] != '' || $row['profileFileName'] != null){
                                ?>
                                    <img src="assets/profile/<?php echo $row['profileFileName'] ?>"/>
                                <?php
                            }
                            else{
                                ?>
                                    <img src="assets/images/no-profile.png"/>
                                <?php
                            }
                        ?>    
                         </td>
                        <td><?php echo $row['employee_name'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password_view'] ?></td>
                        <td><?php echo $row['employee_id'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['dob'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['bloodgroup'] ?></td>
                        <td><?php echo $row['aadharno'] ?></td>
                        <td><?php echo $row['panno'] ?></td>
                        <td><?php echo $row['contactno'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['datejoined'] ?></td>
                        <td>
                            <?php 
                                echo getValueMaster('master_employee_status',$row['employeestatus'],$conn);
                            ?>
                        </td>
                        <td><?php echo  $datereleivedGet; ?></td>
                        <td><?php echo $row['currentsalary'] ?></td>
                        <td>
                            <?php 
                                echo getValueMaster('master_department',$row['department'],$conn);
                            ?>
                        </td>
                        <td>
                        <?php 
                            echo getValueMaster('master_designation',$row['designation'],$conn);
                            ?>
                        </td>
                        <td>
                            <?php 
                            echo getValueMaster('master_role',$row['role'],$conn) 
                            ?>
                        </td>
                        <td class='text-center'>
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $row['remarks'] ?>"> <i class="bi bi-info-circle-fill text-primary fs-6"></i></span>
                    </td>
                        <td class="text-center"><i class="bi bi-trash icon-2x text-danger cursor-pointer removeEmployee"></i></td>                                                                       
                     </tr>
                <?php
                $i++;
            }
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    if ($_POST['type'] == 2) {
        $getdatereleived = '';
        if($_POST["datereleived"])
        {
            $getdatereleived = date("Y-m-d", strtotime($_POST["datereleived"]));
        }
        else{
            $getdatereleived = null;
        }
        $PostSuccess = 'false';
        $employee_name = $_POST['employee_name'];
        $employee_id = $_POST['employee_id'];
        $gender = $_POST['gender'];
        $dob = date("Y-m-d", strtotime($_POST["dob"]));
        $age = $_POST['age'];
        $address = $_POST['address'];
        $bloodgroup = $_POST['bloodgroup'];
        $aadharno = $_POST['aadharno'];
        $panno = $_POST['panno'];
        $contactno = $_POST['contactno'];
        $email = $_POST['email'];
        $datejoined = date("Y-m-d", strtotime($_POST["datejoined"]));
        $employeestatus = $_POST['employeestatus'];
        $datereleived = $getdatereleived;
        $currentsalary = $_POST['currentsalary'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $password_view = $_POST['password'];
        $department = $_POST['department'];
        $designation = $_POST['designation'];
        $role = $_POST['role'];
        $remarks = $_POST['remarks'];
        $saveType = $_POST['saveType'];
        $uniquesavenameIn = rand(10000, 99999);
      
        if (isset($_FILES['profile']['name'])) 
        {
           
            if($_FILES['profile']['name']){
                
                $profile = $_FILES['profile']['name'];
                $profileFileName = $uniquesavenameIn . $profile;
                $profileAttach = 1;
            }
            else{
                
                $profileAttach = 0;
                $profileFileName = '';
            }
            
        } else {
            
            $profileFileName =  $_POST['profileHidden'];
            $profileAttach = 0;
        }



        $employee_id_count = mysqli_query($conn, "select * from `employee_details` where `employee_id`='$employee_id'");
        $aadharno_count = mysqli_query($conn, "select * from `employee_details` where `aadharno`= '$aadharno'");
        $panno_count = mysqli_query($conn, "select * from `employee_details` where `panno`='$panno'");
        $contactno_count = mysqli_query($conn, "select * from `employee_details` where `contactno`='$contactno'");
        $email_count = mysqli_query($conn, "select * from `employee_details` where `email`='$email'");
        $username_count = mysqli_query($conn, "select * from `employee_details` where `username`='$username'");
       
        
        if (mysqli_num_rows($employee_id_count) > 0 && $saveType == 1) {
            echo json_encode(array("statuscode" => "202", "duplicate" => "Employee Id"));
        } else if (mysqli_num_rows($aadharno_count) > 0 && $saveType == 1) {
            echo json_encode(array("statuscode" => "202", "duplicate" => "Aadhar Number"));
        } else if (mysqli_num_rows($panno_count) > 0 && $saveType == 1) {
            echo json_encode(array("statuscode" => "202", "duplicate" => "PAN No"));
        } else if (mysqli_num_rows($contactno_count) > 0 && $saveType == 1) {
            echo json_encode(array("statuscode" => "202", "duplicate" => "Contact No"));
        } else if (mysqli_num_rows($email_count) > 0 && $saveType == 1) {
            echo json_encode(array("statuscode" => "202", "duplicate" => "Email"));
        } else if (mysqli_num_rows($username_count) > 0 && $saveType == 1) {
            echo json_encode(array("statuscode" => "202", "duplicate" => "Username"));
        } else {

            if ($saveType == 1) 
            {                
                $CreatedDate = date('Y-m-d G:i:s');
                $sql="INSERT INTO `employee_details` ( `employee_name`, `employee_id`, `gender`, `dob`, `age`, `address`, `bloodgroup`, `aadharno`, `panno`, `contactno`, `email`, `datejoined`, `employeestatus`, `datereleived`, `currentsalary`, `username`, `password`,`password_view`,`department`, `designation`, `role`, `remarks`, `create_date`,`profileFileName`) VALUES ('$employee_name', '$employee_id', '$gender', '$dob', '$age', '$address', '$bloodgroup', '$aadharno', '$panno', '$contactno', '$email', '$datejoined', '$employeestatus', '$datereleived', '$currentsalary', '$username', '$password','$password_view', '$department', '$designation', '$role', '$remarks', '$CreatedDate','$profileFileName')";
                $PostSuccess = 'true';                
            }
            else{
                $rowid = $_POST['rowid'];
                $sql = "UPDATE `employee_details` SET 
                `employee_name`='$employee_name',
                `employee_id`='$employee_id',
                `gender`='$gender',
                `dob`='$dob',
                `age`='$age',
                `address`='$address',
                `bloodgroup`='$bloodgroup',
                `aadharno`='$aadharno',
                `panno`='$panno',
                `contactno`='$contactno',
                `email`='$email',
                `datejoined`='$datejoined',
                `employeestatus`='$employeestatus',
                `datereleived`='$datereleived',
                `currentsalary`='$currentsalary',
                `username`='$username',
                `password`='$password',
                `password_view`='$password_view',
                `department`='$department',
                `designation`='$designation',
                `role`='$role',
                `remarks`='$remarks',
                `profileFileName`='$profileFileName'
                WHERE `id` = $rowid";
                $PostSuccess = 'true';
            }
        }
        if ($PostSuccess == 'true') {
            if (mysqli_query($conn, $sql)) { 
                
                if ($profileAttach == 1) {
                     move_uploaded_file($_FILES["profile"]["tmp_name"], $UploadFilePath.$profileFileName);
                }
                 if ($saveType == 1) 
                 {
                    echo json_encode(array("statuscode" => "200"));

                 } else {
                     echo json_encode(array("statuscode" => "204"));
                 }
             }
        }
    }



    if ($_POST['type'] == 3) {
        $rowid=$_POST['rowid'];        
        $imgName=$_POST['imgName'];       
        $sql = "UPDATE `employee_details` SET `profileFileName`='' WHERE `id` = $rowid";
        if(mysqli_query($conn,$sql)){               
            if($imgName){
                unlink($UploadFilePath.$imgName);	
            } 
            echo json_encode(array("statuscode" => 200));            
        }
        else{
            echo json_encode(array("statuscode"=>201));
        }
    }
    if ($_POST['type'] == 4) {
        $id=$_POST['id'];        
        $imgName=$_POST['imgName'];       
        $sql = "DELETE FROM `employee_details`  WHERE `id` = $id";
        if(mysqli_query($conn,$sql)){               
            if($imgName){
                unlink($UploadFilePath.$imgName);	
            }   
            echo json_encode(array("statuscode" => 200));          
        }
        else{
            echo json_encode(array("statuscode"=>201));
        }
    }

}
