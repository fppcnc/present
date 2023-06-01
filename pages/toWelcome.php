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
<div class="limiter">
    <div class="mainContainer">
        <header class="site-header">
            <div class="site-header__wrapper">
                <div class="site-header__start">
                    <a href="index.php?choice=toWelcome" class="presentSubTitle">Present</a>
                    <div class="search">
                        <form class="search__form p-l-15" action="">
                            <input type="search" name="" id="search" placeholder="Looking for someone?">
                        </form>
                    </div>
                </div>
                <div class="site-header__end">
                    <nav class="nav__wrapper">
                        <div class="homeButtonsContainer ">
                            <div class="dropdown">
                                <button onclick="toggleDropdown()" class="button-nav bordersRules">
                                    <?php echo $_SESSION['user']->getFirstName(); ?>´s area
                                </button>
                                <div id="areaDropdown" class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <div class="wrapContainer">
        </div>
    </div>
</div>
<script src="js/js.js"></script>
</body>
</html><?php
