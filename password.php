<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Toggle</title>
</head>
<body>

    <label for="password">Password:</label>
    <input type="password" id="password">
    <button onclick="togglePassword()">Toggle Password</button>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");

            // Check the current type of the input
            var currentType = passwordInput.getAttribute("type");

            // Toggle between "text" and "password"
            var newType = (currentType === "password") ? "text" : "password";

            // Update the type attribute
            passwordInput.setAttribute("type", newType);
        }
    </script>

</body>
</html>

<?php
$conn = mysqli_connect('localhost','root','');

if(!$conn){
    die("connection failed" .mysqli_connect_errno());
}
$sql="CREATE TABLE rabin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
    )";

?>

<?php
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
$email = $_POST['email'];
$sql = "INSERT INTO users (username, password,email) VALUES ('$username', '$password',$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> -->
