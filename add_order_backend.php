<?php

$error = false; // Define $error variable and set it to false initially

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $select_product = $_POST['select_product'];
    $cust_name = $_POST['cust_name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $size = $_POST['size'];
    $phone_number = $_POST['phone_number'];
    $optional_number = $_POST['optional_number'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $payment_status = $_POST['payment_status'];
    $remark = $_POST['remark'];
    $status = $_POST['status'];

    // Validate $height and $weight
    if (!is_numeric($height) || !is_numeric($weight)) {
        // Set error flag to true
        header("Location: add_order.php?error=true");
        exit();
    } else {
        $conn = mysqli_connect("localhost", "root", "", "web_app");

        if ($conn->connect_error) {
            die('Error connection: ' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO add_order (select_product,cust_name, height, weight, size, number, optional_number, location, address, amount, payment_status, remark, status) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");                           
            $stmt->bind_param("ssddsisssisss", $select_product, $cust_name, $height, $weight, $size, $phone_number, $optional_number, $location, $address, $amount, $payment_status, $remark, $status);   
            $stmt->execute();
                
            // Redirect to order.php if insertion is successful
            header("Location: order.php");
            exit(); // Ensure script stops executing after redirect
            
            $stmt->close();
        }
    }
}
?>
