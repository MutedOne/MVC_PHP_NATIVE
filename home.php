<?php
  include_once 'header.php';
	include 'classes/allclass.class.php';	
	
?>
    <div class="container row">
      <div class="col-md-6"><h1>Hello, world!</h1></div>
      <div class="col-md-6 d-flex align-items-center">
        <form method="POST" action="action/search.php">
          
          <input type="text" name="searchthis" id="search">
          <button type="submit" name="btnsearch">Search</button>
        </form>
      </div>
    </div>
    
    <div>
     
    </div>
    
        <?php 
      
      $viewUser = new UserView; 
      $viewUser->getViewUser();
     ?>
   
  
<?php
  include_once 'footer.php';

?>