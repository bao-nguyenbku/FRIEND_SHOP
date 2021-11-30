
<!-- UPDATE TABLE -->
<?php    
    if (!isset($_POST['update']))
    {
    $id=$_POST['old_id'];
    $location=$_POST['old_location'];
    $No_staff=$_POST['old_No_staff'];
    }
    if (isset($_POST['update']))
    {

        $connect = new mysqli('localhost', 'root','','friend_shop');
        if(mysqli_connect_errno()) {
            die ("Database Connection Failed, ".$mysql_connect_error()." (". $mysql_connect_errno()." )");
        }
        // $query = "UPDATE `members` SET `name`='$_POST[name]', `email`='$_POST[mail]',`password`='$_POST[password]', `dob`='$_POST[dob]' ,`gender`='$_POST[gender]',`phone`='$_POST[phone]',`avatar`='$_POST[avatar]' WHERE `username` = $_POST[username]";
        $query = "UPDATE `store` SET `location` = '$_POST[location]', `No_staff`='$_POST[No_staff]' where `id`='$_POST[id]'";
        $result = mysqli_query($connect, $query);
        $name = $_POST['id'];
        if ($result)
        {
            header('Location: manageStore.php');
            echo "<script type='text/javascript'>alert('Đã chỉnh sửa thành công $name');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Chỉnh sửa $name thất bại');</script>";
        }
        $connect->close();
    }
    else
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
                        <h2>Chỉnh sửa thông tin chi nhánh</h2>
                        
                        
                        <form class="row g-3 needs-validation infoForm" action="" method="post" novalidate >
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">ID</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control" name="id" id="username" placeholder="" required value="<?php echo $id ?> ">
                                    <div class="invalid-feedback">
                                        ID không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="name">Vị trí</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="location"  id="name" placeholder="" required value="<?php echo $location ?>">
                                    <div class="invalid-feedback">
                                        Vị trí không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row ">
                                <label class="form-label col-sm-3" for="phone">Số nhân viên</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="No_staff"  id="email" placeholder="" required  value="<?php echo $No_staff ?>">
                                    <div class="invalid-feedback">
                                        Số nhân viên không hợp lệ!
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 d-grid gap-2">
                                <button class="btn btn-outline-danger" type="submit" id="signup"  name="update">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js "></script>
    <script src="./public/js/store.js"></script>
</body>
</html>
