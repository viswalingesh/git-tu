<?php
require_once('includes/page-title.php');
$title = $profile;
require_once('includes/common-header.php');
require_once('includes/page-config.php');
$details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `employee_details` WHERE id = '".$_SESSION['user_id']."'"));
;
?>
<div class="main_wrapper w-100 h-100 d-sm-flex flex-row bg_gradient_1">
    <?php
    require_once('includes/aside.php');
    ?>
    <main class="col-xl-10 col-lg-9 col-md-8 admin_right d-flex flex-column">
        <?php
        require_once('includes/content-header.php');
        ?>
        <div class="info_wrapper w-100 flx_1">
            <div class="row">
                <div class="col-xxl-2 col-lg-3 col-md-4">
                    <div class="shadow bg-white p-2">
                    <div class="profile_img_3 position-relative">
                        <?php
                            if($details['profileFileName']){
                                ?>
                                    <img src="assets/profile/<?php echo $details['profileFileName']; ?>" class="w-100" alt=""/>
                                <?php
                            }
                            else{
                                    ?>
                                        <img src="assets/images/no-profile.png" class="w-100" alt=""/>
                                    <?php
                            }
                        ?>

                        

                        <span  class="btn btn-success cus_btn_upload w-100">
                            <form id="ProfileUploadForm">
                            <input type="hidden" value='1' name='type' />
                            <input type="hidden" value='<?php echo $details['id'] ?>' name='rowId' />
                            <input type="hidden" value='<?php echo $details['profileFileName'] ?>' name='imgName' />
    Change Image <input type="file" id="profileUpload" name='profileUpload'>
    
    </form>
</span>
                    </div>
                    <div class="pt-3">
                        <article class='pb-2'>
                            <span class="text-primary">Employee Id</span>
                            <h6><?php echo $details['employee_id']?></h6>
                        </article>
                        <article class='pb-2'>
                        <span class="text-primary">Username</span>
                            <h6><?php echo $details['username']?></h6>
                        </article>                       
                        <article class='pb-2'>
                        <span class="text-primary">Date of Joining</span>
                            <h6><?php echo date("d-m-Y", strtotime($details['dob']))?></h6>
                        </article>
                        <article class='pb-2'>
                        <span class="text-primary">Role</span>
                            <h6>
                                    <?php
                                        require_once('shared/master_data_load.php');
                                        
                                        if(isset($_SESSION["role"])){
                                            echo getValueMaster('master_role',$_SESSION["role"],$conn);    
                                        }
                                        else{
                                            echo '';    
                                        }                                
                                    ?>
                                
                            </h6>
                        </article>
                        <article class='pb-2'>
                           <button id="ChangePassword" class="btn btn-primary btn-sm w-100">Change Password</button>
                        </article>
                       
                    </div>
                    </div>
                </div>
                <div class="col-xxl-10 col-lg-9 col-md-8">
                    <div class="bg-white shadow p-3">
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Employee Name</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'> <?php echo $details['employee_name']?> </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>D.O.B</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo date("d-m-Y", strtotime($details['dob']))?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Age</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['age']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Address</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['address']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Blood Group</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['bloodgroup']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Aadhar Number</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['aadharno']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Pan Number</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['panno']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Contact No</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['contactno']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Email</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['email']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Date of Joined</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo date("d-m-Y", strtotime($details['datejoined']))?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Current Salary</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['currentsalary']?></span>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Department</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['department']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>Designation</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['designation']?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5 text-secondary">
                            <span>remarks</span>
                        </div>
                        <div class="col-lg-7">
                            <span class='profile_data'><?php echo $details['remarks']?></span>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </main>
</div>


<div class="modal fade" id="passwordModal" tabindex="-1">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" id="CloseMasterPopup"></button>
            </div>
            <form id="PasswordForm">
            <div class="modal-body">
                    
                    <div class=" mb-3">
                        <label>Password<span class="ps-1 text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class=" mb-3">
                        <label>Confrim Password<span class="ps-1 text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" required>
                    </div>
                       
            </div>
            <div class="modal-footer">
                <input type="hidden" value="2" name="type" />
                <input type="hidden" value='<?php echo $details['id'] ?>' name="prowid" id="prowid" />
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close</button><button type="submit" class="btn btn-primary SubmitBtn">Submit</button>
            </div>
            </form>   

    </div>
</div>

<?php
require_once('includes/common-footer.php');
?>
<script src="controller/profile/profile-script.js?v=2.1" type="text/javascript"></script>
</body>

</html>