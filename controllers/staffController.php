<?php 
    include "./db/db.php";

    // Get all staff
    $all_staff = "SELECT * FROM accounts, staff WHERE accounts.id = staff.account_id";
    $result = $db->query($all_staff);
    if ($result) {
        $data = [];
        while ($row = mysqli_fetch_array($result)) {
            array_push($data, $row);
        }
    }
?>