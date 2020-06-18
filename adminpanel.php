<?php
session_start();
if(!isset($_SESSION['loggedInSuccess']) OR $_SESSION['loggedInSuccess']!="True"){
  header("Location: adminlogin.php");
}

include 'db.php';

$link=mysqli_connect($servername,$username,$password,$dbname);

?>


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

<table class="table table-bordered" style="text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Hotel Name</th>
      <th scope="col">Hotel Type</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Latitude</th>
      <th scope="col">Longitude</th>
      <th scope="col" style="max-width: 200px;">Site URL</th>
      <th scope="col">Image URL</th>
      <th scope="col">WiFi</th>
      <th scope="col">AC</th>
      <th scope="col">TV</th>
      <th scope="col">Pool</th>
      <th scope="col">Minibar</th>
      <th scope="col">Bar</th>
      <th scope="col">Pets OK</th>
      <th scope="col">Restaurant</th>
      <th scope="col">Transfers</th>
      <th scope="col">Beach</th>
      <th scope="col">Vegetarian</th>
      <th scope="col">Gluten Free</th>
      <th scope="col">English OK</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  	<?php

  	$query="SELECT * FROM hotels";
  	$result=mysqli_query($link,$query);

    while ($row=mysqli_fetch_array($result)) {
    
    	echo '
    	<tr>
	      	<th scope="row" style="max-width: 40px;">'.$row['id'].'</th>
  	     	<td style="max-width: 130px;">'.$row['hotelName'].'</td>
          <td style="max-width: 130px;">'.$row['hotelType'].'</td>
          <td style="max-width: 130px;">'.$row['state'].'</td>
          <td style="max-width: 130px;">'.$row['city'].'</td>
          <td style="max-width: 130px;">'.$row['locationLatitude'].'</td>
          <td style="max-width: 130px;">'.$row['locationLongitude'].'</td>
  	     	<td style="min-width: 220px; word-break: break-all;"><a target="_blank" href="'.$row['siteUrl'].'">'.$row['siteUrl'].'</a></td>
          <td style="min-width: 220px; word-break: break-all;"><a target="_blank" href="'.$row['imgUrl'].'">'.$row['imgUrl'].'</a></td>
          <td style="max-width: 50px;">'.$row['wifi'].'</td>
          <td style="max-width: 50px;">'.$row['ac'].'</td>
          <td style="max-width: 50px;">'.$row['tv'].'</td>
          <td style="max-width: 50px;">'.$row['pool'].'</td>
          <td style="max-width: 50px;">'.$row['minibar'].'</td>
          <td style="max-width: 50px;">'.$row['bar'].'</td>
          <td style="max-width: 50px;">'.$row['petsok'].'</td>
          <td style="max-width: 50px;">'.$row['restaurant'].'</td>
          <td style="max-width: 50px;">'.$row['transfers'].'</td>
          <td style="max-width: 50px;">'.$row['beach'].'</td>
          <td style="max-width: 50px;">'.$row['vegetarian'].'</td>
          <td style="max-width: 50px;">'.$row['glutenfree'].'</td>
          <td style="max-width: 50px;">'.$row['englishok'].'</td>

          <td style="min-width: 50px;"><a type="button" class="btn btn-warning" href="editHotel.php?hotelId='.$row['id'].'">Edit</a></td>
	    </tr>

    	';
    }

  	?>

  </tbody>
</table>



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