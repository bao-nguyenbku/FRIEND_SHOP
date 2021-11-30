<?php

$connect = new mysqli('localhost', 'root','','friend_shop');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['rn'];
$del_contain = "DELETE FROM `has` WHERE `promotion_id`='$id'";
$del_res = mysqli_query($connect, $del_contain);
$sql = "DELETE FROM `promotion` WHERE id='$id'";
$res = mysqli_query($connect, $sql);
if ($res){
    echo "<script type='text/javascript'>alert('Xóa sản phẩm thành công');</script>";
    header('Location: managePromotion.php');
} else {
    echo "<script type='text/javascript'>alert('Xóa sản phẩm thất bại');</script>";
}
$connect->close();
?>