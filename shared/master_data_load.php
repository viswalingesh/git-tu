<?php
    function MasterDataLoad ($dbName, $conn)
    {
        $sql = "SELECT * FROM $dbName";
        if ($result = mysqli_query($conn, $sql)) {
            $rows = array();
            while ($row = mysqli_fetch_array($result)) {
                $rows[] =$row;
            }
            return $rows;
            //return $getData;
        }     
    }
    function getValueMaster($dbName,$value,$conn){        
        $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM $dbName WHERE id=$value"));
        return $result['name'];
    }
?>