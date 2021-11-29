<?php 
    include './db/db.php';
    include 'helper.php';
    
    if (isset($_POST["submit"])) {
        
        $pattern = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
        if ($_POST["phone"]) {
            
            if (preg_match($pattern, $_POST["phone"])) {
               
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
            
        }
        
        
    }


?>