<?php



//include 'dbconn.php';
session_start();
if(isset($_SESSION['username']))
{
		$username=$_SESSION['username'];
		echo '<div classf="container-flued">
		<div class="row">
		<div class="col-sm-12">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-6">
		<h3>Hello &nbsp&nbsp'.$username.'</h3>
		</div>';
		echo '
		<div class="col-sm-2">
		&nbsp&nbsp<a href="logout.php" style="color:white;">Logout</a>';
		
		echo '
	</div></div></div></div><hr>';
}


?>