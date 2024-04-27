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
                    <a href="enter.php"><i class="fa-solid fa-arrow-left"></i></a>
                </div> 
                <div class="titleName">
                    <h1>Create Order</h1>
                </div>
                <div class="createrInfo tittleBoutton">
                   
                </div>
                <div class="createrInfo tittleBoutton">
                        <span onclick="show_contact()"><i class="fa-solid fa-circle-info"></i></span>
                   </div>
            </div>
            
            <div class="order_form">
                <form action="add_order_backend.php" method="post">
                     <label for="select_product">Select product :</label> <br>
                     <select name="select_product" id="select_product" >
                        <?php 
                            $sql = "SELECT * FROM add_product ORDER BY id DESC";
                            $res = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($res)>0){
                            while($data = mysqli_fetch_assoc($res)){ ?>

                            <option value="" name="select_product"><?php echo $data['add_product_name']; ?></option>

                        <?php }}?>
                     </select> <br>

                     <label for="cust_name">Customer Name</label>
                     <input type="text" name="cust_name" id="cust_name" placeholder="Name" required><br>

                     <label for="height">Height :</label> <label for="weight" style="margin-left: 100px;">Weight :</label><br>
                     <input type="text" name="height" id="height" style="width: 47%;" min="1" placeholder="In feet"> 
                     <input type="text" name="weight" id="weight" style="width: 47%;" min="1"placeholder="In KG"> <br>

                     <label for="size">Prefered Size :</label> <br>
                     <select name="size" id="size">
                        <option value="M" name="size"id="size_M">M</option>
                        <option value="L" name="size"id="size_L">L</option>
                        <option value="XL"name="size" id="size_XL">XL</option>
                        <option value="XXL"name="size" id="size_XXL">XXL</option>
                     </select> <br>

                     <label for="phone_number">Phone Number :</label> <br>
                     <input type="number" name="phone_number" id="phone_number"placeholder="Please Enter Number" required><br>

                     <label for="optional_number">Optional Number :</label> <br>
                     <input type="number" name="optional_number" id="optional_number" placeholder="If any"><br>
                            
                     <label for="location">Location :</label> <br>
                     <select name="location" id="location">
                        <option value="Inside Valley" id="inside_valley">Inside Valley</option>
                        <option value="Outside Valley" id="outside_valley">Outside Valley</option>
                     </select>

                     
                     <label for="address">Address :</label> <br>
                     <input type="text" name="address" id="address"placeholder="Customer's address" required><br>

                     

                     <label for="amount">Amount :</label> <br>
                     <input type="number" name="amount" id="amount"placeholder="Please Enter Amount" required><br>

                     <label for="payment_status">Payment Status :</label> <br>
                     <select name="payment_status" id="payment_status">
                        <option value="Paid" id="paid" name="payment_status">Paid</option>
                        <option value="COD" id="cod" name="payment_status">Cash On Delivery</option>
                        <option value="Exchange" id="exchange" name="payment_status">Exchange</option>
                     </select><br>

                     <label for="remark">Remark :</label> <br>
                     <textarea name="remark" id="remark" cols="30" rows="1.5"></textarea><br>

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

                     <div id="error_message"><?php if(isset($_GET['error']) && $_GET['error'] == 'true') echo "Height and weight must be in number"; ?></div>


                     <button type="submit" name="add_order_submit">Add Order</button>
                </form>
            </div>

        <?php include "contact.php" ?>  
        </div>
    </section>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>            