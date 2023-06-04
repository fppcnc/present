<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility.css">
</head>
<body>
<?php $userInfos = $_SESSION['user'][0];?>
<div class="limiter">
    <div class="mainContainer">
        <?php include "includes/header.php";?>
        <div class="wrapContainer">
        </div>
    </div>
</div>
<script src="js/js.js"></script>
<script src="js/welcome.js"></script>
</body>
</html><?php
