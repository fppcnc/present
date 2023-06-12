<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility.css">
</head>
<!--<input type="hidden" name="choice" value="register">-->
<body>
<!--everything inside body element is enclosed in a limiter-->
<div class="limiter">
    <!--    mainContainer contains everything-->
    <div class="mainContainer" id="homeMainContainer">
        <!--        loginPopup is called by JS. change display from none to flex-->
        <div class="homePopUp bordersRules" id="homeLogin">
            <div class="homeLogin-content">
                <form class="welcome-form" method="post" action="index.php">
                    <div class="x">
                        <input type="image" id="homeLoginBack" class="image-button"
                               src="../img/transparent-x-logo.png" alt="Back">
                    </div>
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
                    </div>
                    <div class="presentText fs-15 p-t-20">
                        <a href="index.php?choice=toResetPasswd">
                            Forgot your password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="homePopUp bordersRules " id="homeSignUp">
            <div class="homeSignUp-content">
                <form class="welcome-form" method="post" action="index.php">
                    <div class="x">
                        <input type="image" id="homeSignUpBack" class="image-button"
                        src="../img/transparent-x-logo.png" alt="Back">
                    </div>
                    <div class="homeInputsContainer">
                        <input type="hidden" name="choice" value="create">
                        <input type="hidden" name="area" value="user">
                        <div class="presentBigTitle">
                            Sign Up
                        </div>
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
                    <div class="tAndC">
                        Our <a href="index.php?choice=toLegalTerms"> Privacy Policy </a> explains how we collect, use, and share your information.
                    </div>
                    <div class="homeButtonsContainer">
                        <button type="submit" class="button-home bordersRules" id="homeSignUpSubmit">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="wrapContainer" id="homeWrapContainer">
            <div class="homeSelection bordersRules">
                <div class="presentText fs-25" id="homeText1">
                    Introducing Present!
                </div>
                <div class="presentText fs-15 p-t-40" id="homeText2">
                    Your companion for creating unique occasions and sharing your desires with loved ones.
                    Whether it's a birthday, anniversary, graduation, or any milestone worth celebrating,
                    let others know exactly what would make your day truly special.
                </div>
                <div class="homeButtonsContainer p-t-50">
                    <button type="button" class="button-home bordersRules" id="homeToLogin">Login
                    </button>
                    <button type="button" class="button-home bordersRules" id="homeToSignUp">Sign Up
                    </button>
                </div>
                <div class="presentText fs-15 p-t-20">
                    <a href="index.php?choice=toResetPasswd">
                        Forgot your password?
                    </a>
                </div>
            </div>
            <div class="welcome-leftArea">
                <div class="presentBigTitle">
                    Present
                </div>
                <div class="hidden presentSubTitle" id="homeSubTitle">
                    Makes your Wishes come True
                </div>
                <div class="hidden presentSlogan" id="homeSlogan">
                    Planning an event can be hard.
                    Knowing the right present shouldn't be.
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/homepage.js"></script>
</body>
</html><?php
