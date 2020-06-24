<?php
/*
Template Name: editHotel.php
*/
?>
<?php
session_start();
if(!isset($_SESSION['loggedInSuccess']) OR $_SESSION['loggedInSuccess']!="True"){
  header("Location: adminlogin.php");
}

include 'db.php';

$link=mysqli_connect($servername,$username,$password,$dbname);

$updateSuccessful=0;
$deleteSuccessful=0;
if(isset($_POST['submitted'])){

  $filterQueryString="";
  if(isset($_POST['wifi'])){
    $filterQueryString=$filterQueryString.", wifi=1 ";
  }else{
    $filterQueryString=$filterQueryString.", wifi=0 ";
  }
  if(isset($_POST['ac'])){
    $filterQueryString=$filterQueryString.", ac=1 ";
  }else{
    $filterQueryString=$filterQueryString.", ac=0 ";
  }
  if(isset($_POST['tv'])){
    $filterQueryString=$filterQueryString.", tv=1 ";
  }else{
    $filterQueryString=$filterQueryString.", tv=0 ";
  }
  if(isset($_POST['pool'])){
    $filterQueryString=$filterQueryString.", pool=1 ";
  }else{
    $filterQueryString=$filterQueryString.", pool=0 ";
  }
  if(isset($_POST['minibar'])){
    $filterQueryString=$filterQueryString.", minibar=1 ";
  }else{
    $filterQueryString=$filterQueryString.", minibar=0 ";
  }
  if(isset($_POST['bar'])){
    $filterQueryString=$filterQueryString.", bar=1 ";
  }else{
    $filterQueryString=$filterQueryString.", bar=0 ";
  }
  if(isset($_POST['petsok'])){
    $filterQueryString=$filterQueryString.", petsok=1 ";
  }else{
    $filterQueryString=$filterQueryString.", petsok=0 ";
  }
  if(isset($_POST['restaurant'])){
    $filterQueryString=$filterQueryString.", restaurant=1 ";
  }else{
    $filterQueryString=$filterQueryString.", restaurant=0 ";
  }
  if(isset($_POST['transfers'])){
    $filterQueryString=$filterQueryString.", transfers=1 ";
  }else{
    $filterQueryString=$filterQueryString.", transfers=0 ";
  }
  if(isset($_POST['beach'])){
    $filterQueryString=$filterQueryString.", beach=1 ";
  }else{
    $filterQueryString=$filterQueryString.", beach=0 ";
  }
  if(isset($_POST['vegetarian'])){
    $filterQueryString=$filterQueryString.", vegetarian=1 ";
  }else{
    $filterQueryString=$filterQueryString.", vegetarian=0 ";
  }
  if(isset($_POST['glutenfree'])){
    $filterQueryString=$filterQueryString.", glutenfree=1 ";
  }else{
    $filterQueryString=$filterQueryString.", glutenfree=0 ";
  }
  if(isset($_POST['englishok'])){
    $filterQueryString=$filterQueryString.", englishok=1 ";
  }else{
    $filterQueryString=$filterQueryString.", englishok=0 ";
  }

  $query="UPDATE hotels SET state='".$_POST['newState']."', city='".$_POST['newCity']."', hotelName='".$_POST['newHotelName']."' , hotelType='".$_POST['newHotelType']."', siteUrl='".$_POST['newSiteUrl']."', imgUrl='".$_POST['newImgUrl']."', locationLatitude=".$_POST['locationLatitude'].", locationLongitude=".$_POST['locationLongitude'].$filterQueryString." WHERE id=".$_GET['hotelId'];

  if(mysqli_query($link,$query)){
    //SUCCESSFULLY ADDED AFFILIATE URL
    $updateSuccessful=1;
  }

}

if(isset($_POST['deleted'])){

  $query="DELETE FROM hotels WHERE id=".$_GET['hotelId'];

  if(mysqli_query($link,$query)){
    //SUCCESSFULLY ADDED AFFILIATE URL
    $deleteSuccessful=1;
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

      <h3><u>Edit Hotel Details</u></h3>


      <?php

        if($updateSuccessful==1){
          echo '
          <div class="alert alert-success" role="alert">
            <b>Update Successful!</b>
          </div>
          ';
        }
        if($deleteSuccessful==1){
          echo '
          <div class="alert alert-danger" role="alert">
            <b>Deleted Successfully!</b>
          </div>
          ';
        }

        $hotelId=$_GET['hotelId'];

        $query="SELECT * FROM hotels WHERE id=".$hotelId;
        $result=mysqli_query($link,$query);

        //$row=mysqli_fetch_array($result);

        if($row=mysqli_fetch_array($result)){
          echo'

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><b>Hotel ID</b></span>
                <span class="input-group-text"><b>'.$row['id'].'</b></span>
                <input type="hidden" name="hotelId" value="'.$row['id'].'">
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><b>Hotel Name</b></span>
              </div>
              <input type="text" class="form-control" placeholder="Hotel Name" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newHotelName" value="'.$row['hotelName'].'">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><b>Hotel Type</b></span>
              </div>
              <input type="text" class="form-control" placeholder="Hotel Type" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newHotelType" value="'.$row['hotelType'].'">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><b>State</b></span>
              </div>
              <input type="text" class="form-control" placeholder="State" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newState" value="'.$row['state'].'">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><b>City</b></span>
              </div>
              <input type="text" class="form-control" placeholder="City" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newCity" value="'.$row['city'].'">
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
              <input type="text" class="form-control" placeholder="Site URL" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newSiteUrl" value="'.$row['siteUrl'].'">
            </div>

            <div class="card">
              <img src="'.$row['imgUrl'].'" class="card-img-top" alt="Image not Available. Please Upload">
              <div class="card-body">
                <input type="text" class="form-control" placeholder="Image URL" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newImgUrl" value="'.$row['imgUrl'].'">
              </div>
            </div>

            ';
        } 


      ?>

      <div class="form-group">
        <div class="row" style="margin: 5px;">
            
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckwifi" name="wifi" <?php if($row['wifi']==1){echo "checked";}?> >

            <label class="form-check-label" for="defaultCheckwifi">
              WiFi
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckac" name="ac" <?php if($row['ac']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckac">
              A/C
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultChecktv" name="tv" <?php if($row['tv']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultChecktv">
              TV
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckpool" name="pool" <?php if($row['pool']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckpool">
              Pool
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckminibar" name="minibar" <?php if($row['minibar']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckminibar">
              Minibar
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbar" name="bar" <?php if($row['bar']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckbar">
              Bar
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckpetsok" name="petsok" <?php if($row['petsok']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckpetsok">
              Pets OK
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckrestaurant" name="restaurant" <?php if($row['restaurant']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckrestaurant">
              Restaurant
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultChecktransfers" name="transfers" <?php if($row['transfers']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultChecktransfers">
              Transfers
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbeach" name="beach" <?php if($row['beach']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckbeach">
              Beach
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckveg" name="vegetarian" <?php if($row['vegetarian']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckveg">
              Vegetarian
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1glutenfree" name="glutenfree" <?php if($row['glutenfree']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheck1glutenfree">
              Gluten Free
            </label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckenglishok" name="englishok" <?php if($row['englishok']==1){echo "checked";}?> >
            <label class="form-check-label" for="defaultCheckenglishok">
              English OK
            </label>
          </div>

          </div>
      </div>

      <input type="submit" class="btn btn-outline-primary" style="margin-top:5px;" name="submitted" value="UPDATE">

      <br>

      <input type="submit" class="btn btn-outline-danger" style="margin-top:5px;" name="deleted" value="DELETE">

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