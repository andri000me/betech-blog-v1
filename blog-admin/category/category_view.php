<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Data Kategori</h2>
	
	<?php echo (isset($_SESSION['msg_cat'])) ? $_SESSION['msg_cat'] : ''; ?>
	<?php unset($_SESSION['msg_cat']); ?>

	<a href="#" data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign icon-white"></i> Tambah</a>
	<br><br>

	<!-- Start Add Modal -->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Kategori</h4>
				</div>
				<div class="modal-body">
					<form action="?mod=category&act=add" method="post" name="">
						<div class="form-group">
							<input id="cat_name" type="text" name="cat_name" class="form-control" placeholder="Kategori">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary" name="btn-submit">Tambah</button>
					</form>
				</div>
			</div>
		</div>		
	</div>
	<!-- End Add Modal -->
	<?php
		$sql   = "SELECT * FROM tb_category ORDER BY cat_id DESC";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
	?>
	<div class="table-responsive">
		<table class="table table-hovered">
			<thead>
				<tr>
					<th>#</th>
					<th>Kategori</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while($data = mysqli_fetch_array($query)) {
			?>
				<tr>
					<td class="col-md-2 col-sm-2">
						<a href="#" data-toggle="modal" data-target="#editModal-<?php echo $data['cat_id']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
						<a href="?mod=category&act=delete&id=<?php echo $data['cat_id']; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
					<td><?php echo $data['cat_name']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
	
	<?php
		$sql_edit   = "SELECT * FROM tb_category";
		$query_edit = mysqli_query($con,$sql_edit) or die(mysqli_error($con));
	?>
	<!-- Start Edit Modal -->
	<?php while($dataEdit = mysqli_fetch_array($query_edit)) { ?>
	<div class="modal fade" id="editModal-<?php echo $dataEdit['cat_id']; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Kategori</h4>
				</div>
				<div class="modal-body">
					<form action="?mod=category&act=edit&id=<?php echo $dataEdit['cat_id']; ?>" method="post" name="">
						<div class="form-group">
							<input id="cat_name" type="text" name="cat_name" class="form-control" value="<?php echo $dataEdit['cat_name']; ?>">
						</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="cat_id" value="<?php echo $dataEdit['cat_id']; ?>">
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary" name="btn-submit">Edit</button>
					</form>
				</div>
			</div>
		</div>		
	</div>
	<?php } ?>
	<!-- End Edit Modal -->
</div>