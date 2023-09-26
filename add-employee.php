<?php
require_once('includes/page-title.php');
$title = $add_employee;
require_once('includes/common-header.php');
require_once('includes/page-config.php');
require_once('shared/master_data_load.php');
?>
<link href="assets/css/jquery-ui.css" type="text/css" rel="stylesheet" />
<div class="main_wrapper w-100 h-100 d-sm-flex flex-row bg_gradient_1">
    <?php
    require_once('includes/aside.php');
    ?>
    <main class="col-xl-10 col-lg-9 col-md-8 admin_right d-flex flex-column">
        <?php
        require_once('includes/content-header.php');
        ?>
        <div class="info_wrapper w-100 flx_1">
            <div class="row pb-3">
                <div class="col-6">
                    <h4> Employees</h4>
                </div>
                <div class="col-6 text-end">
                    <button id="AddNewemployeeBtn" class="btn btn-success">Add New Employee</button>
                </div>
            </div>
            <div class="table-responsive employee_list w-100 bg-white">
                <table class="w-100 table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                S.No
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Photo
                            </th>
                            <th>
                                Employee Name
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Password
                            </th>
                            <th>
                                Employee Id
                            </th>
                            <th>
                                Gender
                            </th>
                            <th>
                                D.O.B
                            </th>
                            <th>
                                Age
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Blood Group
                            </th>
                            <th>
                                Aadhar No
                            </th>
                            <th>
                                PAN No
                            </th>
                            <th>
                                Contact No
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Data of Joined
                            </th>
                            <th>
                                Employee Status
                            </th>
                            <th>
                                Date Releived
                            </th>
                            <th>
                                Current Salary
                            </th>

                            <th>
                                Department
                            </th>
                            <th>
                                Designation
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Remarks
                            </th>
                            <th>
                                Remove
                            </th>
                        </tr>
                    </thead>
                    <tbody id="allEmployeesLoad">

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
<div class="modal fade" id="employeeUpdateModel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <form id="EmployeeDetailsForm" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employee_modal_title"></h5>
                <button type="button" class="btn-close" id="CloseMasterPopup"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Employee Name<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="employee_name" id="employee_name" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Employee Id<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="employee_id" id="employee_id" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Gender<span class="ps-1 text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Date of birth<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control date_picker" name="dob" id="dob" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Age<span class="ps-1 text-danger">*</span></label>
                        <input type="number" class="form-control" name="age" id="age" required>
                    </div>

                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Blood Group<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="bloodgroup" id="bloodgroup" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Aadhar Number<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="aadharno" id="aadharno" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>PAN Number<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="panno" id="panno" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Contact No<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="contactno" id="contactno" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Email<span class="ps-1 text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Date of Joined<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control date_picker" name="datejoined" id="datejoined" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Employee Status<span class="ps-1 text-danger">*</span></label>
                        <select required name="employeestatus" id="employeestatus" class="form-control">
                            <option value="">Select</option>
                            <?php
                            foreach (MasterDataLoad('master_employee_status', $conn) as $row) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Date of Releived<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control date_picker" name="datereleived" id="datereleived">
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Current Salary<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="currentsalary" id="currentsalary" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Username<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Password<span class="ps-1 text-danger">*</span></label>
                        <input type="text" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Department<span class="ps-1 text-danger">*</span></label>
                        <select required name="department" id="department" class="form-control">
                            <option value="">Select</option>
                            <?php
                            foreach (MasterDataLoad('master_department', $conn) as $row) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Designation<span class="ps-1 text-danger">*</span></label>
                        <select required name="designation" id="designation" class="form-control">
                            <option value="">Select</option>
                            <?php
                            foreach (MasterDataLoad('master_designation', $conn) as $row) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Role<span class="ps-1 text-danger">*</span></label>
                        <select required name="role" id="role" class="form-control">
                            <option value="">Select</option>
                            <?php
                            foreach (MasterDataLoad('master_role', $conn) as $row) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xxl-2 col-lg-3 col-md-6 mb-3">
                        <label>Photo<span class="ps-1 text-danger">*</span></label>
                        <div class="add_profile">
                            <input type="file" class="form-control" name="profile" id="profile">
                        </div>
                        <div class="edit_profile d-none">
                            <div class="d-flex align-items-center">
                                <div class="prof_img me-3">
                                    <img src="" id="edit_profile_img" alt="">
                                </div>
                                <input type="button" value="Change" id="RemoveProfile" class="btn btn-sm btn-danger">
                            </div>                            
                            <input type="hidden" value="" id="profileHidden" name="profileHidden">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-3">
                        <label>Address<span class="ps-1 text-danger">*</span></label>
                        <textarea name="address" id="address" class="form-control"></textarea>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-3">
                        <label>Remarks</label>
                        <textarea name="remarks" id="remarks" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="2" name="type" />
                <input type="hidden" value="1" name="saveType" id="saveType" />
                <input type="hidden" value="" name="rowid" id="rowid" />
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close</button><button type="submit" class="btn btn-primary SubmitBtn">Submit</button>
            </div>


        </form>
    </div>
</div>
<?php
require_once('includes/common-footer.php');
?>
<script src="assets/js/jquery-ui.js"></script>
<script src="controller/employee/add-employee-script.js?v=3.1" type="text/javascript"></script>
</body>

</html>