<?php

// 0p3
//dbCredentials.php for db credentials
include 'includes/dbCredentials.php';
//include used class
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
//start session and carry values over next pages
session_start();
$userInfos = new User;
$userInfos = $_SESSION['user'] ?? '';

//get choice from hidden input from pages
$choice = $_REQUEST['choice'] ?? 'toHome';
//check logged In state
$loggedIn = $_REQUEST['loggedIn'] ?? 'false';
//personal area or someone else´s
$area = $_REQUEST['area'] ?? '';
// get UserId
$id = $_REQUEST['id'] ?? '';
// get friendId
$idFriend = $_REQUEST['idFriend'] ?? '';
// get connectionsId
$idConn = $_REQUEST['idConn'] ?? '';
// get eventId
$idEv = $_REQUEST['idEv'] ?? '';


//retrieve data from signup page input fields
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$dateOfBirth = $_POST['dateOfBirth'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';

//retrieve data from Event Maker input fields or modify
$eventId = $_POST['eventId'] ?? '';
$name = $_POST['name'] ?? '';
$date = $_POST['date'] ?? '';
$place = $_POST['place'] ?? '';
$public = $_POST['public'] ?? '';

// parameters to upload info
$column = $_POST['column'] ?? '';
$newValue = $_POST["$column"] ?? '';

try {
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
        case 'toLegalTerms':
            $page = 'toLegalTerms';
            break;
        case 'toWishlist' :
            $page = 'toWishlist';
            break;
        case 'toEventMaker':
            $page = 'toEventMaker';
            break;
        case 'toMyEvents':
            $myEvs = new Event();
            $myEvs = $myEvs->getEventsFromUserId($userInfos->getId());
            $page = 'toMyEvents';
            break;
        case 'toUpdateEvent':
            $e = new Event;
            $e = $e->getObjectFromId($idEv);
            $page = 'toUpdateEvent';
            break;
        case 'toProfile':
            if ($area === 'user') {
                $page = 'toProfile';
            } elseif ($area === 'friend') {
                $f = (new User())->getObjectFromId($idFriend);
                $connExists = (new Connections())->checkIfConnected($userInfos->getId(), $f->getId());
                $page = 'toFriendsProfile';
            }
            break;
        case 'toFriendList':
            $c = new Connections();
            $list = $c->getConnections($userInfos);
            $u = [];
            foreach ($list as $value) {
                $connectedTo = $value->connectedTo;
                $cUser = new User;
                $u[] = $cUser->getObjectFromId($value->connectedTo);
            }
            $page = 'toFriendList';
            break;
        case 'toWelcome':
//        if session is lost for any reason trying to reach toWelcome, user is redirected to homepage
            if (isset($_SESSION['user'])) {
                $e = new Event();
                $upcomingEvents = $e->getEventsByUserId($userInfos->getId());
                $_SESSION['error'] = '';
                $page = 'toWelcome';
            } else {
                $page = 'toHome';
                $_SESSION['error'] = 'Your session has expired. Please try again';
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
                $userInfos = $log->getObject();
                $_SESSION['user'] = $userInfos;
                $e = new Event();
                $upcomingEvents = $e->getEventsByUserId($userInfos->getId());
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
            if ($area === 'user') {
                $u = new User();
                $u = $_SESSION['user'];
                $u->updateInfo($column, $newValue);
                $user = $u->getObject();
                $_SESSION['user'] = $user;
                $page = 'toProfile';
            } elseif ($area === 'event') {
                $e = new Event();
                $e = $e->getObjectFromId($eventId);
                $e->updateInfo($column, $newValue);
                $e = $e->getObjectFromId($eventId);
                $page = 'toUpdateEvent';
            }
            break;
        case 'delete':
            if ($area === 'connections') {
                $c = new Connections();
                $c->delete($idConn);
                $f = (new User())->getObjectFromId($idFriend);
                $connExists = (new Connections())->checkIfConnected($userInfos->getId(), $f->getId());
                $page = 'toFriendsProfile';
            } elseif ($area === 'user') {
                $u = new User();
                $u->delete($userInfos->getId());
                // unset all the session variables
                session_unset();
                // destroy the session.
                session_destroy();
                $page = 'toHome';
            } elseif ($area === 'event') {
                $e = new Event();
                $e->delete($idEv);
                $myEvs = new Event();
                $myEvs = $myEvs->getEventsFromUserId($userInfos->getId());
                $page = 'toMyEvents';
            }
            break;
        case 'create':
            //user follows another user. Connection created
            if ($area === 'connections') {
                $c = new Connections();
                $c->createNew($userInfos->getId(), $idFriend);
                $f = (new User())->getObjectFromId($idFriend);
                $connExists = (new Connections())->checkIfConnected($userInfos->getId(), $f->getId());
                $page = 'toFriendsProfile';
            } elseif ($area === 'user') {
                //if password fields match, data is stored in database
                if ($password === $confirmPassword) {
                    // check if email already exists in Db
                    $checkEmail = (new User())->checkForEmail($email);
                    // if method checkForDoubleEmail returns false, aka no identical email on database,
                    // then go on with registration
                    if ($checkEmail === false) {
                        $_SESSION['error'] = '';
                        (new User())->createNew($firstName, $lastName, $dateOfBirth, $email, $password);
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
            } elseif ($area === 'event') {
                $ev = new Event();
                $ev = $ev->createNew($userInfos->getId(), $name, $date, $place, $public);
                if ($public === 'false') {
                    $g = new Guests();
                    $gIds = $_POST['guest'];
                    $g->createNew($gIds, $ev->getId());
                }
                unset ($_POST['choice']);
                $myEvs = new Event();
                $myEvs = $myEvs->getEventsFromUserId($userInfos->getId());
                $page = 'toMyEvents';
            }
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
} catch (Exception $e) {
    $choice = 'doublecheck';
    $area = '';
}

//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
include 'pages/' . $page . '.php';