<?php
include './db/db.php';
function console_log($d)
{
    echo '<script>';
    echo 'console.log(' . json_encode($d) . ');';
    echo '</script>';
}
function alert($d)
{
    echo "<script type='text/javascript'>alert('" . $d . "');</script>";
}

$message = 'No Error';
// ADD NEW STAFF
if (isset($_POST["submit"])) {
    $pattern = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
    if (preg_match($pattern, $_POST["phone"])) {
        $phone = $_POST["phone"];
        $last_name = $_POST["last_name"];
        $first_name = $_POST["first_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sex = $_POST["sex"];
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
    
    else {
        alert('PHONE NUMBER IS INVALID');
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
                <input type="tel" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="phone" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Ngày tháng năm sinh</span>
                <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="dob" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Lương</span>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="salary" required>
            </div>

            <div class="modal-footer modal-footer-custom">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-success" name="submit">Thêm mới</button>
            </div>
        </form>
    </div>
</div>