<?php
include 'essential.inc.php';
if(isset($_POST['CropName'])&&!empty($_POST['CropName'])){
	require 'connect.inc.php';
	//				header('Location: index.php');
	echo 'alert("hi");';
	$query="INSERT INTO `Crops` VALUES ('".$_SESSION['id']."','".$_POST['CropName']."','".$_POST['CropDetails']."','".$_POST['Qty']."','".$_POST['SowingDate']."','".$_POST['LandArea']."')";
    if(mysqli_query($link,$query)){
				//$runreg=mysql_query("SELECT * FROM `user` where `Mobile`='".$_POST['Mobile']."'");
				//$row_reg=mysql_fetch_assoc($runreg);
				//$_SESSION['user_id']=$row_reg['user_id'];
				//$_SESSION['Email']=$row_reg['Email'];
				//header('Location: index.php');
		}
		else
			echo "wrong";
   
}
?>

    
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
 <form action="CropInfo.php"  method="post" style="border:1px solid #ccc">
  <div class="container">
    <label ><b>CropName</b></label>
<input type="text" placeholder="Enter Crop name" name="CropName" >
<br>
<label>Crop Details<b></b></label>
<input type="text" placeholder="Enter Details like what fertilizers used" name="CropDetails" >
<br>
<label ><b>Quantity</b></label>
<input type="text" placeholder="Enter quantity" name="Qty" >
<br>
<label ><b>LandArea</b></label>
<input type="text" placeholder="Enter LandArea" name="LandArea" >
<br>
<label ><b>SowingDate</b></label>
<input type="text" placeholder="Enter name" name="SowingDate" >
<br>
<div class="clearfix">
    <button type="button" class="cancelbtn">Home</button>
    <button type="submit" class="signupbtn">Sign Up</button>
</div>
  </div>
</form>

<!--<form action ="register.php" method ="POST">
username<input type="text" name="username">
password<input type="text" name="password">
<input type='submit'>
</form>

-->

