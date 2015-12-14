<?php
if(isset($_POST['btn-submit']))
{
	// upload picture process
	$file_max       = 1000000; // file max 10MB
	$file_allow_ext = array('jpg','png','gif','jpeg'); // allowed types of files
	$file_folder    = '../upload/'; // destination folder

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
					$file_article = strtolower($_POST['article_title']);
					$newName      = str_replace(' ', '-', $file_article).'.'.$file_ext;

					unlink($file_folder.$_POST['pict']); // menghapus gambar sebelumnya

					if(move_uploaded_file($file['tmp_name'], $file_folder.$newName))
					{
						$article_id       = $_POST['article_id'];
						$article_title    = htmlentities($_POST['article_title']);
						$article_content  = $_POST['article_content'];
						$article_datetime = date('Y-m-d H:i:s');
						$article_pict     = $newName;
						$article_cat_id   = htmlentities($_POST['article_cat_id']);
						$article_user_id  = $_SESSION['user_id'];
						$article_publish  = 'Y';

						$sql   = "UPDATE tb_article SET article_title = '$article_title', article_content = '$article_content', article_datetime = '$article_datetime', article_pict = '$article_pict', article_cat_id = '$article_cat_id', article_user_id = '$article_user_id', article_publish = '$article_publish' WHERE article_id = $article_id";
						$query = mysqli_query($con,$sql) or die(mysqli_error($con));

						if($query) {
							$_SESSION['msg_art'] = '<div class="alert alert-success">Berhasil mengubah artikel !</div>';
							header('location:?mod=article&act=view');
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
		$article_id       = $_POST['article_id'];
		$article_title    = htmlentities($_POST['article_title']);
		$article_content  = $_POST['article_content'];
		$article_datetime = date('Y-m-d H:i:s');
		$article_cat_id   = htmlentities($_POST['article_cat_id']);
		$article_user_id  = $_SESSION['user_id'];
		$article_publish  = 'Y';

		$sql   = "UPDATE tb_article SET article_title = '$article_title', article_content = '$article_content', article_datetime = '$article_datetime', article_cat_id = '$article_cat_id', article_user_id = '$article_user_id', article_publish = '$article_publish' WHERE article_id = $article_id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));

		if($query) {
			$_SESSION['msg_art'] = '<div class="alert alert-success">Berhasil mengubah artikel !</div>';
			header('location:?mod=article&act=view');
		}
	}
}
?>
<script type="text/javascript" src="../assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Ubah Artikel</h2>

	<?php echo (isset($alert)) ? $alert : ''; ?>
	
	<?php
		$id  = $_GET['id'];
		$sql = "SELECT * FROM tb_article WHERE article_id = $id";
		$query = mysqli_query($con,$sql) or die(mysqli_error($con));
		$data = mysqli_fetch_array($query);
	?>

	<form class="form-horizontal" action="" method="post" name="" enctype="multipart/form-data">
		<div class="form-group">
			<input id="article_title" type="text" name="article_title" class="form-control input-lg" placeholder="Judul" value="<?php echo $data['article_title']; ?>">
		</div>
		<div class="form-group">
			 <textarea name="article_content" style="width:100%;height:250px"><?php echo $data['article_content']; ?></textarea>
		</div>
		<div class="form-group">
			 <select name="article_cat_id" class="form-control">
			 	<option value="">- Kategori -</option>
			 	<?php
			 		$sql_cat = "SELECT * FROM tb_category ORDER BY cat_id DESC";
			 		$query_cat = mysqli_query($con,$sql_cat) or die(mysqli_error($con));

			 		while($cat = mysqli_fetch_array($query_cat)) {
			 			$selected = ($data['article_cat_id'] == $cat['cat_id']) ? 'selected="selected"' : '';
			 	?>
			 		<option value="<?php echo $cat['cat_id']; ?>" <?php echo $selected ?>><?php echo $cat['cat_name']; ?></option>
			 	<?php } ?>
			 </select>
		</div>
		<div class="form-group">
			<img src="../upload/<?php echo $data['article_pict']; ?>" style="width:50%;height:50%">
		</div>
		<div class="form-group">
			<input type="hidden" name="pict" value="<?php echo $data['article_pict']; ?>">
			<input type="file" name="file">
			<p class="help-block">Upload Gambar dengan ukuran 900x300.</p>
		</div>
		<div class="form-group">
			<input type="hidden" name="article_id" value="<?php echo $data['article_id']; ?>">
			<button type="submit" class="btn btn-primary" name="btn-submit">Ubah</button>
			<button type="button" class="btn btn-default" onclick="return confirm('Yakin batal?') ? window.history.go(-1) : '';">Batal</button>
		</div>
	</form>
</div>