<?php

function is_login() {
	$status = $_SESSION['user_login'];

	if(isset($status) && !empty($status)) {
		($status == 'true') ? '' : header('location:logout.php');
	} else {
		header('location:logout.php');
	}
}

function cek_login() {

	if(isset($_SESSION['user_login'])) {
		($_SESSION['user_login'] == 'true') ? header('location:dashboard.php') : '';	
	}
}

function tgl_indo($var,$status = '')
{
	$pecah = explode(' ', $var);

	$jam   = $pecah[1];

	$pecah_tgl = explode('-', $pecah[0]);
	$hari      = $pecah_tgl[2];
	$bln       = $pecah_tgl[1];
	$tahun     = $pecah_tgl[0];

	switch ($bln)
	{
		case '01':
			$bulan = 'Januari';
			break;
		case '02':
			$bulan = 'Februari';
			break;
		case '03':
			$bulan = 'Maret';
			break;
		case '04':
			$bulan = 'April';
			break;
		case '05':
			$bulan = 'Mei';
			break;
		case '06':
			$bulan = 'Juni';
			break;
		case '07':
			$bulan = 'Juli';
			break;
		case '08':
			$bulan = 'Agustus';
			break;
		case '09':
			$bulan = 'September';
			break;
		case '10':
			$bulan = 'Oktober';
			break;
		case '11':
			$bulan = 'November';
			break;
		case '12':
			$bulan = 'Desember';
			break;
	}

	if($status == 'tgl')
		return $hari.' '.$bulan.' '.$tahun;
	if($status == 'wkt')
		return $jam;
	if($status == '')
		return $hari.' '.$bulan.' '.$tahun.' - '.$jam;
}

function waktu($var)
{
	$pecah = explode(' ', $var);
	$jam   = $pecah[1];

	return $jam;
}

?>