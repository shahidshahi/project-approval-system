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
		
		$msg=$_POST['notification'];
		
		$sql="INSERT into notification values('$msg')";
		if(mysqli_query($conn,$sql))
		{
			if($msg!="")
			{
					echo "<script>
							alert('Notified Successfully');
							window.location.href='notification.php';
						  </script>";
			}
			else
			{
					echo "<script>
							alert('Please Enter Message');
							window.location.href='notification.php';
					      </script>";
			}
		}
		else
		{
			echo "Not notified";
		}
?>