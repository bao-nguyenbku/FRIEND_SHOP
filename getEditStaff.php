<?php
include "./db/db.php";
include "header.php";
function console_log($d)
{
    echo '<script>';
    echo 'console.log(' . json_encode($d) . ');';
    echo '</script>';
}
function alert($d) {
    echo "<script type='text/javascript'>alert('" . $d . "');</script>";
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM accounts, staff WHERE id = '$id' and account_id = '$id'";
    $result = $db->query($sql);
    if ($result) {
        $data = [];
        while ($row = mysqli_fetch_array($result)) {
            array_push($data, $row);
        }
    }
    //console_log($data);
}


?>

<div class="container">
    <h5 style="text-align: center;">Cập nhật nhân viên</h5>
    <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data" id="">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Họ và tên lót</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="last_name" value="<?php echo $data[0]['last_name']; ?>" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Tên</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="first_name" value="<?php echo $data[0]['first_name']; ?>" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" value="<?php echo $data[0]['user_name']; ?>" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Mật khẩu</span>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password" value="<?php echo $data[0]['password']; ?>" required>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="sex" value="<?php echo $data[0]['sex']; ?>" required>
                    <option disabled>Giới tính</option>
                    <option value="M">Nam</option>
                    <option value="F">Nữ</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                <input type="tel" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="phone" value="<?php echo $data[0]['phone_number']; ?>" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Ngày tháng năm sinh</span>
                <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="dob" value="<?php echo $data[0]['date_of_birth']; ?>" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Lương</span>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="salary" value="<?php echo $data[0]['salary']; ?>" required>
            </div>

            <div class="modal-footer modal-footer-custom">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
            </div>
        </form>
    </div>
</div>