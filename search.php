<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,500;1,500&display=swap" rel="stylesheet">

    <style type="text/css">
    	.hide{
    		display: none;
    	}

    	.list-group-item:hover{
    		background: #007bff;
    		color: white;
    	}

    	.hotelCard:hover{
    		transform: scale(1.04);
    		transition: all 0.5s;
    	}
    	body{
    		font-family: 'Alegreya', serif; font-size: 18px;
    	}
    	.hotelNameOnImage{
		  color: white;
		  margin-bottom: 2px;
		  font-size: 25px;
		  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
    	}

    </style>
</head>
<body background="https://i1.wp.com/brazilbeyondrio.com/wp-content/uploads/2018/07/pedro-menezes-513074-unsplash-e1554601699844.jpg?resize=1500%2C1080&ssl=1">

<div class="row" style="margin: 20px;">

	<div class="col-lg-6 col-md-12 col-sm-12" style="">

        <div id="googleMap" style="width:100%;height:94vh;border: 5px white solid;"></div>
		
	</div>
	
	<div class="col-lg-6 col-md-12 col-sm-12">

		<form method="GET" action="search.php" id="searchForm">
			<div class="card" style="margin-top: 10px;">
			  <div class="card-body" style="text-align: center;">
			    <div class="form-group">
			    	<input type="text" class="form-control" id="searchBox" name="location" placeholder="Search City, State or Area" autocomplete="off"  <?php if(isset($_GET['location'])){echo 'value="'.$_GET['location'].'"';}?> >

			    	<ul class="list-group hide" id="countryList" style="margin-top: 5px;">
			    		<?php

			        		include 'db.php';
			        		$link=mysqli_connect($servername,$username,$password,$dbname);

			        		  if(mysqli_connect_error()){
						        echo "There was an error connecting to DB!";
						      }else{
						      //connected to db successfully

						        $query="SELECT DISTINCT state FROM hotels";

						        $result=mysqli_query($link,$query);

						        while ($row=mysqli_fetch_array($result)) {
						        	echo '
						        		<li class="list-group-item"><b>'.$row['state'].'</b></li>
						        	';
						        }

						        $query="SELECT DISTINCT state,city FROM hotels";

						        $result=mysqli_query($link,$query);

						        while ($row=mysqli_fetch_array($result)) {
						        	echo '
						        		<li class="list-group-item"><b>'.$row['state'].', '.$row['city'].'</b></li>
						        	';
						        }
						    }

			        	?>
					</ul>
		    	</div>

		    	<div class="form-group">
				    <select class="form-control" id="exampleFormControlSelect1" name="hotelType">
				      <?php if(isset($_GET['hotelType'])){echo '<option>'.$_GET['hotelType'].'</option>';}?>
				      <option>Hotel Type - Any</option>
				      <?php

				      	if(mysqli_connect_error()){
					        echo "There was an error connecting to DB!";
					      }else{
					      //connected to db successfully

					        $query="SELECT DISTINCT hotelType FROM hotels";

					        $result=mysqli_query($link,$query);

					        while ($row=mysqli_fetch_array($result)) {
					        	echo '
					        		<option>'.$row['hotelType'].'</option>
					        	';
					        }

					    }


				      ?>
				    </select>
				</div>

				<div class="form-group">
					<div class="row" style="margin: 5px;">
				  		<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckwifi" name="wifi" <?php if(isset($_GET['wifi'])){echo "checked";}?> >

						  <label class="form-check-label" for="defaultCheckwifi">
						    WiFi
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckac" name="ac" <?php if(isset($_GET['ac'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckac">
						    A/C
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultChecktv" name="tv" <?php if(isset($_GET['tv'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultChecktv">
						    TV
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckpool" name="pool" <?php if(isset($_GET['pool'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckpool">
						    Pool
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckminibar" name="minibar" <?php if(isset($_GET['minibar'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckminibar">
						    Minibar
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbar" name="bar" <?php if(isset($_GET['bar'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckbar">
						    Bar
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckpetsok" name="petsok" <?php if(isset($_GET['petsok'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckpetsok">
						    Pets OK
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckrestaurant" name="restaurant" <?php if(isset($_GET['restaurant'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckrestaurant">
						    Restaurant
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultChecktransfers" name="transfers" <?php if(isset($_GET['transfers'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultChecktransfers">
						    Transfers
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbeach" name="beach" <?php if(isset($_GET['beach'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckbeach">
						    Beach
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckveg" name="vegetarian" <?php if(isset($_GET['vegetarian'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckveg">
						    Vegetarian
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1glutenfree" name="glutenfree" <?php if(isset($_GET['glutenfree'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheck1glutenfree">
						    Gluten Free
						  </label>
						</div>

						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckenglishok" name="englishok" <?php if(isset($_GET['englishok'])){echo "checked";}?> >
						  <label class="form-check-label" for="defaultCheckenglishok">
						    English OK
						  </label>
						</div>

				  	</div>
				</div>

			    <button type="submit" class="btn btn-primary btn-lg btn-block" style=" background: #00bcd4; border: black; color: white;"><b>Search</b></button>
			  </div>
			</div>
		</form>

		<div class="card" style="margin-top: 10px;">

			<div class="row" style="padding-top: 10px; padding-right: 20px;padding-left: 20px; padding-bottom: 20px;">

				<?php

	        		include 'db.php';
	        		$link=mysqli_connect($servername,$username,$password,$dbname);

	        		  if(mysqli_connect_error()){
				        echo "There was an error connecting to DB!";
				      }else{
				      //connected to db successfully

				      	//filter queries
				      	$filterQueryString="";
				      	if(isset($_GET['wifi'])){
				      		$filterQueryString=$filterQueryString." wifi=1 AND";
				      	}
				      	if(isset($_GET['ac'])){
				      		$filterQueryString=$filterQueryString." ac=1 AND";
				      	}
				      	if(isset($_GET['tv'])){
				      		$filterQueryString=$filterQueryString." tv=1 AND";
				      	}
				      	if(isset($_GET['pool'])){
				      		$filterQueryString=$filterQueryString." pool=1 AND";
				      	}
				      	if(isset($_GET['minibar'])){
				      		$filterQueryString=$filterQueryString." minibar=1 AND";
				      	}
				      	if(isset($_GET['bar'])){
				      		$filterQueryString=$filterQueryString." bar=1 AND";
				      	}
				      	if(isset($_GET['petsok'])){
				      		$filterQueryString=$filterQueryString." petsok=1 AND";
				      	}
				      	if(isset($_GET['restaurant'])){
				      		$filterQueryString=$filterQueryString." restaurant=1 AND";
				      	}
				      	if(isset($_GET['transfers'])){
				      		$filterQueryString=$filterQueryString." transfers=1 AND";
				      	}
				      	if(isset($_GET['beach'])){
				      		$filterQueryString=$filterQueryString." beach=1 AND";
				      	}
				      	if(isset($_GET['vegetarian'])){
				      		$filterQueryString=$filterQueryString." vegetarian=1 AND";
				      	}
				      	if(isset($_GET['glutenfree'])){
				      		$filterQueryString=$filterQueryString." glutenfree=1 AND";
				      	}
				      	if(isset($_GET['englishok'])){
				      		$filterQueryString=$filterQueryString." englishok=1 AND";
				      	}
				      	if(isset($_GET['hotelType'])){
				      		if($_GET['hotelType']!="Hotel Type - Any"){
				      			$filterQueryString=$filterQueryString." hotelType='".$_GET['hotelType']."'";
				      		}else{
				      			$filterQueryString=$filterQueryString." hotelType LIKE '%'";
				      		}
				      	}
				      	if(isset($_GET['location']) AND array_key_exists('location', $_GET) AND $_GET['location']!=""){

				      		if (strpos($_GET['location'], ',') !== false) {
							    $cityName = substr($_GET['location'], strpos($_GET['location'], ",") + 2);
							    $filterQueryString=$filterQueryString." AND city LIKE '%".$cityName."%'";
							}else{
								$filterQueryString=$filterQueryString."AND state LIKE '%".$_GET['location']."%'";
							}
				      		
				      		//$filterQueryString=$filterQueryString."AND state LIKE '%".$_GET['location']."%' OR city LIKE '%".$cityName."%'";
				      	}else{
				      		$filterQueryString=$filterQueryString."AND state LIKE '%' AND city LIKE '%'";
				      	}

				      	//if(isset($_GET['location'])){
				      		//$cityName = substr($_GET['location'], strpos($_GET['location'], ",") + 2);  
				      	
							//echo $cityName;  

					        $query="SELECT * FROM hotels WHERE".$filterQueryString;

					        $result=mysqli_query($link,$query);

					        while ($row=mysqli_fetch_array($result)) {
					        	echo '
					        		<div class="col-lg-6 col-md-12 col-sm-12">
					        			<a href="'.$row['siteUrl'].'" target="_blank">
											<div class="card hotelCard" style="margin-top: 15px;">
											  <img src="'.$row['imgUrl'].'" class="card-img" alt="'.$row['hotelName'].'">
											  <div class="card-img-overlay" >
											    <h5 class="card-title hotelNameOnImage"><b>'.$row['hotelName'].'</b></h5>
											  </div>
											</div>
										</a>
									</div>
					        	';
					        }
				    	//}

				    }

	        	?>

				<!-- <div class="col-lg-6 col-md-12 col-sm-12">
					<a href="">
					<div class="card hotelCard" style="margin-top: 15px;">
					  <img src="https://k6u8v6y8.stackpathcdn.com/blog/wp-content/uploads/2014/05/Luxury-Hotels-in-India.jpg" class="card-img" alt="...">
					  <div class="card-img-overlay" >
					    <h5 class="card-title" style="color: white; margin-bottom: 2px;"><b>Hotel name</b></h5>
					  </div>
					</div>
					</a>
				</div> -->


			</div>
			
		</div>

	</div>

</div>



<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<!-- <script>
var map;
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(-33.890542,151.274856),
  zoom:12,
};
map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
TestMarker();
}

var locations = [
  ['Bondi Beach', -33.890542, 151.274856, 4],
  ['Coogee Beach', -33.923036, 151.259052, 5],
  ['Cronulla Beach', -34.028249, 151.157507, 3],
  ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
  ['Maroubra Beach', -33.950198, 151.259302, 1]
];

var marker;
 for (i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map
  });

// Function for adding a marker to the page.
function addMarker(location) {
    marker = new google.maps.Marker({
        position: location,
        label: {
          text: "ABCD",
          color: "#ffffff",
          fontWeight: "bold"
        },
        map: map
    },{
        position: location,
        label: {
          text: "sssss",
          color: "#ffffff",
          fontWeight: "bold"
        },
        map: map
    });
}

// Testing the addMarker function
function TestMarker() {
   CentralPark = new google.maps.LatLng(19.076090,  72.877426);
   addMarker(CentralPark);
}
</script> -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIX2aNMeU2L003GB4g7vqX0CsQQUox10g&callback=myMap"></script>
<!-- <script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/markerwithlabel/src/markerwithlabel.js"></script> -->

<script type="text/javascript">
    var locations = [
    <?php
    $query="SELECT * FROM hotels WHERE".$filterQueryString;

    $result=mysqli_query($link,$query);

    while ($row=mysqli_fetch_array($result)) {

        echo'
            [\''.$row['hotelName'].'\', '.$row['locationLatitude'].', '.$row['locationLongitude'].'],
        ';
    }

    ?>
    ];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        label: {
          text: locations[i][0],
          color: "#ffffff",
          fontWeight: "bold"
        },
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
</script>




<script>
$(document).ready(function(){

	$("#searchBox").on("keyup", function() {

		$("#countryList").removeClass("hide");

		var value = $(this).val().toLowerCase();

		if(value.length==0){
			$("#countryList").addClass("hide");
		}else{
			$("#countryList li").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		}
		
	});

	$(".list-group-item").on("click",function(){
		$("#searchBox").val($(this).text());
		$("#countryList").addClass("hide");
		$("#searchForm").submit();
	});
});

</script>

</body>
</html>