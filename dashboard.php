<?php
require_once('includes/page-title.php');
$title = $dashboard;
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
            Dashboard

        </div>
    </main>
</div>
<?php
require_once('includes/common-footer.php');
?>
<script src="assets/js/jquery-ui.js"></script>
<script src="controller/employee/add-employee-script.js?v=2.1" type="text/javascript"></script>
</body>

</html>