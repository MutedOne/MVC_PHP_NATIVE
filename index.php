<?php 
	include_once 'header.php';
	//$_SESSION['path']= __DIR__;
	include 'classes/allclass.class.php';
	//session_start();
	
	$try = new UserModel;
	$try->try();
?>
<h1>this is register form</h1>


<form method="post" action="action/register.php">
	<div class="form-group">
    <label for="exampleInputEmail1">Enter Name</label>
    <input type="text" class="form-control" id="registerName" aria-describedby="emailHelp" name="registerName" placeholder="Enter Name" value="Stephen">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="registerEmail" name="registerEmail" aria-describedby="emailHelp" placeholder="Enter email" value="Stephen@gmail.com">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="registerPass" name="registerPass" placeholder="Password" value="Stephen1">
  </div>
 
  <button type="submit" class="btn btn-primary" name="registerbtn">Submit</button>
</form>

			
<?php 
include_once 'footer.php';
?>