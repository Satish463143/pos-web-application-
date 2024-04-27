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
    <section class="container login_box" style="position: relative;">
        <form action="login.php" method="post" id="login_form" style="position: absolute; top:20vh;">
            <label for="email">Enter the email:</label>
            <input type="text" id="email" name="email" required>

            <button type="submit" onclick="verfyLogin()" name="login_submit">Proceed</button>
        </form>
    </section>
</body>
</html>        
