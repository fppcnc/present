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
<input type="hidden" name="choice" value="register">
<body>
<!--everything inside body element is enclosed in a limiter-->
<div class="limiter">
<!--    mainContainer contains everything-->
    <div class="mainContainer" id="homeMainContainer">
<!--        loginPopup is called by JS. change display from none to flex-->
        <div class="homeLoginPopUp bordersRules" id="homeLogin">
            <div class="homeLoginPopUp-content ">
                <form class="welcome-form" method="post" action="index.php">
                    <div class="homeInputsContainer">
                    <input type="hidden" name="choice" value="login">
                    <?php if (!empty($_SESSION['error'])) { ?>
                        <div><?php echo $_SESSION['error']; ?></div><?php } ?>
                    <input type="email" id="loginEmail" class="input-home bordersRules" name="email" placeholder="Email" required>
                    <input type="password" id="loginPassword" class="input-home bordersRules" placeholder="Password" name="password" required>
                    </div>
                    <div class="homeButtonsContainer">
                    <button type="submit" class="button-home bordersRules" sstyle id="loginSubmit">Login</button>
                    <button type="button" class="button-home bordersRules" id="homeBack">Back to Home</button>
                </form>

            </div>
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
                <div class="homeButtonsContainer">
                    <button type="button" class="button-home bordersRules" id="homeToLogin">
                        Login
                    </button>
                    <button type="button" class="button-home bordersRules" id="homeToSignUp"
                            onclick="window.location.href='index.php?choice=toSignUp';">
                        Sign Up
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
<script src="../js/js.js"></script>
</body>
</html><?php
