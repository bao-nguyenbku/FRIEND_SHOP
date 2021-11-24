<!-- ADD ROW -->
<?php
    if (isset($_POST['add']))
    {

        $connect = new mysqli('localhost', 'root','','friend_shop');
        if(mysqli_connect_errno()) {
            die ("Database Connection Failed, ".$mysql_connect_error()." (". $mysql_connect_errno()." )");
        }

        $id = $_POST['id'];
        $price = $_POST['price'];
        $specs = $_POST['specs'];
        $name = $_POST['name'];
        $category = $_POST['category'];
      
        // $sql = "INSERT INTO `product`(`id`, `price`, `specs`, `name`, `category`) VALUES ('$id','$price','$specs','$name','$category')";
        $sql2 = "CALL insertProduct('".$_POST['id']."', '".$_POST['price']."','".$_POST['specs']."','".$_POST['name']."','".$_POST['category']."' )";
        
        $result = mysqli_query($connect, $sql2);

        if ($result)
        {
            echo "<script type='text/javascript'>alert('Đã thêm thành công $name');</script>";;
        } else {
            // echo "<script type='text/javascript'>alert('Thêm $name không thành công');</script>";
           if (mysqli_errno($connect) == 1062)
           {
                echo "<script type='text/javascript'>alert('ID sản phẩm đã tồn tại');</script>";;
           }
           else  if (($connect->sqlstate) == 50001)
           {
               echo "<script type='text/javascript'>alert('Giá sản phẩm phải lớn hơn 0 và bé hơn 100 000 000');</script>";
               
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
                        <h2>Thêm sản phẩm</h2>
                        
                        <form class="row g-3 needs-validation infoForm" action="addProduct.php" method="post" novalidate >
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id" id="username" placeholder="" required value="">
                                    <div class="invalid-feedback">
                                        ID không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Tên sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name"  id="name" placeholder="" required value="">
                                    <div class="invalid-feedback">
                                        Tên sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Loại</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="category"  id="email" placeholder="" required  value="">
                                    <div class="invalid-feedback">
                                        Loại sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Giá sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="price"  id="name" placeholder="" required  value="">
                                    <div class="invalid-feedback">
                                        Giá sản phẩm không hợp lệ!
                                    </div>
                                </div>
                            </div>
                           
                           
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Mô tả</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="specs"  id="phone" placeholder="" required  value="">
                                    <div class="invalid-feedback">
                                        Mô tả không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            
                           
                            
                            
                            
                            <div class="mb-3 d-grid gap-2">
                                <button class="btn btn-outline-danger" type="submit" id="signup"  name="add">Xác nhận</button>
                                <a class="btn btn-outline-danger" href="manageProduct.php" type="submit" id="signup" >Trở về</a>
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