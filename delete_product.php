<?php 

$id = $_GET['delete_id'];
include "db_conn.php";

$sql ="delete from add_product where id = $id";

mysqli_query($conn,$sql);

header("Location:product.php");

?>