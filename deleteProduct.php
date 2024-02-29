<?php
session_start();
include 'dbconn.php';
global $ID1;
	if(isset($_SESSION['name']))
	{	$query="SELECT * FROM products ORDER BY product_id ASC";
		$sql=mysqli_query($conn,$query);
	
		while($rec=mysqli_fetch_row($sql))
		{
		
				$ID1=$rec[0]+1;
		}
	if(isset($_POST['submit']))
		{			
			
			
			
			$productid=$_POST['productid'];
		 	$productname=$_POST['productname'];
					
	
			$query=mysqli_query($conn,"SELECT * FROM products WHERE product_id='$productid' OR 
			product_title='$productname'");
			$num=mysqli_fetch_array($query);
			if($num>0)
			{
						
					
					$sql5="DELETE FROM cart where p_id='$productid'";
					$sql6="DELETE FROM products where product_id='$productid'";
					$sql7="DELETE FROM wishlist where productId='$productid'";					
									if ($conn->query($sql5) === TRUE AND $conn->query($sql6) === TRUE AND
									$conn->query($sql7) === TRUE) 
									{
										echo "<script>alert('Delete Product Details Successfully');</script>";
										echo '<script>location="deleteProduct.php"</script>';
									}
									else
									{
										echo "<script>alert('Given Details Not Match..Please Try Again');</script>";
										echo '<script>location="deleteProduct.php"</script>';
										
									}
			
			}
			else
			{
				echo "<script>alert('Given Details Not Match..Please Try Again');</script>";
				echo '<script>location="deleteProduct.php"</script>';
										
			}
			
		 
		}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome</title>  
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheetaa" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	


  
  
  
  <style>
  
  
  body {
  margin: 50;
  background-color:lightgrey;
}
.panel-heading {
    color: black !important;
    background-color: yellow !important;
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
 
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }

}



  ul {
  list-style-type: none;
  
  padding: 0;
  width: 100%;
  background-color: white;
}

li a {
  display: block;
  padding: 18px 16px;
  text-decoration: none;
  border-bottom: 1px solid #555;
}

  
  </style>
</head>
<body >

<div  class="container-fluid">
 <div class="row ">
   
   <div class="col-sm-12 col-xs-12">
      <div class="panel panel-default text-center">
        
        <div class="panel-body">
		
   <div class="col-sm-4 col-xs-12">
   </div>
<?php
if(isset($_SESSION['name']))
{
$name=$_SESSION['name'];
echo "
   <div class='col-sm-4 col-xs-12'>Welcome<font size='5' color='red'> ".$name."</font></div>
   <div class='col-sm-2 col-xs-12'>
   <a href='logout.php'>Logout</a>";

}
else
{
	echo "Login";
}

?>        
  </div>
  </div>
  </div>
  </div>
<div>

<hr>
</div>


<div  class="container-fluid">
   <div class="row">
    <div class="col-sm-2 col-xs-12">
      <div class="panel panel-default text-center">
        
        <div class="panel-body">
<ul>
 <li><a href="orderlist.php">Order List</a></li>
  <li><a href="welcomeadmin.php">Add Product</a></li>
 <li><a href="productlist.php">Product List</a></li> 
 <li><a href="deleteProduct.php">Delete Product</a></li> 
  <li><a href="contactdata.php">Contact Form Details</a></li>
</ul>          
  </div>
        
      </div>      
    </div>     
 
   <div class="col-sm-8 col-xs-12">
      <div class="panel panel-default text-center">
        
        <div class="panel-body">
		
          <div class="col-sm-2">
		  </div>
          <div class="col-sm-8 ">
      <div class="row">
          <div class="col-sm-2">
		  </div>
		  <div class="col-sm-8">
			<center><h2>Delete Product Details</h2></center><br>
		</div>
 <div class="col-sm-4">
		  </div>
		
						
								<center>
								<form method="POST" action="" class="form-horizontal" style="border:1px solid black;">
								<div class="row"><br></div>
								<div class="row">
									<label class="col-sm-4" >Enter Product Id:</label>
									<div class="col-sm-6"> 
									<input class="form-control unicase-form-control text-input"  
									name="productid" pattern="[0-9]+" title="Enter valid email id"  
									placeholder="Enter Product Id" type="text" required>
									</div>
								</div>
								<div class="row"><br><b>OR</b><br><br></div>
								<div class="row">
									<label class="col-sm-4" >Enter Product Name:</label>
									<div class="col-sm-6"> 
									<input class="form-control unicase-form-control text-input"  name="productname" 
									placeholder="Enter Product Name" type="text" ></div>
								</div>
								<div class="row"><br></div>
								
								<div class="row">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-6">
									<center>        
									<button class="btn btn-default pull-center button" type="submit" name="submit"
									style="width:30%;background-color:red;color:white;">DELETE</button><br></center>
									</div>
							
								</div>
										<div class="row"><br></div>
							</form>
	
	
	
	
</div>
		  
		  
        </div>
       </div>
      </div>      
    </div>





 
    <div class="col-sm-2 col-xs-12">
      <div class="panel panel-default text-center">
        
        <div class="panel-body" style="height:300px;">
  
        </div>
        
      </div>      
    </div>    
  </div>
</div>
</body>
</html>

