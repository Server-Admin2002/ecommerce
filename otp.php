<?php
include 'dbconn.php';
include 'loginfo.php';
global $totamt1;

if(isset($_GET['rnu']))
{
$rnu=$_GET['rnu'];
//echo "<h1>".$rnu."</h1>";
}


	$uid=$_SESSION['id'];
 
 
if(isset($_POST['makepayment']))
{
	$data="Product Ready for Shipping";
 $card="Card Payment Successfully";
 $otpnu=$_POST['otpnu'];
if($uid)
{
	
	$sql = "UPDATE cardpayment SET totamt='$totamt1',paymentstatus='Complete' WHERE userid='$uid' AND rnu='$rnu'";
	$sql1 = "UPDATE orders SET  paymentMethod='$card',orderStatus='$data' WHERE userId='$uid' AND trackId='$rnu'";
if ($conn->query($sql) === TRUE AND $conn->query($sql1) === TRUE)
	{
		
		$sql2 = "DELETE FROM cart WHERE user_id ='$uid'";
		
	if(mysqli_query($conn,$sql2)) 
	{
		
		echo '<script>alert("-Payment successfully Done ...Thank You!")</script>';
		echo "<script>location='myorder.php'</script>";

	}

			} 
	else 	{
    //echo "Error updating record: " . $conn->error;
		}

/*	$sql5 = "insert into cardpayment(owner,cvv,cardnum,expdate,expyr,userid)values('$owner','$cvv','$cardnum','$expdate','$expyr','$logid')";
			if(mysqli_query($conn,$sql5))
			{
				
					echo '<script>alert("-Match OTP, Your Payment Successfully.<br>Thank You..!!");</script>';
										//echo"<br><script>location='index.php'</script>";
		
				
			}
*/
}
else{
	echo '<a href="login.php" >Go to Login</a>';
}
	
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Card Payment</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
	
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    
<div class="container-fluid" >
       
        <div class="creditCardForm" style="border: 5px solid lightblue;">
          <div class="payment">
                <form method="POST" action="" >
                     

 <br>
Transaction Amount:
<b>Rs.
<?php


include 'dbconn.php';
	$sql1 ="SELECT * FROM orders WHERE trackId='$rnu'";
	
$query1 = mysqli_query($conn,$sql1);

						//if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query1) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			
				$totamt1=0;
				
				while ($row=mysqli_fetch_array($query1)) {
				
					$totamt = $row['totamt'];
							
					$totamt1= $totamt+$totamt1;
			
				
				}
				}
		echo $totamt1;
?>/-
</b>

<br>
  Debit Card Nu.:<b>
 XXXX
 XXXX
 XXXX
 </b>
 <hr>
 <b>Authenticate Payment</b>
 <br>
 OTP sent to your mobile number <b>
 <?php
 if(isset($_SESSION['mobile']))
	 {
 echo $_SESSION['mobile'];
	 }
 ?>
 </b>
 <br><br>
 Enter One Time Password(OTP): <input type="text" name="otpnu" class="form-control" maxlength="4"
 pattern="[0-9]+" title="Please Enter Only Numbers" maxlength="6"><br>
  
 <div class="form-group" id="pay-now">
                        <input type="submit" name="makepayment" class="btn btn-default" id="confirm-purchase" value="Make Payment">
                    </div>
                
 </form>	
	</div>
	</body>

</html>
