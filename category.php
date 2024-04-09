<?php 
include "header.php";
?>
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form>
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" id="searchname" name="searchname" placeholder="Search By Product Name"  onKeyUp="searching(this.value)">
							<div id="result"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>All Ads:</h2>
					<p></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
	<h4 class="widget-header">All Category</h4>
	<ul class="category-list">
		<li><a href="category.php">Laptops <span>93</span></a></li>
		<li><a href="category.php">Iphone <span>233</span></a></li>
		<li><a href="category.php">Microsoft  <span>183</span></a></li>
		<li><a href="category.php">Monitors <span>343</span></a></li>
	</ul>
</div>

<div class="widget category-list">
	<h4 class="widget-header">Nearby</h4>
	<ul class="category-list">
		<li><a href="category.php">New York <span>93</span></a></li>
		<li><a href="category.php">New Jersy <span>233</span></a></li>
		<li><a href="category.php">Florida  <span>183</span></a></li>
		<li><a href="category.php">California <span>120</span></a></li>
		<li><a href="category.php">Texas <span>40</span></a></li>
		<li><a href="category.php">Alaska <span>81</span></a></li>
	</ul>
</div>

<div class="widget filter">
	<h4 class="widget-header">Show Produts</h4>
	<select>
		<option>Popularity</option>
		<option value="1">Top rated</option>
		<option value="2">Lowest Price</option>
		<option value="4">Highest Price</option>
	</select>
</div>

<div class="widget product-shorting">
	<h4 class="widget-header">By Condition</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Brand New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Almost New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Gently New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Havely New
	  </label>
	</div>
</div>

				</div>
			</div>
			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<strong>Short</strong>
							<select>
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30">
<?php 
$sql = "SELECT p.status , c.cat_name , p.file1 , p.product_name , p.date , p.location , p.product_id from product p inner join category c on p.cat_id=c.cat_id";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
if($row["status"] == "Active"){
?>							
						<div class="col-sm-12 col-lg-4 col-md-6">
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
		    <h4 class="card-title"><a href="single.php?prodid=<?php echo $row['product_id'];?>"><?php echo $row["product_name"];?></a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i><?php echo $row["cat_name"];?></a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i><?php echo $row["date"];?></a>
		    	</li>
		    </ul>
		    <p class="card-text"><?php echo $row["location"];?></p>
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
<?php }}}?>
					</div>
				</div>
				<?php // pagination ?>
			</div>
		</div>
	</div>
</section>
<!--============================
=            Footer            =
=============================-->
	
	
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

<?php 
include "footer.php";
?>