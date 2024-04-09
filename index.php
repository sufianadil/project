<?php 
include "header.php"; 
?>


<!--===============================
=            Hero Area            =
================================-->
   <?php if(isset($_REQUEST["msg"])) echo $_REQUEST["msg"]; ?>	
<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy & Sell Near You </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around Pakistan</p>
					<div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href=""><i class="fa fa-bed"></i> Electronics</a></li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-grav"></i> Pets</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-car"></i> Cars</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-cutlery"></i> Real Estates</a>
							</li>
						</ul>
					</div>
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
					<form>
						<div class="row">
							<!-- Store Search -->
							
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="searchname" name="searchname" placeholder="Search By Name Of Product"  onKeyUp="searching(this.value)">
									
									<!-- Search Button -->
								</div>
								<div id="result" style="text-align:left;"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Trending Ads</h2>
					<p>Top trending ads of our site are displayed here!</p>
				</div>
			</div>
		</div>
		<div class="row">
			
<?php
$sql = "SELECT * FROM product p inner join category c on p.cat_id=c.cat_id ORDER BY product_id ASC LIMIT 3";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
if($row["status"] == "Active"){
?>			
			
			<!-- offer 01 -->
			<div class="col-sm-12 col-lg-4">
				<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="single.php?prodid=<?php echo $row['product_id'];?>">
				<img class="card-img-top" src="product-images/<?php echo $row["file1"];?>" width="200" height="200" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.php?prodid=<?php echo $row['product_id'];?>"><?php echo $row["product_name"] ?></a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a><i class="fa fa-folder-open-o"></i><?php echo $row["cat_name"] ?></a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a><i class="fa fa-calendar"></i><?php echo $row["date"] ?></a>
		    	</li>
		    </ul>
		    <p class="card-text"><?php echo $row["location"] ?></p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
</div>
<?php }}} ?>		
		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>All Categories</h2>
					<p>The list of categories at the time being on our site, more will be added soon!</p>
				</div>
				<div class="row">
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-laptop icon-bg-1"></i> 
								<h4>Electronics</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php">Laptops <span>93</span></a></li>
								<li><a href="category.php">Mobiles <span>233</span></a></li>
								<li><a href="category.php">Displays <span>343</span></a></li>
								<li><a href="category.php">Others <span>343</span></a></li>
							</ul>
						</div>
					</div> 
					<!-- /Category List -->
					<!-- Category list -->
					<!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-home icon-bg-3"></i> 
								<h4>Real Estate</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php">Farms <span>93</span></a></li>
								<li><a href="category.php">Houses <span>23</span></a></li>
								<li><a href="category.php">Hospitals  <span>83</span></a></li>
								<li><a href="category.php">Others<span>33</span></a></li>
							</ul>
						</div>
					</div> 
					<!-- /Category List -->
					<!-- Category list -->
					<!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-paw icon-bg-7"></i> 
								<h4>Pets</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php">Cats <span>65</span></a></li>
								<li><a href="category.php">Dogs <span>23</span></a></li>
								<li><a href="category.php">Birds  <span>113</span></a></li>
								<li><a href="category.php">Others <span>43</span></a></li>
							</ul>
						</div>
					</div>
					 <!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-car icon-bg-6"></i> 
								<h4>Vehicles</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php">Bus <span>193</span></a></li>
								<li><a href="category.php">Cars <span>23</span></a></li>
								<li><a href="category.php">Motobike  <span>33</span></a></li>
								<li><a href="category.php">Others<span>73</span></a></li>
							</ul>
						</div>
					</div> 
					<!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-shopping-basket icon-bg-4"></i> 
								<h4>Shoppings</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php">Mens Wears <span>53</span></a></li>
								<li><a href="category.php">Womens Wears <span>212</span></a></li>
								<li><a href="category.php">Kids Wears <span>133</span></a></li>
								<li><a href="category.php">Accessories <span>143</span></a></li>
								<li><a href="category.php">Others <span>143</span></a></li>

							</ul>
						</div>
					</div>
					 <!-- /Category List -->
					
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
	
	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

function searching(name1){

            $.ajax({
            url : "category-search.php",
            type : "POST",
            data: {name1 : name1},
            success : function(data){
            var name = $('searchname').val();
            $('div#result').html(data);
            }
            });
            }
</script>

<?php include "footer.php"; ?>


<!--============================
=            Footer            =
=============================-->
