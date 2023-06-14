<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WishList</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility.css">
</head>
<body>
<?php $userInfos = $_SESSION['user']; ?>
<div class="limiter">
    <div class="mainContainer">
        <?php include "includes/header.php"; ?>
        <div class="wrapContainer">
            <div class="centralArea">
                <?php include "includes/sideMenu.php"; ?>
                <?php include "includes/sidebarSearch.php"; ?>
                <div class="friendsList">
                    <div class="presentSubTitle">
                        <h1>
                            Wishlist
                        </h1>
                    </div>
                    <h3>Help your loved ones in the choosing of what would make you really happy</h3>
                    <h3 class="p-t-20">What´s on your mind?</h3>
                    <div class="personalArea-content bordersRules">
                        <form class="welcome-form" method="post" action="index.php">

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>