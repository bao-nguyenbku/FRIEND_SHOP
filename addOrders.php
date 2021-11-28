<!-- ADD ROW -->
<?php
    if (isset($_POST['add']))
    {

        $connect = new mysqli('localhost', 'root','','friend_shop');
        if(mysqli_connect_errno()) {
            die ("Database Connection Failed, ".$mysql_connect_error()." (". $mysql_connect_errno()." )");
        }
        $status = $_POST['status'];
        $payment_type = $_POST['payment_type'];
        $create_date = $_POST['create_date'];
        $cost = $_POST['cost'];
      
        // $sql = "INSERT INTO `product`(`id`, `price`, `specs`, `name`, `category`) VALUES ('$id','$price','$specs','$name','$category')";
        $sql2 = "CALL insertOrders('".$_POST['status']."','".$_POST['payment_type']."','".$_POST['create_date']."','".$_POST['cost']."' )";
        
        $result = mysqli_query($connect, $sql2);

        if ($result)
        {
            echo "<script type='text/javascript'>alert('Đã thêm thành công ');</script>";
        } else {
            // echo "<script type='text/javascript'>alert('Thêm $name không thành công');</script>";
           if (($connect->sqlstate) == 50001)
           {
                echo "<script type='text/javascript'>alert('Kiểu thanh toán không phù hợp');</script>";;
           }
           else  if (($connect->sqlstate) == 50000)
           {
               echo "<script type='text/javascript'>alert('Trạng thái thanh toán không phù hợp');</script>";
               
           }
           else 
           {
               echo "<script type='text/javascript'>alert('Thêm $name không thành công');</script>";
           }
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
                        <h2>Thêm đơn hàng</h2>
                        
                        <form class="row g-3 needs-validation infoForm" action="addOrders.php" method="post" novalidate >              
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Trạng thái</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="status"  id="name" placeholder="" required value="">
                                    <div class="invalid-feedback">
                                        Trạng thái không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Kiểu thanh toán</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="payment_type"  id="email" placeholder="" required  value="">
                                    <div class="invalid-feedback">
                                        Kiểu thanh toán không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">ngày xuất đơn hàng</label>
                                <div class="col-sm-9">
                                    <input type="datetime" class="form-control" name="create_date"  id="name" placeholder="" required  value="">
                                    <div class="invalid-feedback">
                                        Giá sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                           
                           
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Giá trị đơn hàng</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="cost"  id="phone" placeholder="" required  value="">
                                    <div class="invalid-feedback">
                                        Mô tả không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            
                           
                            
                            
                            
                            <div class="mb-3 d-grid gap-2">
                                <button class="btn btn-outline-danger" type="submit" id="signup"  name="add">Xác nhận</button>
                                <a class="btn btn-outline-danger" href="manageOrders.php" type="submit" id="signup" >Trở về</a>
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