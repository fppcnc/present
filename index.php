<?php

// 0p3


//dbCredentials.php for db credentials
include 'includes/dbCredentials.php';
//include class User
include 'class/User.php';
//start session and carry values over next pages
session_start();

//get choice from hidden input from pages
$choice = $_REQUEST['choice'] ?? 'toHome';

$id = $_REQUEST['id'] ?? '';

//get data from signup page
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$dateOfBirth = $_POST['dateOfBirth'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';


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
    case 'toProfile':
        $page = 'toProfile';
        break;
    case 'toLegalTerms':
        $page = 'toLegalTerms';
        break;
    case 'toWelcome':
//        if session is lost for any reason trying to reach toWelcome, user is redirected to homepage
        if (isset($_SESSION['user'])) {
            $_SESSION['error'] = '';
            $page = 'toWelcome';
        } else {
            $page = 'toHome';
            $_SESSION['error'] = 'Your session has expired. Please try again';
        }
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
    case 'resetPasswd':
        //if password fields match, data is stored in database
        if ($password === $confirmPassword) {
            // check if email exists in Db
            $checkEmail = (new User())->checkForEmail($email);
            // if checkForEmail finds something, then stores it in $checkEmail
            if ($checkEmail === true) {
                // reset password
                $password = password_hash($password, PASSWORD_DEFAULT);
                $resPwd = (new User())->updateInfo('password', $password);
                if ($resPwd === true) {
                    $_SESSION['error'] = '';
                    $page = 'toHome';
                    //if updateInfo return false then no email is found in Db
                } else {
                    $_SESSION['error'] = 'Email not found';
                    $page = 'toResetPasswd';
                }
            }
        } else {
            $_SESSION['error'] = "Given Passwords don´t match";
            $page = 'toResetPasswd';
        }
        break;
    case 'login':
        //grant access to next page if email and password match data in Db
        $log = (new User())->grantAccess($email, $password);
        if ($log === false) {
            $page = 'toLogin';
            $_SESSION['error'] = "Email and Password dont´t match";
        } else {
            // here user is logged in
            $_SESSION['error'] = '';
            $user = (new User())->getObject($id);
            print_r($user);
            $_SESSION['user'] = $user;
            $page = 'toWelcome';
        }
        break;
    case 'updateInfo':
        $user = new User($id, $firstName, $lastName, $dateOfBirth, $email, $password);
        $user->updateInfo();
        $page = 'toWelcome';
        break;
    case
    'logout':
        session_unset();
        $page = 'toHome';
        break;
    default :
        $page = $choice;
        break;
}

//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
include 'pages/' . $page . '.php';