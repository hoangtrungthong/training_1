<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("location: Views/login.php");
}
echo 'Hello,'.$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./Controllers/UsersController.php">thoat</a>
    <div>
        <a href="page/articles/create.php">Create new</a>
        <table>
            <tr>
                <th>Title</th>
                <th>Content</th>
            </tr>
            <tr></tr>
        </table>
    </div>
</body>
</html>
