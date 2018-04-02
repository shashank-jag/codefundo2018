<?php

function getUserLocation($id) {
    require 'connect.inc.php';
    $query="SELECT * FROM `user` where `id`=".$id."";
    $run=mysqli_query($link,$query);
    $row=mysqli_fetch_array($run);
    $myArr = array("lati", $row['lat'], "longi", $row['longi']);
	$myJSON = json_encode($myArr);
	echo $myJSON;
    /*$locate->lati = ;
	$locate->longi = $row['longi'];
    mysqli_close ($link);
    $myJSON = json_encode($locate);
    echo $myJSON;*/
}

function updateCrop() {
    require 'connect.inc.php';
    $query="INSERT INTO `Crops` ( `id`,`CropName`, `CropDetails`,`Qty`,`SowingDate`, `LandArea`) VALUES ('".$_POST['id']."','".$_POST['CropName']."','".$_POST['CropDetails']."','".$_POST['Qty']."','".$_POST['SowingDate']."','".$_POST['LandArea']."')";
    $run=mysqli_query($link,$query);
    echo '<div class="alert alert-success">
    Successfully added crop information.</div>';
    /*$locate->lati = ;
	$locate->longi = $row['longi'];
    mysqli_close ($link);
    $myJSON = json_encode($locate);
    echo $myJSON;*/
}





function getCropList() {
	require 'connect.inc.php';
    $query="SELECT DISTINCT CropName FROM `Crops`";
    $run=mysqli_query($link,$query);
    while ($row = mysqli_fetch_array($run))
	{
		//if(isset($_POST['CropOption'])&&$_POST['CropOption'])
		echo '<option value="'.$row['CropName'].'">'.$row['CropName'].'</option>';
	}
	mysqli_close ($link);
}


function getCropMap() {
	require 'connect.inc.php';
	#echo 'hi';
	$result=mysqli_query($link,"SELECT * FROM `Crops` where `CropName`='".$_POST['CropOption']."'");
	//$result = mysqli_query($link,"SELECT * FROM `user`");
	#$row = mysqli_fetch_array( $result);
	$s='var obj={"type": "FeatureCollection","features": [';
	$f=0;

	while ($row1 = mysqli_fetch_array($result))
	{
		$queries="";
		if(!empty($_POST['City']) and !empty($_POST['State']))
			$queries="SELECT * FROM `user` where `id`=".$row1['ID']." and `State`='".$_POST['State']."' and `City`='".$_POST['City']."'";
		else if(!empty($_POST['City']))
			$queries="SELECT * FROM `user` where `City`='".$_POST['City']."' and `id`=".$row1['ID']."";
		else if(!empty($_POST['State']))
			$queries="SELECT * FROM `user` where `id`=".$row1['ID']." and `State`='".$_POST['State']."'";
		else
			$queries="SELECT * FROM `user` where `id`=".$row1['ID']."";
		$getuser=mysqli_query($link,$queries);
		if(mysqli_num_rows($getuser)==0)continue;
		$row=mysqli_fetch_array($getuser);
		if($f==0)$f=1;
		else $s=$s.',';
		if($row['category']=='Consumer'){
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			
			//$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"yellow",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
		else if($row['category']=='Farmer'){
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			
			$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"green",';
			$s=$s.'"rating": "'.$row['Ratings'].'",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
		else{
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"blue",';
			$s=$s.'"member": "'.$row['Members'].'",';
			$s=$s.'"rating": "'.$row['Ratings'].'",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
		
	}
	$s=$s.']}';
	echo $s;
	#echo $row['ProductName'];
	mysqli_close ($link);

}

function echoMap($result){
	$s='var obj={"type": "FeatureCollection","features": [';
	$f=0;

	while ($row = mysqli_fetch_array($result))
	{
		if(!empty($_POST['City']) and strcmp($_POST['City'],$row['City'])!=0)
			continue;
		if(!empty($_POST['State']) and strcmp($_POST['State'],$row['State'])!=0)
			continue;
		if($f==0)$f=1;
		else $s=$s.',';
		if($row['category']=='Consumer'){
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			
			//$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"yellow",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
		else if($row['category']=='Farmer'){
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			
			$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"green",';
			$s=$s.'"rating": "'.$row['Ratings'].'",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
    else if($row['category']=='Trader' or $row['category']=='Market'){
      $s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
      $s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
      
      $s=$s.'"description": "'.$row['Description'].' ",';
      $s=$s.'"name": "'.$row['name'].'",';
      $s=$s.'"color":"red",';
      $s=$s.'"rating": "'.$row['Ratings'].'",';
      $s=$s.'"phone": "'.$row['contact'].' "}}';
    }
		else{
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"blue",';
			$s=$s.'"member": "'.$row['Members'].'",';
			$s=$s.'"rating": "'.$row['Ratings'].'",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
		
	}
	$s=$s.']}';
	echo $s;
}

function getCSAMAP($type,$crops){
	require 'connect.inc.php';
	$result = mysqli_query($link,"SELECT * FROM `".$type."`");

	$s='var obj={"type": "FeatureCollection","features": [';
	$f=0;
	while($row1 = mysqli_fetch_array($result)){
  		$res=mysqli_query($link,"SELECT * FROM `user` where `id`=".$row1['ID']."");
  		$row=mysqli_fetch_array($res);
  		if(isset($_POST['Crop']) and !empty($_POST['Crop'])){// and stripos($row1[$crops], $_POST['Crop']) === false){
  			//continue;
  		}
  	if(isset($_POST['City']) and !empty($_POST['City']) or isset($_POST['State']) and !empty($_POST['State'])){
  		
  		
  		if(isset($_POST['City']) and !empty($_POST['City']) and strcmp($_POST['City'],$row['City'])!=0){
  			
  			continue;
  		}
  		
  		if(isset($_POST['State']) and !empty($_POST['State']) and strcmp($_POST['State'],$row['State'])!=0)
  			continue;
  		}
  	if($f==0)$f=1;
		else $s=$s.',';
		if($row['category']=='Consumer'){
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			
			//$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"yellow",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
		else if($row['category']=='Farmer'){
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			
			$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"green",';
			$s=$s.'"rating": "'.$row['Ratings'].'",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
		else{
			$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
			$s=$s.'"color":"blue",';
			$s=$s.'"member": "'.$row['Members'].'",';
			$s=$s.'"rating": "'.$row['Ratings'].'",';
			$s=$s.'"phone": "'.$row['contact'].' "}}';
		}
		
	}
	$s=$s.']}';
	echo $s;
}

function getFarmerSellMap($type,$crops){
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `".$type."`");

  $s='var obj={"type": "FeatureCollection","features": [';
  $f=0;
  while($row1 = mysqli_fetch_array($result)){
      $res=mysqli_query($link,"SELECT * FROM `user` where `id`=".$row1['ID']."");
      $row=mysqli_fetch_array($res);
      if(isset($_POST['Crop']) and !empty($_POST['Crop']) and stripos($row1[$crops], $_POST['Crop']) === false){
        continue;
      }
    if(isset($_POST['City']) and !empty($_POST['City']) or isset($_POST['State']) and !empty($_POST['State'])){
      if(isset($_POST['City']) and !empty($_POST['City']) and strcmp($_POST['City'],$row['City'])!=0){
        
        continue;
      }
      
      if(isset($_POST['State']) and !empty($_POST['State']) and strcmp($_POST['State'],$row['State'])!=0)
        continue;
      }
    if($f==0)$f=1;
    else $s=$s.',';
    if($row['category']=='Consumer'){
      $s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
      $s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
      
      //$s=$s.'"description": "'.$row['Description'].' ",';
      $s=$s.'"name": "'.$row['name'].'",';
      $s=$s.'"color":"yellow",';
      $s=$s.'"phone": "'.$row['contact'].' "}}';
    }
    else if($row['category']=='Farmer'){
      $s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
      $s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
      
      $s=$s.'"description": "'.$row['Description'].' ",';
      $s=$s.'"name": "'.$row['name'].'",';
      $s=$s.'"color":"green",';
      $s=$s.'"rating": "'.$row['Ratings'].'",';
      $s=$s.'"phone": "'.$row['contact'].' "}}';
    }
    else{
      $s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
      $s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
      $s=$s.'"description": "'.$row['Description'].' ",';
      $s=$s.'"name": "'.$row['name'].'",';
      $s=$s.'"color":"blue",';
      $s=$s.'"member": "'.$row['Members'].'",';
      $s=$s.'"rating": "'.$row['Ratings'].'",';
      $s=$s.'"phone": "'.$row['contact'].' "}}';
    }
    
  }
  $s=$s.']}';
  echo $s;
}

function getCSAConsumerMAP(){
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT CSA_ID FROM `csa` where ID='".$_SESSION['id']."'");
  $row=mysqli_fetch_array($result);
  $result = mysqli_query($link,"SELECT * FROM `CSABuy` where `CSAID`='".$row['CSA_ID']."'");
  $s='var obj={"type": "FeatureCollection","features": [';
  $f=0;
  while($row1 = mysqli_fetch_array($result)){
      $result1 = mysqli_query($link,"SELECT * FROM `user` where `id`=".$row1['userID']."");
      $row = mysqli_fetch_array($result1);
    if($f==0)$f=1;
    else $s=$s.',';
    if($row['category']=='Consumer'){
      $s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
      $s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
      
      //$s=$s.'"description": "'.$row['Description'].' ",';
      $s=$s.'"name": "'.$row['name'].'",';
      $s=$s.'"color":"yellow",';
      $s=$s.'"phone": "'.$row['contact'].' "}}';
    }
    else if($row['category']=='Farmer'){
      $s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
      $s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
      
      $s=$s.'"description": "'.$row['Description'].' ",';
      $s=$s.'"name": "'.$row['name'].'",';
      $s=$s.'"color":"green",';
      $s=$s.'"rating": "'.$row['Ratings'].'",';
      $s=$s.'"phone": "'.$row['contact'].' "}}';
    }
    else{
      $s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
      $s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
      $s=$s.'"description": "'.$row['Description'].' ",';
      $s=$s.'"name": "'.$row['name'].'",';
      $s=$s.'"color":"blue",';
      $s=$s.'"member": "'.$row['Members'].'",';
      $s=$s.'"rating": "'.$row['Ratings'].'",';
      $s=$s.'"phone": "'.$row['contact'].' "}}';
    }
    
  }
  $s=$s.']}';
  echo $s;
}
function getFarmerCSASell() {
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT CSA_ID FROM `csa` where ID='".$_SESSION['id']."'");
  $row=mysqli_fetch_array($result);
  $result = mysqli_query($link,"SELECT * FROM `CSABuy` where `CSAID`='".$row['CSA_ID']."'");
  $i=4;
  $s='<section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-20" data-rv-view="211" style="background-color: rgb(239, 239, 239);">';
  $s=$s.'<div class="mbr-cards-row row">';
  while($row = mysqli_fetch_array($result)){
    $result1 = mysqli_query($link,"SELECT * FROM `user` where `id`=".$row['userID']."");
    $row1 = mysqli_fetch_array($result1);
    if($i==0){
      $s=$s.'</div>';
      $i=4;
      $s=$s.'<div class="mbr-cards-row row">';
    }
      $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><img src="Consumer.jpg" height="200" width="200" class="card-img-top"></div>
                    <div class="card-block">
                        <h4 class="card-title"><font size="5">'.$row1['name'].'</font></h4>
                        <p class="card-text" ><font size="3">Next Delivery : '.$row['Next Delivery'].' <br>No of Share : '.$row['No of Share'].'<br>
                          Weeks Left : '.$row['Weeks Left'].'<br> 
                        </p>
                        <div class="card-btn"><a href="17_consumer_BuyProfile.php" class="btn btn-primary">MORE</a></div>
                    </div>
                </div>
            </div>
        </div>';
    $i=$i-1;
  }
  while($i!=0){
    $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3"  padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"></div>
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <h5 class="card-subtitle"><h5>
                        <div class="card-btn"></div>
                    </div>
                </div>
            </div>
        </div>';
        $i=$i-1;
  }
  $s=$s.'</div></section>';
  echo $s;
  mysqli_close ($link);
}





function getCSAobj() {
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `csa`");
  $i=4;
  $s='<section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-20" data-rv-view="211" style="background-color: rgb(239, 239, 239);">';
  $s=$s.'<div class="mbr-cards-row row">';
  while($row = mysqli_fetch_array($result)){
  	if(isset($_POST['Crop']) and !empty($_POST['Crop'])){// and stripos($row['Crop'], $_POST['Crop']) === false){
  		$flag=0;
      $cropi=explode(",",$_POST['Crop']);
      $ky=0;
      while($ky<count($cropi)){
          //echo $cropi[$ky];
          if(stripos($row['Crop'],$cropi[$ky]) !== false){
              $flag=1;
              //echo "hi";
              break;
          }
          $ky=$ky+1;
      }
      if($flag==0)
        continue;


      //continue;
  	}
  	
  	if(isset($_POST['City']) and !empty($_POST['City']) or isset($_POST['State']) and !empty($_POST['State'])){
  		
  		$res=mysqli_query($link,"SELECT * FROM `user` where `id`=".$row['ID']."");
  		$re=mysqli_fetch_array($res);
  		if(isset($_POST['City']) and !empty($_POST['City']) and strcmp($_POST['City'],$re['City'])!=0){
  			
  			continue;
  		}
  		
  		if(isset($_POST['State']) and !empty($_POST['State']) and strcmp($_POST['State'],$re['State'])!=0)
  			continue;
  	}
    if($i==0){
      $s=$s.'</div>';
      $i=4;
      $s=$s.'<div class="mbr-cards-row row">';
    }
      $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><img src="'.$row['img'].'" height="200" width="200" class="card-img-top"></div>
                    <div class="card-block">
                        <h4 class="card-title"><font size="5">'.$row['Title'].'</font></h4>
                        <h5 class="card-subtitle"><font size="3">'.$row['Short Description'].'</font></h5>
                        <p class="card-text" ><font size="3">Ratings : '.$row['Ratings'].' <br> Full Share : '.$row['Full Share'].'<br> Half Share : '.$row['Half Share'].'</font></p>
                        <div class="card-btn"><a href="16_consumer_CSAProfile.php?id='.$row['CSA_ID'].'" class="btn btn-primary">MORE</a></div>
                    </div>
                </div>
            </div>
        </div>';
    $i=$i-1;
  }
  while($i!=0){
    $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3"  padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"></div>
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <h5 class="card-subtitle"><h5>
                        <div class="card-btn"></div>
                    </div>
                </div>
            </div>
        </div>';
        $i=$i-1;
  }
  $s=$s.'</div></section>';
  echo $s;
  mysqli_close ($link);


}
function getProductReviews(){
   require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `Sell` where CropID=".$_REQUEST['id']."");
  $row = mysqli_fetch_array($result);
  if(!empty($row['Review1'])){
echo '<div class="mbr-testimonial card">
                        <div class="card-block"><p>“'.$row['Review1'].'”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-name">Abanoub S.</div>
                        </div>
                    </div>';
                  }
  if(!empty($row['Review2'])){

echo '<div class="mbr-testimonial card">
                        <div class="card-block"><p>“'.$row['Review2'].'”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-name">Abanoub S.</div>
                        </div>
                    </div>';
}
  if(!empty($row['Review1'])){

echo '<div class="mbr-testimonial card">
                        <div class="card-block"><p>“'.$row['Review3'].'”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-name">Abanoub S.</div>
                        </div>
                    </div>';
}

}

function getReviews(){
   require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `csa` where CSA_ID=".$_REQUEST['id']."");
  $row = mysqli_fetch_array($result);
echo '<div class="mbr-testimonial card">
                        <div class="card-block"><p>“'.$row['Review1'].'”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-name">Abanoub S.</div>
                        </div>
                    </div>';
echo '<div class="mbr-testimonial card">
                        <div class="card-block"><p>“'.$row['Review2'].'”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-name">Abanoub S.</div>
                        </div>
                    </div>';
echo '<div class="mbr-testimonial card">
                        <div class="card-block"><p>“'.$row['Review2'].'”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-name">Abanoub S.</div>
                        </div>
                    </div>';
}

function getCSAHeader(){
    require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `csa` where CSA_ID=".$_REQUEST['id']."");
  $row = mysqli_fetch_array($result);
  echo '<h3 style="color:black;" class="mbr-section-title display-2">'.$row['Title'].'</h3>
<div style="color:black;" class="mbr-section-text">
  <p>'.$row['Description'].'</p>
                            </div>';
  mysqli_close ($link);

}


function getMapobj() {
	require 'connect.inc.php';
	$result = mysqli_query($link,"SELECT * FROM `user`");
	echoMap($result);
	mysqli_close ($link);
}

function getSellobj(){
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `Buy`");
  $i=4;
  $s='<section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-20" data-rv-view="211" style="background-color: rgb(239, 239, 239);">';
  $s=$s.'<div class="mbr-cards-row row">';
  while($row = mysqli_fetch_array($result)){
    if(isset($_POST['Crop']) and !empty($_POST['Crop'])){// and stripos($row['Title'], $_POST['Crop']) === false){
      $flag=0;
      $cropi=explode(",",$_POST['Crop']);
      $ky=0;
      while($ky<count($cropi)){
          //echo $cropi[$ky];
          if(stripos($row['Title'],$cropi[$ky]) !== false){
              $flag=1;
              //echo "hi";
              break;
          }
          $ky=$ky+1;
      }
      if($flag==0)
        continue;
      //continue;
    }
    if(isset($_POST['City']) and !empty($_POST['City']) or isset($_POST['State']) and !empty($_POST['State'])){
      
      $res=mysqli_query($link,"SELECT * FROM `user` where `id`=".$row['ID']."");
      $re=mysqli_fetch_array($res);
      if(isset($_POST['City']) and !empty($_POST['City']) and strcmp($_POST['City'],$re['City'])!=0){
        
        continue;
      }
      
      if(isset($_POST['State']) and !empty($_POST['State']) and strcmp($_POST['State'],$re['State'])!=0)
        continue;
    }
    if($i==0){
      $s=$s.'</div>';
      $i=4;
      $s=$s.'<div class="mbr-cards-row row">';
    }
      $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><img src="'.$row['CropID'].'.jpg" height="200" width="200" class="card-img-top"></div>
                    <div class="card-block">
                        <h4 class="card-title"><font size="5">'.$row['Title'].'</font></h4>
                        <h5 class="card-subtitle"><font size="3">'.$row['Description'].'</font></h5>
                        <p class="card-text" ><font size="3">Quantity : '.$row['Quantity'].' <br> Price : '.$row['Price'].'<br> 
                        <div class="card-btn"><a href="#" class="btn btn-primary">Sell</a></div>
                    </div>
                </div>
            </div>
        </div>';
    $i=$i-1;
  }
  while($i!=0){
    $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3"  padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"></div>
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <h5 class="card-subtitle"><h5>
                        <div class="card-btn"></div>
                    </div>
                </div>
            </div>
        </div>';
        $i=$i-1;
  }
  $s=$s.'</div></section>';
  echo $s;
  mysqli_close ($link);

}
function getBuyHeader(){
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `Sell` where CropID=".$_REQUEST['id']."");
  $row = mysqli_fetch_array($result);
  echo '<div class="mbr-figure"><img  src="'.$_REQUEST['id'].'.jpg" width="200" height="400" ></div>
                        </div>
                        <div class="mbr-table-cell col-md-5 text-xs-center text-md-left content-size"><h3 style="color:black;" class="mbr-section-title display-2">'.$row['Title'].'</h3>
<div style="color:black;" class="mbr-section-text">
  <p>'.$row['Description'].'</p>
                            </div>';
  mysqli_close ($link);
}
function getcart(){
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `ItemPurchased` where userID='".$_SESSION['id']."'");
  $i=4;
  $s='<br><p ><center><h1><b style="font-size:30px;">Item Purchased</b></h1><section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-20" data-rv-view="211" style="background-color: rgb(239, 239, 239);">';
  $s=$s.'<div class="mbr-cards-row row">';
  $total=0;
  while($row = mysqli_fetch_array($result)){
    $result1 = mysqli_query($link,"SELECT * FROM `Sell` where `CropID`=".$row['CropID']."");
    $row1=mysqli_fetch_array($result1);
    if($i==0){
      $s=$s.'</div>';
      $i=4;
      $s=$s.'<div class="mbr-cards-row row">';
    }
    $sum=(int)$row1['Price']*(int)$row['Quantity'];
    $total=$total+$sum;
      $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><img src="'.$row1['CropID'].'.jpg" height="200" width="200" class="card-img-top"></div>
                    <div class="card-block">
                        <h4 class="card-title"><font size="5">'.$row1['Title'].'</font></h4>
                        <h5 class="card-subtitle"><font size="3">'.$row1['shortDescription'].'</font></h5>
                        <p class="card-text" ><font size="3">Quantity : '.$row['Quantity'].' <br> Total Price : '.$sum.'<br> 
                        <div class="card-btn"><a href="BuyItem.php?id='.$row['CropID'].'" class="btn btn-primary">Remove</a></div>
                    </div>
                </div>
            </div>
        </div>';
    $i=$i-1;
  }
  while($i!=0){
    $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3"  padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"></div>
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <h5 class="card-subtitle"><h5>
                        <div class="card-btn"></div>
                    </div>
                </div>
            </div>
        </div>';
        $i=$i-1;
  }
  $s=$s.'</div></section>';
  $result = mysqli_query($link,"SELECT * FROM `CSAPurchased` where userID='".$_SESSION['id']."'");
  $i=4;
  $s=$s.'<h1><b style="font-size:30px;">CSA Purchased</b></h1><section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-20" data-rv-view="211" style="background-color: rgb(239, 239, 239);">';
  $s=$s.'<div class="mbr-cards-row row">';
  while($row = mysqli_fetch_array($result)){
    $result1 = mysqli_query($link,"SELECT * FROM `csa` where `CSA_ID`=".$row['CSAID']."");
    $row1=mysqli_fetch_array($result1);
    if($i==0){
      $s=$s.'</div>';
      $i=4;
      $s=$s.'<div class="mbr-cards-row row">';
    }
    $sum=(int)$row1['Full Share']*(int)$row['Shares']*(int)$row['Months']/3;
    $total=$total+$sum;
      $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><img src="'.$row1['img'].'" height="200" width="200" class="card-img-top"></div>
                    <div class="card-block">
                        <h4 class="card-title"><font size="5">'.$row1['Title'].'</font></h4>
                        <h5 class="card-subtitle"><font size="3">'.$row1['Short Description'].'</font></h5>
                        <p class="card-text" ><font size="3">No of Shares : '.$row['Shares'].' <br> Total Price : '.$sum.'<br> 
                        <div class="card-btn"><a href="#" class="btn btn-primary">Remove</a></div>
                    </div>
                </div>
            </div>
        </div>';
    $i=$i-1;
  }
  while($i!=0){
    $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3"  padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"></div>
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <h5 class="card-subtitle"><h5>
                        <div class="card-btn"></div>
                    </div>
                </div>
            </div>
        </div>';
        $i=$i-1;
  }
  $s=$s.'</div></section>';
  $s=$s.'Total Price : '.$total.'<br><a class="btn btn-primary" href="checkout.php">Checkout</span></a></center></p>';
  
  echo $s;
  mysqli_close ($link);
}

function getFarmerNotifications(){
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `NotificationTable` where `userID`='".$_SESSION['id']."'");
  while($row = mysqli_fetch_array($result)){
    echo '<p>'.$row['Notification'].'</p>';
  }
    mysqli_close ($link);
}


function getUserCSABuy(){
  require 'connect.inc.php';
  //$result = mysqli_query($link,"SELECT CSA_ID FROM `csa` where ID='".$_SESSION['id']."'");
  //$row=mysqli_fetch_array($result);
  $result = mysqli_query($link,"SELECT * FROM `CSABuy` where `userID`='".$_SESSION['id']."'");
  $i=4;
  $s='<section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-20" data-rv-view="211" style="background-color: rgb(239, 239, 239);">';
  $s=$s.'<div class="mbr-cards-row row">';
  while($row = mysqli_fetch_array($result)){
    $result1 = mysqli_query($link,"SELECT * FROM `csa` where `CSA_ID`=".$row['CSAID']."");
    $row1 = mysqli_fetch_array($result1);
    if($i==0){
      $s=$s.'</div>';
      $i=4;
      $s=$s.'<div class="mbr-cards-row row">';
    }
      $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><img src="'.$row1['img'].'" height="200" width="200" class="card-img-top"></div>
                    <div class="card-block">
                        <h4 class="card-title"><font size="5">'.$row1['Title'].'</font></h4>
                        <p class="card-text" ><font size="3">Next Delivery : '.$row['Next Delivery'].' <br>No of Share : '.$row['No of Share'].'<br>
                          Weeks Left : '.$row['Weeks Left'].'<br> 
                        </p>
                        <div class="card-btn"><a href="17_consumer_BuyProfile.php" class="btn btn-primary">MORE</a></div>
                    </div>
                </div>
            </div>
        </div>';
    $i=$i-1;
  }
  while($i!=0){
    $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3"  padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"></div>
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <h5 class="card-subtitle"><h5>
                        <div class="card-btn"></div>
                    </div>
                </div>
            </div>
        </div>';
        $i=$i-1;
  }
  $s=$s.'</div></section>';
  echo $s;
  mysqli_close ($link);
}









function getbuyobj(){
	require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `Sell`");
  $i=4;
  $s='<section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-20" data-rv-view="211" style="background-color: rgb(239, 239, 239);">';
  $s=$s.'<div class="mbr-cards-row row">';
  while($row = mysqli_fetch_array($result)){
  	if(isset($_POST['Crop']) and !empty($_POST['Crop'])){ //and stripos($row['Title'], $_POST['Crop']) === false){
      $flag=0;
      $cropi=explode(",",$_POST['Crop']);
      $ky=0;
      while($ky<count($cropi)){
          //echo $cropi[$ky];
          if(stripos($row['Title'],$cropi[$ky]) !== false){
              $flag=1;
              //echo "hi";
              break;
          }
          $ky=$ky+1;
      }
      if($flag==0)
        continue;
  		//continue;
  	}
  	if(isset($_POST['City']) and !empty($_POST['City']) or isset($_POST['State']) and !empty($_POST['State'])){
  		
  		$res=mysqli_query($link,"SELECT * FROM `user` where `id`=".$row['ID']."");
  		$re=mysqli_fetch_array($res);
  		if(isset($_POST['City']) and !empty($_POST['City']) and strcmp($_POST['City'],$re['City'])!=0){
  			
  			continue;
  		}
  		
  		if(isset($_POST['State']) and !empty($_POST['State']) and strcmp($_POST['State'],$re['State'])!=0)
  			continue;
  	}
    if($i==0){
      $s=$s.'</div>';
      $i=4;
      $s=$s.'<div class="mbr-cards-row row">';
    }
      $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><img src="'.$row['CropID'].'.jpg" height="200" width="200" class="card-img-top"></div>
                    <div class="card-block">
                        <h4 class="card-title"><font size="5">'.$row['Title'].'</font></h4>
                        <h5 class="card-subtitle"><font size="3">'.$row['shortDescription'].'</font></h5>
                        <p class="card-text" ><font size="3">Ratings : '.$row['Rating'].' <br> Price : '.$row['Price'].'<br> 
                        <div class="card-btn"><a href="17_consumer_BuyProfile.php?id='.$row['CropID'].'" class="btn btn-primary">MORE</a></div>
                    </div>
                </div>
            </div>
        </div>';
    $i=$i-1;
  }
  while($i!=0){
    $s=$s.'<div class="mbr-cards-col col-xs-12 col-lg-3"  padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"></div>
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <h5 class="card-subtitle"><h5>
                        <div class="card-btn"></div>
                    </div>
                </div>
            </div>
        </div>';
        $i=$i-1;
  }
  $s=$s.'</div></section>';
  echo $s;
  mysqli_close ($link);
}
function getConsumerobj() {
	require 'connect.inc.php';
	$result = mysqli_query($link,"SELECT * FROM `user` where `category`='Consumer'");
	echoMap($result);
	mysqli_close ($link);

}
function getFPOobj() {
	require 'connect.inc.php';
	$result = mysqli_query($link,"SELECT * FROM `user` where `category`='FPO'");
	echoMap($result);
	mysqli_close ($link);

}
function getMarketobj() {
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `user` where `category`='Market'");
  echoMap($result);
  mysqli_close ($link);

}

function getTraderobj() {
  require 'connect.inc.php';
  $result = mysqli_query($link,"SELECT * FROM `user` where `category`='Trader'");
  echoMap($result);
  mysqli_close ($link);

}

function getFarmerMapobj() {
	require 'connect.inc.php';
	$result = mysqli_query($link,"SELECT * FROM `user` where `category`='Farmer'");
	$s='var obj={"type": "FeatureCollection","features": [';
	$f=0;
	while ($row = mysqli_fetch_array($result))
	{
		if(!empty($_POST['City']) and strcmp($_POST['City'],$row['City'])!=0)
			continue;
		if(!empty($_POST['State']) and strcmp($_POST['State'],$row['State'])!=0)
			continue;
		if($f==0)$f=1;
		else $s=$s.',';
		$s=$s.'{"geometry": {"type": "Point","coordinates": ['.$row['longi'] .','. $row['lat'].']},"type": "Feature",';
			$s=$s.'"properties": {"category": "'.$row['category'].'","address": "'.$row['address'].'  '.$row['City'].'  '.$row['State'].'  '.$row['Country'].'",';
			
			$s=$s.'"description": "'.$row['Description'].' ",';
			$s=$s.'"name": "'.$row['name'].'",';
		if($row['FPOJoined']=='1'){
			$s=$s.'"color":"red",';
		}
		else{
			$s=$s.'"color":"yellow",';
		}
		$s=$s.'"rating": "'.$row['Ratings'].'",';
		$s=$s.'"phone": "'.$row['contact'].' "}}';
	}
	$s=$s.']}';
	echo $s;
	//echoMap($result);
	mysqli_close ($link);

}


if(isset($_POST['function2call']) && !empty($_POST['function2call'])) {
    $function2call = $_POST['function2call'];
    switch($function2call) {
        case 'getUserLocation' : getUserLocation($_POST['userid']);break;
        case 'updateCrop' : updateCrop(); // do something;break;
        // other cases
    }
}
?>