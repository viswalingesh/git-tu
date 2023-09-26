<?php
require_once('includes/page-title.php');
$title = $activity;
require_once('includes/common-header.php');
require_once('includes/page-config.php');
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
            Activity

        </div>
    </main>
</div