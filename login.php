<?php



include 'loginfo.php';

include('dbconn.php');

if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=md5($_POST['password']);
$query=mysqli_query($conn,"SELECT * FROM user_info WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="cart.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['user_id'];
$_SESSION['username']=$num['name'];
$_SESSION['mobile']=$num['mobile'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
//$log=mysqli_query($conn,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
	else
	{
		echo '<script>alert("Email Id or Password not match,Please try again.");</script>';
		echo '<script>location="login.php"</script>';
	}

}


?>


<!DOCTYPE html>
<html lang="en">
	   
	    
<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}	
return true;
}
</script>
    	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

  
  
<?php
include 'header.php';

?>
    <body >

<div>
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
  ?>
 <?php
  if(isset($_SESSION['username']))
  {
	  echo'
  
 <li><a href="wishlist.php">Wish List</a></li>
 <li><a href="myorder.php">My Order</a></li>';
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
<div class="col-md-4 col-sm-6 sign-in">
	<h4 class="" style="color:white;">sign in</h4>
		<form class="register-form outer-top-xs" method="post">
			<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1" style="color:white;">Email Address <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1" style="color:white;">Password <span>*</span></label>
		 <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
		</div>
		
		<div class="form-group">
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login" style="color:white;background-color:black;">Login</button>
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
