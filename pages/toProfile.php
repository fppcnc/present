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

<?php $userInfos = $_SESSION['user'][0]; ?>
<div class="limiter">
    <div class="mainContainer">
        <?php include "includes/header.php"; ?>
        <div class="wrapContainer">
            <div class="personalArea-container">
                <nav class="personalArea-sideBar">
                </nav>
                <div class="personalArea-content bordersRules">
                    <form class="welcome-form" method="post" action="index.php">
                        <div class="homeInputsContainer p-t-10">
                            <input type="hidden" name="choice" value="updateInfo">
                            <span><label for="personalAreaFirstName">First Name</label>
                            <input type="text" id="personalAreaFirstName" class="input-home bordersRules"
                                   name="firstName" value="<?php echo $userInfos->getFirstName() ?>" required>
<!--                                <button type="submit" class="button-personalArea bordersRules m-t-5" id="updateFirstName" name="column" value="firstName">Update</button>-->
                            </span>
                            <span><label for="personalAreaFirstName">Last Name</label>
                        <input type="text" id="personalAreaLastName" class="input-home bordersRules"
                               name="lastName" value="<?php echo $userInfos->getLastName() ?>" required>
<!--                                <button type="submit" class="button-personalArea bordersRules m-t-5" id="updateLastName" name="column" value="lastName">Update</button>-->
                            </span>
                            <span><label for="personalAreaFirstName">Email</label>
                        <input type="email" id="personalAreaEmail" class="input-home bordersRules"
                               name="email" value="<?php echo $userInfos->getEmail() ?>" required>

                            </span><button type="submit" class="button-personalArea bordersRules m-t-5" id="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/welcome.js"></script>
</body>
</html><?php