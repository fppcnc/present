<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect</title>
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
                        <h1>Friend´s List</h1>
                    </div>
                    <h3>Here´s the list of people you are currently following</h3>
                    <div class="user-cards">
                        <?php
                        foreach ($u as $user) { ?>

                            <div class="user-cards">
                                <div class="card">
                                    <div class="header"><?php echo $user->getFirstName(), ' ', $user->getLastName() ?></div>
                                    <div class="body">Email : <?php echo $user->getEmail(); ?> </div>
                                    <div class="body" data-dob>Birthday : <?php echo $user->getDateOfBirth(); ?> </div>
                                    <button type="button"
                                            onclick="window.location.href='index.php?choice=toProfile&area=friend&idFriend=<?php echo $user->getId() ?>';">
                                        Go to Profile
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>
