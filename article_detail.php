<?php include('header.php'); ?>
<div class="row">
	<!-- Blog Column -->
	<div class="col-md-8">
		<?php
		$id    = $_GET['id'];
		$sql   = "SELECT A.article_id,A.article_title,A.article_content,A.article_datetime,A.article_pict,C.cat_name,U.user_fullname FROM tb_article A,tb_category C, tb_user U WHERE C.cat_id = A.article_cat_id AND U.user_id = A.article_user_id AND A.article_publish = 'Y' AND A.article_id = $id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
		$data=mysqli_fetch_array($query)
		?>
		<h2><a href="article_detail?id=<?php echo $data['article_id']; ?>"><?php echo $data['article_title']; ?></a></h2>
		<p class="lead">Oleh <?php echo $data['user_fullname']; ?></p>
		<p><span class="glyphicon glyphicon-time"></span> Diposting pada <?php echo tgl_indo($data['article_datetime']); ?></p>
		<hr>
		<img class="img-responsive" src="upload/<?php echo $data['article_pict']; ?>" alt="">
		<hr>
		<p><?php echo $data['article_content']; ?></p>
		<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
		<hr>
	</div> <!-- End Blog Column -->

	<?php include('sidebar.php'); ?>
</div> <!-- /.row -->
<?php include('footer.php'); ?>