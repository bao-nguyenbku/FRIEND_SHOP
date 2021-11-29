<?php 
    include './db/db.php';
    function console_log ($d) {
        echo '<script>';
        echo 'console.log('. json_encode($d) . ');';
        echo '</script>';
    }
    function alert ($d) {
        echo "<script type='text/javascript'>alert('".$d. "');</script>";
    }
    // ADD NEW STAFF
    if (isset($_POST["submit"])) {
        $last_name = $_POST["last_name"];
        $first_name = $_POST["first_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sex = $_POST["sex"];
        $phone = $_POST["phone"];
        $dob = $_POST["dob"];
        $salary = $_POST["salary"];
       
        $insert_sql = "CALL insertAccount('$last_name', '$first_name', '$email', '$password', '$sex', '$phone', '$dob', 'sta', $salary)";
        $result = $db->query($insert_sql);
        if ($result) {
            alert('Đã thêm thành công');
            header("Location: manageStaff.php");
        }
        else {
            alert(mysqli_error($db));
        }
    }

?>