<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<div class="limiter">
<form method="post">
    <input type="hidden" name="choice" value="login">

    Here you can login w your email<br>
    <?php if (!empty($_SESSION['error'])) { ?>
        <div><?php echo $_SESSION['error']; ?></div><?php } ?><br>

    Email<input type="email" id="loginEmail" name="email"><br>
    Passwd<input type="password" id="loginPassword" name="password"><br>
    <button type="submit" id="loginSubmit">Login</button>
</form>
    <a href="index.php?choice=toHome">
    <button id="loginBackToHome">Back to Home</button>
    </a>

</div>
</body>
</html><?php
