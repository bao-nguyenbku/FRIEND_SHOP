<?php include "header.php"; ?>
<?php include "controllers/promotionController.php"; ?>

<link rel="stylesheet" href="./public/css/managePromotion.css">
<div class="container">
    <h1 style="text-align: center;">DANH SÁCH KHUYẾN MÃI</h1>
    <div class="filter-form" >
        <h5>Bộ lọc theo giá trị của đơn hàng </h5>
        <form class="row g-3 needs-validation filterForm" action="managePromotion.php" method="post" novalidate >
            
            <div class="mb-4 row" style="margin-bottom: 0">
                <label class="form-label col-sm-2 " for="name">Giá trị của đơn hàng</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="filterPrice" id="username" placeholder="" required value="" >
                </div>
            </div>
            <!-- <div class="mb-4 row " style="margin-bottom: 0!important;">
                <label class="form-label col-sm-2" for="name">Loại</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="filterCate"  id="name" placeholder="" required value="">
                </div>
            </div> -->
        
            <div class="mb-3 d-grid gap-2">
                <button class="btn btn-outline-danger" type="submit" id="signup"  name="filter">Lọc</button>
            </div>
        </form>
    </div> 
    <div id="filter-result" style="font-weight: bold;">
        <?php 
            if (!isset($getPrice)){$getPrice = '';}

            if ($getPrice != '' ) 
            {
                echo "Danh sách các khuyến mãi áp dụng cho đơn hàng có giá trị lớn hơn </b> $getPrice </b> VND";
            }
            else {
                echo '';
            }
        ?>
    </div>
    <br/>
    
    <table class="table table-hover align-middle" id="promotion-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ngày bắt đầu</th>
                <th scope="col">Ngày kết thúc</th>
                <th scope="col">Sale_off</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0; while ($row = $result->fetch_array()) {?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $row["start_date"]; ?></td>
                <td><?php echo $row["end_date"]; ?></td>
                <td><?php echo  $row["sale_off"]; ?></td>
                <td>
                    
                        <button type="button" class="btn btn-warning">
                            <a href="./updatePromotion.php" onclick="testSth(this)" class="link-primary link-product" id="<?php echo $row[0]; ?>">
                                Sửa
                            </a>
                        </button>
                  
                    
                    <button type="button" class="btn btn-danger">
                        <a href="./deletePromotion.php?rn=<?php echo $row[0]; ?>" class="link-primary link-product" >
                            Xóa
                        </a>
                    </button>
                    
                </td>
            </tr>
            <?php $index += 1; ?>
            <?php } ?>
           
            <!-- <tr>
                <td>1</td>
                <td>iPhone 13 Pro Max</td>
                <td>Bộ nhớ trong 256GB</td>
                <td>Điện thoại</td>
                <td>24.000.000đ</td>
                <td>
                    <button type="button" class="btn btn-warning">Sửa</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>iPhone 13 Pro Max</td>
                <td>Bộ nhớ trong 256GB</td>
                <td>Điện thoại</td>
                <td>24.000.000đ</td>
                <td>
                    <button type="button" class="btn btn-warning">Sửa</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </td>
            </tr> -->
        </tbody>
    </table>
    <a href="addPromotion.php" class="link-primary"><button type="button" class="btn btn-primary">Thêm</button></a>
</div>

<?php include "footer.php"; ?>
