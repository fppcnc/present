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
            <div class="centralArea">
                <?php include "includes/sideMenu.php"; ?>
                <?php include "includes/sidebarSearch.php"; ?>
                <div class="friendsList">
                    <div class="presentSubTitle">
                        <h1>
                            Event Maker
                        </h1>
                    </div>
                    <h3>Here you can create events for all occasions and share it with your friends.</h3>
                    <div class="presentText m-b-8">Let everyone know the next time there will be something to celebrate
                        and help them in making this day truly special!
                    </div>
                </div>
                <div class="personalArea-content bordersRules">
                    <form class="welcome-form" method="post" action="index.php">
                        <div class="homeInputsContainer">
                            <input type="hidden" name="choice" value="create">
                            <input type="hidden" name="area" value="event">
                            <span>
                                <label for="eventName">What are we celebrating? Give it a name, so it will
                                        be easier to stand out on your contacts!</label>
                                <input type="text" class="input-home bordersRules" id="eventName"
                                       placeholder="Mario Rossi´s Birthday Party!" name="name" required>
                            </span>
                            <span>
                            <label for="eventDate">When will we celebrate it? And when will the celebrations start?</label>
                                <input type="datetime-local" class="input-home bordersRules" id="eventDate"
                                       name="date" required>
                            </span>
                            <span>
                                <label for="eventPlace">Where will we celebrate? Try to make it easy for your guests
                                to attend it by giving concise, but clear indications</label>
                                <input type="text" class="input-home bordersRules" id="eventPlace"
                                placeholder="Restaurant X  -  My place!  -  Park Y  -  Example Street, nr.15" name="place" required>
                            </span>
                            You prefer to make it public, or you rather invite your own guests?
                            <div style="display: inline-block">
                                <input type="radio" class="bordersRules" id="eventPublicY" name="public" value="true" required>
                                <label for="eventPublicY">Public</label>
                                <input type="radio" class=" bordersRules" id="eventPublicN" name="public" value="false" required>
                                <label for="eventPublicY">Private</label>
                            </div>
                            <div id="showGuests" style="display: none;">

                                <label for="search">Search Users to invite</label>
                                <input type="search" id="search" data-searchGuest>
                                    <div class="search-wrapper-guest">

                                    </div>
                                    <div class="guest-cards" data-guest-cards-container></div>
                                    <template data-guest-template>
                                        <div class="card">
                                            <input type="checkbox" name="guest[]" data-guest-invite>
                                                <div class="header" data-guestHeader></div>
                                                <div class="body" data-guestEmail>Email : </div>
                                        </div>
                                    </template>


                            </div>
                            <button type="submit" class="button-home bordersRules m-t-20" style="width: 100px">Create Event!</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            </div>
        </div>
        <?php include "includes/footer.php"; ?>
<script src="js/publicYorN.js"></script>
<script src="../js/inviteGuests.js"></script>
</body>
</html>
