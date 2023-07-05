<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Friend´s Profile</title>
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
                <div class="friendsList" style="overflow: auto">
                    <div class="presentSubTitle">
                        <h1>User´s Profile</h1>
                    </div>
                    <h3>Here´s personal info about a User</h3>
                    <div class="personalArea-content bordersRules">
                        <div class="welcome-form">
                            <div class="homeInputsContainer">
                                <label for="friendFirstName">First Name</label>
                                <div class="input-home-noPointer bordersRules" id="friendFirstName"><?php echo $f->getFirstName() ?></div>
                                <label for="friendLastName">Last Name</label>
                                <div class="input-home-noPointer bordersRules" id="friendLastName"><?php echo $f->getLastName() ?></div>
                                <label for="friendEmail">Email</label>
                                <div class="input-home-noPointer bordersRules" id="friendEmail"><?php echo $f->getEmail() ?></div>
                                <label for="friendDoB">Date of Birth</label>
                                <div class="input-home-noPointer bordersRules" id="friendDoB"><?php echo $f->getDateOfBirth() ?></div>
                                <?php if ($connExists) { ?>
                                    You started following this User on <?php $date = $connExists->getConnectedOn();
                                    echo date("d-m-Y", strtotime($date)); ?>
                                    <div class="homeButtonsContainer">
                                        <button type="button" class="button-home bordersRules"
                                                onclick="window.location.href='index.php?choice=delete&area=connections&idFriend=<?php echo $f->getId(); ?>&idConn=<?php echo $connExists->getId(); ?>';">
                                            Unfollow
                                        </button>
                                    </div>
                                <?php } else { ?>
                                    You can follow this user and get updates on upcoming events
                                    <div class="homeButtonsContainer">
                                        <button type="button" class="button-home bordersRules"
                                                onclick="window.location.href='index.php?choice=create&area=connections&idFriend=<?php echo $f->getId(); ?>';">
                                            Follow
                                        </button>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                    <div class="presentSubTitle m-t-20">
                        <h1>User´s Event</h1>
                    </div>
                    <h3>Here there are User´s public events and private events to which you have been invited</h3>
                    <div class="personalArea-content bordersRules">
                        <div class="welcome-form">
                        </div>
                        <?php
                        $frEvs = new Event();
                        $frEvs = $frEvs->getEventsFromUserId($f->getId()); ?>
                        <div class="homeInputsContainer">
                            <?php foreach ($frEvs as $frEv) { ?>
                                <div style="display: inline-flex">
                                    <?php if ($frEv->getPublic() === 'true') { ?>
                                        <div class="input-home-noPointer bordersRules m-r-5"
                                             id="eventName"><?php echo $frEv->getName(), '<br>' , ' On: ', $frEv->getDate(), '<br>' ,  ' At: ', $frEv->getPlace(); ?> </div>
                                        Public Event
                                    <?php } else {
                                        $guestList = new Guests;
                                        $uGuest = new User;
                                        $guestList = $guestList->getGuestsByEventId($frEv->getId());
                                        foreach ($guestList as $guest) {
                                            $uGuest = $uGuest->getObjectFromId($guest->getGuestId());
                                            if ($guest->getGuestId() === $userInfos->getId()) {
                                                ?>
                                                <div class="input-home-noPointer bordersRules m-r-5"
                                                     id="eventName"><?php echo $frEv->getName(), '<br>' , ' On: ', $frEv->getDate(), '<br>' ,  ' At: ', $frEv->getPlace(); ?></div>
                                                <select id="guests" class="m-r-5">
                                                <option disabled selected value>-- Here´s a list of invited Guests --
                                                </option>

                                                <option disabled><?php echo $uGuest->getFirstName(), ' ', $uGuest->getLastName(); ?></option>
                                            <?php } ?>
                                            </select>
                                        <?php }
                                    } ?>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php"; ?>
</body>
</html><?php
