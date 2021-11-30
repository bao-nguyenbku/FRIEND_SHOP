<?php 
    include './db/db.php';
    include 'helper.php';

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM accounts WHERE id = " .$id. "";
        $res = $db->query($sql);
        if ($res) {
            echo json_encode(200);
        }
        else {
            echo json_encode(mysqli_error($db));
        }
    }
?>