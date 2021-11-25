<?php
    session_start();
    $connect = new mysqli('localhost', 'root','','friend_shop');
    if(mysqli_connect_errno()) {
        die ("Database Connection Failed, ".$mysql_connect_error()." (". $mysql_connect_errno()." )");
    }
    $ck = $_COOKIE['cname'];
    $sql = 'select * from product';
    $res = mysqli_query($connect, $sql);
    if($res === false ) {
        echo $ck;}
    $connect->close();
?>
<!-- UPDATE TABLE -->
<?php
    if (isset($_POST['update']))
    {

        $connect = new mysqli('localhost', 'root','','friend_shop');
        if(mysqli_connect_errno()) {
            die ("Database Connection Failed, ".$mysql_connect_error()." (". $mysql_connect_errno()." )");
        }
       

        // $query = "UPDATE `members` SET `name`='$_POST[name]', `email`='$_POST[mail]',`password`='$_POST[password]', `dob`='$_POST[dob]' ,`gender`='$_POST[gender]',`phone`='$_POST[phone]',`avatar`='$_POST[avatar]' WHERE `username` = $_POST[username]";
        $query = "UPDATE `product` SET `price` = '$_POST[price]', `specs`='$_POST[specs]',  `name`='$_POST[name]', `category`='$_POST[category]' WHERE `id` = '$_POST[id]'";
        $result = mysqli_query($connect, $query);
        $name = $_POST['name'];
        if ($result)
        {
            echo "<script type='text/javascript'>alert('Đã chỉnh sửa thành công $name');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Chỉnh sửa $name thất bại');</script>";
        }
        $connect->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multilevel Company</title>
    <link rel="stylesheet" href="./public/product.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div id="main" class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="text-box mt-5 mb-5">
                        <h2>Chỉnh sửa thông tin sản phẩm</h2>
                        
                        <?php $data=[];while ($row=mysqli_fetch_row($res)): ?>
                            
                        <?php if (htmlspecialchars($row[0]) === $ck):?>
                            <?php $data['id'] = htmlspecialchars($row[0]) ?>
                            <?php $data['price']  = htmlspecialchars($row[1]) ?>
                            <?php $data['specs'] = htmlspecialchars($row[2]) ?>
                            <?php $data['name'] = htmlspecialchars($row[3]) ?>
                            <?php $data['category'] = htmlspecialchars($row[4]) ?>
                         
        
                        <?php endif;?>
                        <?php endwhile; ?>
                        <form class="row g-3 needs-validation infoForm" action="updateProduct.php" method="post" novalidate >
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">ID</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control" name="id" id="username" placeholder="" required value="<?php echo $data['id'] ?> ">
                                    <div class="invalid-feedback">
                                        ID không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Tên sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name"  id="name" placeholder="" required value="<?php echo $data['name'] ?>">
                                    <div class="invalid-feedback">
                                        Tên sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Loại</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="category"  id="email" placeholder="" required  value="<?php echo $data['category'] ?>">
                                    <div class="invalid-feedback">
                                        Loại sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Giá sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="price"  id="name" placeholder="" required  value="<?php echo $data['price'] ?>">
                                    <div class="invalid-feedback">
                                        Giá sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                           
                           
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Mô tả</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="specs"  id="phone" placeholder="" required  value="<?php echo $data['specs'] ?>">
                                    <div class="invalid-feedback">
                                        Mô tả không hợp lệ!
                                    </div>
                                </div>
                            </div>
                                  
                            
                            
                            
                            <div class="mb-3 d-grid gap-2">
                                <button class="btn btn-outline-danger" type="submit" id="signup"  name="update">Xác nhận</button>
                                <a class="btn btn-outline-danger" href="manageProduct.php" type="submit" id="signup"  name="update">Trở về</a>
                            </div>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js "></script>
    <script src="./public/js/product.js"></script>
</body>
</html>
