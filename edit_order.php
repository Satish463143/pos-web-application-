
<?php
include "db_conn.php";

// Check if edit_order_id is set and is a valid number
if(isset($_GET['edit_order_id']) && is_numeric($_GET['edit_order_id'])) {
    $eid = $_GET['edit_order_id'];

    // Fetch order details from the database
    $sql = "SELECT * FROM add_order WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Check if form is submitted
    if(isset($_POST['update_order_submit'])) {
        // Collect form data
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

        // Update order in the database
        $sql = "UPDATE add_order SET select_product=?, cust_name=?, height=?, weight=?, size=?, number=?, optional_number=?, location=?, address=?, amount=?, payment_status=?, remark=?, status=? WHERE order_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssddsssssdsssi", $select_product, $cust_name, $height, $weight, $size, $phone_number, $optional_number, $location, $address, $amount, $payment_status, $remark, $status, $eid);
        $stmt->execute();

        // Check if the update was successful
        if($stmt->affected_rows == 1) {
            // Redirect to view_order_detail.php with updated order ID
            header("location:view_order_detail.php?view_order_id=$eid");
            exit(); // Ensure script execution stops after redirection
        } else {
            echo "Data update failed: " . $conn->error;
        }
    }
} else {
    // Handle the case when edit_order_id is not set or not a valid number
    echo "Invalid order ID";
    exit();
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    
</head>
<body>
    <section class="container">
        <div class="entry_box">

            <div class="border_box_title">
                <div class="tittleBoutton">
                    <a href="enter.php"><i class="fa-solid fa-arrow-left"></i></a>
                </div> 
                <div class="titleName">
                    <h1>Edit Order</h1>
                </div>
                <div class="createrInfo tittleBoutton">
                   
                </div>
                <div class="createrInfo tittleBoutton">
                        <span onclick="show_contact()"><i class="fa-solid fa-circle-info"></i></span>
                   </div>
            </div>
            
            <div class="order_form">
                <form method="post">
                    <label for="select_product">Select product :</label> <br>
                    <select name="select_product" id="select_product" >                          
                        <option value="" name="select_product"><?php echo $data['add_product_name']; ?></option>
                    </select> <br>

                     <label for="cust_name">Customer Name</label>
                     <input type="text" name="cust_name" id="cust_name" placeholder="Name" value="<?php echo $data['cust_name']; ?>" required><br>

                     <label for="height">Height :</label> <label for="weight" style="margin-left: 100px;">Weight :</label><br>
                     <input type="number" name="height" id="height" style="width: 47%;" min="1" placeholder="In feet"  value="<?php echo $data['height']; ?>"> 
                     <input type="number" name="weight" id="weight" style="width: 47%;" min="1"placeholder="In KG" value="<?php echo $data['weight']; ?>"> <br>

                     <label for="size">Prefered Size :</label> <br>
                     <select name="size" id="size">
                        <option value="M" name="size"id="size_M">M</option>
                        <option value="L" name="size"id="size_L">L</option>
                        <option value="XL"name="size" id="size_XL">XL</option>
                        <option value="XXL"name="size" id="size_XXL">XXL</option>
                     </select> <br>

                     <label for="phone_number">Phone Number :</label> <br>
                     <input type="number" name="phone_number" id="phone_number"placeholder="Please Enter Number" value="<?php echo $data['number']; ?>" required><br>

                     <label for="optional_number">Optional Number :</label> <br>
                     <input type="number" name="optional_number" id="optional_number" placeholder="If any" value="<?php echo $data['optional_number']; ?>"><br>
                            
                     <label for="location">Location :</label> <br>
                     <select name="location" id="location">
                        <option value="Inside Valley" id="inside_valley">Inside Valley</option>
                        <option value="Outside Valley" id="outside_valley">Outside Valley</option>
                     </select>

                     
                     <label for="address">Address :</label> <br>
                     <input type="text" name="address" id="address"placeholder="Customer's address"value="<?php echo $data['address']; ?>" required><br>

                     

                     <label for="amount">Amount :</label> <br>
                     <input type="number" name="amount" id="amount"placeholder="Please Enter Amount"value="<?php echo $data['amount']; ?>" required><br>

                     <label for="payment_status">Payment Status :</label> <br>
                     <select name="payment_status" id="payment_status">
                        <option value="Paid" id="paid" name="payment_status">Paid</option>
                        <option value="COD" id="cod" name="payment_status">Cash On Delivery</option>
                        <option value="Exchange" id="exchange" name="payment_status">Exchange</option>
                     </select><br>

                     <label for="remark">Remark :</label> <br>
                     <textarea name="remark" id="remark" cols="30" rows="1.5"><?php echo $data['remark']; ?></textarea><br>

                     <label for="status">Order Status :</label> <br>
                     <select name="status" id="status">
                        <option value="Pending" name="status"id="pending">Pending</option>
                        <option value="Confirmed" name="status"id="confirmed">Confirmed</option>
                        <option value="Today_deli" name="status" id="todays_deli">Today's deli</option>
                        <option value="Shipped" name="status" id="shipped">Shipped</option>
                        <option value="Delivered" name="status" id="delivered">Delivered</option>
                        <option value="Cancle" name="status" id="cancle">Cancle</option>
                        <option value="Hold" name="status" id="hold">Hold</option>
                     </select> <br>

                     <button type="submit" name="update_order_submit">Update Order</button>
                </form>
            </div>

        <?php include "contact.php" ?>  
        </div>
    </section>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>            

