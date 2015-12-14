<?php include('header.php'); ?>
<div class="row">
	<div class="col-md-8">
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
		<?php } ?>
	</div>
	<?php include('sidebar.php'); ?>
</div>
<?php include('footer.php'); ?>