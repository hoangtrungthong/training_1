<?php
require '../Models/User.php';
error_reporting(0);
session_start();

$users = new User($conn);
$user = $users->login($_POST['login']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="../vendor/styles.css">
</head>
<body>
    <div>
        <form action="" method="post">
            <h1>Login Account</h1>
            <div>
                <img src="../images/email.png">
                <input type="email" name="email" placeholder="Email Address" value="<?php echo $_POST['email'] ?>" required>
                <p class="highlight"><?php echo $user['email'] ?></p>
            </div>
            <div>
                <img src="../images/unauthorized-person.png">
                <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password'] ?>" required>
                <p class="highlight"><?php echo $user['password'] ?></p>
            </div>
            <div id="keep">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <p class="highlight"><?php echo $user['error'] ?></p>
            <button type="submit" name="login">Login</button>
            <p>Don't have a account? <a href="register.php">Register &raquo;</a></p>
        </form>
    </div>
</body>
</html>
