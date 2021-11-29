<?php include "header.php"; ?>
<?php include "controllers/staffController.php"; ?>
<?php 
    function alert ($d) {
        echo "<script type='text/javascript'>alert('".$d. "');</script>";
    }
    if (isset($_GET["storeId"])) {
        $storeId = $_GET['storeId'];
        
    }
?>
<link rel="stylesheet" href="./public/css/staff.css">
<div class="container">
    <h1 style="text-align: center;">Danh sách nhân viên</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm tài khoản cho nhân viên
    </button>
    <br>

    <div class="staff-filter">
        <form action="">
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="storeId" onchange="this.form.submit()">
                    <option selected disabled>Chọn cửa hàng</option>
                    <option value="1">Cửa hàng 1</option>
                    <option value="2">Cửa hàng 2</option>
                    <option value="3">Cửa hàng 3</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit">Lọc</button>
        </form>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <form action="addStaff.php" method="post" enctype="multipart/form-data" id="">
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
        </div>
    </div>
    <br><br>
    <table class="table table-hover align-middle" id="product-table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ và tên lót</th>
                <th scope="col">Tên</th>
                <!-- <th scope="col">Tên quản lý</th> -->
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Sinh nhật</th>
                <th scope="col">Lương</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0; foreach($data as $i) { $index += 1; ?>
            <tr>
                <td><?php echo $index;?></td>
                <td><?php echo $i["last_name"];?></td>
                <td><?php echo $i["first_name"];?></td>
                <td><?php echo $i["user_name"];?></td>
                <td><?php echo $i["phone_number"];?></td>
                <td><?php echo $i["date_of_birth"];?></td>
                <td><?php echo number_format($i["salary"], 0, ".", ",");?></td>
                <td>
                    <button type="button" class="btn btn-warning">
                        Sửa
                    </button>
                    <button type="button" class="btn btn-danger">
                        Xóa
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include "footer.php"; ?>