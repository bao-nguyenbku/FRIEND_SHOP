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
    echo "<script type='text/javascript'>alert('Xóa sản phẩm $id thành công');</script>";
} else {
    echo "<script type='text/javascript'>alert('Xóa sản phẩm $id thất bại');</script>";
}
$connect->close();
?>