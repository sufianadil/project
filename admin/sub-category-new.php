<?php

session_start();
if(!isset($_SESSION['login-new']))
header('location: login-new.php');


ob_start();
include "connection.php";
include "header-new.php";

$action="add";
if(isset($_REQUEST["action"]))
$action= $_REQUEST["action"];


if($_POST){
$catid = $_POST["cat_id"];
$subcatname = $_POST["sub_cat_name"];
$substatus = $_POST["sub_status"];


if($action=="add"){

$sql = "INSERT INTO subcategory (cat_id , sub_cat_name , sub_status) VALUES ('$catid' , '$subcatname' , '$substatus')";
$data = mysqli_query($conn,$sql) or die(mysqli_error($conn));

									
if($data){
header("location: sub-cat-display-new.php?msg=Data Added Succesfully");
}
else{
header("location: sub-cat-display-new.php?msg=Data Not Added");
}
}

if($action=="update"){

$sql = "UPDATE subcategory set cat_id='".$catid."',sub_cat_name='".$subcatname."',sub_status='".$substatus."' WHERE sub_cat_id=".$_REQUEST["subcatid"];

$data = mysqli_query($conn,$sql);


header("location: sub-cat-display-new.php?msg=Updated Succesfully");
}
}
if($action=="delete"){

$sql = "delete FROM subcategory WHERE sub_cat_id=".$_REQUEST["subcatid"];
$data = mysqli_query($conn,$sql);
header("location:cat-display-new.php?msg=Deleted Successfully");

}

if($action=="update"){
$sql = "SELECT * FROM subcategory WHERE sub_cat_id=".$_REQUEST["subcatid"];
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
			
<form action="" method="post"/>       
	    <div class="main-content">      
            <section class="section">   
		<?php echo "<h6 style='color:red;'> "; if(isset($_REQUEST["msg"])) echo $_REQUEST["msg"]; echo "</h6>";?>	                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-10">
                            <div class="card">
                                <div class="card-header">								
                                    <h4>Add Sub Category </h4>
									<br>
                                </div>	
								<div class="form-group">
                                    <label>Category Name=></label>
									<select id="cat_id" name="cat_id" class="form-control"/>
									<option value="<?php if($action=="update") echo $row["cat_id"];?>"><?php if($action=="update") echo $row["cat_id"]; else{echo "SELECT";} ?></option>
									<?php

									$sql = "SELECT * FROM category";
									$result = mysqli_query($conn,$sql);
									if(mysqli_num_rows($result)>0){
									while($row1=mysqli_fetch_assoc($result)){

									?>
									<option value="<?php echo $row1['cat_id']; ?>"><?php echo $row1['cat_name']; ?></option>
									<?php
									}
									}
									?>
									</select>
									
                                    </div>							
                                    <div class="form-group">
                                        <label>Sub Category Name=></label>
                                        <input id="sub_cat_name" name="sub_cat_name" type="text" class="form-control" value="<?php if($action=="update") echo $row["sub_cat_name"]; ?>">
                                    </div>    
                                    <div class="form-group">
                                        <label class="d-block">STATUS=></label>
                                            <div class="form-check">
									<select id="sub_status" name="sub_status" class="form-check-input"/>
									<option value="<?php if($action=="update") echo $row["sub_status"];?>"><?php if($action=="update") echo $row["sub_status"]; else{echo "SELECT";} ?>
									</option>
									<option value="Active">Active</option>
									<option value="In-Active">In-Active</option>
									</select>
                                        </div>                                                                            									
									</div>                                                                        
                                <div class="card-footer text-left">
                                    <button class="btn btn-primary mr-1" id="submit" name="submit" type="submit" >Submit</button>
                                </div>
                            </div>
                           
            </section>     
        </div>
</form>


       
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