<?php
	spl_autoload_register('autoloadClass');
	
	function autoloadClass($classname)
	{

		$pathMain = 'classes/'.$classname.'.class.php';
		$pathAction = '../classes/'.$classname.'.class.php';
		if (file_exists($pathAction)) {
			
			require $pathAction;
		}elseif(file_exists($pathMain)){
			require $pathMain;
		}else{

			echo "Faided";
		}
		
	}


?>