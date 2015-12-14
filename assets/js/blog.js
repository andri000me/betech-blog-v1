jQuery(document).ready(function() {
	$('#addModal').on('shown.bs.modal', function () {
  		$('#cat_name').focus();
  		$('#article_title').focus();
	})
});