


	<?php
		
		
		
		/*getting Values and storing values from the form*/
		
		$remail=$_POST['email'];
		$rpass=$_POST['pwd'];
		
		
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
		
		$result=mysqli_query($conn,"SELECT * FROM register where email='$remail' and password='$rpass'");
		
		$row=mysqli_fetch_array($result);
		if($row['email']==$remail and $row['password']==$rpass and $row['designation']=="Faculty")
		{
			
				echo "<script>
						top.location.href='facultypage.html';
						</script>";
			
			
		}
		else
		{
			echo "<script>
					alert('Invalid Credentials');
					window.location.href='loginfaculty.html';
					</script>";
		}

		/*if (mysqli_query($conn,$sql)) {
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
		}*/
		
	?>
