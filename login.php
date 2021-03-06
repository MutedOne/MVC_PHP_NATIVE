<?php 
	include_once 'header.php';
	//$_SESSION['path']= __DIR__;
	include 'classes/allclass.class.php';
	//session_start();
	
	$try = new UserModel;
	$try->try();
?>
<h1>this is login form</h1>


<form method="post" action="action/loginDetail.php">

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp" placeholder="Enter email" value="Stephen@gmail.com">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="loginPass" name="loginPass" placeholder="Password" value="Stephen1">
  </div>
 
  <button type="submit" class="btn btn-primary" name="loginbtn">Submit</button>
</form>

<?php 
include_once 'footer.php';
?>