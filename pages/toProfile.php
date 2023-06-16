<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Area</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility.css">
</head>
<body>
<?php $userInfos = $_SESSION['user']; ?>
<div class="limiter">
    <div class="mainContainer">
        <?php include "includes/header.php"; ?>
        <div class="wrapContainer">
            <div class="centralArea">
                <?php include "includes/sideMenu.php"; ?>
                <?php include "includes/sidebarSearch.php"; ?>
                <div class="friendsList">
                    <div class="presentSubTitle">
                        <h1>
                            Profile
                        </h1>
                    </div>
                    <h3>Here you can review and update your Infos</h3>
                    <div class="personalArea-container">
                        <nav class="personalArea-sideBar">
                            <button class="button-nav-white bordersRules m-b-5" onclick="toggleDisplay('zone1')"
                                    id="btn-1" autofocus>Personal Data
                            </button>
                            <button class="button-nav-white bordersRules m-b-5" onclick="toggleDisplay('zone2')"
                                    id="btn-2">Set New Password
                            </button>
                            <button class="button-nav-white bordersRules m-b-5 m-t-50" onclick="toggleDisplay('zone3')"
                                    id="btn-3">T&C
                            </button>
                            <button class="button-nav-white bordersRules m-b-5 m-t-50" style="color:darkred"
                                    onclick="toggleDisplay('zone4')" id="btn-4">Delete Account
                            </button>
                            <button class="button-nav-white bordersRules m-b-5"
                                    onclick="location.href='index.php?choice=logout';" style="color:darkred" id="btn-5">
                                LogOut
                            </button>
                        </nav>

                        <!--zone 1-->
                        <div class="personalArea-content bordersRules" id="zone1">
                            <form class="welcome-form" method="post" action="index.php">
                                <div class="homeInputsContainer">
                                    <input type="hidden" name="choice" value="updateInfo">
                                    <input type="hidden" name="area" value="user">
                                    <span><label for="personalAreaFirstName">First Name</label>
                                <input type="text" id="personalAreaFirstName" class="input-home bordersRules"
                                       name="firstName" value="<?php echo $userInfos->getFirstName() ?>" required>
                               <button type="submit" class="button-personalArea bordersRules m-t-5" id="updateFirstName"
                                       name="column" value="firstName">Update</button>
                            </span>
                                    <span><label for="personalAreaLastName">Last Name</label>
                                <input type="text" id="personalAreaLastName" class="input-home bordersRules"
                                       name="lastName" value="<?php echo $userInfos->getLastName() ?>" required>
                               <button type="submit" class="button-personalArea bordersRules m-t-5" id="updateLastName"
                                       name="column" value="lastName">Update</button>
                            </span>
                                    <span><label for="personalAreaEmail">Email</label>
                                <input type="email" id="personalAreaEmail" class="input-home bordersRules"
                                       name="email" value="<?php echo $userInfos->getEmail() ?>" required>
                                <button type="submit" class="button-personalArea bordersRules m-t-5" id="updateEmail"
                                        name="column" value="email">Update</button>
                            </span>
                                    <span><label for="personalAreaFirstName">Date of Birth</label>
                                <input type="date" id="personalAreaDateOfBirth" class="input-home bordersRules"
                                       name="dateOfBirth" value="<?php echo $userInfos->getDateOfBirth() ?>" required>
                               <button type="submit" class="button-personalArea bordersRules m-t-5"
                                       id="updateDateOfBirth"
                                       name="column" value="dateOfBirth">Update</button>
                            </span>
                                </div>
                            </form>
                        </div>
                        <!--                zone 2-->
                        <div class="personalArea-content bordersRules" id="zone2">
                            <form class="welcome-form" method="post" action="index.php">
                                <div class="homeInputsContainer">
                                    <input type="hidden" name="choice" value="resetPasswd">
                                    <input type="hidden" name="loggedIn" value="true">
                                    <span><label for="personalAreaNewPassword">New Password</label>
                                <input type="password" id="personalAreaNewPassword" class="input-home bordersRules"
                                       name="password" required>
                            </span>
                                    <span><label for="personalAreaConfirmPassword">Confirm New Password</label>
                                <input type="password" id="personalAreaConfirmPassword" class="input-home bordersRules"
                                       name="confirmPassword" required>
                                <button type="submit" class="button-personalArea bordersRules m-t-5" id="updatePassword"
                                        name="column" value="password">Update</button>
                            </span>
                                </div>
                            </form>
                        </div>
                        <!--zone 3-->
                        <div class="personalArea-content bordersRules" id="zone3">
                            <form class="welcome-form" method="post" action="index.php">
                                <div class="homeInputsContainer" style="overflow: auto;">
                                    Here goes legal stuff
                                </div>
                            </form>
                            <!--zone 4-->
                        </div>
                        <div class="personalArea-content bordersRules" id="zone4">
                            <div class="welcome-form">
                                <div class="homeInputsContainer">
                                    By clicking on this button you can delete your Account.<br>
                                    Be careful thought, as this action is irreversible.
                                    <button class="button-home bordersRules m-b-5 m-t-50" style="color:darkred"
                                            onclick="window.location.href='index.php?choice=delete&area=user';">
                                        Delete Account
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>
    <script src="js/personalArea.js"></script>
</body>
</html><?php