<?php
	include_once '../header.php';
	include '../classes/allclass.class.php';
	$search = new UserView;
	
	if (isset($_POST['btnsearch'])) {
		if (!empty($_POST['searchthis'])) {
			$search->searchItem($_POST['searchthis']);
			
		}else{
			echo "way sud";
		}
		
	}else{
		echo "you did not search";
	}
	include_once '../footer.php';

?>