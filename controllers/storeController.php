<?php 
    include "./db/db.php";
    $sql = "select * from store";
        $result = $db->query($sql);
?>