<?php include('header.php'); ?>
<div class="row">
	<!-- Blog Column -->
	<div class="col-md-8">
		<h1>Artikel Terbaru</h1>
		<hr>
		<?php
		$sql   = "SELECT A.article_id,A.article_title,A.article_content,A.article_datetime,A.article_pict,C.cat_name,U.user_fullname FROM tb_article A,tb_category C, tb_user U WHERE C.cat_id = A.article_cat_id AND U.user_id = A.article_user_id AND A.article_publish = 'Y' ORDER BY A.article_id DESC LIMIT 3";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));

		while($data=mysqli_fetch_array($query)) {
		?>
		<h2><a href="article_detail?id=<?php echo $data['article_id']; ?>"><?php echo $data['article_title']; ?></a></h2>
		<p class="lead">Oleh <?php echo $data['user_fullname']; ?></p>
		<p><span class="glyphicon glyphicon-time"></span> Diposting pada <?php echo tgl_indo($data['article_datetime']); ?></p>
		<hr>
		<img class="img-responsive" src="upload/<?php echo $data['article_pict']; ?>" alt="">
		<hr>
		<p><?php echo substr($data['article_content'],0,500); ?> ... </p>
		<a href="article_detail.php?id=<?php echo $data['article_id']; ?>" class="btn btn-primary">Selengkapnya <span class="glyphicon glyphicon-chevron-right"></span></a>
		<hr>
		<?php } ?>
		<h1>Galeri Foto</h1>
		<hr>
		<?php
			$sql_gal = "SELECT * FROM tb_gallery ORDER BY gallery_id DESC";
			$query_gal = mysqli_query($con,$sql_gal) or die(mysqli_error($con));

			while($data_gal = mysqli_fetch_array($query_gal))
			{
		?>
		<div class="col-lg-3 col-md-4 col-sm-6">
			<a href="#" data-toggle="modal" data-target="#ModalGallery-<?php echo $data_gal['gallery_id']; ?>">
				<img class="img-thumbnail" src="upload/gallery/<?php echo $data_gal['gallery_name'] ?>" alt="" style="width:150px;">	
			</a>
		</div>

		<div class="modal fade" tabindex="-1" role="dialog" id="ModalGallery-<?php echo $data_gal['gallery_id']; ?>">
		 <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title"><?php echo $data_gal['gallery_desc'] ?></h4>
		      </div>
		      <div class="modal-body">
		      	<img class="img-responsive" src="upload/gallery/<?php echo $data_gal['gallery_name'] ?>" alt="">  
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<?php
			}
		?>
	</div> <!-- End Blog Column -->

	<?php include('sidebar.php'); ?>
</div> <!-- /.row -->
<hr>
<?php include('footer.php'); ?>