<?php
if(isset($_POST['Title'])&&!empty($_POST['Title'])){
	//$username = $_POST['id'];
	//$password = $_POST['Password'];
	require 'connect.inc.php';
	
	//if(!empty($username)&&!empty($password)){
		$query="INSERT INTO `Buy`(`ID`, `Title`, `Description`, `Price`, `Quantity`,`Image`) VALUES ('".$_SESSION['id']."','".$_POST['Title']."','".$_POST['Description']."','".$_POST['Price']."','".$_POST['Quantity']."','".$_POST['Image']."')";
		
		if($run=mysqli_query($link,$query)){
			mysqli_close ($link);
			header('Location: '.$current_file.'');
		}
		else{
			header('Location: index.php');
			echo '<script>alert("Something went wrong");</script>';

		}
	//}
	
}
?>


  <!-- Modal -->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog"style="width:300px;height:400px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bid</h4>
        </div>
        <div class="modal-body">
          <form role="form"action="<?php echo $current_file;?>" id="login" method="POST" >
			<div class="form-group">
				<label for="email">Title</label>
				<input "type="text" id="username"  name="Title"class="form-control" placeholder="Enter Title of crop you want to buy">
			</div>
			<div class="form-group">
				<label for="email">Description</label>
				<input "type="text" id="username"  name="Description" class="form-control" placeholder="Enter Description">
			</div>
			<div class="form-group">
				<label for="pwd">Price</label>
				<input type="text" name="Price" class="form-control" id="pwd" placeholder="Enter price/KG">
			</div>
			<div class="form-group">
				<label for="pwd">Minimum Quantity</label>
				<input type="text" name="Quantity"class="form-control" id="pwd" placeholder="Enter minimum quantity you will buy">
			</div>
			<div class="form-group">
				<label for="pwd">Image</label>
				<input type="text" name="Image"class="form-control" id="pwd" placeholder="">
			</div>
			<button style="float:right;"type="submit" class="btn btn-lg btn-primary">Bid</span></button>
		  </form>
        </div>
		<br><br>
        
      </div>
      
    </div>
  </div>
