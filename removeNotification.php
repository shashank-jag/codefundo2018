<?php
require 'essential.inc.php';
require 'functions.php';
    //require 'core.inc.php';
require 'connect.inc.php';
$result = mysqli_query($link,"Delete from NotificationTable where `userID`='".$_SESSION['id']."'");
header('Location: 01_farmerHome.php');
?>