<?php 

include "header.php";

?>
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
						<?php
						$sql = "SELECT * FROM customers WHERE customer_id = ".$_SESSION["customer-login"];
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
  						?>					
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							<img src="customer-profile/<?php echo $row["image"];?>" width="100" height="100" alt="" class="rounded-circle">
						</div>
						<!-- User Name -->
						<h5 class="text-center"><?php echo $row["customer_name"];?></h5>
						<p><?php echo $row["date_time"];?></p>
					</div>
					<?php }}?>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li>
								<a href="dashboard.php"><i class="fa fa-user"></i> My Ads</a></li>
							<li>
								<a href="active-ads.php"><i class="fa fa-bookmark-o"></i>Active Ads <span></span></a>
							</li>
							<li>
								<a href="inactive-ads.php"><i class="fa fa-file-archive-o"></i>In-Active Ads <span></span></a>
							</li>
							<li>
								<a href="customer-logout.php"><i class="fa fa-cog"></i> Logout</a>
							</li>
							<li>
								<a href="delete-account.php"><i class="fa fa-power-off"></i>Delete Account</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

<?php

$action = "update";
if(isset($_REQUEST["action"]))
$action =$_REQUEST["action"];

if($_POST){

$customername = $_POST["customer_name"];
$customerpass = $_POST["customer_pass"];
$customerphone = $_POST["customer_phone"];
$customeremail = $_POST["customer_email"];
$customeraddress = $_POST["customer_address"];
$image = $_FILES['file']['name'];

if($action == "update"){
$pass = md5($customerpass);
$sql = "UPDATE customers set customer_name='".$customername."' ,customer_pass='".$pass."' ,customer_phone='".$customerphone."',customer_email='".$customeremail."' ,customer_address='".$customeraddress."' WHERE customer_id=".$_SESSION["customer-login"];

$data = mysqli_query($conn,$sql);
?>
<script>alert("Edit Done");</script>
<?php  
}

if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file']['tmp_name'] , "C:/xampp/htdocs/classpro/customer-profile/".$_FILES['file']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}


} // post


if($action=="update"){
$sql = "SELECT * FROM customers WHERE customer_id=".$_SESSION["customer-login"];
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}

?>	

		<?php
		$sql = "SELECT * FROM customers where customer_id =".$_SESSION["customer-login"];
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
  		?>
		
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Edit Personal Info -->
				<div class="widget personal-info">
					<h3 class="widget-header user">Edit Personal Information</h3>
					<form action="" method="post" >
						<!-- First Name -->
						<div class="form-group">
						    <label for="first-name">Name</label>
						    <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php if($action == "update") echo $row["customer_name"]; ?>">  
						</div>
						<!-- Comunity Name -->
						<div class="form-group">
						    <label for="Password">Password</label>
						    <input type="password" class="form-control" id="customer_pas" name="customer_pass" value="<?php if($action == "update") echo $row["customer_pass"]; ?>">
						</div>
						<!-- Zip Code -->
						<div class="form-group">
						    <label for="phone">Phone Number</label>
						    <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="<?php if($action == "update") echo $row["customer_phone"]; ?>">
						</div>
						<div class="form-group">
						    <label for="email">Email</label>
						    <input type="text" class="form-control" id="customer_email" name="customer_email" value="<?php if($action == "update") echo $row["customer_email"]; ?>">
						</div>
						<div class="form-group">
						    <label for="address">Address</label>
						    <input type="text" class="form-control" id="customer_address" name="customer_address" value="<?php if($action == "update") echo $row["customer_address"]; ?>">
						</div>
						<!-- File chooser -->
						<div class="form-group choose-file">
							<i class="fa fa-user text-center"></i>
						    <input type="file" class="form-control-file d-inline" id="file" name="file" required><br><br><img src="customer-profile/<?php echo $row["image"]; ?> " width="100" />
						 </div>
						<button class="btn btn-transparent" name="submit" id="submit" type="submit">Submit</button>
					</form>
				</div>
			</div>
	<?php }}?>		
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->
<?php
include "footer.php";
?>