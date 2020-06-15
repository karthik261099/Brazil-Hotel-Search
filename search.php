<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

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

    </style>
</head>
<body background="https://i1.wp.com/brazilbeyondrio.com/wp-content/uploads/2018/07/pedro-menezes-513074-unsplash-e1554601699844.jpg?resize=1500%2C1080&ssl=1">

<!-- <div class="jumbotron" style="padding: 10px; margin: 20px;">
	<button type="button" class="btn btn-light"><b>Back<b></button>
  <h4 class="display-4" style="margin-left: 30px; text-align: center;">Search results for "Mumbai"</h4>
</div>

<div class="container">

	<div class="card">
	  <div class="card-body" style="text-align: center;">
	    <h3 style="text-align: center;">Hotel Name goes here</h3>
	    <button style="" type="button" class="btn btn-primary"><b>Book Now</b></button>
	  </div>
	</div>

</div>
	 -->

<div class="row" style="margin: 20px;">

	<div class="col-lg-6 col-md-12 col-sm-12" style="">

        <div id="googleMap" style="width:100%;height:94vh;border: 5px white solid;"></div>
		
	</div>
	
	<div class="col-lg-6 col-md-12 col-sm-12">

		<form method="GET" action="search.php" id="searchForm">
			<div class="card" style="margin-top: 10px;">
			  <div class="card-body" style="text-align: center;">
			    <div class="form-group">
			    	<input type="text" class="form-control" id="searchBox" name="location" placeholder="Search City, State or Area" autocomplete="off">

			    	<ul class="list-group hide" id="countryList" style="margin-top: 5px;">
			    		<?php

			        		include 'db.php';
			        		$link=mysqli_connect($servername,$username,$password,$dbname);

			        		  if(mysqli_connect_error()){
						        echo "There was an error connecting to DB!";
						      }else{
						      //connected to db successfully

						        $query="SELECT DISTINCT location FROM hotels";

						        $result=mysqli_query($link,$query);

						        while ($row=mysqli_fetch_array($result)) {
						        	echo '
						        		<li class="list-group-item"><b>'.$row['location'].'</b></li>
						        	';
						        }
						    }

			        	?>
					    <!-- <li class="list-group-item"><b>Mumbai</b></li>
					    <li class="list-group-item"><b>Indore</b></li>
					    <li class="list-group-item"><b>Chennai</b></li>
					    <li class="list-group-item"><b>Delhi</b></li>
					    <li class="list-group-item"><b>Rio de Janeiro</b></li>
					    <li class="list-group-item"><b>Delhi</b></li>
					    <li class="list-group-item"><b>Rio de Janeiro</b></li>
					    <li class="list-group-item"><b>Delhi</b></li>
					    <li class="list-group-item"><b>Rio de Janeiro</b></li>
					    <li class="list-group-item"><b>Delhi</b></li>
					    <li class="list-group-item"><b>Rio de Janeiro</b></li>
					    <li class="list-group-item"><b>Delhi</b></li>
					    <li class="list-group-item"><b>Rio de Janeiro</b></li> -->
					</ul> 

					<?php

					echo '

						<input type="hidden" name="checkIn" value="'.$_GET['checkIn'].'">
						<input type="hidden" name="checkOut" value="'.$_GET['checkOut'].'">
						<input type="hidden" name="adultsCount" value="'.$_GET['adultsCount'].'">
						<input type="hidden" name="childrenCount" value="'.$_GET['childrenCount'].'">
						<input type="hidden" name="roomsCount" value="'.$_GET['roomsCount'].'">

					';

					?>

		    	</div>
			    <button type="submit" class="btn btn-primary btn-lg btn-block"><b>Search</b></button>
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

				        $query="SELECT * FROM hotels WHERE location LIKE '%".$_GET['location']."%'";

				        $result=mysqli_query($link,$query);

				        while ($row=mysqli_fetch_array($result)) {
				        	echo '
				        		<div class="col-lg-6 col-md-12 col-sm-12">
				        			<a href="'.$row['affiliateurl'].'" target="_blank">
										<div class="card hotelCard" style="margin-top: 15px;">
										  <img src="imagesHotels/'.$row['imgUrl'].'" class="card-img" alt="'.$row['hotelName'].'">
										  <div class="card-img-overlay" >
										    <h5 class="card-title" style="color: white; margin-bottom: 2px;"><b>'.$row['hotelName'].'</b></h5>
										  </div>
										</div>
									</a>
								</div>
				        	';
				        }
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
    $query="SELECT * FROM hotels WHERE location LIKE '%".$_GET['location']."%'";

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