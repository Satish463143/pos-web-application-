<?php

// if(isset($_POST['product_add_submit']) && isset($_FILES['select_product_img'])){
//     include "db_conn.php";
//     echo "<pre>";
//     print_r($_FILES['select_product_img']);
//     echo "</pre>";



//     header("Location:product_add_backend.php");
    
// }else {
//     echo '<script>
//             window.location.href = "add_products.php";
//               alert("error");
//               console.log("error");
//               </script>';
//     header("Location: add_products.php");
// }

?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $add_product_name = $_POST['add_product_name']; 
    $add_product_price = $_POST['add_product_price']; 
    $product_m = $_POST['product_m'];
    $product_l = $_POST['product_l'];
    $product_xl = $_POST['product_xl'];
    $product_xxl = $_POST['product_xxl'];
    $quantity = $_POST['quantity'];

    $conn = mysqli_connect("localhost","root","","web_app");
    if($conn->connect_error){
        die('Error connection: ' . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO add_product(add_product_name,add_product_price,add_product_m,add_product_l,add_product_xl,add_product_xxl,net_quantity) 
                                VALUES (?,?,?,?,?,?,?) ");
        $stmt->bind_param("siiiiii",$add_product_name,$add_product_price,$product_m, $product_l, $product_xl, $product_xxl,$quantity);
        $stmt->execute();
        echo '<script>
             window.location.href = "product.php";
             alert("Product added sucessfully");
             </script>';
        $stmt->close();
    
    
    }
}

?>