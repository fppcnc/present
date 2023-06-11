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
            <?php include "includes/sideMenu.php";?>
            <?php include "includes/sidebarSearch.php";?>
            <div class="friendsList">
            <h1>
                <div class="presentBigTitle">Friend´s List</div>
            </h1>
                <h3>Here´s the list of people you are currently following</h3>

                <?php $c = new Connections();


$list = $c->getConnections($userInfos);
$u = [];
foreach($list as $value){
    $connectedTo = $value->connectedTo;
    $cUser = new User;
    $u[] = $cUser->getObjectFromId($value->connectedTo);

}

foreach($u as $user){ ?>
<div class="user-cards">
                        <div class="card">
                            <div class="header" ><?php echo $user->getFirstName(), ' ', $user->getLastName() ?></div>
                            <div class="body">Email : <?php echo $user->getEmail(); ?> </div>
                            <div class="body" data-dob>Birthday : <?php echo $user->getDateOfBirth(); ?> </div>
                        </div>
            </div>






<?php
}
?>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php";?>
</body>
</html>
