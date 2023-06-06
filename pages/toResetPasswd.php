<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility.css">
</head>
<body>
<div class="limiter">
    <div class="mainContainer">
        <div class="wrapContainer">
            <div class="homeSignUp-content bordersRules">
                <form class="welcome-form" method="post" action="index.php">
                    <div class="homeInputsContainer">
                        <input type="hidden" name="choice" value="resetPasswd">
                        <input type="hidden" name="loggedIn" value="false">
                        <div class="presentBigTitle">
                            Password Reset
                        </div>
                        <?php if (!empty($_SESSION['error'])) { ?>
                            <div><?php echo $_SESSION['error']; ?></div><?php } ?>
                        <input type="email" id="resetPasswdEmail" class="input-home bordersRules" placeholder="Email"
                               name="email" required>
                        <input type="password" id="resetPasswdPassword" class="input-home bordersRules"
                               placeholder="New Password" name="password" required>
                        <input type="password" id="resetPasswdConfirmPassword" class="input-home bordersRules"
                               placeholder="Confirm New Password" name="confirmPassword" required>
                    </div>
                    <div class="homeButtonsContainer p-t-50">
                        <button type="submit" class="button-home bordersRules" id="resetPasswdSubmit" name="column"
                                value="password">
                            Reset Password
                        </button>
                        <button type="button" class="button-home bordersRules"
                                onclick="window.location.href='index.php?choice=toHome';">Back to Home
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php include "includes/footer.php";?>
</body>
</html><?php