<?php

	include '../classes/allclass.class.php';
	session_start();
	$login = new UserController;
	$login->getLogin($_POST['loginEmail'],$_POST['loginPass']);
	
	
?>