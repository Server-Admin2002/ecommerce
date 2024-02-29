<?php


$tid=$_GET['uId'];
//echo $tid;

				
include('dbconn.php');
	
	echo '
		
		<div class="col-sm-10">
								<center><h3>Customer Details </h3></center>
								<table border="1" style="width:90%;text-align:center;font-size:17px">
								<tr><td><b>Sr Nu</b></td>
								<td><b>Customer Name</b></td>
								<td><b>Email Id</b></td>
								<td><b>Mob Nu.</b></td>
								
								<td><b>Address</b></td>
								<td><b>City</b></td>
								<td><b>Pincode</b></td>
								</tr>';
								

$query="SELECT * from user_info where user_id='$tid'";
$sql=mysqli_query($conn,$query);
$t=1;
	while($rec=mysqli_fetch_row($sql))
	{
		
			$booktitle=$rec[1];
		
echo '<tr><td>'.$t++.'</td>
	<td>'.$rec[1].'</td>
								<td>'.$rec[2].'</td>
								<td>'.$rec[4].'</td>
								<td>'.$rec[5].'</td>
								<td>'.$rec[6].'</td>
								<td>'.$rec[7].'</td>
								</tr>';
	}
	
?>
								
								
								</table><br>
								<a href="orderlist.php">Go to back</a>
							</div>