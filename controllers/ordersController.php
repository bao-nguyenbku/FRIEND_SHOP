<?php 
    include "./db/db.php";
    $sql = "select * from orders";
    $sql2 = '';
    if (isset($_POST['filter']))
    {
        $getStaff = $_POST['filterStaff'];
       
        if ($getStaff != '')
            {
                $sql2 = "CALL checkStaff('".$_POST['filterStaff']."')";
            }

    }
    if ($sql2 != '')
    {
        $result = $db->query($sql2);
    } else 
    {
        $result = $db->query($sql);
    }

    
    
?>