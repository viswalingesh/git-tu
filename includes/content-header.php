<header class="main_header flx_0 w-100">
            <div class="row g-0">
                <div class="col-auto col-3 d-flex align-items-center top_h_left">
                    <div class="flx_0 res_menu pe-2 pe-sm-3">
                        <i class="bi bi-list"></i>
                    </div>
                    
                </div>
                <div class="col d-flex align-items-center justify-content-end flex-row top_h_right">
                   
                    <div class="prof_top cursor ps-4">
                        <div class="dropdown">
                            <div class="d-inline-flex dropdown-toggle" data-bs-toggle="dropdown">
                                <div class="flx_1 text-end pe-2">
                                   
                                    <?php 
                                     if(!isset($_SESSION)) 
                                     { 
                                       ob_start();
                                       session_start();
                                     } 
                                
                            ?>

                                    <h3 class="bld_txt_1 mb-0"><?php echo $_SESSION["username"]; ?></h3>
                                    <small class="font_1x txt_clr_1"> <?php
                                        require_once('shared/master_data_load.php');
                                        
                                        if(isset($_SESSION["role"])){
                                            echo getValueMaster('master_role',$_SESSION["role"],$conn);    
                                        }
                                        else{
                                            echo '';    
                                        }
                                                                           
                                    ?></small>
                                </div>
                                <div class="flx_0 profile_img">
                                <?php
                                    if($_SESSION['profileFileName'])
                                    {
                                        ?>
                                            <img src="assets/profile/<?php echo $_SESSION['profileFileName'] ?>" alt="" />
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <img src="assets/images/no-profile.png" alt="" />
                                        <?php
                                    }
                                ?>
                                    
                                </div>
                            </div>
                            <ul class="dropdown-menu font_2x">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>