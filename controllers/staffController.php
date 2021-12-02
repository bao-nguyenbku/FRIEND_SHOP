<?php 
    include "./db/db.php";

    // Get all staff
    function getAll() {
        global $db;
        $all_staff = "SELECT * FROM accounts, staff WHERE accounts.id = staff.account_id";
        $result = $db->query($all_staff);
        if ($result) {
            $res = [];
            while ($row = mysqli_fetch_array($result)) {
                array_push($res, $row);
            }
        }
        return $res;
    }

    function listStaffByStore($id) {
        global $db;
        $staffs = "CALL listStaffByStore('$id');";
        $result = $db->query($staffs);
        if ($result) {
            $res = [];
            while ($row = mysqli_fetch_array($result)) {
                array_push($res, $row);
            }
            return $res;
        }
        else {
            return array(mysqli_error($db));
        }
    }
    function listStore() {
        global $db;
        $sql = "SELECT id FROM store";
        $res = $db->query($sql);
        if ($res) {
            $data = [];
            while ($row = mysqli_fetch_array($res)) {
                array_push($data, $row);
            }
            return $data;
        }
        else {
            return array(mysqli_error($db));
        }
    }
?>