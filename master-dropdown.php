<?php
require_once('includes/page-title.php');
$title = $master_dropdown;
require_once('includes/common-header.php');
require_once('includes/page-config.php');
?>
<style>
    .master_list{
        overflow: auto;
        height: 250px;
    }
    .edit_panel{
        position: absolute;
  width: 25px;
  height: 25px;
  cursor: pointer;
  right: 0;
  top: 5px;
  color: #bbb;
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
                    <h4>Master Dropdown Data</h4>
                </div>
            </header>


            <div class="bg-white p-3">
                <table class="w-100 table table-bordered">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">S.No</th>
                            <th>Master Dropdown</th>
                            <th width="50" class="text-center">Edit</th>
                        </tr>
                    </thead>
                    <tbody id="MasterDataLoad"></tbody>

                </table>
            </div>
        </div>
    </main>
</div>
<div class="modal fade" id="masterDataDialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Title"></h5>
                <button type="button" class="btn-close" id="CloseMasterPopup"></button>
            </div>
            <div class="modal-body p-0 position-relative" id="master_body">
                <div class="bg-light p-2">
                    <form id="masterDataFormPost">
                        <div class="row align-items-end mb-3">
                            <div class="col pe-0">
                                <label class="form-label">Dropdown Name</label>
                                <div class="position-relative">
                                    <span class="edit_panel d-none"><i class="bi bi-x-circle-fill"></i></span>
                                <input type="text" class="form-control" id="dropdownName" name="dropdownName" required>
                                </div>
                            </div>
                            <div class="col-auto">
                                <input type="hidden" value="1" name="type" />
                                <input type="hidden" name="saveType" value="1" id="saveType" />
                                <input type="hidden" value="" name="postId" id="postId" />
                                <input type="hidden" value="" name="dbName" id="dbName" />
                                <button type="submit" class="btn btn-primary SubmitBtn" id="MasterDataAdd">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="master_list">
                    <table class="w-100 table table-bordered">
                        <thead>
                            <tr>
                                <th width="50" class="text-center">
                                    S.No
                                </th>
                                <th width="50" class="text-center">
                                    Edit
                                </th>
                                <th>
                                    Value
                                </th>
                                <!-- <th width="50" class="text-center">
                                    Remove
                                </th> -->
                            </tr>
                        </thead>
                        <tbody id="masterValueLoad">

                        </tbody>
                    </table>
                </div>


            </div>
          

        </div>
    </div>
</div>
<?php
require_once('includes/common-footer.php');
?>
<script src="controller/master-data/master-data-script.js" type="text/javascript"></script>
</body>

</html>