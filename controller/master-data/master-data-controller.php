<?php
    require_once('../../includes/db.php'); 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST['type'] == 1)
        {
            $dropdownName = $_POST['dropdownName'];
            $dbName = $_POST['dbName'];            
            $saveType = $_POST['saveType'];

            $check=mysqli_query($conn,"select * from $dbName where name='$dropdownName'"); 
            if(mysqli_num_rows($check) == 0){
                if ($saveType == 1) 
                {	
                    $CreatedDate = date('Y-m-d');
                    $sql = "INSERT INTO $dbName (`name`,`create_date`) VALUES ('$dropdownName','$CreatedDate')";
                    $PostSuccess = 'true';
                }
                else{
                    $postId = $_POST['postId'];
                    $sql = "UPDATE $dbName SET `name`='$dropdownName' WHERE `id` = $postId";
                    $PostSuccess = 'true';
                }
                if($PostSuccess == 'true'){
                    if (mysqli_query($conn, $sql)) {	
                        if ($saveType == 1) 
                        {						   
                             echo json_encode(array("statuscode" => "200"));
                         }
                         else if($saveType == 2) {							
                             echo json_encode(array("statuscode" => "202"));
                         }
                         else{
                            echo json_encode(array("statuscode"=>203));
                         }
                     }
                }
                
                
            }
            else{
                echo json_encode(array("statuscode"=>204));
            }
            mysqli_close($conn);
        }
        if ($_POST['type'] == 2) {
            $db = $_POST['db'];
            $sql = "SELECT * FROM $db";
            if ($result = mysqli_query($conn, $sql)) {
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {                                
                    ?>
                        <tr 
                        data-id="<?php echo $row['id'] ?>" 
                        data-name="<?php echo $row['name'] ?>">					
                            <td class="text-center"><?php echo $i;?></td>
                            <td class="text-center"><i class="bi bi-pencil-square icon-2x text-success cursor-pointer EditMaster"></i></td>
                            <td><?php echo $row['name'] ?></td>
                           <!-- <td class="text-center"><i class="bi bi-trash icon-2x text-danger cursor-pointer RemoveMaster"></i></td>    -->
                                                                          
                         </tr>
                    <?php
                    $i++;
                }
            }
            else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }
        if ($_POST['type'] == 3) {
            $id=$_POST['id'];        
            $db=$_POST['db'];       
            $sql="DELETE FROM $db WHERE `id` = $id";
            if(mysqli_query($conn,$sql)){               
                echo json_encode(array("statuscode" => 200));
            }
            else{
                echo json_encode(array("statuscode"=>201));
            }
        }
    }
