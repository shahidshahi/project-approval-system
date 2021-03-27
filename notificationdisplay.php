<?php
	
	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "registration";
		
		$conn =mysqli_connect($servername, $username, $password,$dbname);
		
		if ($conn) {
			
			//echo "<h2>successfully Connected<h2>"."\n";
		} 
		else{
			
			echo "Not Connected";
		}
		
		$msg=mysqli_query($conn,"SELECT * FROM notification");
		
		$row=mysqli_fetch_array($msg);
		$notification=$row['message'];
		echo "<script>
				alert('$notification');
				top.location.href='studentpage.php';
			</script>";
			
		
?>