<?php
include '../includes/dbCredentials.php';
spl_autoload_register(function ($class) {
    include '../class/' . $class . '.php';
});

$u = (new User())->search();
//echo '<pre>';
//print_r($u);
//echo '</pre>';
echo json_encode($u);
