<?php
include 'header.php';

if(empty($mod) && empty($act))
{
	$page = 'welcome.php';
}
elseif($mod=='article')
{
	$folder = 'article/';

	switch ($act) {
		case 'view':
			$page = $folder.'article_view.php';
			break;
		case 'add':
			$page = $folder.'article_add.php';
			break;
		case 'edit':
			$page = $folder.'article_edit.php';
			break;
		case 'delete':
			$page = $folder.'article_delete.php';
			break;
	}
}
elseif($mod=='category')
{
	$folder = 'category/';

	switch ($act) {
		case 'view':
			$page = $folder.'category_view.php';
			break;
		case 'add':
			$page = $folder.'category_add.php';
			break;
		case 'edit':
			$page = $folder.'category_edit.php';
			break;
		case 'delete':
			$page = $folder.'category_delete.php';
			break;
	}
}
elseif($mod=='gallery')
{
	$folder = 'gallery/';

	switch ($act) {
		case 'view':
			$page = $folder.'gallery_view.php';
			break;
		case 'add':
			$page = $folder.'gallery_add.php';
			break;
		case 'edit':
			$page = $folder.'gallery_edit.php';
			break;
		case 'delete':
			$page = $folder.'gallery_delete.php';
			break;
	}
}
elseif($mod=='user')
{
	$folder = 'user/';

	switch ($act) {
		case 'view':
			$page = $folder.'user_view.php';
			break;
		case 'add':
			$page = $folder.'user_add.php';
			break;
		case 'edit':
			$page = $folder.'user_edit.php';
			break;
		case 'delete':
			$page = $folder.'user_delete.php';
			break;
	}
}

include $page;
include 'footer.php';
?>
