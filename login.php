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
            <form method="post" id="login_form" style="position: absolute; top:20vh;">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>

                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" name="loginPassword" required>
                <!-- <i class="fas fa-eye" onclick="loginShow()" id="loginEye"></i> -->

                <button type="submit" name="login_submit" >Login</button>
                <div id="error_message"></div>
            </form>
        </div>
    </section>

    <?php 
        
        if(isset($_POST['login_submit'])){
        $email = $_POST['email'];
        $password = $_POST['loginPassword'];
        
        $sql = "SELECT * FROM login_details WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1){
            header("Location:enter.php");
        }else{
            echo '<script>
                  var errorMessage = document.getElementById("error_message");
                  errorMessage.textContent = "Invalid username or password !!!";
                  </script>';
        }

        }
        
    ?>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>