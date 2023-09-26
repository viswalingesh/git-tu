<?php
require_once('includes/page-title.php');
$title = $login_page;
require_once('includes/common-header.php');
?>
<section class="login_main bg_grey w-100 h-100 d-sm-flex align-items-center justify-content-center">
    <div class="login_wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="form_wrapper">
                    <div class="logo_login pb-5">
                        <img src="images/logo.jpg" alt="" />
                    </div>
                    <form id="LoginFormPost">
                        <div class="pb-4">
                            <label class="label_1 pb-1 text-uppercase">Username <b class="text-danger">*</b></label>
                            <input type="text" class="form-control" name="username" id="username" required />
                        </div>
                        <div class="pb-4">
                            <label class="label_1 pb-1 text-uppercase">Password <b class="text-danger">*</b></label>
                            <input type="password" class="form-control" name="password" id="password" required />
                        </div>
                        <div class="pt-3 text-end">
                            <input type="hidden" name="type" value="1">
                            <input type="submit" value="Submit" class="text-uppercase cus_btn_1 bg_gradient_1 b_radius_1 text-white" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img_login_right overlay_1 text-white position-relative login_right_info h-100 d-flex justify-content-center flex-column">
                    <h6 class="text-capitalize pb-2 mb-0">Welcome to</h6>
                    <img src="assets/images/logo.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once('includes/common-footer.php');
?>
<script src="controller/login/loginscript.js" type="text/javascript"></script>
</body>
</html>