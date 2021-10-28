<?php
require '../../config/MysqlDb.php';
require '../../Models/Article.php';
error_reporting(0);
session_start();

$articles = new Article($conn);
$article = $articles->add($_POST['add']);
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
                <label for="title">title</label>
                <input id="title" type="text" name="title" value="<?php echo $_POST['title'] ?>">
                <p class="highlight"><?php echo $user['email'] ?></p>
            </div>
            <div>
                <label for="content">content</label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
                <p class="highlight"><?php echo $user['password'] ?></p>
            </div>
            <p class="highlight"><?php echo $user['error'] ?></p>
            <button type="submit" name="add">Create</button>
        </form>
    </div>
</body>
</html>
