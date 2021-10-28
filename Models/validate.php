<?php
function validateRegister($username, $email, $password, $rePassword)
{
    $errors = [];
    if (!$username) {
        $errors['name'] = "Please enter username!";
    } else if (!preg_match("/^[A-Za-z][A-Za-z0-9]{5,31}$/", $username)) {
        $errors['name'] = 'Username can only letters, numbers and be between 5 and 31 characters in length.';
    }

    if (!$email) {
        $errors['email'] = "Please enter email address!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address format!";
    }
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    if (!$password) {
        $errors['password'] = "Please enter password!";
    } else if (!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
        $errors['password'] = "Mật khẩu phải nhiều hơn 6 kí tự và bao gồm chữ hoa chữ thường và số ";
    }

    if (!$rePassword) {
        $errors['rePassword'] = "Please enter confirm password!";
    }

    return $errors;
}

function validateLogin($email, $password)
{
    $errors = [];
    if (!$email) {
        $errors['email'] = "Please enter email address!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address format!";
    }

    if (!$password) {
        $errors['password'] = "Please enter password!";
    }
    return $errors;
}

function validateArticle($title, $content)
{
    $errors = [];
    if (!$title) {
        $errors['title'] = "Please enter title!";
    } else if (strlen($title) < 5) {
        $errors['title'] = 'Title must be at least 5 characters';
    } else if (strlen($title) > 100) {
        $errors['title'] = 'Title is limited to 100 characters';
    }

    if (!$content) {
        $errors['content'] = "Please enter content!";
    } else if (strlen($content) < 20) {
        $errors['content'] = 'Content must be at least 20 characters';
    }
    return $errors;
}
