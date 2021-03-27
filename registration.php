


	<?php
		
		
		
		/*getting Values and storing values from the form*/
		
		$email=$_POST['remail'];
		$pass=$_POST['rpwd'];
		$designation=$_POST['designation'];
		
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
		
		//Inserting the data into database
		$sql = "INSERT INTO register (email, password, designation)VALUES ('$email','$pass','$designation')";

		if (mysqli_query($conn,$sql)) {
			//echo "<h2>Student Registered Successfully</h2>"."\n"."<br>";
		
		//sleep(5);
		
		echo "<script>
				alert('Registered');
				window.location.href='registrationvalidations.html';
				</script>";
			
		 } else {
		echo "<script>
				alert('Already Registered with this mail');
				window.location.href='registrationvalidations.html';
				</script>";	
		}
		
	?>
