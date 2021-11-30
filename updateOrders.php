<?php
    session_start();
    $connect = new mysqli('localhost', 'root','','friend_shop');
    if(mysqli_connect_errno()) {
        die ("Database Connection Failed, ".$mysql_connect_error()." (". $mysql_connect_errno()." )");
    }
    $ck = $_COOKIE['cname'];
    $sql = 'select * from orders';
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
        $query = "UPDATE `Orders` SET `status` = '$_POST[status]', `payment_type`='$_POST[payment_type]',  `create_date`='$_POST[create_date]', `cost`='$_POST[cost]' WHERE `id` = '$_POST[id]'";
        $result = mysqli_query($connect, $query);
        $id = $_POST['id'];
        if ($result)
        {
            echo "<script type='text/javascript'>alert('Đã chỉnh sửa thành công đơn hàng thứ $id');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Chỉnh sửa đơn hàng thứ $id thất bại');</script>";
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
                        <h2>Chỉnh sửa thông tin đơn hàng</h2>
                        
                        <?php $data=[];while ($row=mysqli_fetch_row($res)): ?>
                            
                        <?php if (htmlspecialchars($row[0]) === $ck):?>
                            <?php $data['id'] = htmlspecialchars($row[0]) ?>
                            <?php $data['status']  = htmlspecialchars($row[1]) ?>
                            <?php $data['payment_type'] = htmlspecialchars($row[2]) ?>
                            <?php $data['create_date'] = htmlspecialchars($row[3]) ?>
                            <?php $data['cost'] = htmlspecialchars($row[4]) ?>
                         
        
                        <?php endif;?>
                        <?php endwhile; ?>
                        <form class="row g-3 needs-validation infoForm" action="updateOrders.php" method="post" novalidate >
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
                                <label class="form-label col-sm-3" for="name">Trạng thái</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="status"  id="name" placeholder="" required value="<?php echo $data['status'] ?>">
                                    <div class="invalid-feedback">
                                        Trạng thái không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Phương thức thanh toán</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="payment_type"  id="email" placeholder="" required  value="<?php echo $data['payment_type'] ?>">
                                    <div class="invalid-feedback">
                                        Loại sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Ngày tạo đơn hàng</label>
                                <div class="col-sm-9">
                                    <input type="Datetime" class="form-control" name="create_date"  id="name" placeholder="" required  value="<?php echo $data['create_date'] ?>">
                                    <div class="invalid-feedback">
                                        Giá sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                           
                           
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Giá đơn hàng</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="cost"  id="phone" placeholder="" required  value="<?php echo $data['cost'] ?>">
                                    <div class="invalid-feedback">
                                        Mô tả không hợp lệ!
                                    </div>
                                </div>
                            </div>
                                  
                            
                            
                            
                            <div class="mb-3 d-grid gap-2">
                                <button class="btn btn-outline-danger" type="submit" id="signup"  name="update">Xác nhận</button>
                                <a class="btn btn-outline-danger" href="manageOrders.php" type="submit" id="signup"  name="update">Trở về</a>
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
