<?php 
    include "./db/db.php";
    $sql = "select * from product";
    $result = $db->query($sql);
?>