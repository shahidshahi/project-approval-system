<?php
		session_start();
		
		/*Defining the database*/
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "registration";
		
		// Create connection
		$conn =mysqli_connect($servername, $username, $password,$dbname);
		
		// Check connection
		if ($conn) {
			//echo "<h2>successfully Connected<h2>"."\n";
		} 
		else{
			
			echo "Not Connected";
		}
		//To view a file
		
		$fileemail=$_SESSION['email'];
		$sql="SELECT * FROM files where email='$fileemail'";
		$result_set=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result_set))
		{
		
			
			?>
		<a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a>
		<?php
		}
		
?>