<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <section class="container">
    <div class="entry_box">

            <div class="border_box_title">
                <div class="tittleBoutton">
                    <a href="welcome.php"><i class="fa-solid fa-arrow-left"></i></a>
                </div> 
                <div class="titleName">
                    <h1>SignUp</h1>
                </div>
                <div class="createrInfo tittleBoutton">
                    <span onclick="show_contact()"><i class="fa-solid fa-circle-info"></i></span>
               </div>
                <div class="createrInfo tittleBoutton">
                    <a href="search.php"><i class="fa-solid fa-list"></i></a>
                </div>
            </div>
        <div class="signup-form" >
            <div >
                <form id="signupForm" onsubmit="validateForm(event)"  method="post">
                    
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required >
                    <!-- <i class="fas fa-eye" onclick="show()" id="eye"></i> -->
                    
                    <label for="confirmPassword" >Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                    <!-- <i class="fas fa-eye" onclick="confrimShow()" id="confirmEye"></i> -->

                    <button type="submit">Sign Up</button>

                    <div id="errorMessage" class="error-message"></div>
                    <div id="errorPassword" class="error-password"></div>

                    
                </form>
                
            </div>
        </div>
        <?php include "contact.php" ?>
    </div>
    </section>
    
    


    <!-- <script type="text/javascript" src="script.js">       
    </script> -->
    <script>
        function validateForm(event) {
    // event.preventDefault();

    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorMessage = document.getElementById("errorMessage");
    var errorPassword = document.getElementById("errorPassword"); // Corrected variable name
    var regpass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[a-zA-Z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,}$/;
    var regEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    
    if (!password.match(regpass)) {
        errorPassword.textContent = "";
        errorMessage.textContent = "Password must have at least 8 characters, including at least one lowercase letter, one uppercase letter, one specail symbol and one digit.";
       
    } else {
        errorMessage.textContent = "";
        errorPassword.textContent = "";
        if(!email.match(regEmail)){
            errorMessage.textContent="Email must contain one '@' including at least one '.' ";
           
        }else{
            errorMessage.textContent = "";
            errorPassword.textContent = "";
            if (password !== confirmPassword) {
                errorPassword.textContent = "Passwords do not match. Please enter matching passwords.";
                
                }else{
                    // alert("SignUp completed");
                    // window.location.href = "order.php";
                    <?php 
     
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];

         $conn = mysqli_connect("localhost", "root", "", "web_app");

         if ($conn->connect_error) {
         die('Error connection: ' . $conn->connect_error);
         } else {
            $stmt = $conn->prepare("INSERT INTO login_details(username, email, password) VALUES (?,?,?)");
            $stmt->bind_param("sss",$username,$email,$password);
            $stmt->execute();
            header("Location:login.php");
                  
            $stmt->close();
            

         }
     }

    ?>
                }
        }
    } 
    
}
    </script>
</body>
</html>
