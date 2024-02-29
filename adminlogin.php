<?php


//session_start();
include 'loginfo.php';


if(isset($_POST['login']))
{
	
	$admin="admin";
	$password="admin";
	
	$admin1=$_POST['admin'];
	$password1=$_POST['password'];
	if($admin==$admin1 AND $password==$password1)
	{
	   $_SESSION['name']=$admin;
	 echo '<script>location="welcomeadmin.php"</script>';
	}
	else
	{
		echo '<script>alert("Admin name or password not match..please try again.");</script>';
		echo '<script>location="adminlogin.php"</script>';
	}
	
	
	
	
}





?>


<!DOCTYPE html>
<html lang="en">
	
<?php
include 'header.php';

?>
    <body >
<?php
include 'slides.php';

?>


		<div class="container-fluid" style="background-color:black;">	
<ul style="list-style-type: none;" class="a">
  <li><a href="index.php">Home</a></li>
  <li><a href="cart.php">My Cart</a></li>
  <?php
  if(!isset($_SESSION['username']))
  {
	  echo '
  <li><a href="registration.php">New Registration</a></li>
  <li><a href="login.php">User Login</a></li>
  <li><a href="adminlogin.php">Admin Login</a></li>';
  }
  
  if(isset($_SESSION['username']))
  {
	   echo'
 <li><a href="wishlist.php">Wish List</a></li>
 <li><a href="myorder.php">My Order</a></li>
 
 ';
  }
  ?>

 <li><a href="contactus.php">Contact Us</a></li> 
  
</ul>
 
 
</div>

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
<div class="col-md-4 col-sm-6 sign-in">
</div>	
	<!-- Sign-in -->			
<div class="col-md-4 col-sm-4 sign-in">
	<h4 style="color:white;">Admin Login</h4>
		<form class="register-form outer-top-xs" method="post">
			<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1" style="color:white;">Admin Name <span>*</span></label>
		    <input type="text" name="admin" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1" style="color:white;">Password <span>*</span></label>
		 <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
		</div>
		
		<div class="form-group">
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login" 
		style="background-color:black;color:white;">Login</button>
		</div>
		</form>					
</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); 
}
</script>
</body>
</html>
