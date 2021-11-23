<?php 
    include "./db/db.php";
    $sql = "select * from product";
    $sql2 = '';
    if (isset($_POST['filter']))
    {
        $getCate = $_POST['filterCate'];
        $getStore = $_POST['filterStore'];
        if ($getCate != '' and $getStore != '')
            {
                $sql2 = "CALL getProduct('".$_POST['filterCate']."', '".$_POST['filterStore']."')";
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