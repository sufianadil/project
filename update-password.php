<?php 
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Forget Password</title>
    <!-- Favicon icon -->
    <link rel="icon" type="admin/image/png" sizes="16x16" href="../../admin/assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="admin/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->






<?php 
if(isset($_REQUEST["customer_email"]) && isset($_REQUEST["reset_token"]) ){

$customer_email= $_REQUEST["customer_email"];
$reset_token = $_REQUEST["reset_token"];

date_default_timezone_set('Asia/Karachi');
$date=date("Y-m-d");
$sql = "SELECT * from customers WHERE customer_email = '$customer_email' AND reset_token = '$reset_token' AND reset_token_date = '$date'";
$result=mysqli_query($conn,$sql);
if($result){
if(mysqli_num_rows($result) == 1){
echo"
    <div class='login-form-bg h-100'>
        <div class='container h-100'>
            <div class='row justify-content-center h-100'>
                <div class='col-xl-6'>
                    <div class='form-input-content'>
                        <div class='card login-form mb-0'>
                            <div class='card-body pt-5'>
                                


<form class='mt-5 mb-5 login-input' method='POST' action='' >
<a class='text-center'><h4>NEW PASSWORD</h4></a>
<div class='form-group'>
<input class='form-control' name='customer_pass' type='password' id='customer_pass' placeholder='New Password'>
</div>
<button class='btn login-form__btn submit w-100' name='update-password' id='update-password' type='submit'>UPDATE PASSWORD </button>
<input name='customer_email' type='hidden' value='$customer_email'>  
</form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";    

}
else{
        echo"
        <script>
        alert('Invalid Or Expired Link');
        window.location.href='update-password.php';
        </script>";}			
}
else{
	    echo" 
		<script>
		alert('Try Again Later');
		window.location.href='customer-login.php';
		</script>";}
}

?>

<?php 

if(isset($_REQUEST["update-password"])){
$customer_pass = $_REQUEST["customer_pass"];
$pass = md5($customer_pass);
$email = $_REQUEST["customer_email"];

$sql = "UPDATE customers set customer_pass='".$pass."' , reset_token='".NULL."' , reset_token_date='".NULL."' WHERE customer_email= '$email'";
if(mysqli_query($conn , $sql)){
        echo" 
        <script>
        alert('Password Updated Successfully!');
        window.location.href='customer-login.php';
        </script>";}   

else{
        echo" 
        <script>
        alert('Try Again Later');
        window.location.href='customer-login.php';
        </script>";}
}
?>



    <!--**********************************
        Scripts
    ***********************************-->
    <script src="admin/plugins/common/common.min.js"></script>
    <script src="admin/js/custom.min.js"></script>
    <script src="admin/js/settings.js"></script>
    <script src="admin/js/gleek.js"></script>
    <script src="admin/js/styleSwitcher.js"></script>
</body>
</html>





