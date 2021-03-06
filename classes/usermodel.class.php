<?php

class UserModel extends DbConn
	{
		protected function register($registerName,$registerEmail,$registerPass)
		{
			$sql = "INSERT INTO webtesttb (name,email,pass) VALUES (?,?,?)";
			$stmt = $this->dbconnect()->prepare($sql);
			$harshpass = password_hash($registerPass, PASSWORD_DEFAULT);
			$stmt->execute([$registerName,$registerEmail,$harshpass]);	
		}

		protected function login($loginEmail,$loginPass){

			$sqlhash = "SELECT * FROM webtesttb WHERE email = '$loginEmail'";
			$result = $this->dbconnect()->query($sqlhash);
			$resultAll = $result->fetchAll();
			print_r($resultAll);
			foreach ($resultAll as $value) {
				$sql = "SELECT * FROM webtesttb WHERE email = ? AND pass=?";
				$verpass = password_verify($loginPass, $value['pass']);
				echo $verpass;
				$queryUser = $this->dbconnect()->prepare($sql);
				$queryUser->execute([$loginEmail,$verpass]);
				echo "string";
			}
			return  $verpass;
		}

		protected function viewUser()
		{
			$sql = "SELECT * FROM webtesttb";
			$result= $this->dbconnect()->query($sql);
			
			return $result;
		}

		protected function searchResult($searchItem)
		{
			$sql = "SELECT * FROM webtesttb WHERE name like '%$searchItem%' OR email like '%$searchItem%'";
			$result = $this->dbconnect()->query($sql);

			return $result;	
		}

		


		/*protected function edit($loginID){
			$sql = "SELECT * FROM webtesttb WHERE id = ?";
			$stmt = $this->dbconnect()->prepare($sql);
			$stmt->execute([$loginID]);
			$result = $stmt->fetchAll();
			return $result;
		}*/

		protected function updateLogin($updateName,$updateEmail,$updatePass,$updateId,$updateProfile,$updatedNewPass){
		if (!empty($updatedNewPass)) {
					echo "New password" . "</br>";
					echo $updatedNewPass . "</br>";
					$sql = "UPDATE webtesttb SET name=? , email = ?, pass = ? ,profileimg =? WHERE id=?";
					$stmt = $this->dbconnect()->prepare($sql);
					$passwordhash= password_hash($updatePass, PASSWORD_DEFAULT);
					echo $passwordhash . "</br>";
					$stmt->execute([$updateName,$updateEmail,$passwordhash,$updateProfile,$updateId]);
				}else{
					echo "Old password " . "</br>";
					$sql = "UPDATE webtesttb SET name=? , email = ?,profileimg =? WHERE id=?";
					$stmt = $this->dbconnect()->prepare($sql);
					$stmt->execute([$updateName,$updateEmail,$updateProfile,$updateId]);
				}
			
		}
		protected function deleteLogin($deleteId)
		{
			$sql = "DELETE FROM webtesttb WHERE id=?";
			$stmt= $this->dbconnect()->prepare($sql);
			$stmt->execute([$deleteId]);
			
		}
		public function try()
		{
			$sqlhash = "SELECT * FROM webtesttb WHERE email='$loginEmail'";
			$sql = "SELECT * FROM webtesttb WHERE email=? AND pass=?";

			$resulthash= $this->dbconnect()->query($sqlhash);
			foreach ($resulthash as $value) {
				
				$stmt= $this->dbconnect()->prepare($sql);
				$loginhashpass = password_verify($loginPass, $value['pass']);
				$stmt->execute([$loginEmail,$loginhashpass]);
				$result = $stmt->fetch();
			}
			return $result;

			echo "Hello user model";
		}
	}

?>