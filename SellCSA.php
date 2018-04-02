<!DOCTYPE html>
<script type="text/javascript">
var final_transcript = '';
var recognizing = false;
function convert() {
    //document.getElementById("demo").innerHTML = "Hello World";
    var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //myFunction(this);
    	var parsi=JSON.parse(this.responseText);
    	var res = parsi.data.translations[0].translatedText.split(" ");
    	var finalstr="";
    	var coun=res.length;
    	for(coun=0;coun<res.length-1;coun++){
    		finalstr+=res[coun]+",";
    	}
    	finalstr+=res[res.length-1];
    	document.getElementById("inter").value=finalstr;
    }
  };
  var query=document.getElementById('final_span').innerHTML;
  alert(query);
  xhttp.open("GET", "https://www.googleapis.com/language/translate/v2?key=AIzaSyAgmyLRcZ5_FGNnmlPPeVrGvDV4CraJJSo&source=hi&target=en&q="+query, true);
  xhttp.send();
}
if ('webkitSpeechRecognition' in window) {

  var recognition = new webkitSpeechRecognition();

  recognition.continuous = true;
  recognition.interimResults = true;

  recognition.onstart = function() {
    recognizing = true;
  };

  recognition.onerror = function(event) {
    console.log(event.error);
  };

  recognition.onend = function() {

    recognizing = false;
  };

  recognition.onresult = function(event) {
    var interim_transcript = '';
    for (var i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }
    final_transcript = capitalize(final_transcript);
    final_span.innerHTML = linebreak(final_transcript);
    interim_span.innerHTML = linebreak(interim_transcript);
    
  };
}

var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

function capitalize(s) {
  return s.replace(s.substr(0,1), function(m) { return m.toUpperCase(); });
}

function startDictation(event) {
  if (recognizing) {
    recognition.stop();
    //alert("Stoped");
    return;
  }
  final_transcript = '';
  recognition.lang = 'hi-IN';
  recognition.start();
  final_span.innerHTML = '';
  interim_span.innerHTML = '';
}
</script>

<?php
require 'essential.inc.php';
//require 'essential.inc.php';
require 'functions.php';

?>
<?php
if(isset($_POST['Title'])&&!empty($_POST['Title'])){
		require 'core.inc.php';
		require 'connect.inc.php'; 
		$query="INSERT INTO `csa`(`ID`,`Title`, `Season`, `Type`, `Full Share`, `Half Share`, `Available shares`, `DeliveryArea1`,`Description`, `Short Description`, `WorkReq`, `Crop`) VALUES ('".$_SESSION['id']."','".$_POST['Title']."','".$_POST['Season']."','".$_POST['Type']."','".$_POST['FullShare']."','".$_POST['HalfShare']."','".$_POST['Availableshares']."','".$_POST['address']."','".$_POST['Description']."','".$_POST['ShortDescription']."','".$_POST['WorkReq']."','".$_POST['Crop']."')";
		if($run=mysqli_query($link,$query)){
			//require 'connect.inc.php';
			echo '<script>alert("Successfully added");</script>';
			header('Location:01_farmerHome.php');
			//header('Location:'..'');
		}
		else{
			echo '<script>alert("Something went wrong");</script>';
		}
}
?>
<html lang="en">
<head>
	<style>

	div.inbox{
		/*background: yellow;*/
		width: 400px;
	    border: 25px ;
	    padding: 25px;
	    margin: 25px;
	    align-items: center;
	    text-align: left;

	}
	div.outbox{
		/*background: yellow;*/
		width: 500px;
	    border: 25px ;
	    padding: 25px;
	    margin: 25px;
	    align-items: center;
	    border-radius: 5px;
	    background-color: #f2f2f2;
	    padding: 20px;
	}
	</style>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<center>
<div class="main_body" >
<div class="container">
  <h2>Your CSA</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Details for Adding Stock</a></li>
  </ul>
  <div class="outbox"  >
    <div id="home" class="tab-pane fade in active">  
    <div class="panel panel-default">
    <div class="inbox" ><form role="form" action="SellCSA.php" id="login" method="POST" >



    		<div class="form-group">
			<label for="sel1">Duration of Stock </label>
			<select class="form-control" name="duration" id="dur">
			<option>3 months</option>
			<option>6 months</option>
			<option>12 months</option>
			</select>
			</div>

			<div class="form-group">
				<label for="item">Title</label>
				<input type="text" id="item"  name="Title"class="form-control" ">
			</div>
			<div class="form-group">
				<label for="item">Season</label>
				<input type="text" id="item"  name="Season"class="form-control" ">
			</div>
			<div class="form-group">
				<label for="item">Type </label>
				<input type="text" id="item"  name="Type"class="form-control" ">
			</div>


			<div class="form-group">
				<label for="price">Full Share Price</label>
				<input type="text" id="price"  name="FullShare"class="form-control" ">
			</div>

			<div class="form-group">
				<label for="price">Half Share Price</label>
				<input type="text" id="price"  name="HalfShare"class="form-control" ">
			</div>

			<div class="form-group">
				<label for="des">Available shares</label>
				<input type="text" id="des"  name="Availableshares"class="form-control" ">
			</div>

			<div class="form-group">
				<label for="des">Delivery Address</label>
				<input type="text" id="des"  name="address"class="form-control" ">
			</div>
			<div class="form-group">
				<label for="des">Short Description</label>
				<input type="text" id="des"  name="ShortDescription" class="form-control" ">
			</div>
			<div class="form-group">
				<label for="des">Description</label>
				<input type="text" id="des"  name="Description"class="form-control" ">
			</div>
			<div class="form-group">
				<label for="des">Work Required</label>
				<input type="text" id="des"  name="WorkReq"class="form-control" ">
			</div>
			
			<div class="form-group">
				<label for="des">Crops</label>
				<input type="text" id="inter"  name="Crop"class="form-control" ">
				
			</div>


			<div align="right">
				<!-- <input type="image" src="submit.gif" alt="Submit" width="48" height="48"> -->
				
  					<img id="start_button" src="submit.gif" onclick="startDictation(event)" width="48" height="48"></img>
  					<img onclick="convert()" src="done.png" width="48" height="48"></img	>
 				</div>

			
			<br><button style="float:right;"type="submit" class="btn btn-info">Save</span></button>
		  </form></div>
  </div>
     
    </div>
    <div id="menu1" class="tab-pane fade">
    <div class="panel panel-default">
    <div class="panel-body">
      <form role="form" action="profile.php" id="login" method="POST" >
			<div class="form-group">
				<div class="checkbox">
  			<label><input type="checkbox" value="" name="Broadway">Broadway</label></div>
			<div class="checkbox"><label><input type="checkbox" name="Dance">Dance</label></div>
			<div class="checkbox">
<label><input type="checkbox" name="Family">Family</label></div>
			<div class="checkbox"><label><input type="checkbox" name="Music">Music</label></div>
			<div class="checkbox"><label><input type="checkbox" name="Opera">Opera</label></div>
			<div class="checkbox"><label><input type="checkbox" name="Theatre">Theatre</label></div>


			<br><button style="float:right;"type="submit" class="btn btn-info">Save</span></button>
		  </form>
    </div></div>
       
    </div>
   
  </div>
</div>
</div>

  </div>

  </div>


  </div>

</div>
</form>
<div id="results">
				  <span id="final_span" class="final"><!--कैबेज आलू मुर्गी-->
</span>
  				
				</div>

				
</div>
</div>
</div>
</div>
</div>
</div>
</center>
</body>
</html>
