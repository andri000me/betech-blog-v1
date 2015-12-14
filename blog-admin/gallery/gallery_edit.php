<?php
if(isset($_POST['btn-submit']))
{
	// upload picture process
	$file_max       = 1000000;
	$file_allow_ext = array('jpg','png','gif','jpeg'); // allowed types of files
	$file_folder    = '../upload/gallery/'; // destination folder

	$file      = $_FILES['file'];
	$filename  = explode('.', $file['name']);

	$file_name = $file['name'];
	$file_ext  = $filename[count($filename)-1];
	$file_size = $file['size'];
	$file_type = $file['type'];

	if($file['name'] != '') // jika ada perubahan gambar
	{
		if($file['error'] == 0) // jika tidak ada error
		{
			if(in_array($file_ext, $file_allow_ext)) // jika file ekstensi diperbolekan
			{
				if($file_size <= $file_max) // jika size file diperbolehkan
				{
					unlink($file_folder.$_POST['pict']); // menghapus gambar sebelumnya

					if(move_uploaded_file($file['tmp_name'], $file_folder.$file_name))
					{
						$gallery_id   = $_POST['gallery_id'];
						$gallery_desc = $_POST['gallery_desc'];
						$gallery_name = $file_name;

						$sql = "UPDATE tb_gallery SET gallery_name = '$gallery_name', gallery_desc = '$gallery_desc' WHERE gallery_id=$gallery_id";
						$query = mysqli_query($con,$sql) or die(mysqli_error($con));

						if($query) {
							$_SESSION['msg_gal'] = '<div class="alert alert-success">Berhasil mengubah gambar !</div>';
							header('location:?mod=gallery&act=view');
						}
					}
					else
					{
						$alert = '<div class="alert alert-danger">Error ! - Gambar tidak terupload.</div>';
					}
				}
				else
				{
					$alert = '<div class="alert alert-danger">Error ! - Ukuran gambar terlalu besar.</div>';
				}
			}
			else
			{
				$alert = '<div class="alert alert-danger">Error ! - Ekstensi file tidak diperbolehkan.</div>';
			}
		}
	}
	elseif($file['name'] == '')
	{
		$gallery_id   = $_POST['gallery_id'];
		$gallery_desc = $_POST['gallery_desc'];
		$gallery_name = $file_name;

		$sql = "UPDATE tb_gallery SET gallery_desc = '$gallery_desc' WHERE gallery_id = $gallery_id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));

		if($query) {
			$_SESSION['msg_gal'] = '<div class="alert alert-success">Berhasil mengubah gambar !</div>';
			header('location:?mod=gallery&act=view');
		}
	}
}
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Ubah Galleri</h2>

	<?php echo (isset($alert)) ? $alert : ''; ?>

	<?php
		$id  = $_GET['id'];
		$sql = "SELECT * FROM tb_gallery WHERE gallery_id = $id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
		$data = mysqli_fetch_array($query);
	?>

	<form class="form-horizontal" action="" method="post" name="" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" name="gallery_desc" class="form-control" placeholder="Deskripsi Gambar" value="<?php echo $data['gallery_desc']; ?>">
		</div>
		<div class="form-group">
			<img src="../upload/gallery/<?php echo $data['gallery_name']; ?>" style="width:50%;height:50%">
		</div>
		<div class="form-group">
			<input type="hidden" name="pict" value="<?php echo $data['gallery_name']; ?>">
			<input type="file" name="file">
			<p class="help-block">Upload Gambar</p>
		</div>
		<div class="form-group">
			<input type="hidden" name="gallery_id" value="<?php echo $data['gallery_id']; ?>">
			<button type="submit" class="btn btn-primary" name="btn-submit">Ubah</button>
			<button type="button" class="btn btn-default" onclick="return confirm('Yakin batal?') ? window.history.go(-1) : '';">Batal</button>
		</div>
	</form>

</div>