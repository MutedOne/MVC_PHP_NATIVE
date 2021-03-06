<?php

	/**
	 * 
	 */
	class UserController extends UserModel
	{
		
		public function setregister($registerName,$registerEmail,$registerPass)
		{	
			
			$result = $this->register($registerName,$registerEmail,$registerPass);
			//header("Location:../index.php");
		}

		public function getLogin($loginEmail,$loginPass)
		{

			$result = $this->login($loginEmail,$loginPass);
			
			if($result >0){
				echo "Has user";
				session_start();
				foreach ($result as $val ) {
					$_SESSION['nameuser'] =$val['name'];
				}
					header("Location:../home.php");
			}else{
				echo "No user";
			}
		}

		public function setUpdateLogin($updateName,$updateEmail,$updateOldPass,$updateId,$arr,$updatedCheck,$updatedNewPass)
		{
			echo $updatedCheck;
			if (empty($arr['name']) == 0) {
				$filename = $arr['name'];
				
				$filetype = $arr['type'];
				$filetemp = $arr['tmp_name'];
				$fileerror = $arr['error'];
				$filesize = $arr['size'];

				$extension = end(explode('/', $filetype));
				$arrExtension = array($extension);
					
				$allowed = array('png','jpg','jpeg');
				if (array_intersect($arrExtension,$allowed)) {
					echo "This intersection";
					if ($fileerror === 0 ) {
						if ($filesize < 10000000) {
							$UploadedImg = 'UploadedImg';
							move_uploaded_file($filetemp, '../profileImg/'.$updateId.'.'.$extension);
							
							if ($updatedCheck == 'on') {
								$this->updateLogin($updateName,$updateEmail,$updatedNewPass,$updateId,'Defaultprofile',$updatedNewPass);
							}else{
								$this->updateLogin($updateName,$updateEmail,$updatedNewPass,$updateId,'Changeprofile',$updatedNewPass);
							}
							
							
						}else{
							echo "File is to big";
						}
					}else{
						echo "Error uploading file";
					}
				}else{
					echo "Not allowed file type";
				}

			}else{
				$this->updateLogin($updateName,$updateEmail,$updateOldPass,$updateId,'Defaultprofile',$updatedNewPass);
			}
		}

		public function setDeleteLogin($deleteId){
			$this->deleteLogin($deleteId);
			header("Location:../home.php");

		}

		public function setImagetype($ImgId)
		{
			$allfile = "../profileImg/".$ImgId.'*';
			$searchPath= glob($allfile);
			$ext =end(explode('.', $searchPath[0]));
			$path = "../profileImg/".$ImgId.".".$ext;
			return $path;
		}
		public function getDeleteImg($deleteImgId)
		{
			$allfile = "../profileImg/".$deleteImgId.'*';
			$searchPath= glob($allfile);
			$ext =end(explode('.', $searchPath[0]));
			$path = "../profileImg/".$deleteImgId.".".$ext;

			unlink($path);
			

		}
	}



?>