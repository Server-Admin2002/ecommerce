<?php

include('dbconn.php');
include('loginfo.php');


 
	  ?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';

?>
<body >
<div>
<?php
include 'slides.php';

?>


		<div class="container-fluid" style="background-color:black;">	
				
 <ul style="list-style-type: none;">
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
 <li><a href="myorder.php">My Order</a></li>';
  }
  ?>
  <li><a href="contactus.php">Contact Us</a></li>
  
  
</ul>
 
			
		</div>
	</div>
</div>
<div>

</div>
<div >
 

</div>

</div>


<?php

if(isset($_POST['contact1']))
{
	$name=$_POST['nm'];
	$ph=$_POST['ph'];
	$email=$_POST['email'];
	$msg=$_POST['msg'];
	if(isset($name) AND isset($ph) AND isset($email) AND isset($msg))
	{
		
				$sql = "INSERT INTO contactus (name,phno,email,msg)
				VALUES ('$name','$ph','$email','$msg')";

				if ($conn->query($sql) === TRUE) 
				{
				echo "<script>alert('Message Successfully Send,Thank You..!')</script>";
		echo "<script>location='contactus.php'</script>";
				}
				else{
				}
	}
}

?>
<div  class="container-fluid">
   <div class="row slideanim11">
    <div class="col-sm-12 col-xs-12">
      <div class="panel panel-default ">
     
        <div class="panel-body">
<div class="row">
		<center>
<h2>Contact Us</h2>
Project Developed by:<br>
<b></b>
<br>
<b></b>
<br>
<b></b>
<br>MGM College, Nanded.<br>
Phone Nu: +(02462)282852<br>
email Id: support@gmail.com
<hr>
</div>
<div class="row">
<style>
table, th, td {
  
  padding: 7px;
  
}
table {
  border-spacing: 55px;
  width:50%;
border: 1px solid black;
  }
</style>
<div class="container-fluid">
<div class="col-sm-12">
<div class="row " >
</div>
<div class="row " >
<center>
<form action="" method="POST" class="form-group">
<i><b>Send your Query's..</b></i><br>
<table  >
<tr><td><br></td><td></td></tr>
<tr><td>
Name<font color="red">*</font></td>
<td><input type="text" class="form-control" name="nm" pattern="[A-Z a-z]+" title="Please Enter Only Characters" 
required></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td>Phone no.</td><td><input type="text" class="form-control" name="ph" pattern="[0-9]+" maxlength="10"
 title="Please Enter Only Numbers" required></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td>Email<font color="red">*</font></td><td><input type="email" class="form-control"  name="email" 
pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td>Message<font color="red">*</font></td>
<td><textarea type="text" col="8" rows="8" name="msg" class="form-control" required></textarea></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td></td><td><input type="submit" name="contact1" class="form-control" style="width:50%;background-color:black;color:white;" 
value="Send"></td></tr>
<tr><td><br></td><td></td></tr>
</table>
<br><br>

</form>
</center>
</div>
		</div>

		  </div>

	
		  
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
