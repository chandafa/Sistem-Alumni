<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
    <!-- membuat form -->
        <form action="proses_login.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
        <!--copyright start-->
        <footer>
        <address>
            <center>&copy<a href="https://blogchanit.my.id">Project G16</a></center>
        </address>
        </footer>
        <!--copyright end-->
    </div>
</body>
</html>