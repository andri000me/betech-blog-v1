<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Data User</h2>

	<?php echo (isset($_SESSION['msg_usr'])) ? $_SESSION['msg_usr'] : ''; ?>
	<?php unset($_SESSION['msg_usr']); ?>

	<a href="?mod=user&act=add" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign icon-white"></i> Tambah</a>
	<br><br>
	
	<?php
		$sql   = "SELECT * FROM tb_user ORDER BY user_id DESC";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
	?>

	<div class="table-responsive">
		<table class="table table-hovered">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Username</th>
				</tr>
			</thead>
			<tbody>
			<?php while($data = mysqli_fetch_array($query)) { ?>
				<tr>
					<td class="col-md-2 col-sm-2">
						<a href="?mod=user&act=edit&id=<?php echo $data['user_id']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
						<a href="?mod=user&act=delete&id=<?php echo $data['user_id']; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
					<td><?php echo $data['user_fullname']; ?></td>
					<td><?php echo $data['user_name']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

</div>