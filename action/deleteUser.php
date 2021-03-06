<?php

	include '../classes/allclass.class.php';
	if (isset($_POST['btnDeleteData'])) {
		$deleteData = new UserController;
		$deleteData->setDeleteLogin($_POST['deleteID']);
	}else{
		echo "Failed delete user";
	}
	
?>