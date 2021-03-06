<?php
require '../../Models/Article.php';
error_reporting(0);
session_start();

if (!isset($_SESSION['username']) && !isset($_COOKIE['auth'])) {
    header("location: ../../Views/login.php");
}

$articles = new Article($conn);
$article = $articles->add($_POST['add']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo bài viết</title>
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
    <div class="articles">
        <form action="" method="post">
            <h1>Create articles</h1>
            <div>
                <label for="title">Title:</label>
                <input id="title" type="text" name="title" value="<?php echo $_POST['title'] ?>">
            </div>
            <p class="highlight"><?php echo $article['title'] ?></p>
            <div>
                <label for="content">Content:</label>
                <textarea name="content" id="content" cols="30" rows="10" ><?php echo $_POST['content'] ?></textarea>
            </div>
            <p class="highlight"><?php echo $article['content'] ?></p>
            <a class="btn" href="index.php">Back to list</a>
            <button class="btn" type="submit" name="add">Create</button>
        </form>
    </div>
</body>

</html>
