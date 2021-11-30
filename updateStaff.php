<?php 
    include './db/db.php';
    include 'helper.php';
    
    if (isset($_POST["submit"])) {
        $pattern_phone = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
        $pattern_mail = "|^[A-Z0-9._%+-]+@gmail\.com$|i";

        $check_phone = preg_match($pattern_phone, $_POST["phone"]);
        $check_mail = preg_match($pattern_mail, $_POST["email"]);
        $dob_tmp = date_create($_POST["dob"]);
        $check_age = ($dob_tmp->format("Y") <= '2003');

        if ($check_phone && $check_mail && $check_age) {
            $id = $_GET["id"];
            $phone = $_POST["phone"];
            $last_name = $_POST["last_name"];
            $first_name = $_POST["first_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $sex = $_POST["sex"];
            $dob = $_POST["dob"];
            $salary = $_POST["salary"];
            
            $update_sql = "UPDATE accounts SET last_name = '$last_name', first_name = '$first_name', `user_name` = '$email', `password` = '$password', sex = '$sex', phone_number = '$phone', date_of_birth = '$dob' WHERE id = ".$id. "";
            $res1 = $db->query($update_sql);
            if ($res1) {
                $update_staff = "UPDATE staff SET salary = '$salary' WHERE account_id = '$id'";
                $res2 = $db->query("UPDATE staff SET salary = '$salary' WHERE account_id = " .$id. "");
                if ($res2) {
                    alert("Successfully");
                    header("Location: manageStaff.php");
                }
                else {
                    alert(mysqli_error($db));
                }
            }    
        }  
        else {
            if (!$check_phone) {
                alert('PHONE NUMBER IS INVALID');
            }
            if (!$check_mail) {
                alert('EMAIL IS INVALID');
            }
            if (!$check_age) {
                alert("STAFF MUST BE 18 YEARS OLD OR HIGHER");
            }
        }
    }
?>