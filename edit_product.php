<?php

$pid = $_GET['edit_id'];
include "db_conn.php";

$sql = "SELECT * FROM add_product WHERE id = $pid";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

if(isset($_POST['update_submit'])){
    // $select_product_img = $_POST['select_product_img'];
    $add_product_name = $_POST['add_product_name'];
    $add_product_price = $_POST['add_product_price'];
    $product_m = $_POST['product_m'];
    $product_l = $_POST['product_l'];
    $product_xl = $_POST['product_xl'];
    $product_xxl = $_POST['product_xxl'];
    $quantity = $_POST['quantity'];

    $sql = "update add_product set add_product_name= '$add_product_name', add_product_price='$add_product_price',add_product_m = '$product_m',add_product_l = '$product_l', add_product_xl = '$product_xl', add_product_xxl = '$product_xxl', net_quantity='$quantity' where id='$pid'";
    mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)==1){
        header('location:product.php');

    }else{
        echo "data update fail".mysqli_error($conn);
    }
}
?>


<?php include "db_conn.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    
</head>
<body>
    <section class="container">
        <div class="entry_box">

            <div class="border_box_title">
                <div class="tittleBoutton">
                    <a href="product.php"><i class="fa-solid fa-arrow-left"></i></a>
                </div> 
                <div class="titleName">
                    <h2>Edit Products</h2>
                </div>
                <div></div>
                <div class="createrInfo tittleBoutton">
                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                </div>
                               
            </div>

            <div class="product_add">
                <form  method="post" enctype="multipart/form-data">
                    <label for="select_product_img">Select Image  : </label> <br>
                    <input type="file" name="select_product_img" id="select_product_img" value="<?php echo $data['add_product_image'] ?>" > <br>

                    <label for="add_product_name">Product Name :</label><br>
                    <input type="text" name="add_product_name" id="add_product_name"  value="<?php echo $data['add_product_name'] ?>" > <br>

                    <label for="add_product_price">Price :</label><br>
                    <input type="number" name="add_product_price" id="add_product_price"  value="<?php echo $data['add_product_price'] ?>" > <br>


                    <label for="product_m">M :</label> <label for="product_l" style="margin-left: 140px;">L :</label><br>
                    <input type="number" name="product_m" id="product_m" style="width: 47%;" min="1"  value="<?php echo $data['add_product_m'] ?>"> 
                    <input type="number" name="product_l" id="product_l" style="width: 47%;" min="1" value="<?php echo $data['add_product_l'] ?>"> <br>

                    <label for="product_xl">XL :</label> <label for="product_xxl" style="margin-left: 135px;">XXL :</label><br>
                    <input type="number" name="product_xl" id="product_xl" style="width: 47%;" min="1" value="<?php echo $data['add_product_xl'] ?>"> 
                    <input type="number" name="product_xxl" id="product_xxl" style="width: 47%;" min="1"  value="<?php echo $data['add_product_xxl'] ?>"><br>

                    <label for="quantity">Net Quantity :</label> <br>
                    <input type="number" name="quantity" id="quantity"  value="<?php echo $data['net_quantity'] ?>"> <br>

                    <button type="submit" name="update_submit">Update</button>
                    
                </form>
               
            </div> 
        </div>
    </section>
    <script type="text/javascript" src="script.js"></script>
</body>
   

</html>        

