<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Data Artikel</h2>

	<?php echo (isset($_SESSION['msg_art'])) ? $_SESSION['msg_art'] : ''; ?>
	<?php unset($_SESSION['msg_art']); ?>
	
	<a href="?mod=article&act=add" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign icon-white"></i> Tambah</a>
	<br><br>

	<?php
		$sql   = "SELECT A.article_id,A.article_title,A.article_datetime,C.cat_name,U.user_fullname FROM tb_article A,tb_category C, tb_user U WHERE C.cat_id = A.article_cat_id AND U.user_id = A.article_user_id ORDER BY A.article_id DESC";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
	?>

	<div class="table-responsive">
		<table class="table table-hovered">
			<thead>
				<tr>
					<th>#</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Kategori</th>
					<th>Penulis</th>
				</tr>
			</thead>
			<tbody>
			<?php while($data = mysqli_fetch_array($query)) { ?>
				<tr>
					<td>
						<a href="?mod=article&act=edit&id=<?php echo $data['article_id']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
						<a href="?mod=article&act=delete&id=<?php echo $data['article_id']; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
					<td><?php echo $data['article_title']; ?></td>
					<td><?php echo tgl_indo($data['article_datetime'],'tgl'); ?></td>
					<td><?php echo $data['cat_name']; ?></td>
					<td><?php echo $data['user_fullname']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>