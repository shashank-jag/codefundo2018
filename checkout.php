<?php
	require 'essential.inc.php';
    require 'functions.php';
    //require 'core.inc.php';
	require 'connect.inc.php';
	$result = mysqli_query($link,"Select * from ItemPurchased where `userID`='".$_SESSION['id']."'");
	while($row = mysqli_fetch_array($result)){
		$result1 = mysqli_query($link,"Select * from `Sell` where `CropID`=".$row['CropID']."");
		$row1 = mysqli_fetch_array($result1);
		$price = (int)$row['Quantity']*(int)$row1['Price'];
		$message="Your Item ".$row1['Title']." has been bought by ".$_SESSION['name']."<b> Quantity</b>:".$row['Quantity']."  <b>    Price</b>:".$price." ";
		mysqli_query($link,"INSERT INTO `NotificationTable`(`userID`, `Notification`) VALUES ('".$row1['ID']."','".$message."')");
		mysqli_query($link,"DELETE from `ItemPurchased` where userID=".$_SESSION['id']."");

	}
	$result = mysqli_query($link,"Select * from CSAPurchased where `userID`='".$_SESSION['id']."'");

	while($row = mysqli_fetch_array($result)){
		$result1 = mysqli_query($link,"Select * from `csa` where `CSA_ID`=".$row['CSAID']."");
		$row1 = mysqli_fetch_array($result1);
		$price = (int)$row1['Full Share']*(int)$row['Shares']*(int)$row['Months']/3;
		//$price = (int)$row['Shares']*(int)$row1['Price']/3;
		$message="Your ".$row['Shares']." shares of ".$row1['Title']." has been bought by <t> ".$_SESSION['name']."   <t>  Total Price:".$price." ";
		mysqli_query($link,"INSERT INTO `NotificationTable`(`userID`, `Notification`) VALUES ('".$row1['ID']."','".$message."')");
		mysqli_query($link,"INSERT INTO `CSABuy`(`userID`, `CSAID`,`No of Share`) VALUES ('".$_SESSION['id']."','".$row['CSAID']."','".$row['Shares']."')");

		mysqli_query($link,"DELETE from `CSAPurchased` where userID=".$_SESSION['id']."");
		
	}
	header('Location: 14_consumerBuy.php');
?>