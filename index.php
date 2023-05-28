<?php

// 0p3
//dbCredentials.php for db credentials
include 'dbCredentials.php';
//include class User
include 'class/User.php';
//include CSS style
include 'css/style.css';

//get choice from hidden input from pages
$choice = $_REQUEST['choice'] ?? 'toHome';

//get data from signup page
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$dateOfBirth = $_POST['dateOfBirth'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

//access toHome.php
switch ($choice) {
//connected to pages
    case 'toHome':
        $page = 'toHome';
        break;
    case 'toLogin':
        $page = 'toLogin';
        break;
    case 'toSignUp';
        $page = 'toSignUp';
        break;
    case 'toResetPasswd':
        $page = 'toResetPasswd';
        break;
    case 'register':
        //if password fields match, data is stored in database
        if ($password === $confirmPassword) {
            // check if email already exists in Db
            $checkEmail = (new User())->checkForEmail($email);
            // if method checkForDoubleEmail returns false, aka no identical email on database,
            // then go on with registration
            if ($checkEmail === false) {
                $_SESSION['error'] = '';
                (new User())->registerNewUser($firstName, $lastName, $dateOfBirth, $email, $password);
                $_SESSION['error'] = '';
                $page = "toHome";
            } else {
                // if email is found in Db
                $_SESSION['error'] = 'This email is associated to another User';
                $page = 'toSignUp';
            }
            // if password fields don´t match, send back
        } else {
            $_SESSION['error'] = "Given Passwords don´t match";
            $page = 'toSignUp';
        }
        break;
    case 'login':
        //grant access to next page if email and password match data in Db
        $log = (new User())->grantAccess($email, $password);
        if ($log === false) {
            $page = 'toLogin';
            $_SESSION['error'] = "Email and Password dont´t match";
        } else {
            $_SESSION['error'] = '';
            $page = 'toWelcome';
        }
        break;
    default :
        $page = $choice;
        break;
}
include 'pages/' . $page . '.php';