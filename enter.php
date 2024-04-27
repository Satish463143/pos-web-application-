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
            <div class="title">
                   <div class="titleName">
                        <h1>S&S App</h1>
                   </div>
                   <div class="createrInfo tittleBoutton">
                        <span onclick="show_contact()"><i class="fa-solid fa-circle-info"></i></span>
                   </div>
                   <div class="logOut tittleBoutton">
                        <span onclick="logoutBox()"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                   </div>   
            </div>
            <div class="entry_box_cont">
                <div class="entry_box_cont_1"><a href="order.php">View Orders</a></div>
                <div class="entry_box_cont_2" ><a href="search.php">Search Order</a></div>
                <div class="entry_box_cont_3" ><a href="add_order.php">Add Order</a></div>
                <div class="entry_box_cont_4" ><a href="product.php">Products</a></div>
                <div class="entry_box_cont_5" ><a href="signup.php">Sales Analysis</a></div>
            </div>
            <div id="logout_box">
                <p>Are you sure want to Logout?</p>
                <div class="logout_box_button">
                    <span onclick="logout_box_hide()">Nope</span>
                    <a href="welcome.php">Why not</a>
                </div>
            </div>

            <?php include "contact.php" ?>

        </div>

        
    </section>
    <script type="text/javascript" src="script.js"></script>


</body>
</html>