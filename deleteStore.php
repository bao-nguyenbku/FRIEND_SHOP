<?php

$connect = new mysqli('localhost', 'root','','friend_shop');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['rn'];
$sql = "DELETE FROM `store` WHERE id='$id'";
$res = mysqli_query($connect, $sql);
if ($res){
    echo "<script type='text/javascript'>alert('Xóa sản phẩm $id thành công');</script>";
    header('Location: manageStore.php');
} else {
    echo "<script type='text/javascript'>alert('Xóa sản phẩm $id thất bại');</script>";
}
$connect->close();

?>