<?php echo '
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
					.searchBoxContainer{
						font-family: "Alegreya", serif; font-size: 18px;
					}
					
					.dropDownOption{ font-size:16px; }

					body{
						font-size:16px;
					}

				</style>
				
				<div class="container">
					<div class="container searchBoxContainer" style="margin-top: 30px; margin-bottom:30px; background-color: #c8c8c8; padding: 5px; border-radius: 5px;">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<form method="GET" action="searchHotel.php" id="searchForm">
							  <div class="row" style="text-align: center; padding: 10px;">
								<div class="col-lg-3 col-md-12 col-sm-12" style="margin-top: 5px;">

									<input type="text" class="form-control" id="searchBox" name="location" placeholder="Search City, State or Area"
									autocomplete="off" style="margin:0px;">

									<ul class="list-group hide" id="countryList" style="margin-top: 5px;margin-right: 5px;margin-left: 5px;">';?>
										<?php

											$servername = "localhost";
											$username = "givebirt_infotec";
											$password = "encourageinfotech";
											$dbname = "givebirt_infotec";
		
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
									<?php echo'</ul> 

								</div>

								<div class="col-lg-3 col-md-12 col-sm-12" style="margin-top: 5px;" >
									<div class="form-group" style="margin: 0px;">
										<select class="form-control dropDownOption" id="exampleFormControlSelect1" name="hotelType" style="padding:5px;height:35px">
										  <option class="dropDownOption" value="Hotel Type - Any">Hotel Type - Any</option>';?>
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
										<?php echo '</select>
									</div>
								</div>

								<div class="col-lg-4 col-md-12 col-sm-12" style="margin-top: 5px;">
									<div class="card">
									  <div class="card-body accomodationCard" style="padding: 5px;">
										<b>
											Add Filters
										</b>
									  </div>
									</div>
									<div class="card hide accomodationCardPopUP" style="margin-top: 5px;">
									  <div class="card-body">

										<div class="row" style="margin: 5px;">
											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckwifi" name="wifi">
											  <label class="form-check-label" for="defaultCheckwifi">
												WiFi
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckac" name="ac">
											  <label class="form-check-label" for="defaultCheckac">
												A/C
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultChecktv" name="tv">
											  <label class="form-check-label" for="defaultChecktv">
												TV
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckpool" name="pool">
											  <label class="form-check-label" for="defaultCheckpool">
												Pool
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckminibar" name="minibar">
											  <label class="form-check-label" for="defaultCheckminibar">
												Minibar
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbar" name="bar">
											  <label class="form-check-label" for="defaultCheckbar">
												Bar
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckpetsok" name="petsok">
											  <label class="form-check-label" for="defaultCheckpetsok">
												Pets OK
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckrestaurant" name="restaurant">
											  <label class="form-check-label" for="defaultCheckrestaurant">
												Restaurant
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultChecktransfers" name="transfers">
											  <label class="form-check-label" for="defaultChecktransfers">
												Transfers
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbeach" name="beach">
											  <label class="form-check-label" for="defaultCheckbeach">
												Beach
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckveg" name="vegetarian">
											  <label class="form-check-label" for="defaultCheckveg">
												Vegetarian
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1glutenfree" name="glutenfree">
											  <label class="form-check-label" for="defaultCheck1glutenfree">
												Gluten Free
											  </label>
											</div>

											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="checkbox" value="1" id="defaultCheckenglishok" name="englishok">
											  <label class="form-check-label" for="defaultCheckenglishok">
												English OK
											  </label>
											</div>

										</div>


									  </div>
									</div>
								</div>

								<div class="col-lg-2 col-md-12 col-sm-12" style="margin-top: 5px;">
								  <button type="submit" class="btn btn-primary btn-block" style="background: #00bcd4; border: black; color: white; font-family: \'Alegreya\', serif; font-size: 20px;"><b>Search</b></button>
								</div>


							  </div>
							</form>
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
						//$("#searchForm").submit();
					});

					$(".accomodationCard").on("click",function(){
						$(".accomodationCardPopUP").toggleClass("hide");
					});


				});

				</script>';?>