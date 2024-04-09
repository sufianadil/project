<?php 
ob_start();
session_start();
include "connection.php";

$action = "add";
if(isset($_REQUEST["action"]))
$action =$_REQUEST["action"];
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


if($_POST){

$description = $_POST["description"];
$date = $_POST["date"];

$customerid= $_SESSION["customer-login"];						


if($action == "add"){
$description = addslashes($description);
echo $sql = "INSERT INTO feedback (customer_id , description , date) VALUES('$customerid' , '$description' , '$date')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($result){
?>
<script>alert("Added");</script>
<?php
header("location: index.php");
}
else{
echo "Not Inserted";
} 
} // add close
}
?>

<style>

.form-group select {
    display: block !important;
}
.form-group .nice-select {
    display: none;
}

</style>



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                    <a class="text-center"> <h4>POST YOUR Feedback</h4></a>
        
                                <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
									
                                    <div class="form-group">
									<label for="Category Description"><b>Product Description</b></label><br>
                                        <textarea name="description" id="description" class="form-control" rows="10" cols="40" placeholder="Describe your View here..." required></textarea>
                                    </div>
                                   
									<div class="form-group">
									<label for="date"><b>Date</b></label><br>
                                    	<input name="date" type="date" class="form-control" placeholder="date" value="" required>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" id="submit" name="submit" type="submit">Submit</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins1/common/common.min.js"></script>
    <script src="js1/custom.min.js"></script>
    <script src="js1/settings.js"></script>
    <script src="js1/gleek.js"></script>
    <script src="js1/styleSwitcher.js"></script>

 
 
  <!-- JAVASCRIPTS -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="plugins/tether/js/tether.min.js"></script>
  <script src="plugins/raty/jquery.raty-fa.js"></script>
  <script src="plugins/bootstrap/dist/js/popper.min.js"></script>
  <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
  <script src="plugins/slick-carousel/slick/slick.min.js"></script>
  <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
  <script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script src="js/scripts.js"></script>

 
 
</body>
</html>






