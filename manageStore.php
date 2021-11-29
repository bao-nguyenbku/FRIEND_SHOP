<?php include "header.php"; ?>
<?php include "controllers/storeController.php"; ?>

<link rel="stylesheet" href="./public/manageProduct.css">
<div class="container">
    <h1 style="text-align: center;">Tất cả chi nhánh</h1>
    <div class="filter-form" >
        <h5>Bộ lọc theo nhân viên và doanh thu</h5>
        <form class="row g-3 needs-validation filterForm" action="manageProduct.php" method="post" novalidate >
            
            <div class="mb-4 row" style="margin-bottom: 0">
                <label class="form-label col-sm-2 " for="name">Nhân viên</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="filterStore" id="username" placeholder="" required value="" >
                </div>
            </div>
            <div class="mb-4 row " style="margin-bottom: 0!important;">
                <label class="form-label col-sm-2" for="name">Doanh thu</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="filterCate"  id="name" placeholder="" required value="">
                </div>
            </div>
            <div class="mb-3 d-grid gap-2">
                <button class="btn btn-outline-danger" type="submit" id="signup"  name="filter">Lọc</button>
            </div>
        </form>
    </div>
    <div id="filter-result" style="text-align: center;">
        <?php 
            if (!isset($getCate)){$getCate= '';}

            if ($getCate != '' && $getStore !='') 
            {
                echo "Danh sách <b> $getCate </b> cửa hàng <b> $getStore </b>";
            }
            else {
                echo '';
            }
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
                <td>
                    
                        <button type="button" class="btn btn-warning">
                            <a href="./updateStore.php" onclick="" class="link-primary link-product" id="<?php echo $row[0]; ?>">
                                Sửa
                            </a>
                        </button>
                  
            
                    <button type="button" class="btn btn-danger">
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
