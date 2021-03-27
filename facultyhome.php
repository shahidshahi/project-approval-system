<html>
	<head>
		<style>
			.style1{
					background:#404040;
					border-style:thick;
					padding-top:5px;
					padding-bottom:5px;
					margin-top:1%;
					color:white;
					padding-left:20px;
					height:75px;
					}
			
			.button1{
					border-radius: 8px;
					background-color: #404040;
					color: white;
					border: 1px solid white;
					font-family:sans serif;
					width:100px;
					height:33px;
					cursor:pointer;
					position:absolute;
					left:1200;
					margin-top:1%;
					}
			.button2{
					border-radius: 8px;
					background-color: #404040;
					color: white;
					border: 1px solid white;
					font-family:sans serif;
					width:100px;
					height:33px;
					cursor:pointer;
					position:absolute;
					left:1320;
					margin-top:1%;
					}
			.style2{
					color:white;
					position:absolute;
					left:1400px;
					margin-top:2%;
					text-decoration:none;
					cursor:pointer;
					}
		</style>
	</head>
	<body>
		<?php
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "registration";
				
			$conn =mysqli_connect($servername, $username, $password,$dbname);
			
			if ($conn)
			{
				//echo "<h2>successfully Connected<h2>"."\n";
			} 
			else
			{
				echo "Not Connected";
			}
			
			$sql="SELECT * FROM files where email not in(SELECT email from approvedlist)";
			$result_set=mysqli_query($conn,$sql);
			?>
			<form  method="POST">
			<?php
			while($row=mysqli_fetch_array($result_set))
			{?>
				<div class="style1">
			
					<input type="checkbox" name="checks[]" value="<?php echo $row['email'];?>"><?php echo $row['email'];?></input>
					<a class="style2" href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a>
					
				</div>
				
			<?php
			}?>
			<input class="button1" type="submit" name="submit_approve" value="Approve" onclick="form.action='approve.php'"/>
			<input class="button2" type="submit" name="submit_reject" value="Reject" onclick="form.action='reject.php'"/>
			</form>
			
					
	</body>
</html>
	
