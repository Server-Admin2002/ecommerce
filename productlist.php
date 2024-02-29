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
		
		

if(isset($_POST['add']))
{
	
	 $product_cat=$_POST['productcate'];
	 $product_brand=$_POST['productbrand'];
	 $product_title=$_POST['producttitle'];
	 $product_price=$_POST['productprice'];
	 $product_desc=$_POST['productdesc'];

	
	
if(isset($product_cat) AND isset($product_brand) AND isset($product_title) AND isset($product_price))
{

	$imagename = $_FILES['file']['name'];
        // print $name;
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        //alert ("submited"); 
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) )
		{
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
		
	
		$sql1 = "INSERT INTO products(product_cat,product_brand,product_title,product_price,product_desc,imgname,img)
		VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$imagename','$image')";
		
			if ($conn->query($sql1) === TRUE)
			{
	
						
					echo '<script>alert("-Product Added Successfully...Thank You.");</script>';
					echo"<br><script>location='welcomeadmin.php'</script>";
			
			}
			else {
					echo "<br><br>Error: " . $sql1. "<br>" . $conn->error;
				}
		
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
		
          <div class="col-sm-10 ">
      <div class="row">
          <div class="col-sm-4">
		  </div>
		  <div class="col-sm-6">
			<center><h2>Product List </h2></center>
		</div>
 <div class="col-sm-2">
		  </div>
		
						<table style="width:120%;text-center" border="1">
						<tr>
						<td>Sr Nu.</td>
						<td>Product Id</td>
						<td style="width:200px;">Product Title</td>
						<td style="width:200px;">Product Description</td>
						<td>Product Price</td>
						<td>Product Image</td>
							
						</tr>
						
						
					<?php	
					
	$sql1 ="SELECT * from products ORDER BY product_id ASC";
	
		
$query1 = mysqli_query($conn,$sql1);

		if (mysqli_num_rows($query1) > 0)
			{
				

			echo "<form method='post' action=''>";
				$n=1;
				while ($row=mysqli_fetch_array($query1)) {
					
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_des = $row["product_desc"];
					$product_price = $row["product_price"];
					$product_image = $row["img"];
					
								
			
							echo '<tr>
							<td>'.$n.'</td>
							<td>'.$product_id.'</td>
							<td>'.$product_title.'</td>
								<td>'.$product_des.'</td>
							<td>'.$product_price.'</td>						
							<td><img src="'.$product_image.'" height="100px" width="100px"></td>
	
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

