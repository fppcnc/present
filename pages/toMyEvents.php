<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My events</title>
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
                        <h1>My Events</h1>
                    </div>
                    <h3>Here you can look at your events</h3>
                    <div class="personalArea-content bordersRules">
                        <div class="welcome-form">
                            <div class="homeInputsContainer">
                                <?php foreach ($myEvs as $myEv) { ?>

                                    <div style="display: inline-flex">
                                        <div class="input-home bordersRules m-r-5"
                                             id="eventName"><?php echo $myEv->getName(); ?></div>
                                        <?php if ($myEv->getPublic() === 'true') { ?>
                                            Public
                                        <?php } else {
                                            $guestList = new Guests;
                                            $uGuest = new User;
                                            $guestList = $guestList->getGuestsByEventId($myEv->getId()); ?>
                                            <select id="guests" class="m-r-5">
                                                <option>-- Here´s a list of invited Guests --</option>
                                                <?php foreach ($guestList as $guest) {
                                                    $uGuest = $uGuest->getObjectFromId($guest->getGuestId()); ?>
                                                    <option disabled><?php echo $uGuest->getFirstName(), ' ', $uGuest->getLastName(); ?></option>
                                                <?php } ?>
                                            </select>

                                        <?php } ?>
                                        <button onclick="window.location.href='index.php?choice=toUpdateEvent&idEv=<?php echo $myEv->getId(); ?>';">
                                            Update Event
                                        </button>
                                        <button onclick="window.location.href='index.php?choice=delete&area=event&idEv=<?php echo $myEv->getId(); ?>';"
                                                class="m-l-10" style="color: darkred">
                                            Delete Event
                                        </button>
                                    </div>
                                <?php } ?>
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
