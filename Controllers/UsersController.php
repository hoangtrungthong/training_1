<?php
session_start();
if (isset($_SESSION['username']) || isset($_COOKIE['auth'])) {
    unset($_SESSION['username']);
    setcookie('auth','',time() - (3600 * 24 * 30), '/', '', 0);
    header("location: ../Views/login.php");
}
