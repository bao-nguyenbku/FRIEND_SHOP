<?php include "header.php"; ?>
<?php include "controllers/staffController.php"; ?>
<?php

$staffByStore = [];
if (isset($_GET["storeId"])) {
    $storeId = $_GET['storeId'];
    if ($storeId != 'all') {
        $staffByStore = listStaffByStore($storeId);
    }
}
?>

<link rel="stylesheet" href="./public/css/staff.css">
<div class="container">
    <h1 style="text-align: center;">Danh sách nhân viên</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary">
        <a href="addStaff.php" style="color: #fff;">Thêm tài khoản cho nhân viên</a>
    </button>
    <br><br>

    <div class="staff-filter">
        <form action="">
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="storeId" onchange="this.form.submit()">
                    <option selected disabled>Chọn cửa hàng</option>
                    <option value="all">Tất cả</option>
                    <option value="1">Cửa hàng 1</option>
                    <option value="2">Cửa hàng 2</option>
                    <option value="3">Cửa hàng 3</option>
                </select>
            </div>
        </form>

    </div>
    
    <table class="table table-hover align-middle" id="product-table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ và tên lót</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Sinh nhật</th>
                <th scope="col">Lương</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($staffByStore) > 0):?>
                <?php $index = 0; foreach ($staffByStore as $i) { 
                    $index += 1; ?>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td><?php echo $i["last_name"]; ?></td>
                        <td><?php echo $i["first_name"]; ?></td>
                        <td><?php echo $i["user_name"]; ?></td>
                        <td><?php echo $i["phone_number"]; ?></td>
                        <td><?php echo $i["date_of_birth"]; ?></td>
                        <td><?php echo number_format($i["salary"], 0, ".", ","); ?></td>
                        <td style="width: max-content;">
                            <a class="btn btn-warning" href="getEditStaff.php?id=<?php echo $i['id']; ?>">Sửa</a>
                            <button type="button" class="btn btn-danger">
                                Xóa
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            <?php endif; ?>

            <?php if (count($staffByStore) <= 0): ?>
                <?php $index = 0;
                foreach (getAll() as $i) {
                $index += 1; ?>
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $i["last_name"]; ?></td>
                    <td><?php echo $i["first_name"]; ?></td>
                    <td><?php echo $i["user_name"]; ?></td>
                    <td><?php echo $i["phone_number"]; ?></td>
                    <?php $date = date_create($i["date_of_birth"]) ?>
                    <td><?php echo $date->format("m/d/Y"); ?></td>
                    <td><?php echo number_format($i["salary"], 0, ".", ","); ?></td>
                    <td>
                        <a class="btn btn-warning" href="getEditStaff.php?id=<?php echo $i['id']; ?>">Sửa</a>
                        <button type="button" class="btn btn-danger delete-staff-btn" data-id="<?php echo $i['id']; ?>">Xóa</button>
                    </td>
                </tr>
            <?php } ?>
            <?php endif; ?>
            
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-staff-btn').click(function() {
            if (confirm('Are you sure?')) {
                const id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: './deleteStaff.php',
                    data: { id: id },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                    }
                });
            }
           
        });
    });
</script>
<?php include "footer.php"; ?>