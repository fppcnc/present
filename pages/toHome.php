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
    <div class="mainContainer">
        <div class="wrapContainer">
            <div class="homeSelection">
                <div class="presentBigTitle">
                Present
                </div>
                <div class="hidden presentSubTitle p-t-25" id="homeSubTitle">
                    Makes your Wishes come True
                </div>
                <div class="hidden presentSlogan p-t-15" id="homeSlogan">
                    Planning an event can be hard.
                    Knowing the right present shouldn't be.
                </div>
                <div class="hidden presentText fs-25 p-t-40" id="homeText1">
                    Introducing Present!
                </div>
                    <div class="hidden presentText fs-15 p-t-40" id="homeText2">
                    Your ultimate companion for creating unique occasions and sharing your desires with loved ones.
                    Whether it's a birthday, anniversary, graduation, or any milestone worth celebrating,
                    let others know exactly what would make your day truly special.

                    </div>
                <a href="index.php?choice=toSignUp">
                    <button type="button" id="homeToSignUp">
                        Sign Up
                    </button>
                </a>
                <a href="index.php?choice=toLogin">
                    <button type="button" id="homeToLogin">
                        Login
                    </button>
                </a>

            </div>
            <div class="welcome-leftAreaImg" style="background-image: url('img/gifts.jpeg');">
                <div class="flEnd ">
                    <div class="presentSlogan" style="color: black; font-weight: 700;">
                    Guessing Games and Unwanted Presents belong now to the past
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/js.js"></script>
</body>
</html><?php
