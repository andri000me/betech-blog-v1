<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Data Gallery</h2>

	<?php echo (isset($_SESSION['msg_gal'])) ? $_SESSION['msg_gal'] : ''; ?>
	<?php unset($_SESSION['msg_gal']); ?>

	<a href="?mod=gallery&act=add" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign icon-white"></i> Tambah</a>
	<br><br>
	
	<?php
		$sql   = "SELECT * FROM tb_gallery ORDER BY gallery_id DESC";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
	?>

	<div class="table-responsive">
		<table class="table table-hovered">
			<thead>
				<tr>
					<th>#</th>
					<th>Deskripsi</th>
					<th>Gambar</th>
				</tr>
			</thead>
			<tbody>
			<?php while($data = mysqli_fetch_array($query)) { ?>
				<tr>
					<td class="col-md-2 col-sm-2">
						<a href="?mod=gallery&act=edit&id=<?php echo $data['gallery_id']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
						<a href="?mod=gallery&act=delete&id=<?php echo $data['gallery_id']; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
					<td class="col-md-4 col-sm-4"><?php echo $data['gallery_desc'] ?></td>
					<td><img src="../upload/gallery/<?php echo $data['gallery_name']; ?>" alt="" style="width:50%;height:50"></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

</div>