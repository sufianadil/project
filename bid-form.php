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
    <title>Customer-Register</title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/style1.css" rel="stylesheet">
    
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


    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
<?php
$new = $_REQUEST["probid"];
?>
                                    <a class="text-center" href="customer-login.php"> <h4>REGISTER YOURSELF</h4></a>
        
                                <form action="single.php?prodid=<?php echo $new ?>" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input name="bid-date" type="date" class="form-control" required> 
                                    </div>
									<div class="form-group">
                                        <input name="hour" type="number" class="form-control" placeholder="Hours" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="minute" type="number" class="form-control"  placeholder="Minutes" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="second" type="numbers" class="form-control" placeholder="Seconds" required>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" id="submit" name="submit" type="submit">Submit</button>
                                </form>
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
    <script src="plugins1/common/common.min.js"></script>
    <script src="js1/custom.min.js"></script>
    <script src="js1/settings.js"></script>
    <script src="js1/gleek.js"></script>
    <script src="js1/styleSwitcher.js"></script>
</body>
</html>




