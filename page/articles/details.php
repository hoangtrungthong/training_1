<?php
require "../../Models/Article.php";

$articles = new Article($conn);
$article = $articles->getDetails();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details article</title>
    <link rel="stylesheet" href="../../vendor/style.css">
</head>
<body>
<header>
        <ul>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <li>Hello, <?php echo $_SESSION['username']; ?></li>
            <?php
            } else if (isset($_COOKIE['auth'])) {
                parse_str($_COOKIE['auth'], $get_user);
            ?>
                <li>Hello, <?php echo $get_user['user']; ?></li>
            <?php
            }
            ?>
            <li>
                <a href="../../Controllers/UsersController.php">Logout</a>
            </li>
        </ul>
    </header>
    <div class="details">
        <ul>
            <li>TiTle: <?php echo $article['title'] ?></li>
            <li>Content: <?php echo $article['content'] ?></li>
        </ul>
        <a class="btn" href="index.php">Back to list</a>
    </div>
</body>
</html>