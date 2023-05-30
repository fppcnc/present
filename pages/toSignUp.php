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
<?php if (!empty($_SESSION['error'])) { ?>
    <div><?php echo $_SESSION['error']; ?></div><?php } ?>
<form class="welcome-form" method="post">
    <input type="hidden" name="choice" value="register">
    First Name <input type="text" id="signUpFirstName" name="firstName" required><br>
    Last Name <input type="text" id="signUpLastName" name="lastName" required><br>
    Date of Birth <input type="date" id="signUpDateOfBirth" name="dateOfBirth" required><br>
    Email <input type="email" id="signUpEmail" name="email" required><br>
    Password <input type="password" id="signUpPassword" name="password" required><br>
    Confirm Password <input type="password" id="signUpConfirmPassword" name="confirmPassword" required><br>

    <input type="submit" id="signUpSubmit" value="Submit">
    <button type="reset" id="signUpReset">Reset</button>
    <button type="button" onclick="window.location.href='index.php?choice=toHome';">
        Back to Home
    </button>
</form>

        </div>


</div>
</div>
</body>
</html><?php
