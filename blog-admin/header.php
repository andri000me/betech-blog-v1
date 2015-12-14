<?php
require '../connection.php';
is_login(); 
$mod = (isset($_GET['mod'])) ? $_GET['mod'] : '';
$act = (isset($_GET['act'])) ? $_GET['act'] : '';

switch ($mod) {
  case 'article':
    $title = 'Artikel';
    break;
  case 'category':
    $title = 'Kategori';
    break;
  default:
    $title = 'Dashboard';
    break;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!-- File CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
	
	<!-- Custom Style -->
	<link rel="stylesheet" href="../assets/css/dashboard.css">

	<title>Halaman Dashboard - <?php echo $title ?></title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
  	<div class="container-fluid">
  		<div class="navbar-header">
  			<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
  			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
  				<span class="sr-only">Toggle navigation</span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  			</button>
  			<a href="dashboard.php" class="navbar-brand">Frey's Blog</a>
  		</div>
  		<div id="navbar" class="navbar-collapse collapse">
  			<!-- Menu Navbar -->
  			<ul class="nav navbar-nav navbar-right">
  				<li class="dropdown">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $_SESSION['user_fullname']; ?> <span class="caret"></span></a>
  					<ul class="dropdown-menu">
  						<li><a href="">Profile</a></li>
  						<li><a href="logout.php">Keluar</a></li>
  					</ul>
  				</li>
  			</ul>
  		</div>
  	</div>
  </nav>

  <!-- Main Content -->
  <?php include 'sidebar.php'; ?>