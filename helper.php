<?php 
    function console_log($d) {
        echo '<script>';
        echo 'console.log(' . json_encode($d) . ');';
        echo '</script>';
    }
    function alert($d) {
        echo "<script type='text/javascript'>alert('" . $d . "');</script>";
    }
    
?>