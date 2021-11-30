<?php include "header.php"; ?>
<?php include "controllers/storeController.php"; ?>

<link rel="stylesheet" href="./public/css/manageStore.css">
<div class="container">
    <h1 style="text-align: center;">DANH SÁCH CHI NHÁNH</h1>
    <div class="filter-form" >
        <h5>Bộ lọc theo nhân viên và doanh thu tối thiểu</h5>
        <form class="row g-3 needs-validation filterForm" action="manageStore.php" method="post" novalidate >
            <div class="mb-4 row" style="margin-bottom: 0">
                <label class="form-label col-sm-2" style="width: max-content;" for="name">Nhân viên</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="filterStaff" id="username" placeholder="" required value="" >
                </div>
            </div>
            <div class="mb-4 row" style="margin-bottom: 0">
                <label class="form-label col-sm-2" style="width: max-content;" for="name">Doanh thu tối thiểu</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="filterIncome" id="username" placeholder="" required value="" >
                </div>
            </div>
            <div class="mb-3 d-grid gap-2">
                <button class="btn btn-outline-danger" type="submit" id="signup"  name="filter">Lọc</button>
            </div>
        </form>
    </div>
    <div id="filter-result" style="text-align: center;">
        <?php
        ?>
    </div>
    
    <table class="table table-hover align-middle" id="product-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Vị trí</th>
                <th scope="col">Số lượng nhân viên</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0; while ($row = $result->fetch_array()) {?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["location"]; ?></td>
                <td><?php echo $row["No_staff"]; ?></td>
                <td class="d-flex">
                    <form action="updateStore.php" method="POST">
                        <input type="number" value="<?php echo $row["id"]; ?>" name ="old_id" hidden>
                        <input type="text" value="<?php echo $row["location"]; ?>" name ="old_location" hidden>
                        <input type="number" value="<?php echo $row["No_staff"]; ?>" name ="old_No_staff" hidden>
                    <button name="btnEdit" type="submit" class="btn btn-warning">
                        Sửa
                    </button>
                    </form>
                    <button type="button" class="btn btn-danger" style="margin-left: 10px;">
                        <a href="./deleteStore.php?rn=<?php echo $row[0]; ?>" class="link-primary link-product" >
                            Xóa
                        </a>
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="addStore.php" class="link-primary"><button type="button" class="btn btn-primary">Thêm</button></a>
</div>

<?php include "footer.php"; ?>
