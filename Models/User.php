<?php
require "validate.php";
require "../config/MysqlDb.php";
class User extends MysqlDb
{
    public function getUser($value)
    {
        return $this->getOne('users', 'email', $value);
    }

    public function register($request)
    {
        if (isset($request)) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $RePassword = md5($_POST['Re_password']);
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
            ];
            $message = [];

            $error = validateRegister($username, $email, $_POST['password'], $_POST['Re_password']);
            if (empty($error)) {
                if ($password === $RePassword) {
                    $user = $this->getUser($email);
                    if (!isset($user)) {
                        $this->insert("users", $data);
                        echo "<script>alert('Register success. Login now!')</script>";
                        echo '<script>window.location.href="login.php"</script>';
                    } else {
                        if ($user['username'] === $username) {
                            $message['used'] = "Username is already taken!";
                        } else if ($user['email'] === $email) {
                           $message['used'] = "Email address is already taken!";
                        }
                    }
                } else {
                    $message['fail'] = "Confirm password is incorrect!";
                }
                return $message;
            }
            return $error;
        }
    }

    public function login($request)
    {       
        $cookie_name = "auth";
        $cookie_expiry = 3600 * 24 * 30; 
        if(isset($request)) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $msg=[];
            $user = $this->getUser($email);

            $error = validateLogin($email, $_POST['password']);
            $remember = isset($_POST['remember']) ? $password : '';
            
            if (empty($error)) {
                if ($user['password'] === $password && $user['email'] === $email) {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['id'] = $user['email'];
                    if($remember === $password) {
                        setcookie($cookie_name, 'user='.$user['username'].'&pw='.$user['password'], time() + $cookie_expiry, '/', '', 0);
                    }
                    header("location: ../page/articles/index.php");
                } else {
                    $msg['error'] = "Incorrect email or password";
                }
                return $msg;
            }
            return $error;
        }
    }
}
