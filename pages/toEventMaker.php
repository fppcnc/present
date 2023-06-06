<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Maker</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility.css">
</head>
<body>

<?php $userInfos = $_SESSION['user']; ?>
<div class="limiter">
    <div class="mainContainer">
        <?php include "includes/header.php"; ?>
        <div class="wrapContainer">
<div class="eventMaker-container">
    <div class="eventMaker-zone bordersRules">
        <h1>Event</h1>
        <h3>What are we Celebrating?</h3>
    </div>
    <div class="eventMaker-zone bordersRules">
        <h1>Wishlist</h1>
        <h3></h3>
    </div>
    <div class="eventMaker-zone bordersRules">
        <h1>More Details</h1>
        <h3></h3>
    </div>
</div>
        </div>
    </div>
</div>
<?php include "includes/footer.php";?>
<script src="js/welcome.js"></script>
</body>
</html>
