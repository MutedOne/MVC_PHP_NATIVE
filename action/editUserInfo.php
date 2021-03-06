<?php 

	include '../classes/allclass.class.php';

	$updateData = new UserController;
	
	if(isset($_POST['btnUpdate'])){
		$arr = $_FILES['editProfile'];
		
		//echo $_POST['editID'];
		if (isset($_POST['editDefault'])) {
			$updateData->setUpdateLogin($_POST['editName'],$_POST['editEmail'],$_POST['editOldPass'],$_POST['editID'],$arr,$_POST['editDefault'],$_POST['editPass']);
			$updateData-> getDeleteImg($_POST['editID']);

			
		}else{
			$updateData->setUpdateLogin($_POST['editName'],$_POST['editEmail'],$_POST['editPass'],$_POST['editID'],$arr,'off',$_POST['editPass']);
		
		}

		
		header("Location:../home.php");
		//echo "string";
		
	}else{
		echo "ERror update";
	}
	

?>