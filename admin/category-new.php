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
$catname = $_POST["cat_name"];
$status = $_POST["status"];



if($action=="add"){

$sql = "INSERT INTO category (cat_name , status) VALUES ('$catname' , '$status')";
$data = mysqli_query($conn,$sql) or die(mysqli_error($conn));

									
if($data){
header("location: cat-display-new.php?msg=Data Added Succesfully");
}
else{
header("location: cat-display-new.php?msg=Data Not Added");
}
}

if($action=="update"){

$sql = "UPDATE category set cat_name='".$catname."',status='".$status."' WHERE cat_id=".$_REQUEST["catid"];

$data = mysqli_query($conn,$sql);


header("location: cat-display-new.php?msg=Updated Succesfully");
}
}
if($action=="delete"){

$sql = "delete FROM category WHERE cat_id=".$_REQUEST["catid"];
$data = mysqli_query($conn,$sql);
header("location:cat-display-new.php?msg=Deleted Successfully");

}

if($action=="update"){
$sql = "SELECT * FROM category WHERE cat_id=".$_REQUEST["catid"];
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
			
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validate()"/>       
	    <div class="main-content">     
            <section class="section">  
		<?php echo "<h6 style='color:red;'> "; if(isset($_REQUEST["msg"])) echo $_REQUEST["msg"]; echo "</h6>";?>	                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-10">
                            <div class="card">
                                <div class="card-header">								
                                    <h4>Add Category </h4>
									<br>
                                </div>								
                                    <div class="form-group">
                                        <label>Category Name=></label>
                                        <input id="cat_name" name="cat_name" type="text" class="form-control" value="<?php if($action=="update") echo $row["cat_name"]; ?>">
                                    </div>                                     	                                    
                                    <div class="form-group">
                                        <label class="d-block">STATUS=></label>
                                            <div class="form-check">											
									<select id="status" name="status" class="form-check-input"/>
									<option value="<?php if($action=="update") echo $row["status"];?>"><?php if($action=="update") echo $row["status"]; else{echo "SELECT";} ?>
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


<script>

function validate(){

a = document.getElementById("cat_name");

if(a.value==""){
alert("CATEGORY NAME IS REQUIRED");
a.focus();
return false;
}
else{
return true;
}
}

</script>





       
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