<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
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
                        <input type="hidden" name="choice" value="register">
                        <div class="presentBigTitle">
                            Sign Up
                        </div>
                        <?php if (!empty($_SESSION['error'])) { ?>
                            <div><?php echo $_SESSION['error']; ?></div><?php } ?>
                        <input type="text" id="homeSignUpFirstName" class="input-home bordersRules"
                               placeholder="First Name" name="firstName" required>
                        <input type="text" id="homeSignUpLastName" class="input-home bordersRules"
                               placeholder="Last Name" name="lastName" required>
                        <input type="date" id="homeSignUpDateOfBirth" class="input-home bordersRules" name="dateOfBirth"
                               required>
                        <input type="email" id="homeSignUpEmail" class="input-home bordersRules" placeholder="Email"
                               name="email" required>
                        <input type="password" id="homeSignUpPassword" class="input-home bordersRules"
                               placeholder="Password" name="password" required>
                        <input type="password" id="homeSignUpConfirmPassword" class="input-home bordersRules"
                               placeholder="Confirm Password" name="confirmPassword" required>
                    </div>
                    <div class="tAndC">
                        By clicking "Register", you agree to our <a href="index.php?choice=toLegalTerms"> Terms of Use</a>.
                    </div>
                    <div class="tAndC p-t-0">
                        Our <a href="index.php?choice=toLegalTerms"> Privacy Policy </a> explains how we collect, use, and share your information.
                    </div>
                    <div class="homeButtonsContainer p-t-5">
                        <button type="submit" class="button-home bordersRules" id="homeSignUpSubmit">Register</button>
                        <button type="button" class="button-home bordersRules"
                                onclick="window.location.href='index.php?choice=toHome';">Back to Home</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php";?>
</body>
</html><?php
