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
                    <h2>Add Products</h2>
                </div>
                <div></div>
                <div class="createrInfo tittleBoutton">
                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                </div>
                               
            </div>

            <div class="product_add">
                <form action="product_add_backend.php" method="post" enctype="multipart/form-data">
                    <label for="select_product_img">Select Image  : </label> <br>
                    <input type="file" name="select_product_img" id="select_product_img" > <br>

                    <label for="add_product_name">Product Name :</label><br>
                    <input type="text" name="add_product_name" id="add_product_name" > <br>

                    <label for="add_product_price">Price :</label><br>
                    <input type="number" name="add_product_price" id="add_product_price" > <br>


                    <label for="product_m">M :</label> <label for="product_l" style="margin-left: 140px;">L :</label><br>
                    <input type="number" name="product_m" id="product_m" style="width: 47%;" min="1"> 
                    <input type="number" name="product_l" id="product_l" style="width: 47%;" min="1"> <br>

                    <label for="product_xl">XL :</label> <label for="product_xxl" style="margin-left: 135px;">XXL :</label><br>
                    <input type="number" name="product_xl" id="product_xl" style="width: 47%;" min="1"> 
                    <input type="number" name="product_xxl" id="product_xxl" style="width: 47%;" min="1"><br>

                    <label for="quantity">Net Quantity :</label> <br>
                    <input type="number" name="quantity" id="quantity"> <br>

                    <button type="submit" name="product_add_submit">Add Product</button>
                    
                </form>
               
            </div> 
        </div>
    </section>
    <script type="text/javascript" src="script.js"></script>
</body>
   

</html>        

