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

	if($file['error'] == 0) // jika tidak ada error
	{
		if(in_array($file_ext, $file_allow_ext)) // jika file ekstensi diperbolekan
		{
			if($file_size <= $file_max) // jika size file diperbolehkan
			{
				if(move_uploaded_file($file['tmp_name'], $file_folder.$file_name))
				{
					$gallery_desc = $_POST['gallery_desc'];
					$gallery_pict = $file_name;

					$sql   = "INSERT INTO tb_gallery VALUES ('','$gallery_pict','$gallery_desc')";
					$query = mysqli_query($con,$sql) or die(mysqli_error($con));

					if($query) {
						$_SESSION['msg_gal'] = '<div class="alert alert-success">Berhasil menambah gambar !</div>';
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
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Tambah Galleri</h2>

	<?php echo (isset($alert)) ? $alert : ''; ?>

	<form class="form-horizontal" action="" method="post" name="" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" name="gallery_desc" class="form-control" placeholder="Deskripsi Gambar">
		</div>
		<div class="form-group">
			 <input type="file" name="file">
			 <p class="help-block">Upload Gambar</p>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" name="btn-submit">Tambah</button>
			<button type="button" class="btn btn-default" onclick="return confirm('Yakin batal?') ? window.history.go(-1) : '';">Batal</button>
		</div>
	</form>

</div>