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

$catid = $_POST["cat_id"];
$subcatid = $_POST["sub_cat_id"];
$productname = $_POST["product_name"];
$productdescription = $_POST["product_description"];
$productprice = $_POST["product_price"];
$date = $_POST["date"];
$location = $_POST["location"];
$status = $_POST["status"];
$file1 = $_FILES['file1']['name'];
$file2 = $_FILES['file2']['name'];
$file3 = $_FILES['file3']['name'];
	

$customerid= $_SESSION["customer-login"];						


if($action == "add"){
$productname = addslashes($productname);
$files1 = addslashes($file1);
$files2 = addslashes($file2);
$files3 = addslashes($file3);
echo $sql = "INSERT INTO product (cat_id , sub_cat_id , customer_id , product_name , product_description , product_price , date , location , status , file1 , file2 , file3) VALUES('$catid' , '$subcatid' , '$customerid' , '$productname' , '$productdescription' , '$productprice' , '$date' , '$location' , '$status' , '$files1' , '$files2' , '$files3')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($result){
header("location: dashboard.php?msg=Data Added Succesfully");
}
else{
echo "Not Inserted";
} 

// For Image 1:

if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file1']['tmp_name'] , "/home4/lmstimec/public_html/bol/product-images//".$_FILES['file1']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}

// For Image 2:

if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file2']['tmp_name'] , "/home4/lmstimec/public_html/bol/product-images//".$_FILES['file2']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}

// For Image 3:

if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file3']['tmp_name'] , "/home4/lmstimec/public_html/bol/product-images//".$_FILES['file3']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}




} // add close



if($action == "update"){

$sql = "UPDATE product set cat_id='".$catid."' , sub_cat_id='".$subcatid."' , product_name='".$productname."' , product_description='".$productdescription."' , product_price='".$productprice."' , date='".$date."' , location='".$location."' , status='".$status."' WHERE product_id=".$_REQUEST["proid"];

$data = mysqli_query($conn,$sql);



if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file']['tmp_name'] , "C:/xampp/htdocs/classpro/product-images//".$_FILES['file']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}

header("location: dashboard.php"); 
}
}
if($action == "delete"){

$sql = "delete FROM product WHERE product_id=".$_REQUEST["proid"];

$data = mysqli_query($conn,$sql);
header("location: dashboard.php?msg=Deleted Successfully");
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
                                
                                    <a class="text-center" href="list.php"> <h4>POST YOUR AD</h4></a>
        
                                <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                   
									<div class="form-group">
									 <label for="Category"><b>Category Name</b></label><br>
                                    <select id="cat_id" name="cat_id" class="form-control" />
									<option value="<?php if($action=="update") echo $row["cat_id"];?>"><?php if($action=="update") echo $row["cat_id"]; else{echo "SELECT";} ?>
									</option>
									</select>
                                    </div>
									<div class="form-group">
									<label for="Sub-Category"><b>Sub-Category Name</b></label><br>
                                    <select id="sub_cat_id" name="sub_cat_id" class="form-control" />
									<option value="<?php if($action=="update") echo $row["sub_cat_id"];?>"><?php if($action=="update") echo $row["sub_cat_id"]; else{echo "SELECT";} ?>
									</option>
									</select>
                                    </div>
									<div class="form-group">
									<label for="Pro Name"><b>Product Name</b></label><br>
                                        <input name="product_name" type="text" class="form-control" placeholder="Name" value="<?php if($action == "update"){ echo $row["product_name"];} ?>" />
                                    </div>
                                    <div class="form-group">
									<label for="Category Description"><b>Product Description</b></label><br>
                                        <textarea name="product_description" id="product_description" class="form-control" rows="10" cols="40" placeholder="Describe your Product here..." ><?php if($action=="update") echo $row["product_description"]; ?> </textarea>
                                    </div>
                                    <div class="form-group">
									<label for="Product Price"><b>Product Price</b></label><br>
                                        <input name="product_price" type="price" class="form-control" placeholder="Price" value="<?php if($action=="update") echo $row["product_price"]; ?>" required>
                                    </div>
									<div class="form-group">
									<label for="date"><b>Date</b></label><br>
                                    	<input name="date" type="date" class="form-control" placeholder="date" value="<?php if($action=="update") echo $row["date"]; ?>" required>
                                    </div>
									<div class="form-group">
									<label for="location"><b>Location</b></label><br>
                                    	<input name="location" type="location" class="form-control" placeholder="location" value="<?php if($action=="update") echo $row["location"]; ?>" required>
                                    </div>
									<div class="form-group">
									<label for="Status"><b>Status</b></label><br>
									<select id="status" name="status" class="form-control" required/>
									<option value="<?php if($action=="update") echo $row["status"];?>"><?php if($action=="update") echo $row["status"]; else{echo "SELECT";} ?>
									</option>
									<option value="Active">Active</option>
									<option value="In-Active">In-Active</option>
									</select>
                                    </div>
<?php if($action != "update"){ ?>									
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
										<?php }} ?>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" id="submit" name="submit" type="submit">Submit</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Back To <a href="index.php" class="text-primary"> Main Page</a> now</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function(){
  	function loaddata(type, cat_id){
  		$.ajax({
  			url : "check.php",
  			type : "POST",
  			data: {type : type, cat_id : cat_id},
  			success : function(data){
  				if(type == "subcat"){
  					$("#sub_cat_id").html(data);
  				}else{
  					$("#cat_id").append(data);
  				}
  				
  			}
  		});
  	}

  	loaddata();

  	$("#cat_id").on("change",function(){
  		var cat_id = $("#cat_id").val();

  		if(cat_id != ""){
  			loaddata("subcat", cat_id);
  		}else{
  			$("#sub_cat_id").html("");
  		}

  		
  	})
  });
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





