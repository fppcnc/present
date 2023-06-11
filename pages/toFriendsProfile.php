<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Friend´s Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility.css">
</head>
<body>
<div class="limiter">
    <div class="mainContainer">
        <?php include "includes/header.php"; ?>
        <div class="wrapContainer">
            <div class="centralArea">
                <?php include "includes/sideMenu.php"; ?>
                <?php include "includes/sidebarSearch.php"; ?>
                <div class="friendsList">
                    <h1>
                        <div class="presentBigTitle">Friend´s Profile</div>
                    </h1>
                    <h3>Here´s personal info about a User</h3>

                    <div class="personalArea-content bordersRules">

                        <div class="welcome-form">
                            <div class="homeInputsContainer">
                                <input type="hidden" name="choice" value="updateInfo">
                                <span><label for="personalAreaFirstName">First Name</label>
                                <input type="text" id="personalAreaFirstName" class="input-home bordersRules"
                                       name="firstName" value="<?php echo $f->getFirstName() ?>" readonly>
                            </span>
                                <span><label for="personalAreaLastName">Last Name</label>
                                <input type="text" id="personalAreaLastName" class="input-home bordersRules"
                                       name="lastName" value="<?php echo $f->getLastName() ?>" readonly>
                            </span>
                                <span><label for="personalAreaEmail">Email</label>
                                <input type="email" id="personalAreaEmail" class="input-home bordersRules"
                                       name="email" value="<?php echo $f->getEmail() ?>" readonly>
                            </span>
                                <span><label for="personalAreaFirstName">Date of Birth</label>
                                <input type="date" id="personalAreaDateOfBirth" class="input-home bordersRules"
                                       name="dateOfBirth" value="<?php echo $f->getDateOfBirth() ?>" readonly>
                            </span>
                                <div class="homeButtonsContainer">
                                    <button
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html><?php
