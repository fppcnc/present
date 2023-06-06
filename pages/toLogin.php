<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility.css">
</head>
<body>
<div class="limiter">
    <div class="mainContainer">
    <div class="wrapContainer">
        <div class="homeLogin-content bordersRules">
        <form class="welcome-form" method="post" action="index.php">
            <div class="homeInputsContainer">
                <div class="presentBigTitle">
                    Login
                </div>
                <input type="hidden" name="choice" value="login">
                <?php if (!empty($_SESSION['error'])) { ?>
                    <div><?php echo $_SESSION['error']; ?></div><?php } ?>
                <input type="email" id="loginEmail" class="input-home bordersRules" name="email"
                       placeholder="Email" required>
                <input type="password" id="loginPassword" class="input-home bordersRules" placeholder="Password"
                       name="password" required>
            </div>
            <div class="homeButtonsContainer p-t-50">
                <button type="submit" class="button-home bordersRules" id="loginSubmit">Login</button>
                <button type="button" class="button-home bordersRules"
                        onclick="window.location.href='index.php?choice=toHome';">Back to Home
                </button>
            </div>
            <div class="presentText fs-15 p-t-20">
                <a href="index.php?choice=toResetPasswd">
                    Forgot your password?
                </a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<?php include "includes/footer.php";?>
</body>
</html><?php
