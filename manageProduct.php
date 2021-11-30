<?php include "header.php"; ?>
<?php include "controllers/productController.php"; ?>

<link rel="stylesheet" href="./public/css/manageProduct.css">
<div class="container">
    <h1 style="text-align: center;">Tất cả sản phẩm</h1>
    <div class="filter-form" >
        <h5>Bộ lọc theo cửa hàng và loại sản phẩm</h5>
        <form class="row g-3 needs-validation filterForm" action="manageProduct.php" method="post" novalidate >
            
            <div class="mb-4 row" style="margin-bottom: 0">
                <label class="form-label col-sm-2 " for="name">Cửa hàng</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="filterStore" id="username" placeholder="" required value="" >
                </div>
            </div>
            <div class="mb-4 row " style="margin-bottom: 0!important;">
                <label class="form-label col-sm-2" for="name">Loại</label>
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
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Loại</th>
                <th scope="col">Giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0; while ($row = $result->fetch_array()) {?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["specs"]; ?></td>
                <td><?php echo $row["category"]; ?></td>
                <td>
                    <?php echo number_format($row["price"], 0, "", ","); ?></td>
                <td>
                    
                        <button type="button" class="btn btn-warning">
                            <a href="./updateProduct.php" onclick="testSth(this)" class="link-primary link-product" id="<?php echo $row[0]; ?>">
                                Sửa
                            </a>
                        </button>
                  
                    
                    <button type="button" class="btn btn-danger">
                        <a href="./deleteProduct.php?rn=<?php echo $row[0]; ?>" class="link-primary link-product" >
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
    <a href="addProduct.php" class="link-primary"><button type="button" class="btn btn-primary">Thêm</button></a>
</div>

<?php include "footer.php"; ?>
