<?php
if(isset($_POST['Shares'])&&!empty($_POST['Shares'])){
	//require 'essential.inc.php';
	require 'connect.inc.php';
	
	//if(!empty($username)&&!empty($password)){
		$query="INSERT INTO `CSAPurchased`(`userID`, `CSAID`, `Shares`, `Months`) VALUES ('".$_SESSION['id']."','".$_POST['CropID']."','".$_POST['Shares']."','".$_POST['Months']."')";
		
		if($run=mysqli_query($link,$query)){
			mysqli_close ($link);
			header('Location: '.$current_file.'?id='.$_POST['CropID'].'');
		}
		else{
			header('Location: index.php');
			echo '<script>alert("Something went wrong");</script>';

		}

}


?>

 <!-- Modal -->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog"style="width:300px;height:400px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Buy Shares</h4>
        </div>
        <div class="modal-body">
          <form role="form" action=<?php echo '"'.$current_file.'"'; ?> id="login" method="POST" >
			<div class="form-group">
				<label for="email">Enter Shares</label>
				<input "type="text" id="username"  name="Shares" class="form-control" >
			</div>
			<label for="email">Select Months</label>
			<select name="Months" style="height:30px;width: 100px;">
			<option value="3">3</option>
			<option value="6">6</option>
			<option value="9">9</option>
			</select><br>
			<input type="hidden"  name="CropID" value=<?php echo '"'.$_REQUEST['id'].'"';?>>
			<button style="float:right;"type="submit" class="btn btn-lg btn-primary">Buy</span></button>
		  </form>
        </div>
		<br><br>
        
      </div>
      
    </div>
  </div>


