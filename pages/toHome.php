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
Primary HomePage <br>

<button type="button" id="homeToSignUp" onclick="window.location.href='index.php?choice=toSignUp';">
    Sign Up
</button>

<button type="button" id="homeToLogin" onclick="window.location.href='index.php?choice=toLogin';">
    Login
</button>
</body>
</html><?php
