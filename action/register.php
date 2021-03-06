<?php
	
	include '../classes/allclass.class.php';
	session_start();
	$try = new UserController;
	$try->setregister($_POST['registerName'],$_POST['registerEmail'],$_POST['registerPass']);
	header("Location:../index.php");
	
	
?>