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
	<link rel="stylesheet" type="text/css" href="style.css">
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
		
          <div class="col-sm-10 ">
      <div class="row">
          <div class="col-sm-2">
		  </div>
		  <div class="col-sm-10">
			<center><h2>Contact Form Details</h2></center><br>
		</div>
 <div class="col-sm-2">
		  </div>
    
	
						<table style="width:120%;text-center" border="1">
						<tr>
						<td>Sr Nu.</td>
						<td>Name</td>
						<td>Phone Nu</td>
						<td>Email Id</td>
						<td>Message</td>
						<td>Message Sending Date</td>
											
						</tr>
						
						
					<?php	
					
	$sql1 ="SELECT * from contactus ";
	
		
$query1 = mysqli_query($conn,$sql1);

		if (mysqli_num_rows($query1) > 0)
			{
				

			echo "<form method='post' action=''>";
				$n=1;
				while ($row=mysqli_fetch_array($query1)) {
					
					$product_id = $row["id"];
					$product_title = $row["name"];
					$product_price = $row["phno"];
					$product_image = $row["email"];
					$totamt=$row["msg"];
					$qty = $row["date"];
					
			
							echo '<tr>
							<td>'.$n.'</td>
							<td>'.$product_title.'</td>
							<td>'.$product_price.'</td>
							<td>'.$product_image.'</td>			
							<td>'.$totamt.'</td>
							<td>'.$qty.'</td>
							</tr>';
					$n++;
					
				}
			}
				echo '</table>';
				?>
	
	
	
	
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

