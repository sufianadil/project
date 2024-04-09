<!DOCTYPE html>
<html lang="en">
<?php 
include "connection.php";
?>

<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Login</title>

<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="stylesheet" href="assets/css/components.min.css">

<style>
.error {color: #FF0000;}
</style>

</head>

<body style="background:url(galaxy.jpg); background-size:100% 100%;"  class="layout-4">


<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand"><img src="logologin.jpg" alt="logo" width="120" class="shadow-light rounded-circle"></div>
                    <div class="card card-primary">
                        <div class="card-header">
						<center><h4><br><br><br>LOGIN</h4></center>
						<h4><a href="../index.php">Back To Main PAGE</a></h4>                   
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="user">USER</label> 
                                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your user
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">PASSWORD</label>
                                        <div class="float-right">
                                       
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    LOGIN
                                    </button>
                                </div>
                            </form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = $_POST["name"];
$password = $_POST["password"];

$sql = mysqli_query($conn , "select * from admin where name = '$name' and password = '$password'");

$row = (mysqli_fetch_array($sql));
if($row['name'] == $name && $row['password'] == $password){
echo "Login successful <br> Welcome " . $row["name"];

session_start();
$_SESSION["login-new"] = 1;
if(isset($_SESSION["login-new"])){
header('location: welcome-new.php');
}
else{
echo "";
}
}
else{
echo "<h2 style='color:red;'> <center> Login Failed </center> </h2>";
}
}

echo "<br>";
include "footer.php";

?>				
														
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
</div>




</body>
</html>



<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>


<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>
</html>