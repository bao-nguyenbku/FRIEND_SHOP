<?php 
    include './db/db.php';
    include 'helper.php';

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM accounts WHERE id = " .$id. "";
        $db->query($sql);
    }
?>