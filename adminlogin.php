<?php
/*
Template Name: adminlogin.php
*/
?>
<?php

	session_start();

	include 'db.php';

	$link=mysqli_connect($servername,$username,$password,$dbname);
	$error=null;
	if(mysqli_connect_error()){
		$error="There was an error connecting to DB!";
		echo mysqli_connect_error();
	}else{
		if(array_key_exists("username", $_POST) AND array_key_exists("password", $_POST)){
			//page is submitted
			if($_POST["username"]=="" OR $_POST["password"]==""){
				$error="Please enter everything!";
			}else{
				//USER HAS ENTERED EVERYTHING
				$query="SELECT * FROM users WHERE username='".$_POST['username']."'"." AND password='".$_POST['password']."'";
				$result=mysqli_query($link,$query);//IF SUCH USER EXISTS HE WILL BE STORED IN $RESULT

				if(mysqli_num_rows($result)>0){

					$_SESSION['loggedInSuccess']="True";
					// $_SESSION['usersMasterId']=$row['masterId'];
					// $_SESSION['username']=$row['username'];
					// $_SESSION['name']=$row['name'];

					header("Location: adminpanel.php");
					exit;

				}else{
					$error="Please enter correct Email and Password!";//USER DOES NOT EXITS
				}
			}
		}
	}

	echo $error;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>

	<form method="POST">
		<div class="container" style="text-align: center; border: 5px solid black; padding: 20px; border-radius: 10px; margin: 25vh auto; max-width: 700px;">

			<h3><u>LOGIN</u></h3>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="addon-wrapping">@</span>
			  </div>
			  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="username">
			</div>

			<div class="input-group mb-3">
			  <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping" name="password">
			</div>

			<input type="submit" class="btn btn-outline-primary" value="LOGIN">

		</div>
	</form>




	<!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>