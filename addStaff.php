<?php
include './db/db.php';
require_once 'helper.php';
$message = 'No Error';
// ADD NEW STAFF
if (isset($_POST["submit"])) {
    $pattern_phone = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
    $pattern_mail = "|^[A-Z0-9._%+-]+@gmail\.com$|i";

    $check_phone = preg_match($pattern_phone, $_POST["phone"]);
    $check_mail = preg_match($pattern_mail, $_POST["email"]);
    $dob_tmp = date_create($_POST["dob"]);
    $check_age = ($dob_tmp->format("Y") <= '2003');

    if ($check_phone && $check_mail && $check_age && (strlen($_POST["phone"]) == 10)) {
        $phone = $_POST["phone"];
        $last_name = $_POST["last_name"];
        $first_name = $_POST["first_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sex = $_POST["sex"];
        $dob = $_POST["dob"];
        $salary = $_POST["salary"];
        $storeId = $_POST["storeId"];
        $hours = $_POST["hours"];
        $insert_sql = "CALL insertAccount('$last_name', '$first_name', '$email', '$password', '$sex', '$phone', '$dob', 'sta', $salary)";
        $result = $db->query($insert_sql);
        if ($result) {
            $insert_works_for = "INSERT INTO works_for (staff_id, store_id, work_hours) values ((SELECT max(id) FROM accounts), '$storeId', '$hours');";
            $res2 = $db->query($insert_works_for);
            if ($res2) {
                alert('Đã thêm thành công');
                header("Location: manageStaff.php");
            }
        } 
        else {
            alert(mysqli_error($db));
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
<?php include "header.php"; ?>
<link rel="stylesheet" href="./public/css/staff.css">
<div class="container">
    <h5 style="text-align: center;">Thêm nhân viên</h5>
    <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data" id="">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Họ và tên lót</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="last_name" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Tên</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="first_name" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Mật khẩu</span>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password" required>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="sex" required>
                    <option selected disabled>Giới tính</option>
                    <option value="M">Nam</option>
                    <option value="F">Nữ</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="phone" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Ngày tháng năm sinh</span>
                <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="dob" required>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="storeId" required>
                <option value="blank">Nơi làm việc</option>
                    <option value="1">Cửa hàng 1</option>
                    <option value="2">Cửa hàng 2</option>
                    <option value="3">Cửa hàng 3</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Lương</span>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="salary" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Thời gian làm việc</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="hours" required>
            </div>
            <div class="modal-footer modal-footer-custom">
                <a href="./manageStaff.php" type="button" class="btn btn-secondary"><- Trở về</a>
                <button type="submit" class="btn btn-success" name="submit">Thêm mới</button>
            </div>
        </form>
    </div>
</div>