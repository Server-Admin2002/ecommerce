<?php

include 'dbconn.php';
include 'loginfo.php';

global $quty;
		$ip_add=$_SERVER['REMOTE_ADDR'];
			
			if(isset($_SESSION['id']))
			{
			$user_id1=$_SESSION['id'];
			}
			else
			{
				$user_id1=$_SERVER['REMOTE_ADDR'];
				
			}
	if(isset($_GET['cid1']))
	{
		

		$cpid=$_GET['cid1'];	
		$sql5 = "INSERT INTO cart(p_id,ip_add,user_id,qty)VALUES('$cpid','$ip_add','$user_id1',1)";
			if(mysqli_query($conn,$sql5))
			{
				
				//echo '<script>alert("-Added Successfully");</script>';
										//echo"<br><script>location='index.php'</script>";
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
  background-color:red;
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
<body>

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
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	
	<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div class="panel panel-primary" >
					<div class="panel-headingu" style="background-color:black;color:white;font-size:30px;">Cart Checkout</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2" ><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Price</b></div>
						</div>
						<div id="cart_checkout">
						
					<?php	
					
					
						$sql1 ="SELECT products.product_id,products.product_title,products.product_price,products.img,
						cart.p_id,cart.qty,cart.date FROM products INNER JOIN cart ON products.product_id=cart.p_id";
			
						$query1 = mysqli_query($conn,$sql1);

	if (mysqli_num_rows($query1) > 0)
	{

		echo "<form method='post' action=''>";
						$n=0;
						$gtot=1;
				while ($row=mysqli_fetch_array($query1)) 
				{
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["img"];
					$qty = $row["qty"];
					$Date1 = $row["date"];

					echo 
						'<div class="row">
								<div class="col-md-2" >
									<div class="btn-group">
										<a href="cart.php?prid='.$product_id.'&pdate='.$Date1.'" class="btn btn-danger delete">
										<img src="delete.ico" height="15" width="15"></a>
										&nbsp&nbsp&nbsp&nbsp&nbsp<a href="cart.php?prid1='.$product_id.'" >Save for Later</a>
									</div>
							</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" name="product_qty[]" class="form-control qty" value="'.$qty.'"  ></div>
								<div class="col-md-2"><input type="text" name="product_price[]" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" name="tot[]" value="" readonly="readonly">
								</div>
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								
								<hr><br>
								<b class="form-control net_total" style="font-size:20px;"></b> 
								<hr>
								<br>
					
								</div>';
				
				echo '<div id="collapseOne" class="panel-collapse collapse in">

				<!-- panel-body  -->
				<div class="panel-body">
				<p>Select Your Payment Method:</p>
	   
				<input type="radio" name="paymethod" class="form-control p1" value="cod" checked="checked"> COD
	     
				<input type="radio" name="paymethod" class="form-control p2" value="card"> Debit / Credit card <br /><br />
				</div>';
				
				echo '
					<input type="submit" style="float:right;" name="submit1" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>';

	}
	else
	{
	echo '
  <img  src="img/empty.jpg"  style="height:400px;width:100%">';
	}
	
	if(isset($_GET['prid']))
	{
		if(isset($product_id))
		{
			$remove_date=$_GET["pdate"];
			$remove_id=$_GET["prid"];
			$ip=$_SERVER['REMOTE_ADDR'];
			if (isset($_SESSION["uid"])) 
			{
				$uidd=$_SESSION["uid"];
				$sql = "DELETE FROM cart WHERE p_id ='$remove_id' AND date='$remove_date'";
			}
			else
			{
				$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add ='$ip' AND date='$remove_date'";
			}
			if(mysqli_query($conn,$sql))
			{
				echo '<script>alert("-Remove Successfully");</script>';
				echo "<script>location='cart.php'</script>";
			}
		}
	}

	if(isset($_GET['prid1']))
	{
		$remove_id1=$_GET['prid1'];
		if (isset($_SESSION["id"]) AND isset($remove_id1)) 
		{
			$uidd=$_SESSION["id"];
			$sql1 = "insert into wishlist(userId,productId,qty) values ('$uidd','$remove_id1','$quty')";
      		$sql2 = "DELETE FROM cart WHERE p_id ='$remove_id1'";
			if(mysqli_query($conn,$sql1) AND mysqli_query($conn,$sql2)) 
			{
				echo '<script>alert("-Add wishcart Successfully");</script>';
				echo"<br><script>location='cart.php'</script>";
			}
		}
		if (empty($_SESSION["id"]) AND isset($remove_id1)) 
		{
		
				echo '<script>alert("-Please Go to Login");</script>';
				echo  "<script>location='login.php'</script>";
					
		}
	}



if(isset($_POST['submit1'])) 
{

	if(empty($_SESSION['id']))
    {   
		echo  "<script>location='login.php'</script>";
	}
	else
	{
				$r1 = 'unchecked';
				$r2 = 'unchecked';
				$selected_radio = $_POST['paymethod'];
				if ($selected_radio == 'card')
				{
					$card=2;
				}
				if ($selected_radio == 'cod')
				{
					$card=1;
	            }
			$rr=(rand(10,100));
			$tot=$_POST['tot'];
			$row_data = array();
			foreach($_POST['product_id'] as $row=>$pid) { 
			$proid=mysqli_real_escape_string($conn,$pid);
			$quty=mysqli_real_escape_string($conn,($_POST['product_qty'][$row]));
			$Idd=mysqli_real_escape_string($conn,($_SESSION['id']));
			$tot1=mysqli_real_escape_string($conn,($_POST['tot'][$row]));
			$rnum=mysqli_real_escape_string($conn,$rr);
			$row_data[] = "('$Idd','$proid','$quty','$tot1','$rnum')";
				}
				if (!empty($row_data)) 
				{
					$sql = "insert into orders(userId,productId,quantity,totamt,trackId) VALUES".implode(',', $row_data);
					$result = mysqli_query($conn, $sql ) or die(mysqli_error($conn));
					if ($result)
						{
						   if($card==1)
						   {
								echo"<script>location='cod.php?rnu=$rr'</script>";
						   }
						  if($card==2)
						   {
							   echo"<script>location='cardpayment.php?rnu=$rr'</script>";

						   }
						}
						else
						{
		
						}
				}
	}
}
?>
		</div>
	</div>
</div>
	</body>	
</html>















		