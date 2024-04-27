<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php include "db_conn.php" ?>
    <section class="container">
        
        <div class="entry_box">
            <div class="border_box_title">
                <div class="tittleBoutton">
                    <a href="welcome.php"><i class="fa-solid fa-arrow-left"></i></a>
                </div> 
                <div class="titleName">
                    <h1>Orders</h1>
                </div>
                <div class="createrInfo tittleBoutton">
                    <span onclick="show_contact()"><i class="fa-solid fa-circle-info"></i></span>
               </div>
                <div class="createrInfo tittleBoutton">
                    <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>
            <form method="post" id="login_form" style="position: absolute; top:20vh;">
                <label for="email">Enter the 6 digit code</label>
                <input type="password" id="six_code" name="six_code" required>                

                <button type="submit" name="code_submit">Proceed</button>
                <div id="error_message"></div>
            </form>
        </div>
    </section>

    <?php 
        
        if(isset($_POST['code_submit'])){
        $code = $_POST['six_code'];
        
        $sql = "SELECT * FROM six_code WHERE code = '$code'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1){
            header("Location:signup.php");
        }else{
            echo '<script>
                  var errorMessage = document.getElementById("error_message");
                  errorMessage.textContent = "Invalid code !!!";
                  </script>';
        }

        }
        
    ?>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>