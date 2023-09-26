<?php
require_once('includes/page-title.php');
$title = $page_config;
require_once('includes/common-header.php');
require_once('includes/page-config.php');
?>
<style>
    .tost_alert{
        z-index: 999;
        right: 0;
        bottom: 0;
    }
</style>
<div class="main_wrapper w-100 h-100 d-sm-flex flex-row bg_gradient_1">
    <?php
    require_once('includes/aside.php');
    ?>
    <main class="col-xl-10 col-lg-9 col-md-8 admin_right d-flex flex-column">
        <?php
        require_once('includes/content-header.php');
        ?>
        <div class="info_wrapper w-100 flx_1">
            <header class="pb-3">
                <div>
                    <h4>Page Configuration</h4>
                </div>
            </header>
            <div class="bg-light py-3">
                    <div class="row">
                        <div class="col-6 offset-lg-3">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    Select Role
                                </div>
                                <div class="col-8">
                                    <select required name="" id="RoleDropdown" class="form-control">
                                        <option value="">Select</option>
                                        <?php
                                        $sql = "SELECT * FROM `master_role`";
                                        if ($result = mysqli_query($conn, $sql)) {
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                


            </div>
            <div class="bg-white p-3">
                <table class="w-100 table table-bordered">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">S.No</th>
                            <th width="70" class="text-center">
                                Select
                            </th>
                            <th>Page Name</th>
                        </tr>
                    </thead>
                    <tbody id="PageAllLoad"></tbody>

                </table>
            </div>
        </div>
    </main>
</div>  
</div>

<?php
require_once('includes/common-footer.php');
?>
<script src="controller/page-config/page-config-script.js?v=2.0" type="text/javascript"></script>
</body>

</html>