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
                        <h1>What`s going on</h1>
                    </div>
                    <div class="personalArea-content bordersRules">
                        <div class="welcome-form">
                            <div class="homeInputsContainer">
                                <table>
                                    <tr>
                                        <th>Coming up</th>
                                        <th>Organised By</th>
                                        <th>On</th>
                                    </tr>
                                <?php foreach ($upcomingEvents as $upcomingEvent) { ?>
                                    <tr>
                                        <td><?php echo $upcomingEvent->getName(); ?></td>
                                    <?php $orgBy = new User;
                                    $orgBy = $orgBy->getObjectFromId($upcomingEvent->getOrganizedBy()); ?>
                                    <td><?php echo $orgBy->getFirstName(), ' ', $orgBy->getLastName(); ?></td>
                                        <td><?php echo $upcomingEvent->getDate(); ?></td>
                                        <td></td>
                                    </tr>
                            <?php } ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "includes/footer.php"; ?>

</body>
</html><?php
