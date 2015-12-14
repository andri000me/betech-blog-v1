<?php 
require '../connection.php';
$id = $_GET['id'];

// menghapus gambar artikel
$sql_pict = "SELECT gallery_name FROM tb_gallery WHERE gallery_id =$id";
$query_pict = mysqli_query($con,$sql_pict) or die(mysqli_error($con));

$data = mysqli_fetch_array($query_pict);

unlink('../upload/gallery/'.$data['gallery_name']);

// menghapus data artikel
$sql   = "DELETE FROM tb_gallery WHERE gallery_id = $id";
$query = mysqli_query($con,$sql) or die(mysqli_error($con));

$_SESSION['msg_art'] = '<div class="alert alert-success">Berhasil menghapus gambar !</div>';
header('location:?mod=gallery&act=view');
?>