<?php include "header.php"; ?>
<?php include "controllers/productController.php"; ?>
<div class="container">
    <h1 style="text-align: center;">Tất cả sản phẩm</h1>
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
                    <button type="button" class="btn btn-warning">Sửa</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
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
</div>


<?php include "footer.php"; ?>