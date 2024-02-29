<?php
if(isset($_GET['rnu']))
{
	global  $rnu;
	$rnu= $_GET['rnu'];
	
}


include 'dbconn.php';

include 'loginfo.php';
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Order Track</title>
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
						<td>Action</td>
						</tr>
						
						
					<?php	
					
					
//include('dbconn.php');
	$sql1 ="SELECT products.product_id,products.product_title,products.product_price,products.img,
	orders.productId,orders.quantity,orders.totamt,orders.orderDate,orders.paymentMethod,orders.orderStatus,orders.trackId
FROM products
INNER JOIN orders ON products.product_id=orders.productId WHERE trackId='$rnu' ORDER BY orderDate DESC";
	
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
					//$cart_item_id = $row["id"];
				//$cart_item_id =1;
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
						    <td><a href="trackstatus.php?rnm='?><?php
							if(isset($rnu))
								echo $rnu;?>
							<?php echo'">Track </a></td></tr>';
				}
			}
				echo '</table>';
				?>
			
			
</body>	
</html>















		