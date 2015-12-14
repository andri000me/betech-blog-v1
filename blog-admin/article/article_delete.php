<?php 
require '../connection.php';
$id = $_GET['id'];

// menghapus gambar artikel
$sql_pict = "SELECT article_pict FROM tb_article WHERE article_id =$id";
$query_pict = mysqli_query($con,$sql_pict) or die(mysqli_error($con));

$data = mysqli_fetch_array($query_pict);

unlink('../upload/'.$data['article_pict']);

// menghapus data artikel
$sql   = "DELETE FROM tb_article WHERE article_id = $id";
$query = mysqli_query($con,$sql) or die(mysqli_error($con));

$_SESSION['msg_art'] = '<div class="alert alert-success">Berhasil menghapus artikel !</div>';
header('location:?mod=article&act=view');
?>