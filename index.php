<?php

// 0p3

//start session and carry values over next pages
session_start();
//dbCredentials.php for db credentials
include 'includes/dbCredentials.php';
//include class User
include 'class/User.php';


//get choice from hidden input from pages
$choice = $_REQUEST['choice'] ?? 'toHome';

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
    case 'toLegalTerms':
        $page = 'toLegalTerms';
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
            $resPwd = (new User())->updateInfo($email, $password);
            //updateInfo returns true if email is found in Db
            if ($resPwd === true) {
                $_SESSION['error'] = '';
                $page = 'toHome';
                //if updateInfo return false then no email is found in Db
            } else {
                $_SESSION['error'] = 'Email not found';
                $page = 'toResetPasswd';
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
            $_SESSION['user'] = (new User())->getAllAsObject($email);
            $page = 'toWelcome';
        }
        break;
    case 'toWelcome':
        if (isset($userInfos)) {
            $_SESSION['error'] = '';
            $page = 'toWelcome';
        } else {
            $page = 'toHome';
            $_SESSION['error'] = 'Your session has expired. Please try again';
        }
        break;
    case 'logout':
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