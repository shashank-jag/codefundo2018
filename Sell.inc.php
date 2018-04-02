<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
    function processImage() {
        // **********************************************
        // *** Update or verify the following values. ***
        // **********************************************

        // Replace the subscriptionKey string value with your valid subscription key.
        var subscriptionKey = "2d70ac6a202942b69abc39103fd7ebd6";

        // Replace or verify the region.
        //
        // You must use the same region in your REST API call as you used to obtain your subscription keys.
        // For example, if you obtained your subscription keys from the westus region, replace
        // "westcentralus" in the URI below with "westus".
        //
        // NOTE: Free trial subscription keys are generated in the westcentralus region, so if you are using
        // a free trial subscription key, you should not need to change this region.
        var uriBase = "https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/RecognizeText";

        // Request parameters.
        var params = {
            "handwriting": "true",
        };

        // Display the image.
        var sourceImageUrl = document.getElementById("inputImage").value;
        document.querySelector("#sourceImage").src = sourceImageUrl;

        // This operation requrires two REST API calls. One to submit the image for processing,
        // the other to retrieve the text found in the image. 
        //
        // Perform the first REST API call to submit the image for processing.
        $.ajax({
            url: uriBase + "?" + $.param(params),

            // Request headers.
            beforeSend: function(jqXHR){
                jqXHR.setRequestHeader("Content-Type","application/json");
                jqXHR.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);
            },

            type: "POST",

            // Request body.
            data: '{"url": ' + '"' + sourceImageUrl + '"}',
        })

        .done(function(data, textStatus, jqXHR) {
            // Show progress.
            $("#responseTextArea").val("Handwritten text submitted. Waiting 10 seconds to retrieve the recognized text.");

            // Note: The response may not be immediately available. Handwriting recognition is an
            // async operation that can take a variable amount of time depending on the length
            // of the text you want to recognize. You may need to wait or retry this GET operation.
            //
            // Wait ten seconds before making the second REST API call.
            setTimeout(function () { 
                // The "Operation-Location" in the response contains the URI to retrieve the recognized text.
                var operationLocation = jqXHR.getResponseHeader("Operation-Location");

                // Perform the second REST API call and get the response.
                $.ajax({
                    url: operationLocation,

                    // Request headers.
                    beforeSend: function(jqXHR){
                        jqXHR.setRequestHeader("Content-Type","application/json");
                        jqXHR.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);
                    },

                    type: "GET",
                })

                .done(function(data) {
                    // Show formatted JSON on webpage.
                    var str1 = "";
                    var leng=data.recognitionResult.lines.length;
                    for (i = 0; i <leng; i++) {
                        str1 += data.recognitionResult.lines[i].text+' ';
                    }    
                    $("#responseTextArea").val(str1);
                })

                .fail(function(jqXHR, textStatus, errorThrown) {
                    // Display error message.
                    var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
                    errorString += (jqXHR.responseText === "") ? "" : (jQuery.parseJSON(jqXHR.responseText).message) ? 
                        jQuery.parseJSON(jqXHR.responseText).message : jQuery.parseJSON(jqXHR.responseText).error.message;
                    alert(errorString);
                });
            }, 10000);
        })

        .fail(function(jqXHR, textStatus, errorThrown) {
            // Put the JSON description into the text area.
            $("#responseTextArea").val(JSON.stringify(jqXHR, null, 2));

            // Display error message.
            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" : (jQuery.parseJSON(jqXHR.responseText).message) ? 
                jQuery.parseJSON(jqXHR.responseText).message : jQuery.parseJSON(jqXHR.responseText).error.message;
            alert(errorString);
        });
    };
</script>

<?php
if(isset($_POST['Title'])&&!empty($_POST['Title'])){
	//$username = $_POST['id'];
	//$password = $_POST['Password'];
	require 'connect.inc.php';
	
	//if(!empty($username)&&!empty($password)){
		$query="INSERT INTO `Sell`(`ID`, `Title`, `Description`, `Price`, `Available`,`shortDescription`) VALUES ('".$_SESSION['id']."','".$_POST['Title']."','".$_POST['Description']."','".$_POST['Price']."','".$_POST['Available']."','".$_POST['shortDescription']."')";
		
		if($run=mysqli_query($link,$query)){
			mysqli_close ($link);
			header('Location: '.$current_file.'');
		}
		else{
			//header('Location: index.php');
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
          <h4 class="modal-title">Sell</h4>
        </div>
        <div class="modal-body">
          <form role="form"action="<?php echo $current_file;?>" id="login" method="POST" >
			<div class="form-group">
				<label for="email">Title</label>
				<input type="text" id="username"  name="Title"class="form-control" placeholder="Enter Title of crop you want to sell">
			</div>
			<div class="form-group">
				<label for="email">Short Description</label>
				<input type="text" id="username"  name="shortDescription" class="form-control" placeholder="Enter Description">
			</div>
			<div class="form-group">
				<label for="email">Description</label>
				<input type="text" id="responseTextArea"  name="Description" class="form-control" placeholder="Enter Description">
			</div>
			<div class="form-group">
				<label for="pwd">Price</label>
				<input type="text" name="Price" class="form-control" id="pwd" placeholder="Enter price/KG">
			</div>
			<div class="form-group">
				<label for="pwd">Available</label>
				<input type="text" name="Available"class="form-control" id="pwd" placeholder="Enter in KG">
			</div>
			<button style="float:right;"type="submit" class="btn btn-lg btn-primary">Sell</span></button>
		  </form>
		  <br><br>
Handwritten Text : <input type="text" name="inputImage" id="inputImage" value="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Cursive_Writing_on_Notebook_paper.jpg/800px-Cursive_Writing_on_Notebook_paper.jpg" />
<button onclick="processImage()">Read image</button>
<br><br>
<div id="wrapper" style="width:1020px; display:table;">
    <div id="imageDiv" style="width:300px;height:300px; display:table-cell;">
        Source image:
        <br><br>
        <img id="sourceImage" width="280" />
    </div>
</div>


        </div>
		<br><br>
        
      </div>
      
    </div>
  </div>
