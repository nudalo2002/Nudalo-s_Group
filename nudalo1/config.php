
<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "vanvan_aquatics";

	$conn = mysqli_connect($server,$username,$password,$db);
	if(!$conn){
		die("CONNECTION FAILED" . $conn = mysqli_connect($server,$username,$password,$db));
	}
	// echo "HELLO WORLD"; 
?>