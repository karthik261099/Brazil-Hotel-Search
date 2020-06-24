<?php
/*
Template Name: addHotel.php
*/
?>
<?php
session_start();
if(!isset($_SESSION['loggedInSuccess']) OR $_SESSION['loggedInSuccess']!="True"){
  header("Location: adminlogin.php");
}

include 'db.php';

$link=mysqli_connect($servername,$username,$password,$dbname);

$addedSuccessful=0;
if(isset($_POST['submitted'])){

  $filterQueryString="";
  if(isset($_POST['wifi'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['ac'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['tv'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['pool'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['minibar'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['bar'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['petsok'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['restaurant'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['transfers'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['beach'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['vegetarian'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['glutenfree'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }
  if(isset($_POST['englishok'])){
    $filterQueryString=$filterQueryString.",1";
  }else{
    $filterQueryString=$filterQueryString.",0";
  }


  $query="INSERT INTO `hotels`(`hotelName`, `hotelType`, `state`, `city`, `siteUrl`, `imgUrl`,`locationLatitude`, `locationLongitude`,`wifi`,`ac`,`tv`,`pool`,`minibar`,`bar`,`petsok`,`restaurant`,`transfers`,`beach`,`vegetarian`,`glutenfree`,`englishok`) VALUES ('".$_POST['newHotelName']."','".$_POST['newHotelType']."','".$_POST['newState']."','".$_POST['newCity']."','".$_POST['newSiteUrl']."','".$_POST['newImgUrl']."',".$_POST['locationLatitude'].",".$_POST['locationLongitude'].$filterQueryString.")";

  if(mysqli_query($link,$query)){
    //SUCCESSFULLY ADDED AFFILIATE URL
    $addedSuccessful=1;
  }

}


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


<form method="POST" enctype="multipart/form-data">
    <div class="container" style="text-align: center; border: 5px solid black; padding: 20px; border-radius: 10px; margin: 10px auto; max-width: 700px;">

      <h3><u>Add Hotel Details</u></h3>


      <?php

        if($addedSuccessful==1){
          echo '
          <div class="alert alert-success" role="alert">
            <b>Added Successfully!</b>
          </div>
          ';
        }

      ?>


      <div class="input-group mb-3">
        
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>Hotel Name</b></span>
          </div>
          <input type="text" class="form-control" placeholder="Hotel Name" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newHotelName">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>Hotel Type</b></span>
          </div>
          <input type="text" class="form-control" placeholder="Hotel Type" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newHotelType">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>State</b></span>
          </div>
          <input type="text" class="form-control" placeholder="State" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newState">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>City</b></span>
          </div>
          <input type="text" class="form-control" placeholder="City" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newCity">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>Location Latitude</b></span>
          </div>
          <input type="number" class="form-control" placeholder="Location Latitude" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="locationLatitude" required="true" step="0.000001" value="'.$row['locationLatitude'].'">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>Location Longitude</b></span>
          </div>
          <input type="number" class="form-control" placeholder="Location Longitude" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="locationLongitude" required="true" step="0.000001" value="'.$row['locationLongitude'].'">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>Site URL</b></span>
          </div>
          <input type="text" class="form-control" placeholder="Site URL" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newSiteUrl">
        </div>

        <div class="card">
          <img src="'.$row['imgUrl'].'" class="card-img-top" alt="Image not Available. Please Upload">
          <div class="card-body">
            <input type="text" class="form-control" placeholder="Image URL" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newImgUrl">
          </div>
        </div>

      <div class="form-group">
        <div class="row" style="margin: 5px;">
            
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckwifi" name="wifi" >

            <label class="form-check-label" for="defaultCheckwifi">
              WiFi
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckac" name="ac" >
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
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckminibar" name="minibar"  >
            <label class="form-check-label" for="defaultCheckminibar">
              Minibar
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbar" name="bar" >
            <label class="form-check-label" for="defaultCheckbar">
              Bar
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckpetsok" name="petsok" >
            <label class="form-check-label" for="defaultCheckpetsok">
              Pets OK
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckrestaurant" name="restaurant" >
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
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbeach" name="beach" >
            <label class="form-check-label" for="defaultCheckbeach">
              Beach
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckveg" name="vegetarian" >
            <label class="form-check-label" for="defaultCheckveg">
              Vegetarian
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1glutenfree" name="glutenfree" >
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

      <input type="submit" class="btn btn-outline-primary" style="margin-top:5px;" name="submitted" value="ADD">
    
    </div>
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