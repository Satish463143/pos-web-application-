<?php include "db_conn.php" ?>
<?php 
$oid = $_GET["view_order_id"];
$sql = "SELECT * FROM add_order where order_id=$oid";
$res = mysqli_query($conn, $sql);
$data=[];
if (mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        array_unshift($data,$row);
    }
}

?>
<!DOCTYPE html>
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
                    <a href="order.php"><i class="fa-solid fa-arrow-left"></i></a>
                </div> 
                <div class="titleName">
                    <h2>Orders Details</h2>
                </div>
                <div class="createrInfo tittleBoutton">
                    <span onclick="show_contact()"><i class="fa-solid fa-circle-info"></i></span>
               </div>
                <div class="createrInfo tittleBoutton">
                <?php foreach($data as $d): ?>
                    <a href="edit_order.php?edit_order_id=<?php echo $d['order_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <?php endforeach; ?>
                </div>
            </div>
            
            <?php 
            
            foreach($data as $d){
                    // $sql = "SELECT * FROM add_order where order_id=$oid ORDER BY order_id";
                    // $res = mysqli_query($conn, $sql);
                    // if($data = mysqli_fetch_assoc($res)){
                    //     ?>

            <div class="product_details">
                <h4>Product Images :</h4>
                <div class="product_details_img product_box">
                    
                </div>
                <h4>Product Details</h4>
                <div class="product_details_cont product_box">
                    
                    <table>
                        <tr>
                            <td>Order ID</td>
                            <td> : <?php echo "00".$d['order_id']; ?></td>
                        </tr> 
                        <tr>
                            <td>Location</td>
                            <td> : <?php echo $d['location']; ?></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td> : <?php echo $d['amount']; ?></td>
                        </tr>
                        <tr>
                            <td>Payment Status</td>
                            <td> : <?php echo $d['payment_status']; ?></td>
                        </tr>
                        <tr>
                            <td>Order Status</td>
                            <td> : <?php echo $d['status']; ?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td> : <?php echo $d['date']; ?></td>
                        </tr>
                        <tr>
                            <td>Handel By</td>
                            <td> : 

                            </td>
                        </tr>

                    </table>
                </div>
                <h4>Customer Details</h4>
                <div class="product_details_cont product_box">
                    <table>
                        <tr>
                            <td>Customer Name</td>
                            <td> : <?php echo $d['cust_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td> : <?php echo $d['address']; ?></td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td> : <?php echo $d['height']; ?></td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td> : <?php echo $d['weight']; ?></td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td> : <?php echo $d['size']; ?></td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td> : <?php echo $d['number']; ?></td>
                        </tr>
                        <tr>
                            <td>Optional Number</td>
                            <td> : <?php echo $d['optional_number']; ?></td>
                        </tr>
                    </table>
                </div>
                
                <?php 
                    $status = $d['status']; // Assuming status is fetched correctly from your database

                    // Check if status is 'Pending'
                    if ($status == 'Pending') {
                    ?>
                        <div class="status_btn">
                            <ul>
                                <li style="background: rgb(86, 163, 159);"><a href="confirm.php">Confirm</a></li>
                                <li style="background: rgb(176, 177, 174);"><a href="#">Today's Deli</a></li>
                                <li style="background: rgb(68, 65, 245);"><a href="#">Shipped</a></li>
                                <li style="background: rgb(102, 240, 75);"><a href="#">Delivered</a></li>
                                <li style="background: rgb(243, 52, 38);"><a href="#">Cancel Order</a></li>
                                <li style="background: rgb(247, 118, 108);"><a href="#">Hold Order</a></li>
                            </ul>
                        </div>
                        
                <?php 
                    } if($status == 'Confirmed'){ ?>
                        <div class="status_btn">
                            <ul>
                                
                                <li style="background: rgb(176, 177, 174);"><a href="#">Today's Deli</a></li>
                                <li style="background: rgb(68, 65, 245);"><a href="#">Shipped</a></li>
                                <li style="background: rgb(102, 240, 75);"><a href="#">Delivered</a></li>
                                <li style="background: rgb(243, 52, 38);"><a href="#">Cancel Order</a></li>
                                <li style="background: rgb(247, 118, 108);"><a href="#">Hold Order</a></li>
                            </ul>
                        </div>
                    <?php } if($status == "Today_deli") { ?>
                        <div class="status_btn">
                        <ul>
                            
                            <li style="background: #00FEE3;"><a href="#">Print Shipping Label</a></li>
                            <li style="background: rgb(68, 65, 245);"><a href="#">Shipped</a></li>
                            <li style="background: rgb(102, 240, 75);"><a href="#">Delivered</a></li>
                            <li style="background: rgb(243, 52, 38);"><a href="#">Cancel Order</a></li>
                            <li style="background: rgb(247, 118, 108);"><a href="#">Hold Order</a></li>
                        </ul>
                       </div>
                     <?php } if($status == 'Shipped'){ ?>
                        <div class="status_btn">
                        <ul>
                            <li style="background: rgb(102, 240, 75);"><a href="#">Delivered</a></li>
                            <li style="background: rgb(243, 52, 38);"><a href="#">Cancel Order</a></li>
                            <li style="background: rgb(247, 118, 108);"><a href="#">Hold Order</a></li>
                        </ul>
                       </div>

                     <?php }if($status == 'Delivered'){ ?>
                        <div class="status_btn">
                        <ul>
                            <li style="background: rgb(247, 236, 87);"><a href="#">Re-Order</a></li>
                           
                        </ul>
                       </div>
                     <?php }if($status == 'Cancle'){?>
                        <div class="status_btn">
                        <ul>
                            <li style="background: rgb(247, 236, 87);"><a href="#">Re-Order</a></li>
                           
                        </ul>
                       </div>
                     <?php }if($status == 'Hold'){ ?>
                        <div class="status_btn">
                        <ul>
                            <li style="background: rgb(247, 236, 87);"><a href="#">Re-Order</a></li>
                            <li style="background: rgb(243, 52, 38);"><a href="#">Cancel Order</a></li>
                        </ul>
                       </div>
                      <?php }
                     
                     ?>
                                  


            </div>
            <?php } ?>

        </div>
    </section>
</body>
</html>  
