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
		if($_FILES['myfile']['name']!="")
		{
			$fileemail=$_SESSION['email'];
			$file = rand(1000,100000)."-".$_FILES['myfile']['name'];
			$file_loc = $_FILES['myfile']['tmp_name'];
			$file_size = $_FILES['myfile']['size'];
			$file_type = $_FILES['myfile']['type'];
			
			#To Upload a file Creating a directory
			
			$folder="uploads";
			
			if($file_size<=1024000 && $file_type=='application/pdf')
			{
					$sql="INSERT INTO files(email,file,type,size) VALUES('$fileemail','$file','$file_type','$file_size')";
					if(mysqli_query($conn,$sql))
					{
						move_uploaded_file($file_loc,$folder.'/'.$file);
						mysqli_query($conn,"DELETE FROM rejectedlist WHERE email='$fileemail';");
						echo "<script>
									alert('Uploaded Successfully');
									top.location.href='studentpage.php';
									</script>";
					}
					else
					{
						echo "<script>
									alert('Already Uploaded');
									top.location.href='studentpage.php';
									</script>";
					}
			}
			else
			{
				echo "<script>
							alert('Attach only pdf file with size <= 1MB');
							top.location.href='studentpage.php';
						</script>";
			}
		}
		else
		{
			echo "<script>
						alert('Attach file');
						top.location.href='studentpage.php';
					</script>";
		}
		
?>