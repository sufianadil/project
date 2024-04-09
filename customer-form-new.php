<?php 
ob_start();
session_start(); 
include "connection.php";
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Customer-Register</title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/style1.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

<?php

$action = "add";
if(isset($_REQUEST["action"]))
$action =$_REQUEST["action"];

if($_POST){

$customername = $_POST["customer_name"];
$customerpass = $_POST["customer_pass"];
$customerphone = $_POST["customer_phone"];
$customeremail = $_POST["customer_email"];
$customeraddress = $_POST["customer_address"];
$image = $_FILES['file']['name'];
$x = $_POST["latitude"];
$y = $_POST["longitude"];

if($action == "add"){
$pass = md5($customerpass);
$images = stripslashes($image);
$sql = "INSERT INTO customers (customer_name , customer_pass , customer_phone , customer_email , customer_address , image , latitude , longitude ) VALUES('$customername' , '$pass' , '$customerphone' , '$customeremail' , '$customeraddress' , '$images' , '$x' , '$y')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));





if($result){
?>
<script> alert("Data Added");</script>
<?php 
}else{
echo "";
}


 


// For Image:

if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file']['tmp_name'] , "/home4/lmstimec/public_html/bol/customer-profile//".$_FILES['file']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}
} 
}

?>







    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                    <a class="text-center" href="customer-login.php"> <h4>REGISTER YOURSELF</h4></a>
        
                                <form action="" id="myform" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input name="customer_name" type="text" class="form-control"  placeholder="Name" required> 
                                    </div>
									<div class="form-group">
                                        <input name="customer_pass" type="password" class="form-control" placeholder="Password" required>
                                    </div>
									<div class="form-group">
                                        <input name="customer_phone" type="text" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="customer_email" type="email" class="form-control"  placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="customer_address" type="text" class="form-control" placeholder="Address" required>
                                    </div>
									<div class="form-group">
									<input id="file" name="file" type="file" accept="image/jpeg" class="form-control" required>
                                    </div>
									<div class="form-group">
                                        <input name="latitude" id="latitude" type="text" class="form-control" onClick="getLocation()" placeholder="Latitude" required readonly>
                                    </div>
									<div class="form-group">
                                        <input name="longitude" id="longitude" type="text" class="form-control" placeholder="Longitude" onClick="getLocation()" required readonly>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" id="submit" name="submit" type="submit">Submit</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Have account <a href="customer-login.php" class="text-primary">Login In </a> now</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<script type="text/javascript"> 

var x = document.getElementById("latitude");
var y = document.getElementById("longitude");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.value = "Geolocation is not supported by this browser.";
	y.value = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.value = "" + position.coords.latitude; 
  y.value = "" + position.coords.longitude;
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.value = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.value = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.value = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.value = "An unknown error occurred."
      break;
  }
}

</script>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins1/common/common.min.js"></script>
    <script src="js1/custom.min.js"></script>
    <script src="js1/settings.js"></script>
    <script src="js1/gleek.js"></script>
    <script src="js1/styleSwitcher.js"></script>
</body>
</html>





