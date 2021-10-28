<?php
function validateRegister($username, $email, $password, $rePassword)
{
    $errors =[];
    if (!$username ) {
        $errors['name'] = "Please enter username!";
    } else if (strlen($username) < 5) {
        $errors['name'] = 'Username must be at least 5 characters';
    } else if (strlen($username) > 20) {
        $errors['name'] = 'Username is limited to 20 characters';
    }

    if (!$email) {
        $errors['email'] = "Please enter email address!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address format!";
    }
    
    if (!$password) {
        $errors['password'] = "Please enter password!";
    } else if(strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }
    
    if (!$rePassword) {
        $errors['rePassword'] = "Please enter confirm password!";
    }

    return $errors;
}

function validateLogin($email, $password) {
    $errors= [];
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
