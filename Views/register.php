<?php
require '../Models/User.php';
error_reporting(0);

$users = new User($conn);
$user = $users->register($_POST['register']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Kí</title>
    <link rel="stylesheet" href="../vendor/style.css">
</head>
<body>
    <div>
        <form action="" method="post">
            <h1>Register Account</h1>
            <div>
                <img src="../images/man.png">
                <input type="text" name="username" placeholder="Username" value="<?php //echo $_POST['username'] ?>" required>
                <p class="highlight"><?php echo $user['name'] ?></p>
            </div>
            <div>
                <img src="../images/email.png">
                <input type="email" name="email" placeholder="Email Address" value="<?php //echo $_POST['email'] ?>" required>
                <p class="highlight"><?php echo $user['email'] ?></p>
            </div>
            <div>
                <img src="../images/unauthorized-person.png">
                <input type="password" name="password" placeholder="Password" value="<?php //echo $_POST['password'] ?>" required>
                <p class="highlight"><?php echo $user['password'] ?></p>
            </div>
            <div>
                <img src="../images/unauthorized-person.png">
                <input type="password" name="Re_password" placeholder="Confirm password" value="<?php //echo $_POST['Re_password'] ?>" required>
                <p class="highlight"><?php echo $user['rePassword'] ?></p>
            </div>
            <p class="highlight"><?php echo $user['used'] ?></p>
            <p class="highlight"><?php echo $user['fail'] ?></p>
            <button class="btn" type="submit" name="register">Register</button>
            <p>Have a account? <a href="login.php">Login &raquo;</a></p>
        </form>
    </div>
</body>
</html>