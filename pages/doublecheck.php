<?php
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//
//$column=$_POST['column'];
//echo $_POST['column'];
//
////print_r ($_SESSION['user']);
//
////echo $_REQUEST['column'];
//
//echo $_POST["$column"];
$userInfo = $_SESSION['user'];
$c = new Connections();
echo '<pre>';
print_r($userInfo);
echo '</pre>';

$list = $c->getConnections($userInfo);

echo '<pre>';
print_r($list);
echo '</pre>';