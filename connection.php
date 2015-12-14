<?php
session_start();

date_default_timezone_set('Asia/Makassar');

$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'betech_blog';

$con = mysqli_connect($host,$user,$pass,$name) or die('Koneksi ke server gagal ! '. mysqli_connect_error());

require_once 'function.php';
?>
