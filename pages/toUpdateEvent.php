<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Event</title>
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
                        <h1>Update Event</h1>
                    </div>
                    <h3>Here you can modify your events</h3>
                    <div class="personalArea-content bordersRules">
                        <form class="welcome-form" method="post" action="index.php">
                            <div class="homeInputsContainer">
                                <input type="hidden" name="choice" value="updateInfo">
                                <input type="hidden" name="area" value="event">
                                <input type="hidden" name="eventId" value="<?php echo $e->getId() ?>">
                                <span><label for="eventName">Event</label>
                                <input type="text" id="eventName" class="input-home bordersRules" style="width: 600px"
                                       name="name" value="<?php echo $e->getName() ?>" required>
                               <button type="submit" class="button-personalArea bordersRules m-t-5"
                                       name="column" value="name">Update</button>
                            </span>
                                <span><label for="eventDate">Date</label>
                                <input type="datetime-local" id="eventDate" class="input-home bordersRules"
                                       style="width: 600px"
                                       name="date" value="<?php echo $e->getDate() ?>" required>
                               <button type="submit" class="button-personalArea bordersRules m-t-5"
                                       name="column" value="date">Update</button>
                            </span>
                                <span><label for="eventPlace">Place</label>
                                <input type="text" id="eventPlace" class="input-home bordersRules" style="width: 600px"
                                       name="place" value="<?php echo $e->getPlace() ?>" required>
                                <button type="submit" class="button-personalArea bordersRules m-t-5"
                                        name="column" value="place">Update</button>
                            </span>
                                You prefer to make it public, or you rather invite your own guests?
                                <div style="display: inline-block">
                                    <input type="radio" class="bordersRules" id="eventPublicY" name="public" value="true"
                                           required>
                                    <label for="eventPublicY">Public</label>
                                    <input type="radio" class=" bordersRules" id="eventPublicN" name="public" value="false"
                                           required>
                                    <label for="eventPublicY">Private</label>
                                </div>
                                <div id="showGuests" style="display: none; justify-self: center">

                                    <label for="search">Search Users to invite</label>
                                    <input type="search" id="searchGuest" data-searchGuest>
                                    <div class="search-wrapper-guest">

                                    </div>
                                    <div class="guest-cards" data-guest-cards-container></div>
                                    <template data-guest-template>
                                        <div class="card">
                                            <input type="checkbox" name="guest[]" data-guest-invite>
                                            <div class="header" data-guestHeader></div>
                                            <div class="body" data-guestEmail>Email :</div>
                                            <div class="body" data-guest-dob></div>
                                        </div>
                                    </template>

                                </div>
                                <button onclick="window.location.href='index.php?choice=delete&area=event&idEv=<?php echo $e->getId(); ?>';"
                                        class="m-l-10" style="color: darkred">
                                    Delete Event
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
<script src="js/publicYorN.js"></script>
</body>
</html><?php
