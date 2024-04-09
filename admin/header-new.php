<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Layout &rsaquo; Top Navigation &mdash; CodiePie</title>


<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="stylesheet" href="assets/css/components.min.css">
</head>

<body class="layout-3">

<div id="app"> 
    <div class="main-wrapper container"> 
        <div class="navbar-bg"></div>
 
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="container">
                <a href="welcome-new.php" class="navbar-brand sidebar-gone-hide">HOME PAGE</a>
				<a href="welcome-new.php" class="navbar-brand sidebar-gone-hide">WELCOME TO MY BOL ADMIN PANEL</a>
				<a href="log-out-new.php" class="navbar-brand sidebar-gone-hide">LOG OUT</a>
                                                                
            </div>
        </nav>
		<nav class="navbar navbar-secondary navbar-expand-lg">
            <div class="container">                
				<ul class="navbar-nav">
				
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>CATEGORIES</span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="category-new.php" class="nav-link">ADD CATEGORY</a></li>
                            <li class="nav-item"><a href="cat-display-new.php" class="nav-link">CATEGORY DISPLAY</a></li>
                        </ul>
                    </li>
					<li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>SUB-CATEGORIES</span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="sub-category-new.php" class="nav-link">ADD SUB-CATEGORY</a></li>
                            <li class="nav-item"><a href="sub-cat-display-new.php" class="nav-link">SUB-CATEGORY DISPLAY</a></li>
                        </ul>
                    </li>					
					    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>ADD ADMIN</span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="add-admin-new.php" class="nav-link">ADD ADMIN PAGE</a></li>
                            <li class="nav-item"><a href="admin-display-new.php" class="nav-link">ADMIN DSIPLAY</a></li>
                        </ul>
                    </li>					    					                    
                </ul>
            </div>
        </nav>