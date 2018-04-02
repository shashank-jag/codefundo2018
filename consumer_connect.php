<?php require 'essential.inc.php';
  	require 'functions.php';
?>
<html>
<head>
  <title>Store Locator</title>
  <style>
    .map {height: 50%;}
    html, body {height: 100%; margin: 0; padding: 0;}
  </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>

function sanitizeHTML(strings) {
  const entities = {'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'};
  let result = strings[0];
  for (let i = 1; i < arguments.length; i++) {
    result += String(arguments[i]).replace(/[&<>'"]/g, (char) => {
      return entities[char];
    });
    result += strings[i];
  }
  return result;
}

function initMap() {

  //Create the map.
  <?php 
  	if(isset($_POST['Option'])){
  		$c=$_POST['Option'];
  		if(strcmp($c,"All")==0)
  			getMAPobj();
  		else if(strcmp($c,"Consumer")==0)
  			getConsumerobj();
  		else if(strcmp($c,"Farmers")==0)
  			getFarmerMapobj();
  		else if(strcmp($c,"FPO")==0)
  			getFPOobj();
  	}
  	else{	
  		getMAPobj();
  	}
  ?>


/*  obj={
  "type": "FeatureCollection",
  "features": [
    {
      "geometry": {
        "type": "Point",
        "coordinates": [
          75.85495560000004,
          22.6954233
        ]
      },
      "type": "Feature",
      "properties": {
        "category": "patisserie",
        "color": "yellow",
        
      }
    }
  ]
}*/ 
  const map = new google.maps.Map(document.getElementsByClassName('map')[0], {
    zoom: 10,
    center: {lat: <?php echo $_SESSION['lat'];?>, lng: <?php echo $_SESSION['longi'];?>},
    //styles: mapStyle
  });
 
        /*var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var obj = this.responseText;
                //alert(obj);
		            obj=JSON.parse(obj);
		            map.data.addGeoJson(obj);
            }
	    //else{
            //     alert("error");
	    //}	
        };
        xmlhttp.open("GET", "loadmap.php", true);
        xmlhttp.send();*/
   map.data.addGeoJson(obj);
  // Define the custom marker icons, using the store's "category".
  //map.data.addGeoJson(obj);

  map.data.setStyle(feature => {
    return {
      icon: {
        url: `http://maps.google.com/mapfiles/ms/icons/${feature.getProperty('color')}-dot.png`,//`img/draggable: true,
        scaledSize: new google.maps.Size(40, 40)
      }
    };
  });

  const apiKey = 'AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU';
  const infoWindow = new google.maps.InfoWindow();
  infoWindow.setOptions({pixelOffset: new google.maps.Size(0, -30)});

  // Show the information for a store when its marker is clicked.
  map.data.addListener('click', event => {

    const category = event.feature.getProperty('category');
    const name = event.feature.getProperty('name');
    const description = event.feature.getProperty('description');
    const address = event.feature.getProperty('address');
    const phone = event.feature.getProperty('phone');
    const rating = event.feature.getProperty('rating');
    const members = event.feature.getProperty('member');
    const position = event.feature.getGeometry().get();
    var content;
    if(category.localeCompare("Consumer")==0){
    content = sanitizeHTML`
      <img style="float:left; width:200px; margin-top:30px" src="Consumer.jpg">
      <div style="margin-left:220px; margin-bottom:20px;">
        <h2>${name}</h2><p>${address}</p>
        <p><b>Phone:</b> ${phone}</p>
        <p><b>Category:</b> ${category}</p>
      </div>
    `;
    }
    else if(category.localeCompare("Farmer")==0){
      content = sanitizeHTML`
      <img style="float:left; width:200px; margin-top:30px" src="Farmer.jpg">
      <div style="margin-left:220px; margin-bottom:20px;">
        <h2>${name}</h2><p>${address}</p>
        <p><b>Phone:</b> ${phone}</p>
        <p><b>Category:</b> ${category}</p>
        <p><b>Description:</b> ${description}</p>
        <p><b>Rating:</b> ${rating}</p>
      </div>
    `;
    }
    else {
      content = sanitizeHTML`
      <img style="float:left; width:200px; margin-top:30px" src="Company.jpg">
      <div style="margin-left:220px; margin-bottom:20px;">
        <h2>${name}</h2><p>${address}</p>
        <p><b>Phone:</b> ${phone}</p>
        <p><b>Category:</b> Farmer Producer Organisation</p>
        <p><b>Description:</b> ${description}</p>
        <p><b>Members:</b> ${members}</p>
        <p><b>Rating:</b> ${rating}</p>
      </div>
    `;
    }

    infoWindow.setContent(content);
    infoWindow.setPosition(position);
    infoWindow.open(map);
  });

}
</script>
<head>
<body>
	
  <div class="map"></div>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&callback=initMap">
  </script>
  <form method="post" action="consumer_connect.php">
    <label ><b>City Name</b></label>
	<input type="text" <?php if (isset($_POST['City'])) { echo 'value="'.$_POST['City'].'"'; } ?> placeholder="Enter City" name="City" >
	<br>
    <label ><b>State Name</b></label>
	<input type="text" <?php if (isset($_POST['State'])) { echo 'value="'.$_POST['State'].'"'; } ?> placeholder="Enter State" name="State" >
	<br>
    <select name="Option">
    <option value="All" <?php if (isset($_POST['Option']) and strcmp($_POST['Option'],'All') == 0) { echo ' selected="selected"'; } ?> >All</option>
  	<option value="Farmers" <?php if (isset($_POST['Option']) and strcmp($_POST['Option'],'Farmers') == 0) { echo ' selected="selected"'; } ?>>Farmers</option>
  	<option value="Consumer" <?php if (isset($_POST['Option']) and strcmp($_POST['Option'],'Consumer') == 0) { echo ' selected="selected"'; } ?>>Consumers</option>
  	<option value="FPO" <?php if (isset($_POST['Option']) and strcmp($_POST['Option'],'FPO') == 0) { echo ' selected="selected"'; } ?>>FPO</option>
  </select>
  <input type="submit" value="Find"/>
</form>
</body>
</html>
