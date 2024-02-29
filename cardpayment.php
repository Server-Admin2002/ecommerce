<?php
include 'dbconn.php';
include 'loginfo.php';
if(isset($_GET['rnu']))
{
$rnu=$_GET['rnu'];
//echo "<h1>".$rnu."</h1>";
}
if(isset($_POST['confirm']))
{
	
 $owner=$_POST['owner'];
 $cvv=$_POST['cvv'];
 $cardnum=$_POST['cardnum'];
 $expdate=$_POST['expdate'];
 $expyr=$_POST['expyr'];
 $logid=$_SESSION['id'];

if($logid)
{
	
	$sql5 = "insert into cardpayment(owner,cvv,cardnum,expdate,expyr,userid,rnu)values('$owner','$cvv','$cardnum','$expdate','$expyr','$logid','$rnu')";
			if(mysqli_query($conn,$sql5))
			{
				
					echo '<script>alert("-Added Successfully");</script>';
					//echo"<br><script>location='index.php'</script>";
			         echo "<script>location='otp.php?rnu=$rnu'</script>";
		
				
			}
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

		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	
</head>

<body>
    <div class="container-fluid">
       
        <div class="creditCardForm" style="border:1px solid black;">
            <div class="heading">
                <h1>Confirm Purchase</h1>
            </div>
            <div class="payment">
                <form method="POST" action="">
                    <div class="form-group owner">
                        <label for="owner">Owner</label>
                        <input type="text" name="owner" class="form-control" id="owner" pattern="[a-z A-Z]+" 
						title="Enter Only Characters" required>
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">CVV</label>
                        <input type="text" name="cvv" class="form-control" maxlength="3" id="cvv" 
						pattern="[0-9]+" title="Enter Only Numbers" required>
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" name="cardnum" class="form-control" id="cardNumber" 
						maxlength="8" id="cvv" 
						pattern="[0-9]+" title="Enter Only Numbers" required>
                    </div>
                    <div class="form-group" id="expiration-date">
                        <label>Expiration Date</label>
                        <select name="expdate" required>
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="expyr" required>
                            
                            <option value="21"> 2021</option>
							<option value="22"> 2022</option>
							<option value="23"> 2023</option>
							<option value="24"> 2024</option>
                        </select>
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="assets/images/visa.jpg" id="visa">
                        <img src="assets/images/mastercard.jpg" id="mastercard">
                        <img src="assets/images/amex.jpg" id="amex">
                    </div>
                    <div class="form-group" id="pay-now">
                        <input type="submit" name="confirm" class="btn btn-default" id="confirm-purchase" value="confirm">
                    </div>
                </form>
            </div>
        </div>

    </div></body>

</html>
