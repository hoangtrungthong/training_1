<?php
require "Models/Article.php";
session_start();
error_reporting(0);

if (!isset($_SESSION['username']) && !isset($_COOKIE['auth'])) {
    header("location: Views/login.php");
}

$article = new Article($conn); 
$articles = $article->getAllArticles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/style.css">
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
                <a href="Controllers/UsersController.php">Logout</a>
            </li>
        </ul>
    </header>
    <div>
        <table>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
            </tr>
            <?php
            foreach ($articles as $article) {
            ?>
                <tr>
                    <td><?php echo $article['title'] ?></td>
                    <td><?php echo $article['content'] ?></td>
                    <td><?php echo $article['username'] ?></td>
                </tr>
            <?php
            }
            ?>

        </table>
    </div>
</body>
</html>