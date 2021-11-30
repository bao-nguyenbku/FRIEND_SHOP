<?php 
    include "./db/db.php";
    $sql = "select * from promotion";
    $sql2 = '';
    if (isset($_POST['filter']))
    {
        $getPrice= $_POST['filterPrice'];
       
        if ($getPrice!= '')
            {
                $sql2 = "CALL find_promotion_5tr('".$_POST['filterPrice']."')";
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