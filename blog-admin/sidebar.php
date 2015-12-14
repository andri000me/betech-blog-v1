<?php
$dash = (empty($mod)) ? 'class="active"' : '';
$art  = ($mod=='article') ? 'class="active"' : '';
$cat  = ($mod=='category') ? 'class="active"' : '';
$gal  = ($mod=='gallery') ? 'class="active"' : '';
$usr  = ($mod=='user') ? 'class="active"' : '';
?>	
	<div class="container-fluid">
		<div class="row">
			<!-- Side Bar -->
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li <?php echo $dash; ?>><a href="dashboard.php">Dashboard</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li <?php echo $art; ?>><a href="?mod=article&act=view">Artikel</a></li>
					<li <?php echo $cat; ?>><a href="?mod=category&act=view">Kategori</a></li>
					<li <?php echo $gal; ?>><a href="?mod=gallery&act=view">Galeri</a></li>
					<li <?php echo $usr; ?>><a href="?mod=user&act=view">Pengguna</a></li>
				</ul>
			</div>
