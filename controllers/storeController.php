<?php 
    include "./db/db.php";
    $sql = "select * from store";
    $sql2 = '';
    if (isset($_POST['filter']))
    {
        $getStaff = $_POST['filterStaff'];
        if ($getStaff != '')
            {
                $sql2 = "CALL searchstore_fromstaffid('".$_POST['filterStaff']."')";
            }
    }
    if (isset($_POST['filterIncome']))
    {
        $getStaff = $_POST['filterIncome'];
        if ($getStaff != '')
            {
                $sql2 = "CALL income('".$_POST['filterIncome']."')";
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