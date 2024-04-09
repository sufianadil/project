<?php 
error_reporting(0);
ob_start();
session_start(); 
include "connection.php";
?>



<?php
$needingid = $_REQUEST["proid"];
$sql = "SELECT * from product WHERE product_id =".$_REQUEST["proid"];
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
$minprice = $row["product_price"];

}}
?>

<?php
$sql = "SELECT * from bid WHERE product_id =".$_REQUEST["proid"];
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
$newminprice = $row["bid"];
}}
?>	 	 
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title></title>
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

$customerid = $_POST["customer_id"];
$productid = $_REQUEST["proid"];
$customerphone = $_POST["customer_phone"];
$customeraddress = $_POST["customer_address"];
$customerbid = $_POST["bid"];

if($action == "add" && "$minprice" < "$customerbid" && "$newminprice" < "$customerbid"){
$sql = "INSERT INTO bid (customer_id , product_id , customer_phone , customer_address , bid) VALUES('$customerid' , $productid , '$customerphone' ,  '$customeraddress' , '$customerbid')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));





if($result){
?>
<script> alert("Data Added");</script>
<?php 
}else{
echo "";
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
<?php
$sql = "SELECT * from customers WHERE customer_id = ".$_SESSION["customer-login"]; 
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
?>	                                
                                    <a class="text-center" href="customer-login.php"> <h4>OFFER YOUR BID</h4></a>
        
                                <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <select id="customer_id" name="customer_id" class="form-control"/>
									<?php

									$sql = "SELECT * FROM customers WHERE customer_id = ".$_SESSION["customer-login"];
									$result = mysqli_query($conn,$sql);
									if(mysqli_num_rows($result)>0){
									while($row1=mysqli_fetch_assoc($result)){

									?>
									<option value="<?php echo $row1['customer_id']; ?>" readonly><?php echo $row1['customer_name']; ?></option>
									<?php
									}
									}
									?>
									</select>
                                    </div>
									<div class="form-group">
                                        <input name="customer_phone" type="text" class="form-control" placeholder="Phone Number" value="<?php echo $row["customer_phone"];?>" readonly>
                                    </div>
									<div class="form-group">
                                        <input name="customer_address" type="text" class="form-control" placeholder="Address" value="<?php echo $row["customer_address"];?>"readonly>
                                    </div>
									<div class="form-group">
                                        <input name="bid" type="numbers" class="form-control"  placeholder="Enter Your Amount Should be higher than minimum value" required><br><br><?php echo "Minimum Price = ". $minprice;?><br><br><?php echo "Last Bid Price = ". $newminprice;?>
										
                                    </div><br><br>
                                    <input name="submit" id="submit" type="submit" class="btn login-form__btn submit w-100">
									<a href=""></a>
								</form>
                                <?php }}?>
								<p class="mt-5 login-form__footer">Press To <a href="single.php?prodid=<?php echo $needingid;?>" class="text-primary">HERE PLZ </a> TO SEE THE BID</p>
                                    </p>
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
</body>
</html>






