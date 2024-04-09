<?php 
session_start();
include "connection.php";
include "header.php";

if(!isset($_SESSION["customer-login"])){
header("location: index.php?msg=Plz Login First!");}
?>

<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">

					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<?php
						$sql = "SELECT * FROM customers WHERE customer_id = ".$_SESSION["customer-login"];
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
  						?>
						<!-- User Image -->	
						<div class="profile-thumb">
							<img src="customer-profile/<?php echo $row["image"];?>" alt="" class="rounded-circle">
						</div>
						<!-- User Name -->
						<h5 class="text-center"><?php echo $row["customer_name"];?></h5>
						<p>Joined <?php echo $row["date_time"];?></p>
						<a href="user-profile.php" class="btn btn-main-sm">Edit Profile</a>
					</div>
						<?php }}?>
						
						
						
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li class="active" ><a href="dashboard.php"><i class="fa fa-user"></i> My Ads</a></li>
							<li><a href="active-ads.php"><i class="fa fa-bookmark-o"></i>Active Ads <span>
							</span></a></li>
							<li><a href="inactive-ads.php"><i class="fa fa-file-archive-o"></i>In-Active Ads <span>
							</span></a></li>
							<li><a target="_blank" href="customer-logout.php"><i class="fa fa-cog"></i> Logout</a></li>
							<li><a href="delete-account.php"><i class="fa fa-power-off"></i>Delete Account</a></li>
						</ul>
					</div>
				
				</div>
				
			</div>
			
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">My Ads</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Title</th>
								<th class="text-center">Category</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<?php
						$sql = "SELECT p.status, p.file1, p.product_id, p.product_name, p.date, p.location,c.cat_name FROM product p inner join category c on p.cat_id = c.cat_id WHERE customer_id =". $_SESSION["customer-login"];
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
  						?>
						<tbody>
							<tr>
								
								<td class="product-thumb">
									<img width="80px" height="auto" src="product-images/<?php echo $row["file1"]; ?>" alt="image description"><br><br><a href="update-product-images.php?proid=<?php echo $row["product_id"];?>&action=update"><h4>Edit Image</h4></td>
									
								
								<td class="product-details">
									<h3 class="title"><?php echo $row["product_name"];?></h3>
									<span class="add-id"><strong>Ad ID:</strong><br><?php echo $row["product_id"];?></span>
									<span><strong>Posted on: </strong><time><br><?php echo $row["date"];?></time> </span>
									<span class="status active"><strong>Status:</strong><br><?php echo $row["status"];?></span>
									<span class="location"><strong>Location:</strong><br><?php echo $row["location"];?></span>
								</td>
								<td class="product-category"><span class="categories"><?php echo $row["cat_name"];?></span></td>
								<td class="action" data-title="Action">
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="view" href="single.php?prodid=<?php echo $row['product_id'];?>">
													<i class="fa fa-eye"></i>
												</a>		
											</li>
											<li class="list-inline-item">
												<a  class="edit" href="list.php?proid=<?php echo $row["product_id"];?>&action=update">
													<i class="fa fa-pencil"></i>
												</a>		
											</li>
											<li class="list-inline-item">
												<a class="delete" href="list.php?proid=<?php echo $row["product_id"];?>&action=delete">
													<i class="fa fa-trash"></i>
												</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
							<?php }}?>
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>
<!--============================
=            Footer            =
=============================-->
<?php include "footer.php";?>