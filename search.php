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
                    <h1>Search</h1>
                </div>
                <div class="createrInfo tittleBoutton">
                   
                </div>
                <div class="createrInfo tittleBoutton">
                    <span onclick="show_contact()"><i class="fa-solid fa-circle-info"></i></span>
                </div>
            </div>

            <div class="search_btn">
                <form action="" method="post">
                    <p>Please enter phone number or name</p>

                    <input type="text" id="search_btn" name="search_btn" placeholder="Search here..."> <br>

                    <button type="submit" name="search_submit" class="submit">Search</button>
                </form>
            </div>
            
            <div class="message">
                <div class="none_result">
                     <span><i class="fa-solid fa-magnifying-glass-minus"></i></span> 
                     <p>Nothing to show</p>
                </div>
                <div class="result_message">
                    
                </div>
            </div>



            
            <?php include "contact.php" ?>
        </div>
    </section>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
