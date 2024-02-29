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
 <li><a href="orderlist.php">Product Order List</a></li>
  <li><a href="welcomeadmin.php">Add Product Details</a></li>
 <li><a href="productlist.php">Product List</a></li> 
 <li><a href="deleteproduct.php">Delete Product</a></li> 
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
          
		<center>
							<h2>Add Watch Details</h2>
			<br>
						<form method="POST" action="" enctype='multipart/form-data'>
						<table border="1">
						<tr><td><b>Watch Id :</b></td>
						<td>
						
						<input class="form-control"  name="productid" placeholder="" type="text"
						value="<?php
if(isset($ID1))
{
	echo $ID1;
}
else
{
	$ID1=1;
	echo $ID1;
}
?>" readonly required></td>
						
						</td></tr>

<tr><td colspan="2"><br></td></tr>
<tr><td><b>Watch Categery :</b></td>
						<td>
						<select class="form-control" name="productcate" required>
						<option value="1">Titan</option>
						<option value="2">Fastrack</option>
						<option value="3">Sonata</option>
						<option value="4">Raga</option>
						<option value="5">General</option>
						</select>
						
						</td>
						</tr>

			
			<tr><td colspan="2"><br></td></tr>
<tr><td><b>Watch Brand:</b></td>
						<td>
						<input type="text" class="form-control" name="productbrand" placeholder="Enter Watch Brand" required>
						
						</td>
						</tr>
			

			<tr><td colspan="2"><br></td></tr>			
						<tr><td><b>Watch Title:</b></td>
						<td>
						<input class="form-control"  name="producttitle" placeholder="Enter Watch Title" 
						type="text" required>
						</td></tr>
						<td colspan="2"><br>
						</td>
						</tr>
												
						
						<tr><td><b>Watch Price:</b></td>
						<td>
						<input class="form-control"  name="productprice" pattern="[0-9]+" maxlength="5"
						placeholder="Enter Watch Price" type="text" required>
						</td></tr>			
						
						<tr>
						<td colspan="2"><br>
						</td>
						</tr>
						<tr><td><b>Watch Description:</b></td>
						<td>
						<input class="form-control"  name="productdesc" placeholder="Enter Watch Description" 
						type="text" required>
						</td></tr>
						<tr>
						<td colspan="2"><br></td></tr>
						<tr><td><b>Watch Image:</b></td>
						<td>
						  <input type='file' name='file' / required>
						  </td>
						</tr>
					
						
						<tr>
						<td colspan="2"><br></td></tr>
					<?php
if(isset($_SESSION['name']))
{
	echo'<tr><td></td><td colspan="2">
						<button class="btn btn-default pull-center" type="submit" name="add" 
						style="height:50%;width:50%;background-color:black;color:white;">Add</button>
							</td></tr>';
}
?>
</table>
					
						</form></center>
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

