<?php include "db_conn.php" ?>
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
                    <a href="enter.php"><i class="fa-solid fa-arrow-left"></i></a>
                </div> 
                <div class="titleName">
                    <h1>Shipped</h1>
                </div>
                <div class="createrInfo tittleBoutton">
                    <span onclick="show_contact()"><i class="fa-solid fa-circle-info"></i></span>
               </div>
                <div class="createrInfo tittleBoutton">
                    <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>

            <div class="navbar">
                <nav>
                <ul>
                        <li><a href="order.php"><span>Pending(<?php echo countPendingOrders($conn); ?>)</span></a></li>
                        <li><a href="confirm.php"><span>Confirmed(<?php echo countConfirmedOrders($conn); ?>)</span></a></li>
                        <li><a href="today_deli.php"><span>Today's Deli(<?php echo countToday_deliOrders($conn); ?>)</span></a></li>
                        <li><a href="shipped.php"><span class="active">Shipped(<?php echo countShippedOrders($conn); ?>)</span></a></li>
                        <li><a href="delivered.php"><span>Delivered(<?php echo countDeliveredOrders($conn); ?>)</span></a></li>
                        <li><a href="cancle.php"><span>Cancle(<?php echo countCancleOrders($conn); ?>)</span></a></li>
                        <li><a href="hold.php"><span>On Hold(<?php echo countOnHoldOrders($conn); ?>)</span></a></li>                        
                     </ul>
                </nav>
            </div>
            
            <div class="order">
                <?php
                    $sql = "SELECT * FROM add_order where status='Shipped' ORDER BY order_id DESC";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res)>0){
                        while($data = mysqli_fetch_assoc($res)){ ?>
                            <a href="view_order_detail.php?view_order_id=<?php echo $data["order_id"] ?>" style="text-decoration: none;">
                            <div class="order_details">
                                <div class="order_grid">
                                    <div  class="order_img">
                                        <img src="  " alt="">
                                    </div>
                                    <div class="order_grid_detail">
                                        <p><span>Order ID : </span> <?php echo "00".$data['order_id']; ?> </p>
                                        <p><span>Date : </span><?php echo $data['date'] ?></p>
                                        <p><span>Price : </span><?php echo "Rs.".$data['amount']."/-"; ?></p>
                                    </div>

                                </div>
                                <div class="order_btn">
                                    <div class="order_btn_size">
                                        <p>H : <?php echo $data['height']; ?></p>
                                    </div>
                                    <div class="order_btn_size">
                                        <p>W : <?php echo $data['weight']; ?></p>
                                    </div>
                                    <div class="order_btn_location">
                                        <p><?php echo $data['location']; ?></p>
                                    </div>
                                    <div class="order_btn_status">
                                        <p><?php echo $data['payment_status']; ?></p>
                                    </div>

                                </div>
                                <hr>
                                <div class="order_by">
                                    <p><span>Order By </span><?php echo $data['cust_name']; ?></p>
                                </div>
                            </div>
                            </a>

                      <?php  }}?>                
                

            </div>
            <?php include "contact.php" ?>
        </div>        
    </section>
    <script type="text/javascript" src="script.js"></script>
    <?php
    function countToday_deliOrders($conn) {
    $sql = "SELECT COUNT(*) AS total FROM add_order WHERE status='Today_deli'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];   
    }
    ?>
    <?php
    function countCancleOrders($conn) {
    $sql = "SELECT COUNT(*) AS total FROM add_order WHERE status='Cancle'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
    }
    ?>
    <?php
    function countOnHoldOrders($conn) {
    $sql = "SELECT COUNT(*) AS total FROM add_order WHERE status='Hold'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
    }
    ?>
    <?php
    function countShippedOrders($conn) {
    $sql = "SELECT COUNT(*) AS total FROM add_order WHERE status='Shipped'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
    }
    ?>
    <?php
    function countPendingOrders($conn) {
    $sql = "SELECT COUNT(*) AS total FROM add_order WHERE status='Pending'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
    }
    ?>
    <?php
    function countConfirmedOrders($conn) {
    $sql = "SELECT COUNT(*) AS total FROM add_order WHERE status='Confirmed'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
    }
    ?>
    <?php
    function countDeliveredOrders($conn) {
    $sql = "SELECT COUNT(*) AS total FROM add_order WHERE status='Delivered'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
    }
    ?>
</body>
</html>    