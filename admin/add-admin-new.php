<?php 
session_start();
if(!isset($_SESSION['login-new']))
header('location: login-new.php');

include "connection.php";
include "header-new.php";
?>

<?php
$action="add";
if(isset($_REQUEST["action"]))
$action= $_REQUEST["action"];

if($_POST){
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone = $_POST["phone"];
$address = $_POST["address"];

if($action=="add"){

$sql = "INSERT INTO admin (name , email , password , phone , address) VALUES ('$name' , '$email' , '$password' , '$phone' , '$address')";
$data = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($data){
?>
<script> alert("DATA ADDED"); </script>
<?php
}
else{
echo "NOT Added";
}
}

if($action=="update"){

$sql = "UPDATE admin set name='".$name."',email='".$email."',password='".$password."',phone='".$phone."',address='".$address."' WHERE id=".$_REQUEST["adminid"];

$data = mysqli_query($conn,$sql);
?>
<script>alert("Updated Successfully");</script>
<?php
}
}


if($action=="delete"){

$sql = "DELETE FROM admin WHERE id=".$_REQUEST["adminid"];
$data = mysqli_query($conn,$sql);
?>

<script>alert("Deleted Successfully");</script>
<?php
}

if($action=="update"){
$sql = "SELECT * FROM admin WHERE id=".$_REQUEST["adminid"];
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
<form action="" method="post" onSubmit="return validate()"/>
       
	    <div class="main-content">   
            <section class="section">                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-10">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Admin </h4>
									<br>
                                </div>
                                    <div class="form-group">
                                        <label> Name=></label>
                                        <input id="name" name="name" type="text" value="<?php if($action == "update") echo $row["name"];?>" class="form-control" />
                                    </div>
									<div class="form-group">
                                        <label>Email=></label>
                                        <input id="email" name="email" type="text" value="<?php if($action == "update") echo $row["email"];?>" class="form-control">
                                    </div>
									
									<div class="form-group">
                                        <label>Password=></label>
                                        <input id="password" name="password" type="password" value="<?php if($action == "update") echo $row["password"];?>" class="form-control">
                                    </div>
									
									<div class="form-group">
                                        <label>Phone=></label>
                                        <input id="phone" name="phone" type="phone" value="<?php if($action == "update") echo $row["phone"];?>" class="form-control">
                                    </div>
									
									<div class="form-group">
                                        <label>Address=></label>
                                        <input id="address" name="address" type="text" value="<?php if($action == "update") echo $row["address"];?>" class="form-control">
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

a = document.getElementById("name");
b = document.getElementById("email");
c = document.getElementById("password");
d = document.getElementById("phone");
e = document.getElementById("address");

if(a.value==""){
alert("Name Is Required");
a.focus();
return false;
}
else if(b.value==""){
alert("Email Is Required");
b.focus();
return false;
}
else if(c.value==""){
alert("Password Is Required");
c.focus();
return false;
}
else if(d.value==""){
alert("Phone Number Is Required");
d.focus();
return false;
}
else if(e.value==""){
alert("Address Is Required");
e.focus();
return false;
}
else{
return true
}
}

</script>

        <!-- Start app Footer part -->
        <footer class="main-footer">
            <div class="footer-left">
                <?php include "footer.php"; ?>
            </div>
            <div class="footer-right">
            
            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- bootstrap-form.html  Tue, 07 Jan 2020 03:36:23 GMT -->
</html>