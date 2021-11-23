<?php

$connect = new mysqli('localhost', 'root','','friend_shop');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['rn'];
$sql = "DELETE FROM `product` WHERE `id`='$id'";
$res = mysqli_query($connect, $sql);
if ($res){
    echo 'Đã xóa thành công sản phẩm';
} else {
    echo 'failed';
}
$connect->close();
?>