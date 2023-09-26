<aside class="admin_aside d-flex flex-column h-100 col-xl-2 col-lg-3 col-md-4">
        <header class="flx_0 desktop_logo bg-white">
            <a href="#" target="_blank">
                <img src="assets/images/logo.jpg" alt="">
            </a>
        </header>
        <div class="flx_1 aside_nav pt-3">
            <ul class="MenuLoad">
            
               <?php
              if(!isset($_SESSION)) 
              { 
                 ob_start();
                 session_start();
              } 
                $getRoleid = $_SESSION['role'];

                
                if($getRoleid == 1){
                    $getPages = mysqli_query($conn, "SELECT * FROM `page_config` WHERE `id` != 1");
                }
                else{
                    $getPages = mysqli_query($conn, "SELECT * FROM `page_mapping` WHERE `role` = '$getRoleid'");
                }
                $getPageName = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
                $getPageName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $getPageName);

                ?>
                <li><a class="<?php if($getPageName == 'dashboard') {echo 'aside_nav_active';} else {echo '';} ?>" href="dashboard.php"> <i class="bi bi-house-door-fill"></i> Dashboard</a></li>
                <?php
                while ($row = mysqli_fetch_array($getPages)) { 
                    $icons = '';
                    if($row["page_file_name"] == 'activity'){
                        $icons = 'bi-lightbulb-fill';
                    }
                    else if($row["page_file_name"] == 'master-dropdown'){
                        $icons = 'bi-database';
                    }
                    else if($row["page_file_name"] == 'project-management'){
                        $icons = 'bi-person-fill-gear';
                    }
                    else if($row["page_file_name"] == 'page-config'){
                        $icons = 'bi-gear-fill';
                    }
                    else if($row["page_file_name"] == 'add-employee'){
                        $icons = 'bi-person-fill-add';
                    }
                    else{
                        $icons ='bi-check-circle-fill';
                    }
                    ?>
                        <li> <a class="<?php if($getPageName == $row["page_file_name"]) {echo 'aside_nav_active';} else {echo '';} ?>" href="<?php echo $row["page_file_name"].'.php' ?>"> <i class="bi <?php echo $icons;?>"></i> <?php echo str_replace("-"," ",$row["page_file_name"]); ?></a> </li>
                    <?php
                }
                ?>
                <li><a class="<?php if($getPageName == 'profile') {echo 'aside_nav_active';} else {echo '';} ?>" href="profile.php"> <i class="bi bi-person-circle"></i> Profile</a></li>
                <?php
               ?>
               
            </ul>
        </div>
        <footer class="flx_0 footer_copy p-3">
            @2023 All Right Reserved
        </footer>
    </aside>