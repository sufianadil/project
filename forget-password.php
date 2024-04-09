<?php 
session_start();
include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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

function sendMail($customer_email , $reset_token){

require('php-mailer/PHPMailer.php');
require('php-mailer/SMTP.php');
require('php-mailer/Exception.php');

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'umershafiq119@gmail.com';                     //SMTP username
    $mail->Password   = 'SphcbH119';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('umershafiq119@gmail.com', 'Umer Shafiq');
    $mail->addAddress($customer_email);     //Add a recipient

	
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Rest Link From TimeZone';
    $mail->Body    = "We got a request from you to reset your password <br> Click the link below: <br>
	 <a href='/home4/lmstimec/public_html/bol/update-password.php?customer_email=$customer_email&reset_token=$reset_token'>Reset Password </a>";

    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}

}



if(isset($_POST["send-reset-link"])){
}
?>







<?php 
if(isset($_POST["send-reset-link"])){
$customer_email = $_POST["customer_email"];
$sql=" SELECT * from customers where customer_email = '$customer_email'";
$result=mysqli_query($conn,$sql);
if($result){
if(mysqli_num_rows($result) == 1){
 /* Email Found */
 $reset_token = bin2hex(random_bytes(16));
 date_default_timezone_set('Asia/Karachi');
 $date=date("Y-m-d");
 $sql = "UPDATE customers set reset_token='".$reset_token."',reset_token_date='".$date."' WHERE customer_email= '$customer_email'";
 if(mysqli_query($conn,$sql) && sendMail($_POST["customer_email"] , $reset_token) ){
			echo" 
			<script>
			alert('Mail Sent To Your Email');
			window.location.href='customer-login.php';
			</script>";
}
 else{
			 	echo" 
			<script>
			alert('Try Again Later');
			window.location.href='customer-login.php';
			</script>";}


 }
 else{
echo" 
<script>
alert('Email Not Found');
window.location.href='customer-login.php';
</script>";}

}else{
echo"
<script>
alert('Cannot Run Query');
window.location.href='customer-login.php';
</script>
";} 
}

?>

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                    <a class="text-center" href="customer-login.php"> <h4>REGISTER YOURSELF</h4></a>
        
                                <form action="" method="POST" class="mt-5 mb-5 login-input">
                                    
									
                                    <div class="form-group">
                                        <input name="customer_email" id="customer_email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    
                                    <input type="submit" class="btn login-form__btn submit w-100" id="send-reset-link" name="send-reset-link" value="Send link" >
                                </form>
                                    <p class="mt-5 login-form__footer">Have account <a href="customer-login.php" class="text-primary">Login In </a> now</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

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





