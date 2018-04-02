<?php
if(isset($_POST['Quantity'])&&!empty($_POST['Quantity'])){
	require 'essential.inc.php';
	require 'connect.inc.php';
	
	//if(!empty($username)&&!empty($password)){
		$query="INSERT INTO `ItemPurchased`(`userID`, `CropID`, `Quantity`) VALUES ('".$_SESSION['id']."','".$_POST['CropID']."','".$_POST['Quantity']."')";
		
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
          <h4 class="modal-title">Buy</h4>
        </div>
        <div class="modal-body">
          <form role="form" action=<?php echo '"'.$current_file.'"'; ?> id="login" method="POST" >
			<div class="form-group">
				<label for="email">Enter Quantity</label>
				<input "type="text" id="username"  name="Quantity" class="form-control" placeholder="Enter Quantity in KG">
			</div>
			<input type="hidden"  name="CropID" value=<?php echo '"'.$_REQUEST['id'].'"';?>>
			<button style="float:left;"type="submit" class="btn btn-lg btn-primary">Buy</span></button>
		  </form>
        </div>
		<br><br>
        
      </div>
      
    </div>
  </div>