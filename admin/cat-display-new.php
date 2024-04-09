<?php


session_start();
if(!isset($_SESSION['login-new']))
header('location: login-new.php');


ob_start();
include "connection.php";
include "header-new.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
         
    <div class="main-content">   
        <section class="section">      
            <div class="section-header">
                <h1>Category Display</h1>                
            </div>
			<?php if(isset($_REQUEST["msg"])) echo $_REQUEST["msg"]; ?>			
            <div class="section-body">   
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">                                                        
                        <div class="row mt-4">
                            <div class="col-md-12">                                
                                <div class="table-responsive">								 								 
                                   <table class="table table-striped table-hover table-md">
                                   
     										<tr>
                                            <th data-width="40">Category_ID</th>
                                            <th class="text-center">Category_Name</th>
											<th class="text-center">STATUS</th>
											<th class="text-center">TIME</th>
											<th class="text-center">ACTION</th>
                                        </tr>
										<?php
										$sql = "SELECT * FROM category";
										$result = mysqli_query($conn,$sql);
										if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_assoc($result)){
  										?>
  										<tr>
    									<td class="text-center"><?php echo $row["cat_id"];?></td>
    									<td class="text-center"><?php echo $row["cat_name"];?></td>
										<td class="text-center"><?php echo $row["status"];?></td>
										<td class="text-center"><?php echo $row["time"];?></td>
    									<td  class="text-center"> <a href="category-new.php?catid=<?php echo $row["cat_id"];?>&action=delete">Delete</a> / 
										<a href="category-new.php?catid=<?php echo $row["cat_id"];?>&action=update">Edit</a></td>
  									</tr>
										<?php
										}
										}
										else
										{
										?>
  										<tr>
    									<td  class="text-center" colspan="6">No Results</td>
  										</tr>
										<?php 
										}
										?>
                                    </table>
                                </div>                                
                        </div>
                    </div>
                    <hr>                    
            </div>
        </section>      
    </div>
    <footer class="main-footer">
        <div class="footer-left">
        <?php include "footer.php"; ?>
        </div>
        <div class="footer-right">
        
        </div>
    </footer>
</div>
</div>

<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>
</html>