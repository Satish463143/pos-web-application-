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
                    <h1>Products</h1>
                </div>
                <div class="createrInfo tittleBoutton">
                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                </div>
                <div class="createrInfo tittleBoutton">
                   <a href="add_products.php"><i class="fa-solid fa-plus"></i></a>
                </div>
                
            </div>
            
            <div style="overflow-y: scroll;  height: 85%;border-radius: 5px;">
            <?php 
                $sql = "SELECT * FROM add_product ORDER BY id DESC";
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                    while($data = mysqli_fetch_assoc($res)){ ?>

                        <div class="product">
                            <div class="product_grid">
                                <div class="product_img">
                                    <img src="" alt="">
                                </div>
                                <div class="product_detail">
                                    <h3><?php echo $data['add_product_name']; ?></h3>
                                    <p><span>Price : Rs.</span><?php echo $data['add_product_price']."/-"; ?></p>
                                    <p>Available Stock</p>
                                    <div class="product_size">
                                        <div>
                                            <p><span>M : </span><?php echo $data['add_product_m']; ?></p>
                                        </div>
                                        <div>
                                            <p><span>L : </span><?php echo $data['add_product_l']; ?></p>
                                        </div>
                                        <div>
                                            <p><span>XL : </span><?php echo $data['add_product_xl']; ?></p>
                                        </div>
                                        <div>
                                            <p><span>XXL : </span><?php echo $data['add_product_xxl']; ?></p>
                                        </div>
                                    </div>
                                    <p><span>Net Quantity : </span><?php echo $data['net_quantity']; ?></p>
                                </div>
                            </div>
                            <div class="product_edit">
                                <div class="product_edit_button">
                                    <a href="edit_product.php?edit_id=<?php echo $data['id'] ?>">Edit</a>
                                </div>
                                <div  class="product_delete_button">
                                    <a href="delete_product.php?delete_id=<?php echo $data['id'];?>" onclick="return confirm('Are you sure want to delete !!!')">Delete</a>
                                </div>
                            </div>
                        </div>

                   <?php  }
                }
                ?> 
            </div>
        </div>
    </section>
</body>
</html>        