<?php include('header.php'); ?>
<div class="row">
	<div class="col-md-8">
		<?php
			// pagination
			$page = 1;
			if(isset($_GET['page']) && !empty($_GET['page'])) {
				$page = (int)$_GET['page'];
			}

			$dataPerPage = 2;
			if(isset($_GET['perPage']) && !empty($_GET['perPage'])) {
				$dataPerPage = (int)$_GET['perPage'];
			}

			$startRow  = ($page - 1) * $dataPerPage;

			$sql   = "SELECT A.article_id,A.article_title,A.article_content,A.article_datetime,A.article_pict,C.cat_name,U.user_fullname FROM tb_article A,tb_category C, tb_user U WHERE C.cat_id = A.article_cat_id AND U.user_id = A.article_user_id AND A.article_publish = 'Y' ORDER BY A.article_id DESC LIMIT $startRow,$dataPerPage";
			$query = mysqli_query($con,$sql) or die(mysqli_error($con));

			while($data=mysqli_fetch_array($query)) {
		?>
		<h2><a href="article_detail?id=<?php echo $data['article_id']; ?>"><?php echo $data['article_title']; ?></a></h2>
		<p class="lead">Oleh <?php echo $data['user_fullname']; ?></p>
		<p><span class="glyphicon glyphicon-time"></span> Diposting pada <?php echo tgl_indo($data['article_datetime']); ?></p>
		<hr>
		<img class="img-responsive" src="upload/<?php echo $data['article_pict']; ?>" alt="">
		<hr>
		<p><?php echo substr($data['article_content'],0,500); ?> ... </p>
		<a href="article_detail.php?id=<?php echo $data['article_id']; ?>" class="btn btn-primary">Selengkapnya <span class="glyphicon glyphicon-chevron-right"></span></a>
		<hr>
		<?php } ?>
		<!-- Pager -->
		<?php
			$sql           = "SELECT COUNT(*) AS total FROM tb_article";
			$countTotalRow = mysqli_query($con,$sql) or die(mysqli_error($con));
			$queryResult   = mysqli_fetch_array($countTotalRow);
			$totalRow      = $queryResult['total'];

			$totalPage = ceil($totalRow/$dataPerPage);

			$page = 1;

			echo '<ul class="pagination">';
			while($page <= $totalPage)
			{
				if(empty($_GET['page']))
				{
					$_GET['page'] = 1;
				}
				
				$activePage = ($_GET['page'] == $page) ? 'class="active"' : '';	
				
				echo '<li '.$activePage.'><a href="?page='.$page.'&perPage='.$dataPerPage.'">'.$page.'</a></li>';
		        $page++;
			}
			echo '</ul>';
		?>
	</div>
	<?php include('sidebar.php'); ?>
</div>
<?php include('footer.php'); ?>