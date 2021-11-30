<!-- ADD ROW -->
<?php
    if (isset($_POST['add']))
    {

        $connect = new mysqli('localhost', 'root','','friend_shop');
        if(mysqli_connect_errno()) {
            die ("Database Connection Failed, ".$mysql_connect_error()." (". $mysql_connect_errno()." )");
        }

        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $sale_off = $_POST['sale_off'];
       
        //$sql = "INSERT INTO `promotion`(`id`, `start_date`, `end_date`, `sale_off`) VALUES (10, '$_POST[start_date]', '$_POST[end_date]','$_POST[sale_off]')";
        $sql2 = "CALL insertPromotion('".$_POST['start_date']."','".$_POST['end_date']."','".$_POST['sale_off']."' )";
        
        $result = mysqli_query($connect, $sql2);
        echo $result;
        if ($result)
        {
            echo "<script type='text/javascript'>alert('Đã thêm thành công');</script>";
        } else {
            // echo "<script type='text/javascript'>alert('Thêm $name không thành công');</script>";
        //    if (mysqli_errno($connect) == 1062)
        //    {
        //         echo "<script type='text/javascript'>alert('ID sản phẩm đã tồn tại');</script>";;
        //    }
        //    else  if (($connect->sqlstate) == 50001)
        //    {
        //        echo "<script type='text/javascript'>alert('Giá sản phẩm phải lớn hơn 0 và bé hơn 100 000 000');</script>";
        //    }
        //    else 
        //    {
               echo "<script type='text/javascript'>alert('Thêm không thành công');</script>";
          //}
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
    <title>FRIEND SHOP</title>
    <link rel="stylesheet" href="./public/product.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div id="main" class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="text-box mt-5 mb-5">
                        <h2>Thêm Thông Tin Khuyến Mãi</h2> <br/>
                        
                        <form class="row g-3 needs-validation infoForm" action="addPromotion.php" method="post" novalidate >
                            
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Ngày bắt đầu</label>
                                <div class="col-sm-9">
                                    <input type="Datetime" class="form-control" name="start_date"  id="name" placeholder="" required value="">
                                    <div class="invalid-feedback">
                                        Khuyến mãi không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Ngày kết thúc</label>
                                <div class="col-sm-9">
                                    <input type="Datetime" class="form-control" name="end_date"  id="email" placeholder="" required  value="">
                                    <div class="invalid-feedback">
                                        Khuyến mãi không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Giá trị khuyến mãi</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="sale_off"  id="name" placeholder="" required  value="">
                                    <div class="invalid-feedback">
                                        Khuyến mãi không hợp lệ!
                                    </div>
                                </div>
                            </div>
                           
                            
                            <div class="mb-3 d-grid gap-2">
                                <button class="btn btn-outline-danger" type="submit" id="signup"  name="add">Xác nhận</button>
                                <a class="btn btn-outline-danger" href="managePromotion.php" type="submit" id="signup" >Trở về</a>
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