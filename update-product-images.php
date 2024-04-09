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

$file1 = $_FILES['file1']['name'];
$file2 = $_FILES['file2']['name'];
$file3 = $_FILES['file3']['name'];
	

$customerid= $_SESSION["customer-login"];						




if($action == "update"){
$files1 = addslashes($file1);
$files2 = addslashes($file2);
$files3 = addslashes($file3);
$sql = "UPDATE product set file1 = '".$files1."' , file2 = '".$files2."' , file3 = '".$files3."' WHERE product_id=".$_REQUEST["proid"];

$data = mysqli_query($conn,$sql);

// image 1

if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file1']['tmp_name'] , "/home4/lmstimec/public_html/bol/product-images//".$_FILES['file1']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}

// image 2

if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file2']['tmp_name'] , "/home4/lmstimec/public_html/bol/product-images//".$_FILES['file2']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}

// image 3

if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file3']['tmp_name'] , "/home4/lmstimec/public_html/bol/product-images//".$_FILES['file3']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}

header("location: dashboard.php"); 
}
}

if($action=="update"){
$sql = "SELECT * FROM product WHERE product_id=".$_REQUEST["proid"];
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
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
                                
                                    <a class="text-center" href="update-product-images.php"> <h4>Update ALL Your Images</h4></a>
        
                                <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                   
									<div class="form-group">
									<label for="Image 1"><b>Image 1</b></label><br>
									<input id="file1" name="file1" type="file" class="form-control" required/><br>
										<?php if($action == "update" && $row["file1"] !=""){?>
										<img src="product-images/<?php echo $row["file1"];?>" width="200" />
										<?php } ?>
                                    </div>
									<div class="form-group">
									<label for="Image 2"><b>Image 2</b></label><br>
									<input id="file2" name="file2" type="file" class="form-control" required/><br>
										<?php if($action == "update" && $row["file2"] !=""){?>
										<img src="product-images/<?php echo $row["file2"];?>" width="200" />
										<?php } ?>
                                    </div>
									<div class="form-group">
									<label for="Image 3"><b>Image 3</b></label><br>
									<input id="file3" name="file3" type="file" class="form-control" required/><br>
										<?php if($action == "update" && $row["file3"] !=""){?>
										<img src="product-images/<?php echo $row["file3"];?>" width="200" />
										<?php } ?>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" id="submit" name="submit" type="submit">Submit</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Back To <a href="dashboard.php" class="text-primary"> DashBoard Page</a> now</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>

function validate(){

a = document.getElementById("file1");
b = document.getElementById("file2");
c = document.getElementById("file3");

if(a.value==""){
alert("PICTURE 1 IS REQUIRED");
a.focus();
return false;
}
else if(b.value==""){
alert("PICTURE 2 IS REQUIRED");
b.focus();
return false;
}
else if(c.value==""){
alert("PICTURE 3 IS REQUIRED");
c.focus();
return false;
}
else{
return true;
}
}

</script>










</script>



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





