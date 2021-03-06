<?php require 'essential.inc.php';
    require 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v4.3.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.3.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/mbr-favicon.png" type="image/x-icon">
  <meta name="description" content="Web Site Creator Description">
  <title>13_consumerShareDisplay</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
 <style>
    .map {height: 500px; margin: 50; padding: 50;}
    
  </style>
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
    //if(isset($_POST['City'])||isset($_POST['Crop'])||isset($_POST['State'])){
      getCSAConsumerMAP();
    //}
    //else{ 
      //getMAPobj();
    //}
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

  
</head>
<body>
<section id="menu-h" data-rv-view="120">

    <nav class="navbar navbar-dropdown transparent navbar-fixed-top bg-color">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="01_farmerHome.php" class="mbri-globe mbr-iconfont mbr-iconfont-menu navbar-logo"></a>
                        <a class="navbar-caption" href="01_farmerHome.php">Fresh Farm</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="SellCSA.php">CSA</a></li><li class="nav-item"><a class="nav-link link" data-toggle="modal" data-target="#login" href="#">Sell</a></li><li class="nav-item"><a class="nav-link link" href="#">Training Events</a></li><li class="nav-item dropdown"><a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="false">Account</a><div class="dropdown-menu"><a class="dropdown-item" href="profile.php">Profile</a><a class="dropdown-item" href="06_farmerNotifications.php">Notifications</a><a class="dropdown-item" href="logout.php">logout</a></div></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<?php include 'Sell.inc.php';?>

<section class="engine"><a href="https://mobirise.co/e">web builder software</a></section><section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-11" data-rv-view="103" style="background-image: url(assets/images/desert.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Your Customers&nbsp;</h3>
                
            </div>
        </div>
    </div>

</section>
<div class="map"></div>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&callback=initMap">
  </script>
  
    <form method="post" action="14_consumerBuy.php" style="margin: 50;">
  <input type="text" <?php if (isset($_POST['City'])) { echo 'value="'.$_POST['City'].'"'; } ?> placeholder="Enter City" name="City" >
    
  <input type="text" <?php if (isset($_POST['State'])) { echo 'value="'.$_POST['State'].'"'; } ?> placeholder="Enter State" name="State" >
   <input type="text" <?php if (isset($_POST['Crop'])) { echo 'value="'.$_POST['Crop'].'"'; } ?> placeholder="Enter Crop" name="Crop" > 
  <input type="submit" value="Find"/>
</form>

<?php 
  getFarmerCSASell();
?>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html> 