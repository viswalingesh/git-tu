<?php
require_once('../../includes/db.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['type'] == 1) {
        $roleId = $_POST['roleId'];
        $sql = "SELECT * FROM `page_config` WHERE `id` != 1";
        if ($result = mysqli_query($conn, $sql)) {
            $i = 1;
            while ($row = mysqli_fetch_array($result)) {
?>
                <tr data-id="<?php echo $row['id'] ?>" data-pagename="<?php echo $row['page_file_name'] ?>">
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center">
                        <?php
                        $page_id = $row['id'];
                        $check = mysqli_query($conn, "SELECT * FROM `page_mapping` WHERE `role` = '$roleId ' AND `page_id` = '$page_id'");
                        if (mysqli_num_rows($check) == 0) {
                        ?>
                            <input type="checkbox" class="page_config" />
                            
                        <?php
                        } else {
                        ?>
                            <input type="checkbox" checked="true" class="page_config" />
                        <?php
                        }
                        ?>

                    </td>
                    <td><?php echo $row['page_name'] ?></td>
                </tr>
<?php
                $i++;
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
    if ($_POST['type'] == 2) {
        $roleId = $_POST['roleId'];
        $pageId = $_POST['pageId'];
        $status = $_POST['status'];
        $pagename = $_POST['pagename'];
        $check = mysqli_query($conn, "select * from `page_mapping` where `role`=$roleId AND `page_id`=$pageId");
        if (mysqli_num_rows($check) == 0) {
            $sql = "INSERT INTO `page_mapping` (`role`,`page_id`,`page_file_name`) VALUES ($roleId,$pageId,'$pagename')";
        } else {
            $sql = "DELETE FROM `page_mapping` WHERE `role` = $roleId AND `page_id`=$pageId";
        }
        if (mysqli_query($conn, $sql)) {
            if($status == "true"){
                echo json_encode(array("statuscode" => "200"));
            }
            else{
                echo json_encode(array("statuscode" => "202"));
            }
            
        } else {
            echo json_encode(array("statuscode" => "201"));
        }
    }
}
?>