<?php

	/**
	 * 
	 */

	//To Create table call first templateUserViewTableStart next call the class and store it on variable $result then call templateUserViewTable with parameter $result
	class UserView extends UserModel
	{
		protected function templateUserViewTableStart()
		{
			echo "<table class='table table-dark'>
			  <thead>
			    <tr>
			      <th scope='col'>ID</th>
			      <th scope='col'>Name</th>
			      <th scope='col'>Email</th>
			      <th scope='col'>Profile</th>
			    </tr>
			  </thead>
			  <tbody>";
		}
		protected function templateUserViewTable($result)
		{
				foreach ($result as $val ) 
			{
				echo "<tr>";
			      echo "<th scope='row'>".$val['id']."</th>";
			      echo "<th >".$val['name']."</th>";
			      echo "<th >".$val['email']."</th>";
			   	  
			   	  if ($val['profileimg'] == 'Defaultprofile') {
			   	  	echo "<th ><i class='fa fa-user' aria-hidden='true'></i></th>";
			   	  }else{
			   	 
			   	 		

			   	  			echo "<th ><img class='img-fluid'src='profileImg/".$val['id'].".";
			   	  			echo "jpeg";
			   	  			echo "?.mt_rand()."."'></th>";
			   	  }
			   	  echo "<th class='invisible '>".$val['pass']. "'></th>";

			      echo "<th >
				<form method='post'>
					<input type='hidden' name='loginId' value='".$val['id']. "'>
					

				<button type='button' class='btn btn-primary btnEdit' data-toggle='modal' data-target='#editmodal'>
				  Edit
				</button>

				


				<button type='button' class='btn btn-primary btnDelete' data-toggle='modal' data-target='#deletemodals'>
				  Delete
				</button>


					</form>
				</th >";
			     
				echo "</tr>";
			}
					    echo "</tbody>
			</table>";
			echo "<div class='modal fade' id='editmodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
				  <div class='modal-dialog' role='document'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLongTitle'>Modal title</h5>
				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				          <span aria-hidden='true'>&times;</span>
				        </button>
				      </div>
				      <div class='modal-body'>
				          <form method='POST' action = 'action/editUserInfo.php' enctype='multipart/form-data'>
							<input type='text' class='form-control editID' name='editID' aria-describedby='emailHelp' placeholder='Enter email'>
							<div class='form-group'>
								<label for='exampleInputEmail1'>Name</label>
								<input type='text' class='form-control editName' aria-describedby='emailHelp' name='editName' placeholder='Enter email' >
											   
							</div>
							<div class='form-group'>
								<label for='exampleInputEmail1'>Email address</label>
								<input type='email' class='form-control  editEmail' name='editEmail'  aria-describedby='emailHelp' placeholder='Enter email' >
											   
							</div>
							<div class='form-group'>
							
								<input type='hidden' class='form-control editOldPass' placeholder='Password' name='editOldPass'>
							</div>
							<div class='form-group'>
								<label for='exampleInputPassword1'>New Password</label>
								<input type='text' class='form-control editPass' placeholder='Password' name='editPass'>
							</div>
							<div class='form-group'>
								<label for='exampleInputPassword1'>Change profile</label>
								<input type='file' class='form-control editProfile' placeholder='Password' name='editProfile'>
							  <div class='form-check'>
							    <input type='checkbox' class='form-check-input' id='editDefault' name='editDefault'>
							    <label class='form-check-label' for='exampleCheck1' value='Defaultprofile'>No profile</label>
							  </div>
							</div>
											 
							<button type='submit' name='btnUpdate' class='btn btn-primary'>Update</button>
						</form>
				      </div>
								      </div>
								     
								    </div>
								  </div>
								</div>";
				echo "<div class='modal fade' id='deletemodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
				  <div class='modal-dialog' role='document'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLongTitle'>Modal title</h5>

				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				          <span aria-hidden='true'>&times;</span>
				        </button>
				      </div>
				      <div class='modal-body'>
				          <form method='POST' action = 'action/deleteUser.php'>
				          		<div class='mb-5'>Are you sure you want to delete?</div>
									<input type='hidden' class='form-control deleteID' name='deleteID' aria-describedby='emailHelp' placeholder='Enter email'>			 
							<button type='submit' name='btnDeleteData' class='btn btn-primary'>Delete</button>
						</form>
				      </div>
								      </div>
								     
								    </div>
								  </div>
								</div>";
		}
		public function getViewUser()
		{
			$this->templateUserViewTableStart();
			$result = $this->viewUser();
			$this->templateUserViewTable($result);

		}

		public function searchItem($search)
		{
			$this->templateUserViewTableStart();
			$result = $this->searchResult($search);
			$this->templateUserViewTable($result);
		}
	}



?>