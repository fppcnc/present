<?php

// 0p3


//dbCredentials.php for db credentials
include 'includes/dbCredentials.php';
//include class User
//include 'class/User.php';
//include used class
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
//start session and carry values over next pages
session_start();

//get choice from hidden input from pages
$choice = $_REQUEST['choice'] ?? 'toHome';
//check logged In state
$loggedIn = $_REQUEST['loggedIn'] ?? 'false';
//personal area or someone else´s
$area = $_REQUEST['area'] ?? '';
// get UserId
$id = $_REQUEST['id'] ?? '';

//get data from signup page
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$dateOfBirth = $_POST['dateOfBirth'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';

// parameters to upload info
$column = $_POST['column'] ?? '';
$newValue = $_POST["$column"] ?? '';

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//echo '<pre>';
//print_r($_REQUEST);
//echo '</pre>';

//access toHome.php
switch ($choice) {
    //playground page
    case 'doublecheck':
        $page = 'doublecheck';
        break;
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
        if ($area === 'personal') {
            $page = 'toProfile';
        }
        break;
    case 'toLegalTerms':
        $page = 'toLegalTerms';
        break;
        case 'toEventMaker':
        $page = 'toEventMaker';
        break;
        case 'toFriendList':
        $page = 'toFriendList';
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
    case 'login':
        //grant access to next page if email and password match data in Db
        $log = (new User())->grantAccess($email, $password);
        if ($log === false) {
            $page = 'toLogin';
            $_SESSION['error'] = "Email and Password dont´t match";
        } else {
            // here user is logged in
            $_SESSION['error'] = '';
            $user = $log->getObject();
            $_SESSION['user'] = $user;
            $page = 'toWelcome';
        }
        break;
    case 'resetPasswd':
        if ($loggedIn === 'true') {
            $u = new User();
            $u = $_SESSION['user'];
            if ($password === $confirmPassword) {
                $u->updateInfo($column, $newValue);
                $user = $u->getObject();
                $_SESSION['user'] = $user;
                $_SESSION['error'] = '';
                $page = 'toProfile';
            } else {
                $_SESSION['error'] = "Given Passwords don´t match";
                $page = 'toWelcome';
            }
        } elseif ($loggedIn === 'false') {
            if ($password === $confirmPassword) {
                $resPwd = new User();
                $u = $resPwd->grantAccess($email, null);
                if ($u === false) {
                    $_SESSION['error'] = 'Email not found';
                    $page = 'toResetPasswd';
                } else {
                    $u->updateInfo($column, $newValue);
                    $_SESSION['error'] = '';
                    $page = 'toHome';
                }
            } else {
                $_SESSION['error'] = "Given Passwords don´t match";
                $page = 'toResetPasswd';
            }
        }
        break;
    case 'updateInfo':
        $u = new User();
        $u = $_SESSION['user'];
        $u->updateInfo($column, $newValue);
        $user = $u->getObject();
        $_SESSION['user'] = $user;
        $page = 'toProfile';
        break;
    case 'logout':
// unset all the session variables
        session_unset();
        // destroy the session.
        session_destroy();
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