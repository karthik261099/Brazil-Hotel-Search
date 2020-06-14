<?php
session_start();
if(!isset($_SESSION['loggedInSuccess']) OR $_SESSION['loggedInSuccess']!="True"){
  header("Location: adminlogin.php");
}

include 'db.php';

$link=mysqli_connect($servername,$username,$password,$dbname);

$addedSuccessful=0;
if(isset($_POST['submitted'])){


  //IMAGE UPLOAD////////////////////////////////////////////////////////////////////
  if(file_exists($_FILES['fileToUpload']['tmp_name']) || is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){

    $target_dir = "imagesHotels/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      //echo "File is not an image.";
      $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      //echo "Sorry, file already exists.";
      $uploadOk = 0;
    }


    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      // $maxId=0;
      // $query1="SELECT MAX(id) as maxId FROM hotels";
      // if($result=mysqli_query($link,$query1)){
      //   //SUCCESSFULLY ADDED AFFILIATE URL
      //   $row=mysqli_fetch_array($result);
      //   $maxId=$row['maxId'];
      // }else{
      //   $maxId=0;
      // }
      // $maxId=$maxId+1;

      $fileName=time()."-".basename($_FILES["fileToUpload"]["name"]);
      $finalFileLocation=$target_dir.$fileName;
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $finalFileLocation)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        $query="INSERT INTO `hotels`(`hotelName`, `location`, `affiliateurl`, `imgUrl`) VALUES ('".$_POST['newHotelName']."','".$_POST['newLocation']."','".$_POST['newAffiliateUrl']."','".$fileName."')";

        if(mysqli_query($link,$query)){
          //SUCCESSFULLY ADDED AFFILIATE URL
          $addedSuccessful=1;
        }

      } else {
        //echo "Sorry, there was an error uploading your file.";
      }
    }
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
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><b>Hotel Location</b></span>
        </div>
        <input type="text" class="form-control" placeholder="Hotel Location" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newLocation" required="true">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><b>Hotel Name</b></span>
        </div>
        <input type="text" class="form-control" placeholder="Hotel Name" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newHotelName" required="true">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><b>Affiliate URL</b></span>
        </div>
        <input type="text" class="form-control" placeholder="Affiliate URL" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" name="newAffiliateUrl" required="true">
      </div>

      <div class="card">
        <div class="card-body">
          <p class="card-text"><b>Upload Image</b></p>
          <input type="file" name="fileToUpload" id="fileToUpload" required="true">
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