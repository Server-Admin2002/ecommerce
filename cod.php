
<?php



include 'dbconn.php';
include 'loginfo.php';

global $email;
if(isset($_SESSION['id']))
	$email=$_SESSION['login'];
$sessionId=$_SESSION['id'];
if(isset($_GET['pm']))
{
$PM=$_GET['pm'];
 $rnu=$_GET['rnu'];
$PM1="COD";

}

if(empty($_SESSION['id']))
    {   
		echo "<script>location='login.php'</script>";
	}
else{

 $username;

 $rnu=$_GET['rnu'];
$rnu;

$sql1 ="SELECT * from user_info where email='$email'";
	
$query1 = mysqli_query($conn,$sql1);

		if (mysqli_num_rows($query1) > 0) 
		{
				$n=0;
				while ($row=mysqli_fetch_array($query1))
					{
					$n++;
					$user_id = $row["user_id"];
					$name= $row["name"];
					$email = $row["email"];
					$mobile = $row["mobile"];
					$address1 = $row["address1"];
					$address2 = $row["address2"];
					$pincode=$row["pincode"];

					}
		}
	
	
	
	

	if(isset($_POST['submit2']))
	{
		$payment="Cash On Delivery";
		$msg="Product Ready for Shipping";
//$rr=(rand(10,100));
		$nm=$_POST['name1'];
		$mob=$_POST['mobile'];
		$pincode=$_POST['pincode'];
		$padd=$_POST['padd'];
		$sql = "UPDATE user_info SET name='$nm',mobile='$mob',pincode='$pincode',padd='$padd' 
			WHERE email = '$email'";
	    $sql1 = "UPDATE orders SET paymentMethod='$payment',orderStatus='$msg' WHERE trackId = '$rnu'";
		$sql2="DELETE from cart WHERE user_id='$sessionId'";
	
	if(mysqli_query($conn,$sql1))
	{
	}
	
	if(mysqli_query($conn,$sql2))
	{
	}
				if(mysqli_query($conn,$sql)){
				echo '<script>alert("-Update Successfully");</script>';
				echo"<br><script>location='ordertrackhistry.php?rnu=$rnu'</script>";
				
				}
		
	}
						}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cart</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<style>
		
		 body {
  margin: 50;
  background-color:lightblue;
}
.panel-heading {
    color: white !important;
    background-color: blue!important;
    padding: 5px;
    
  }
 
   .container-fluid {
    padding: 10px 10px;
  }
  .container-fluid1 {
    padding: 1px 1px;
  }
  .bg-grey {
    background-color: blue;
	color:white;
  }





div.a {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:blue;
}
		li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover,.dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: blue;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: red}

.dropdown:hover .dropdown-content {
    display: block;
}



		</style>
	</head>
<body >

		<div class="container-fluid" style="background-color:blue;width:100%;">
<div class="row">
<div class="col-sm-12">	
				
 <ul style="list-style-type: none;">
  <li><a href="index.php">Home</a></li>
  <?php
  if(!isset($_SESSION['username']))
  {
	  echo '
  <li><a href="registration.php">New Registration</a></li>
  <li><a href="login.php">User Login</a></li>
  <li><a href="adminlogin.php">Admin Login</a></li>';
  }
  ?>
  <li><a href="cart.php">My Cart</a></li>
 <?php
  if(isset($_SESSION['username']))
  {
	  echo'
 <li><a href="wishlist.php">Wish List</a></li>';
  }
  ?>
  <li><a href="#">Contact Us</a></li>
  
  
</ul>
</div>
</div>
</div>

	<p><br/></p>
	<p><br/></p>
		
		
		
<div  class="container-fluid">
   <div class="row">
    
	
   <div class="col-sm-2 col-xs-12">
	</div>
   <div class="col-sm-8 col-xs-12">
      <div class="panel panel-default text-center">
        
        <div class="panel-body">
		
          
		<center>
			<h3>Cash on Delivery</h3>
    <h4>Please fullfill your Address Details </h4>
			<br>
						<form method="POST" action="" enctype='multipart/form-data'>
		
		<table border="1" style="width:80%;">
						<tr><td><b>Full Name :</b></td>
						<td>
						<input placeholder="Your name" class="form-control" type="text" value="<?php
	  	  echo $name;
	  ?>" tabindex="1" name="name1" required autofocus ></td></tr>


<tr>
						<td colspan="2"><br>
						</td>
						</tr>
<tr><td><b>Email Id :</b></td>
						<td>
				
      <input placeholder="Your Email Address" class="form-control"  value="<?php
	  	  echo $email;
	  ?>" type="email" tabindex="2" name="email" readonly required></td></tr>


<tr>
						<td colspan="2"><br>
						</td>
						</tr>
						<tr><td><b>Mob Nu.:</b></td>
						<td>
						  <input type="text" maxlength="10" pattern="[0-9]+" 
						  class="form-control" title="Please enter only numbers"
						  placeholder="Your Mobile Number" class="form-control" value="<?php
	  	  echo $mobile;
	  ?>" type="tel" tabindex="3" name="mobile" required>
						</td></tr>
						<td colspan="2"><br>
						</td>
						</tr>
												
						
						<tr><td><b>Address:</b></td>
						<td>
					<textarea placeholder="Type your address here...." 
					class="form-control" value="" tabindex="5" name="padd" required><?php
	  	  echo $address1;
		  echo "&nbsp".$address2;
		  
		  ?></textarea>
						</td></tr>			
						
						<tr>
						<td colspan="2"><br>
						</td>
						</tr>
						<tr><td><b>Pincode:</b></td>
						<td>
						<input placeholder="Pincode" type="text" class="form-control"
						maxlength="6" pattern="[0-9]+" title="Please enter only numbers" name="pincode" 
	  value="<?php
	  echo $pincode;
	  ?>"required>
						</td></tr>
										
						<tr>
						<td colspan="2"><br></td></tr>
					<tr><td></td><td colspan="2">
						<button class="btn btn-default pull-center" type="submit" name="submit2" 
						style="height:50%;width:50%;background-color:black;color:white;">Submit</button>
							</td></tr></table>
		     </form>
		</center>