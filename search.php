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

	<div class="col-lg-6 col-md-12 col-sm-12">
		
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