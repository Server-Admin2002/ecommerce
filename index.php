<?php

include('dbconn.php');
include('loginfo.php');


if(isset($_POST['login']))
{
   $email=$_POST['t1'];
   $password=md5($_POST['t2']);
$query=mysqli_query($conn,"SELECT * FROM user_info WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="index.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['user_id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($conn,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}



		if(isset($_GET['pm']))
		{
			$PM=$_GET['pm'];
		}

		if(isset($_GET['idb']))
		{
			$idb=$_GET['idb'];
		}

	$uip=$_SERVER['REMOTE_ADDR'];
	// Code for User login
	if(isset($_POST['login']))
	{
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			$query=mysqli_query($conn,"SELECT * FROM user_info WHERE email='$email' and password='$password'");
			$num=mysqli_fetch_array($query);
			if($num>0)
			{
				$extra="index.php";
				$_SESSION['login']=$_POST['email'];
				$_SESSION['id']=$num['user_id'];
				$_SESSION['username']=$num['name'];
				$uip=$_SERVER['REMOTE_ADDR'];
				$status=1;
				$log=mysqli_query($conn,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
				$host=$_SERVER['HTTP_HOST'];
				$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				header("location:http://$host$uri/$extra");
			}
			else
			{
				$extra="login.php";
				$email=$_POST['email'];
				$uip=$_SERVER['REMOTE_ADDR'];
				$status=0;
				$log=mysqli_query($conn,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
				$host  = $_SERVER['HTTP_HOST'];
				$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				header("location:http://$host$uri/$extra");
				$_SESSION['errmsg']="Invalid email id or Password";

			}
	}





$sql = "SELECT * FROM products";
$result = $conn->query($sql);
global $row;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    }
} else {
    
}
 
	 
			$ip_add=$_SERVER['REMOTE_ADDR'];
			
			if(isset($_SESSION['id']))
			{
			$user_id1=$_SESSION['id'];
			}
			else
			{
				$user_id1=$_SERVER['REMOTE_ADDR'];
				
			}
	if(isset($_GET['cid']))
	{
		$cpid=$_GET['cid'];	
		$sql5 = "INSERT INTO cart(p_id,ip_add,user_id,qty)VALUES('$cpid','$ip_add','$user_id1',1)";
			if(mysqli_query($conn,$sql5))
			{
				
				echo '<script>alert("-Added Successfully");</script>';
										//echo"<br><script>location='index.php'</script>";
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
 
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="glyphicon glyphicon-shopping-cart"></span>
				<img src="img/cartimg.png" height="20" width="20">
				Cart
	<span class="fi-clock"></span>
	<?php
		$userId=$_SERVER['REMOTE_ADDR'];

				if (isset($_SESSION['id'])) 
				{
					$userId1=$_SESSION['id'];
					$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id ='$userId1'";
				}
				else
				{
						
					$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id ='$userId'";
				}
	
				$query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($query);
				echo $row["count_item"];
				
	?>
	</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in Rs.</div>
								</div>
							</div>
							<div class="panel-body" >
								
			<?php					
			
			if(isset($_GET['cid']))
			{
					$cpid=$_GET['cid'];
					$ip_add=$_SERVER['REMOTE_ADDR'];
					$sql1 ="SELECT products.product_id,products.product_title,products.product_price,products.img,
					cart.p_id,cart.qty FROM products INNER JOIN cart ON products.product_id=cart.p_id";
					$query1 = mysqli_query($conn,$sql1);
				if (mysqli_num_rows($query1) > 0) 
				{
						$n=0;
						while ($row=mysqli_fetch_array($query1)) 
						{
				
							$n++;
							$product_id = $row["product_id"];
							$product_title = $row["product_title"];
							$product_price = $row["product_price"];
							$product_image = $row["img"];
							echo '<div class="row">
							<div class="col-md-3">'.$n.'</div>
							<div class="col-md-3"><img class="img-responsive" src="'.$product_image.'" /></div>
							<div class="col-md-3">'.$product_title.'</div>
							<div class="col-md-3">Rs.'.$product_price.'</div>
							</div>';
				
						}
				}
			}			
			?>
			<a  style="float:right;background-color:blue;" href="cart.php" class="btn btn-warning" >Edit&nbsp;&nbsp;
				</a>
								
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				
			</ul>
		</div>
	</div>
</div>
<div>

</div>
<div >
 

</div>

</div>


<div  class="container-fluid">
   <div class="row slideanim11">
    <div class="col-sm-2 col-xs-12">
      <div class="panel panel-default ">
     
        <div class="panel-body">
	<?php
		if(!isset($_SESSION['username']))
		{
		echo ' 
        <div class="panel-body">
	
		<form method="POST">
		Email Id:<input type="email" name="t1" class="form-control" required><br>
	Password:<input type="password" name="t2" class="form-control" required><br><br>
	<input type="submit" value="Login" name="login">
	</form>
  </div>
      ';
	}
	?>
  </div>
        <table >
<tr><td>


<details>
<summary><font size="5">Categories</font></summary>


    <p><a href='index.php?id=1' target="_self">Titan</a></p>
<p><a href='index.php?id=2' target="_self">Fastrack</a></p>
<p><a href='index.php?id=3' target="_self">Sonata</a></p>
<p><a href='index.php?id=4' target="_self">Raga</a></p>
<p><a href='index.php?id=5' target="_self">General</a></p>

</details>
</td>
</tr>


</table>
      </div>      
	  <div style="background-color:white;">Design & Developed by-<br>
	  
	  <b>Nilesh Jadhav</b><br>
	  </div>
    </div>     
    <div class="col-sm-10 col-xs-12">
      <div class="panel panel-default ">
     
        <div class="panel-body">
	      <div class="row" >
	
<div class='thumbnail'> 
  <table class="table">
    


<?php

$i=0;
$j=0;
if(isset($_GET['id']) OR isset($_GET['idb']))
{

	if(isset($_GET['id']))
	{
			$nu=$_GET['id'];
			$sqlm1 = "select * from products where product_cat='$nu'";
	}
	if(isset($_GET['idb']))
	{
		$idb1=$_GET['idb'];
		$sqlm1 = "select * from products where product_brand='$idb1'";
	}	
	$data11 = mysqli_query($conn,$sqlm1);
	$rowcount=mysqli_num_rows($data11);
	while($rec101=mysqli_fetch_row($data11))
	{
		if($i%3==0)
		{
			echo "<tr>";
		}
		echo "<td><p>".$rec101[3]."</p>
		<img src='".$rec101[8]."' height='200px' width='200px'>
	   <h2 style='align:right;color:red;'>Rs.".$rec101[4]."/-</h2><br>
		<a href='index.php?cid=$rec101[0]' target='_self'>Add to Cart</a>
		&nbsp&nbsp&nbsp&nbsp&nbsp	
		<a href='cart.php?cid1=$rec101[0]' class='btn btn-info' role='button'>
		<i class='fa fa-flash' style='font-size:20px;color:red'></i>
		Buy Now</a></td>";
		if($i%3==3)
		{
			echo "</tr>";
		}
		$i++;
		
    }
}
else
{
	$nu=1;
	$sqlm1 = "select * from products where product_cat='$nu'";  
	$data11 = mysqli_query($conn,$sqlm1);
	$rowcount=mysqli_num_rows($data11);

	while($rec101=mysqli_fetch_row($data11) )
	{
		if($i%3==0)
		{
			echo "<tr >";
		}
		echo "<td ><p>".$rec101[3]."</p>
		 
		<img src='".$rec101[8]."' height='200px' width='200px' >
	
		<h2 style='align:right;color:red;'>Rs.".$rec101[4]."/-</h2><br>
		<a href='index.php?cid=$rec101[0]' target='_self'>Add to Cart</a>
		&nbsp&nbsp&nbsp&nbsp&nbsp	
		<a href='cart.php?cid1=$rec101[0]' class='btn btn-info' role='button'>
		<i class='fa fa-flash' style='font-size:20px;color:red'></i>
		Buy Now</a></div></div></td>";
		if($i%3==3)
		{
			echo "</tr>";
		}
		$i++;
	
	
    }
	
}
  
 ?>


</table>
</div></div>
</center>
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
