<html>
	<head>
		<style>
			.style1{
					background:#404040;
					border-style:thick;
					padding-top:10px;
					padding-bottom:10px;
					padding-left:1450px;
					}
			.style2{
					background:#404040;
					border-style:thick;
					padding-top:5px;
					padding-bottom:75px;
					margin-top:1%;
					
					}
			.style3{
					background:#404040;
					border-style:thick;
					padding-top:5px;
					padding-bottom:5px;
					margin-top:1%;
					}
			.button1{
					color:white;
					cursor: pointer;
					border: none;
					text-decoration: none;
					display: inline-block;
					font-family:sans serif;
					padding-top:7px;
					}
			.img1{
					
					position:absolute;
					left:1425;
				}
			.img2{
					
					position:absolute;
					left:1280;
					top:20;
				}
			h2{
				color:white;
				font-family:sans serif;
				padding-left:20px;
				}
			h4{
				color:white;
				font-family:sans serif;
				padding-left:20px;
			}
			.button3{
					border-radius: 8px;
					background-color: #404040;
					color: white;
					border: 1px solid white;
					font-family:sans serif;
					width:100px;
					height:33px;
					margin-left:1%;
					cursor:pointer;
					margin-top:7%;
					margin-bottom:1%;
					}
			
			
			#custom-button{
					color:white;
					margin-left:77%;
					margin-bottom:0%;
					border-radius: 8px;
					background-color: #404040;
					border: 1px solid white;
					font-family:sans serif;
					padding-left:30px;
					padding-right:30px;
					padding-bottom:7px;
					padding-top:7px;
					cursor:pointer;
					position:absolute;
					top:150px;
					}
			.button4{
					border-radius: 8px;
					background-color: #404040;
					color: white;
					border: 1px solid white;
					font-family:sans serif;
					width:100px;
					height:33px;
					cursor:pointer;
					position:absolute;
					left:1310px;
					top:150;
					margin-bottom:1%;
					}
			.button5{
					border-radius: 8px;
					background-color: #404040;
					color: white;
					border: none;
					font-family:sans serif;
					width:100px;
					height:30px;
					cursor:pointer;
					font-size:16px;
					position:absolute;
					left:1310;
					top:120;
					}
			.button6{
					color:white;
					position:absolute;
					left:1100px;
					margin-left:1%;
					margin-top:1%;
					
					}
					
			#custom-text {
					color:white;
					position:absolute;
					left:1035;
					top:155;
				}
				.style4{
					color:white;
					position:absolute;
					left:1180px;
					top:180px;
				}
		</style>
	</head>
	<body>
		<div class="style1">
			<a href="index.html" class="button1">logout</a>
			<img src="logout.jpg" height="30" width="30" class="img1"/>
		</div>
		<div class="style2">
			<h2>Abstract</h2>
			
			
			<form method="POST">
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
		<a class="button6" href="uploads/<?php echo $row['file'] ?>" target="_blank">view</a>
		<?php
		
		}
		?>
			</form>
			<span id="custom-text"></span>
			<form method="POST" action="upload.php" enctype="multipart/form-data">
			<input type="file" id="real-file" hidden="hidden" name="myfile"/>
			<button type="button" id="custom-button" name="btn2">Attach</button>
			<button type="submit" name="btn" class="button4">Upload</button>
			</form>
			
			<script>
			const realFileBtn = document.getElementById("real-file");
			const customBtn = document.getElementById("custom-button");
			const customTxt = document.getElementById("custom-text");

			customBtn.addEventListener("click", function() {
			realFileBtn.click();
			});

			realFileBtn.addEventListener("change", function() {
			if (realFileBtn.value) {
			customTxt.innerHTML = realFileBtn.value.match(
			/[\/\\]([\w\d\s\.\-\(\)]+)$/
			)[1];
			} else {
			customTxt.innerHTML = "No file chosen, yet.";
			}
			});

			</script>
			<p class="style4">*attach only pdf file with size <=1MB</p>
		</div>
		<div>
			<p></p>
		</div>
		<div class="style3">
			<h2>Notification</h2>
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
				
				while($row=mysqli_fetch_array($msg))
				{
				$notification=$row['message'];
				echo "<marquee behavior='scroll'><h4>$notification</h4></marquee>";
				}
			?>
		</div>
	</body>
</html>