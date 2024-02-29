


<?php

include('dbconn.php');
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
 $email=$_POST['emailid'];
 $contactno=$_POST['contactno'];
 $password=md5($_POST['password']);
 $address1=$_POST['add1'];
 $address2=$_POST['add2'];

$query=mysqli_query($conn,"insert into user_info(name,email,password,mobile,address1,address2) 
values('$name','$email','$password','$contactno','$address1','$address2')");
if($query)
{
	echo "<script>alert('You are successfully register');</script>";
	echo"<br><script>location='login.php'</script>";
}
else{
echo "<script>alert('Not register something went wrong');</script>";
echo"<br><script>location='registration.php'</script>";
}
}


?>





<!DOCTYPE html>
<html lang="en">

<?php
include 'header.html';

?>
<body>
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



<div  class="container-fluid">
   <div class="row slideanim11">
    <div class="col-sm-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          
        </div>
        <div class="panel-body">
		
<div class="col-md-3 col-sm-12 create-new-account">
</div>
<!-- create a new account -->
<div class="col-md-6 col-sm-12 create-new-account">
	<h2 class="checkout-subtitle">Create a new account</h2>
	<p class="text title-tag-line">Create your own Shopping account.</p>
	<form class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
<div class="form-group">
	    	<label class="info-title" for="fullname">Full Name <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" 
			pattern="[A-Z a-z]+"  title="Enter Only Characters" required="required">
	  	</div>


		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
	  	</div>

<div class="form-group">
	    	<label class="info-title" for="contactno">Contact No. <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" 
			maxlength="10" pattern="[0-9]+"  title="Enter Only Numbers"  required >
	  	</div>

<div class="form-group">
	    	<label class="info-title" for="contactno">Address 1 <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="add1" name="add1" 
			  title="Enter Only Numbers"  required >
	  	</div>
		
<div class="form-group">
	    	<label class="info-title" for="contactno">Address 2 <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="add2" name="add2" 
			 title="Enter Only Numbers"  required >
	  	</div>
<div class="form-group">
	    	<label class="info-title" for="password">Password. <span>*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="password" name="password" 
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
	title="Must contain at least one number and one uppercase and lowercase letter, 
	and at least 8 or more characters"			required >
	  	</div>

<div class="form-group">
	    	<label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required >
	  	</div>


	  	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit"
		style="background-color:black;color:white;">Sign Up</button>
	</form>
	
</div>	
		   </div>
      </div>      
    </div>       
       
  </div>
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
