<?php


include('dbconn.php');
//include('loginfo.php');
if(isset($_GET['rnu']))
{
	global  $rnu;
	$rnu= $_GET['rnu'];
	
}


include 'dbconn.php';

include 'loginfo.php';
global $uid;
if(isset($_SESSION['id']))
{
	
	$uid=$_SESSION['id'];
	
}
	
?>


<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';

?>
<body >
<?php
//include 'slides.php';

?>

<body >

		<div class="container-fluid" style="background-color:black;width:100%;">
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
 <li><a href="wishlist.php">Wish List</a></li>
 <li><a href="myorder.php">My Order</a></li>
 <li><a href="contactus.php">Contact Us</a></li>
 ';
  }
  ?>

  
  
</ul>
</div>
</div>
</div>

	<p><br/></p>
	<p><br/></p>
		
		
		
<div  class="container-fluid">
   <div class="row">
    
	
   <div class="col-sm-12 col-xs-12">
      <div class="panel panel-default text-center">
        
        <div class="panel-body">
		
          
		<center>
			<h3>Order Track Histry</h3>
    
			
						<table style="width:90%;text-center" border="1">
						<tr>
						<td>Sr Nu.</td>
						<td>Order Date</td>
						<td>Product Image</td>
						<td>Product Name</td>
						<td>Quantity</td>
						<td>Price</td>
						<td>Total Amount</td>
						<td>Payment Method</td>
						<td>Action</td>
						</tr>
						
						
					<?php	
					
					
//include('dbconn.php');
	$sql1 ="SELECT products.product_id,products.product_title,products.product_price,products.img,
	orders.productId,orders.userId,orders.quantity,orders.totamt,orders.orderDate,orders.paymentMethod,
	orders.orderStatus,orders.trackId,orders.date
FROM products
INNER JOIN orders ON products.product_id=orders.productId WHERE userId='$uid' ORDER BY orderDate DESC";
	
	//$sql1 = "SELECT product_id,product_title,product_price,product_image FROM products WHERE  product_id='$cpid' ";
		
$query1 = mysqli_query($conn,$sql1);

						//if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query1) > 0)
			{
			echo "<form method='post' action=''>";
				$n=0;
				while ($row=mysqli_fetch_array($query1)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["img"];
					$totamt=$row["totamt"];
					$payment=$row["paymentMethod"];
					$qty = $row["quantity"];
					$totamt = $row["totamt"];
					$orderdt = $row["orderDate"];
					$tcid = $row["trackId"];
							echo '<tr>
							<td>'.$n++.'</td>
							<td>'.$orderdt.'</td>
							
							<td><img src="'.$product_image.'" height="100px" width="100px"></td>
							<td>'.$product_title.'</td>
							<td>'.$qty.'</td>
	
							<td>'.$product_price.'</td>
							<td>'.$totamt.'</td>
							<td>'.$payment.'</td>
						    <td><a href="trackstatus1.php?rnm='?><?php
							if(isset($tcid))
								echo $tcid;?>
							<?php echo'">Track </a></td></tr>';
				}
			}
				echo '</table>';
				?>
			
			
</body>	
</html>















		