<?php include "header.php"; ?>
<?php include "controllers/ordersController.php"; ?>

<link rel="stylesheet" href="./public/manageOrders.css">
<div class="container"> 
    <h1 style="text-align: center;">Tất cả đơn hàng</h1>
    <div class="filter-form" >
        <h5>Bộ lọc đơn hàng theo nhân viên</h5>
        <form class="row g-3 needs-validation filterForm" action="manageOrders.php" method="post" novalidate >
            
            <div class="mb-4 row" style="margin-bottom: 0">
                <label class="form-label col-sm-2 " for="name">ID nhân viên</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="filterStaff" id="username" placeholder="" required value="" >
                </div>
            </div>
        
            <div class="mb-3 d-grid gap-2">
                <button class="btn btn-outline-danger" type="submit" id="signup"  name="filter">Lọc</button>
            </div>
        </form>
    </div>
    <div id="filter-result" style="text-align: center;">
        <?php 
            if (!isset($getStaff)){$getStaff= '';}

            if ($getStaff != '') 
            {
                echo "Danh sách các đơn hàng do nhân viên <b> $getStaff </b> xuất";
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
                <th scope="col">Trạng thái</th>
                <th scope="col">Kiểu thanh toán</th>
                <th scope="col">Ngày tạo đơn hàng</th>
                <th scope="col">Giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0; while ($row = $result->fetch_array()) {?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <td><?php echo $row["payment_type"]; ?></td>
                <td><?php echo $row["create_date"]; ?></td>
                <td><?php echo  $row["cost"]; ?></td>
                <td>
                    
                        <button type="button" class="btn btn-warning">
                            <a href="./updateOrders.php" onclick="testSth(this)" class="link-primary link-product" id="<?php echo $row[0]; ?>">
                                Sửa
                            </a>
                        </button>       
                    
                
                </td>
            </tr>
            <?php $index += 1; ?>
            <?php } ?>
           
            
        </tbody>
    </table>
    <a href="addOrders.php" class="link-primary"><button type="button" class="btn btn-primary">Thêm</button></a>
</div>

<?php include "footer.php"; ?>