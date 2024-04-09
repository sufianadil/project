<?php
session_start();
ob_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Classimax</title>
  
  
  <link rel="stylesheet" href="assets/css/flaticon.css">
  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link href="plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">

  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>



<body class="body-wrapper">

<style>
.navbar-toggler {
    background-color: currentcolor !important;
    padding: 0.25rem 0.75rem;
    font-size: 1.25rem;
    line-height: 1;
    /* background: 0 0; */
    border: 1px solid transparent;
    border-radius: 0.25rem;
}
</style>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg  navigation">
					<a class="navbar-brand" href="index.php">
						<img src="images/bol1.png" width="150" height="55" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dashboard.php">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="category.php">Category</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="feedback.php">Feedback</a>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<?php if(isset($_SESSION["customer-login"])){ ?>
							<li class="nav-item">
								<a target="_blank" class="nav-link login-button" href="customer-logout.php">Log Out</a>
							</li>
							<?php }else{ ?>
							<li class="nav-item">
								<a target="_blank" class="nav-link login-button" href="customer-login.php">Login</a>
							</li>
							<?php } ?>
							<li class="nav-item">
								<a class="nav-link login-button" href="admin/login-new.php">Admin Login</a>
							</li>
							<?php if(isset($_SESSION["customer-login"])){ ?>
							<li class="nav-item">
								<a class="nav-link add-button" href="list.php"><i class="fa fa-plus-circle"></i> Add Listing</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>  
