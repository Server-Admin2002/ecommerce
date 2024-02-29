<?php



include 'dbconn.php';
include 'loginfo.php';

?>
<!DOCTYPE html>
<html>


<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';

?>
<body >
<?php
//include 'slides.php';

?>

<body>
	<div class="container-fluid" style="background-color:black;">	
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
 <li><a href="wishlist.php">Wish List</a></li>
 <li><a href="myorder.php">My Order</a></li>
 <li><a href="contactus.php">Contact Us</a></li>
 ';
  }
  ?>

  
  
</ul>
</div>
	<p><br/></p>
	<p><br/></p>
	
	
	<div class="container-fluid">
		<center><h1>You are in Wish Cart
		</h1>
		<?php
					if(empty($_SESSION['id']))
						{
							echo '<a href="login.php">Please Go to Login Page</a>';
							echo "<br><br>";
						}
		?>
		
		</center>
		<div class="row">
			
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div class="panel panel-primary" >
					<div class="panel-heading" style="background-color:blue;color:white;">Cart Checkout</div>
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
					
					
					
					if(isset($_SESSION['id']))
					{
				$UserId=$_SESSION['id'];
	$sql1 ="SELECT products.product_id,products.product_title,products.product_price,products.img,
	wishlist.productId,wishlist.userId,wishlist.qty
FROM products
INNER JOIN wishlist
ON products.product_id=wishlist.productId AND wishlist.userId='$UserId'";
	
	//$sql1 = "SELECT product_id,product_title,product_price,product_image FROM products WHERE  product_id='$cpid' ";
		
$query1 = mysqli_query($conn,$sql1);

						//if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query1) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action=''>";
				$n=0;
				$gtot=1;
				while ($row=mysqli_fetch_array($query1)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["img"];
					//$cart_item_id = $row["id"];
				//$cart_item_id =1;
					$qty = $row["qty"];

					echo 
						'<div class="row">
								<div class="col-md-2" >
									<div class="btn-group">
									
										<a href="wishlist.php?prid='.$product_id.'"  class="btn btn-danger delete">
										<img src="delete.ico" height="15" width="15">
										</a>
							
											
									</div>
									
								</div>
								
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" name="product_qty[]" class="form-control qty" value="'.$qty.'" pattern="[0-9]+" title="Starting Not Zero,Minimum 10 digits mob nu and Enter Only Numbers" ></div>
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

				//if (!isset($_SESSION["uid"])) {
					echo '
					<input type="submit" style="float:right;" name="submit1" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>';
					
				//}
		}
						
						}
						
						
						
						
						
						
						
						
						
						
						
						//}
						
						
	//Remove Item From cart
//	if (isset($_POST["removeItemFromCart"])) {
	if(isset($_GET['prid']))
	{
 if(isset($product_id))
	{
		$remove_id=$_GET["prid"];
		$ip=$_SERVER['REMOTE_ADDR'];
		if (isset($_SESSION["id"])) 
		{
			$uidd=$_SESSION["id"];
		$sql = "DELETE FROM wishlist WHERE productId ='$remove_id'";
		}
	else{
		$sql = "DELETE FROM wishlist WHERE p_id = '$remove_id' AND ip_add ='$ip'";
	}
	if(mysqli_query($conn,$sql)){
		echo '<script>alert("-Remove Successfully");</script>';
		echo"<script>location='wishlist.php'</script>";
		//exit();
	}
	}
	}
//}



if(isset($_POST['submit1'])) 
{

		


	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
	}
else{



				$r1 = 'unchecked';
				$r2 = 'unchecked';

				$selected_radio = $_POST['paymethod'];

				if ($selected_radio == 'card')
				{
					
					
					$card=2;
	               	//header('location:cardpayment.php');

				}
				if ($selected_radio == 'cod')
				{
					$card=1;
	               	//header('location:cod.php');
				
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
						//echo 'query failed' ;
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















		