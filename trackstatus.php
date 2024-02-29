<?php


$tid=$_GET['rnm'];
//echo $tid;

				
include('dbconn.php');
	$sql1 ="SELECT * from orders where trackId='$tid'";
		
$query1 = mysqli_query($conn,$sql1);
		if (mysqli_num_rows($query1) > 0)
			{
			echo "<form method='post' action=''>";
				$n=0;
				while ($row=mysqli_fetch_array($query1)) {
						
			
			                         $tcid = $row["trackId"];
					                 $ost= $row["orderStatus"];
						}
						}
						echo "<h1>Order Tracking Details !</h1>";
								echo 'Trackinh Id:-------------------->'.$tid.'<br><br>
							Shipping Status---------------->'.$ost.'<br><br><br><br>
							<b>Thank You</b>';
			
			echo '<br><br><a href="ordertrackhistry.php?rnu='.$tid.'">Go to back Page</a>';
				
				
				
				?>
			
	