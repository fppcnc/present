<script src="js/dropdownHeader.js" defer></script>
<header class="site-header">
    <div class="site-header__wrapper">
        <div class="site-header__start">
            <a href="index.php?choice=toWelcome" class="presentSubTitle">Present</a>
        </div>
        <div class="site-header__end">
            <nav class="nav__wrapper">
                <div class="homeButtonsContainer ">
                    <div class="dropdown">
                        <button onclick="toggleDropdown()" class="button-nav bordersRules">
                            <?php echo $userInfos->getFirstName(); ?>´s area
                        </button>
                        <div id="areaDropdown" class="dropdown-content">
                            <a href="index.php?choice=toProfile&area=personal" class="button-nav">Edit Profile</a>
                            <a href="index.php?choice=toFriendList" class="button-nav">Friends</a>
                            <a href="index.php?choice=logout" class="button-nav" style="color: darkred">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>