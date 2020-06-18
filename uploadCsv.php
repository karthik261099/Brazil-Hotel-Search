<?php
session_start();
if(!isset($_SESSION['loggedInSuccess']) OR $_SESSION['loggedInSuccess']!="True"){
  header("Location: adminlogin.php");
}

include 'db.php';

$link=mysqli_connect($servername,$username,$password,$dbname);
$addedSuccessful=0;
$errorString="Error In :";
$error=0;
$deletedAllEntries=0;

if(isset($_POST['deleteAllEntries'])){
	$query1="TRUNCATE TABLE hotels";
	if(mysqli_query($link,$query1)){
		$deletedAllEntries=1;
    }else{

    }
}

if(isset($_POST['uploadCsv'])){

	if(file_exists($_FILES['csv']['tmp_name']) || is_uploaded_file($_FILES['csv']['tmp_name'])){

		$fileName=basename($_FILES["csv"]["name"]);
		$tmpName = $_FILES['csv']['tmp_name'];
		$csvAsArray = array_map('str_getcsv', file($tmpName));

		foreach ($csvAsArray as $hotel) {

			if($hotel[0]!="Hotel Name"){//TO SKIP FIRST ROW

				$query="INSERT INTO `hotels`(`hotelName`, `hotelType`, `state`,`city`,`locationLatitude`, `locationLongitude`,`siteUrl`,`imgUrl`,`wifi`,`ac`,`tv`,`pool`,`minibar`,`bar`,`petsok`,`restaurant`,`transfers`,`beach`,`vegetarian`,`glutenfree`,`englishok`) VALUES ('".$hotel[0]."','".$hotel[1]."','".$hotel[2]."','".$hotel[3]."',".$hotel[4].",".$hotel[5].",'".$hotel[6]."','".$hotel[7]."',".$hotel[8].",".$hotel[9].",".$hotel[10].",".$hotel[11].",".$hotel[12].",".$hotel[13].",".$hotel[14].",".$hotel[15].",".$hotel[16].",".$hotel[17].",".$hotel[18].",".$hotel[19].",".$hotel[20].")";

		        if(mysqli_query($link,$query)){
		          //SUCCESSFULLY ADDED AFFILIATE URL
		        }else{
		        	$error=1;
		        	$errorString=$errorString."<br>'".$hotel[0]."','".$hotel[1]."','".$hotel[2]."','".$hotel[3]."',".$hotel[4].",".$hotel[5].",'".$hotel[6]."','".$hotel[7]."',".$hotel[8].",".$hotel[9].",".$hotel[10].",".$hotel[11].",".$hotel[12].",".$hotel[13].",".$hotel[14].",".$hotel[15].",".$hotel[16].",".$hotel[17].",".$hotel[18].",".$hotel[19].",".$hotel[20]."<br>";
		        }

			}		
		}

		$addedSuccessful=1;

	}

}

?>


<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="post" enctype="multipart/form-data">
        <input type="file" name="csv" id="csv" required="true">
        <input type="submit" class="btn btn-outline-primary" style="margin-top:5px;" name="uploadCsv" value="UPLOAD CSV">
	</form>

</body>
</html> -->


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Panel</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assets/css/userpanel.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>
<body>

<h3 style="text-align: center;"><u>Dashboard</u></h3>
<h5 style="text-align: center;"><u>Hotels</u></h5>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <a href="logoutClicked.php"><button class="btn btn-danger" style="float: right;margin-right: 10px;"><b>Logout</b></button></a>
  <a href="addHotel.php"><button class="btn btn-warning" style="float: right;margin-right: 10px;"><b>Add Hotel</b></button></a>
  <a href="adminpanel.php"><button class="btn btn-success" style="float: right; margin-right: 10px;"><b>All Hotels</b></button></a>
  <a href="uploadCsv.php"><button class="btn btn-primary" style="float: right; margin-right: 10px;"><b>CSV</b></button></a>
  
</nav>

<form method="GET" action="downloadCsvTemplate.php" style="text-align: center;margin-top: 5px;">
	<input type="submit" class="btn btn-success" style="margin-top:5px;" name="downloadCsvTemplate" value="Download CSV Template">
</form>

<form method="POST" enctype="multipart/form-data">
    <div class="container" style="text-align: center; border: 5px solid black; padding: 20px; border-radius: 10px; margin: 10px auto; max-width: 700px;">

      <h3><u>Add Hotel Details</u></h3>


      <?php

      	if($error==1){
          echo '
          <div class="alert alert-danger" role="alert">
            <b>'.$errorString.'</b>
          </div>
          ';
        }

        if($deletedAllEntries==1){
          echo '
          <div class="alert alert-success" role="alert">
            <b>All Entries Deleted Successfully!</b>
          </div>
          ';
        }

        if($addedSuccessful==1){
        	if($error==1){
        		echo '
		          <div class="alert alert-success" role="alert">
		            <b>Remaining Entries Added Successfully!</b>
		          </div>
		        ';
        	}else{
        		echo '
		          <div class="alert alert-success" role="alert">
		            <b>Added Successfully!</b>
		          </div>
		        ';
        	}
          
        }

      ?>


    <input type="file" name="csv" id="csv" required="true">
    <input type="submit" class="btn btn-outline-primary" style="margin-top:5px;" name="uploadCsv" value="UPLOAD CSV">
   </div>
</form>

<form method="POST" style="text-align: center;">
	<input type="submit" class="btn btn-outline-danger" style="margin-top:5px;" name="deleteAllEntries" value="DELETE ALL ENTRIES">
</form>

 <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

</body>
</html>