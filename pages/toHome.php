<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<input type="hidden" name="choice" value="register">
<body>
<!--everything inside body element is enclosed in a limiter-->
<div class="limiter">
    <div class="mainContainer">
        <div class="wrapContainer">
            Primary HomePage <br>
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
    </div>
</div>
</body>
</html><?php
