<?php 
include "header.php"; 
?>
<style> 
body{ 
    text-align: center; 
    background: #ffffff; 
  font-family: sans-serif; 
  font-weight: 100; 
} 
h1{ 
  color: #396; 
  font-weight: 100; 
  font-size: 40px; 
  margin: 40px 0px 20px; 
} 
 #clockdiv{ 
    font-family: sans-serif; 
    color: #fff; 
    display: inline-block; 
    font-weight: 100; 
    text-align: center; 
    font-size: 30px; 
} 
#clockdiv > div{ 
    padding: 10px; 
    border-radius: 3px; 
    background: #00BF96; 
    display: inline-block; 
} 
#clockdiv div > span{ 
    padding: 15px; 
    border-radius: 3px; 
    background: #00816A; 
    display: inline-block; 
} 
smalltext{ 
    padding-top: 5px; 
    font-size: 16px; 
} 
</style> 

<?php
$action = "add";
if(isset($_REQUEST["action"]))
$action =$_REQUEST["action"];

if($_POST){
$date= $_POST['bid-date'];
$h= $_POST['hour'];
$m= $_POST['minute'];
$s= $_POST['second'];

if($action == "add"){

$sql = "INSERT INTO timer (date , h , m , s) VALUES('$date' , '$h' , '$m' , '$s')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($result){
?>
<script> alert("Data Added");</script>
<?php
}else{
echo ""; 
}
}

}//post
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
$sql = "SELECT *,DATE_ADD(date, INTERVAL 1 MONTH) as updated_date from product p inner join category c on p.cat_id=c.cat_id WHERE product_id = '$new' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
$ad_date = $row['updated_date'];//date('Y-m-d',strtotime($row["date"],'+1 month'));

?>			
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">Title: <?php echo $row["product_name"];?></h1>
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
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Biding</h3>


<h1>Countdown Clock</h1> 
<div id="clockdiv"> 
  <div> 
    <span class="days" id="day"></span> 
    <div class="smalltext">Days</div> 
  </div> 
  <div> 
    <span class="hours" id="hour"></span> 
    <div class="smalltext">Hours</div> 
  </div> 
  <div> 
    <span class="minutes" id="minute"></span> 
    <div class="smalltext">Minutes</div> 
  </div> 
  <div> 
    <span class="seconds" id="second"></span> 
    <div class="smalltext">Seconds</div> 
  </div> 
</div>   
<p font-size=7 id="demo"></p>

<table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Sr No.</th>
												<th class="cell">Customer Name</th>
												<th class="cell">Phone Number</th>
												<th class="cell">Address</th>
												<th class="cell">BID</th>
												
											</tr>
										</thead>
										<?php
										$i = 1;
										$new=$_REQUEST["prodid"];
										$sql = "SELECT * FROM bid b inner join customers c on b.customer_id=c.customer_id WHERE product_id = '$new' ORDER BY bid_id DESC LIMIT 3";
										$result = mysqli_query($conn,$sql);
										if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_assoc($result)){
										
										?>
										<tbody>
											<tr>
												<td class="cell"># <?php echo $i++; ?> </td>
												<td class="cell"><?php echo $row["customer_name"];?></td>
												<td class="cell"><?php echo $row["customer_phone"];?></td>
												<td class="cell"><?php echo $row["customer_address"];?></td>
												<td class="cell"><?php echo $row["bid"];?></td>												
											</tr>			
										</tbody>
										<?php }}?>
									</table>
							</div>
<?php 
$new=$_REQUEST["prodid"];
$sql = "SELECT * FROM product WHERE product_id = '$new'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
?>							
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Details</h3>
								<p><?php echo $row["product_description"];?></p>
								
							</div>
<?php }}?>
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
$sql = "SELECT * from product p inner join customers c on p.customer_id = c.customer_id WHERE product_id = ".$new; 
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
							<?php if(isset($_SESSION["customer-login"])){ ?>
							<li class="list-inline-item"><a href="bid-offer.php?proid=<?php echo $new; ?>" class="btn btn-offer">Make an offer</a></li>
						<?php }?>
						</ul>
					</div>
					<!-- Map Widget -->
					<div class="widget map">
						<div class="map">
							<iframe src='Https://www.google.com/maps?q=<?php echo $row["latitude"];?>,<?php echo $row["longitude"];?>&hl=es;z=10&output=embed' width="100%" height="100%"></iframe>
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
  
//var countDownDate = <?php 
//echo strtotime("$date $h:$m:$s" ) ?> * 1000;

//var countDownDate = <?php //echo date('Y-m-d h:i:s',strtotime($ad_date));?> * 1000;
var countDownDate = <?php echo strtotime($ad_date)*1000;?>;
//console.log(countDownDate);
var now = <?php echo time() ?> * 1000;
 
  
var x = setInterval(function() { 
now = now + 1000; 
var t = countDownDate - now; 
var days = Math.floor(t / (1000*60*60*24)); 
var hours = Math.floor((t%(1000*60*60*24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t%(1000*60*60)) / (1000 * 60)); 
var seconds = Math.floor((t%(1000*60)) / 1000); 
document.getElementById("day").innerHTML =days ; 
document.getElementById("hour").innerHTML =hours; 
document.getElementById("minute").innerHTML = minutes;  
document.getElementById("second").innerHTML =seconds;  
if (t < 0) { 
        clearInterval(x); 
        document.getElementById("demo").innerHTML = "TIME UP"; 
        document.getElementById("day").innerHTML ='0'; 
        document.getElementById("hour").innerHTML ='0'; 
        document.getElementById("minute").innerHTML ='0' ;  
        document.getElementById("second").innerHTML = '0'; } 
}, 1000); 
</script>




<?php 
include "footer.php";
?>