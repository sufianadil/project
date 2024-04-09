<?php 
include "header.php"; 
?>

<?php
if(isset($_POST['update']))
{	
$date=$_POST['date'];
$h= $_POST['h'];
$m= $_POST['m'];
$s= $_POST['s'];
		//updating the table
$result = mysqli_query($conn, "UPDATE timer SET date='$date' WHERE id=1");
$result = mysqli_query($conn, "UPDATE timer SET h='$h' WHERE id=1");
$result = mysqli_query($conn, "UPDATE timer SET m='$m' WHERE id=1");
$result = mysqli_query($conn, "UPDATE timer SET s='$s' WHERE id=1");	
//redirectig to the display page. In our case, 
echo "Timer updated";
}
?>


<?php 
$new=$_REQUEST["prodid"];
$sql = "SELECT * from product p inner join customers c on p.customer_id = c.customer_id WHERE product_id = '$new' ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$customername = $row["customer_name"];
}
?>	

<?php 
$new=$_REQUEST["prodid"];
$sql = "SELECT * from product p inner join subcategory s on p.sub_cat_id = s.sub_cat_id WHERE product_id = '$new' ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$subcatname = $row["sub_cat_name"];
}
?>	


<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
<?php
$new=$_REQUEST["prodid"];
$sql = "SELECT * from product p inner join category c on p.cat_id=c.cat_id WHERE product_id = '$new' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
?>			
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title"><?php echo $row["product_name"];?></h1>
					<div class="product-meta">
						<ul class="list-inline">					
							<li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href=""><?php echo $customername;?></a></li>
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href=""><?php echo $row["cat_name"];?></a></li>
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i>Sub-Category<a href=""><?php echo $subcatname; ?></a></li>
						<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href=""><?php echo $row["location"];?></a></li>
						</ul>
					</div>
					<div id="carouselExampleIndicators" class="product-slider carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="product-images/<?php echo $row["file1"];?>" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="product-images/<?php echo $row["file2"];?>" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="product-images/<?php echo $row["file3"];?>" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="content">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product Biding</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Product Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Product Specifications</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Biding</h3>
<?php
$result = mysqli_query($conn, "SELECT * FROM timer ORDER BY id DESC");
while($res = mysqli_fetch_array($result)) { 
echo $date = $res['date']; echo "<br>";
echo $h = $res['h'];echo "<br>";
echo $m = $res['m'];echo "<br>";
echo $s = $res['s'];echo "<br>";
}
?>



<form method="POST" action="#">
Date*<input type="date" name="date" value="<?php echo $date;?>">
H* <input type="number" name="h" value="<?php echo $h;?>">
M* <input type="number" name="m" value="<?php echo $m;?>">
S*<input type="number" name="s" value="<?php echo $s;?>">
<button type="submit" name="update">Update</button>
</form>
							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Details</h3>
								<p><?php echo $row["product_description"];?></p>
								
								<iframe width="100%" height="400" src="https://www.youtube.com/embed/LUH7njvhydE?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
								<p></p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam sed, officia reiciendis necessitatibus obcaecati eum, quaerat unde illo suscipit placeat nihil voluptatibus ipsa omnis repudiandae, excepturi! Id aperiam eius perferendis cupiditate exercitationem, mollitia numquam fuga, inventore quam eaque cumque fugiat, neque repudiandae dolore qui itaque iste asperiores ullam ut eum illum aliquam dignissimos similique! Aperiam aut temporibus optio nulla numquam molestias eum officia maiores aliquid laborum et officiis pariatur, delectus sapiente molestiae sit accusantium a libero, eligendi vero eius laboriosam minus. Nemo quibusdam nesciunt doloribus repellendus expedita necessitatibus velit vero?</p>

								
								
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Product Specification</h3>
								<table class="table table-bordered product-table">
								  <tbody>
								    <tr>
								      <td>Seller Price</td>
								      <td>$450</td>
								    </tr>
								    <tr>
								      <td>Added</td>
								      <td>26th December</td>
								    </tr>
								    <tr>
								      <td>State</td>
								      <td>Dhaka</td>
								    </tr>
								    <tr>
								      <td>Brand</td>
								      <td>Apple</td>
								    </tr>
								    <tr>
								      <td>Condition</td>
								      <td>Used</td>
								    </tr>
								    <tr>
								      <td>Model</td>
								      <td>2017</td>
								    </tr>
								    <tr>
								      <td>State</td>
								      <td>Dhaka</td>
								    </tr>
								    <tr>
								      <td>Battery Life</td>
								      <td>23</td>
								    </tr>
								  </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php }}?>	
<?php
$new=$_REQUEST["prodid"];
$sql = "SELECT * from product WHERE product_id = '$new' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
?>	
		
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h4>Price</h4>
						<p>Rs.<?php echo number_format($row["product_price"]);?></p>
					</div>
<?php }}?>					
<?php
$sql = "SELECT * from customers WHERE customer_id = ".$_SESSION["customer-login"]; 
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
?>			
					<!-- User Profile widget -->
					<div class="widget user">
						<img class="rounded-circle" width="300" height="350" src="customer-profile/<?php echo $row["image"];?>" alt="">
						<h4><a href=""><?php echo $row["customer_name"];?></a></h4>
						<p class="member-time">Member: <?php echo $row["date_time"];?></p>
						<ul class="list-inline mt-10">
							<li class="list-inline-item"><a href="" class="btn btn-contact">Contact: <?php echo $row["customer_email"];?></a></li>
							<li class="list-inline-item"><a href="" class="btn btn-offer">Make an offer</a></li>
						</ul>
					</div>
					<!-- Map Widget -->
					<div class="widget map">
						<div class="map">
							<div id="map"></div>
						</div>
					</div>
					<!-- Rate Widget -->
					<div class="widget rate">
						<!-- Heading -->
						<h5 class="widget-header text-center">What would you rate
						<br>
						this product</h5>
						<!-- Rate -->
						<div class="starrr"></div>
					</div>
					<!-- Safety tips widget -->
					<div class="widget disclaimer">
						<h5 class="widget-header">Safety Tips</h5>
						<ul>
							<li>Meet seller at a public place</li>
							<li>Check the item before you buy</li>
							<li>Pay only after collecting the item</li>
						</ul>
					</div>
					<!-- Coupon Widget -->
					<div class="widget coupon text-center">
						<!-- Coupon description -->
						<p>Have a great product to post ? Share it with
							your fellow users.
						</p>
						<!-- Submii button -->
						<a href="index.php" class="btn btn-transparent-white">Post Ad</a>
					</div>
					
				</div>
			</div>
<?php }}?>			
		</div>
	</div>
	<!-- Container End -->
</section>
<!--============================
=            Footer            =
=============================-->
<script>
 var countDownDate = <?php 
echo strtotime("$date $h:$m:$s" ) ?> * 1000;
var now = <?php echo time() ?> * 1000;

// Update the count down every 1 second
var x = setInterval(function() {
now = now + 1000;
// Find the distance between now an the count down date
var distance = countDownDate - now;
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
minutes + "m " + seconds + "s ";
// If the count down is over, write some text 
if (distance < 0) {
clearInterval(x);
 document.getElementById("demo").innerHTML = "EXPIRED";
}
    
}, 1000);

    </script>



<?php 
include "footer.php";
?>