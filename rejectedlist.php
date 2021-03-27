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
					height:50px;
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
			
			$sql="SELECT * FROM rejectedlist";
			$result_set=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_array($result_set))
			{?>
				<div class="style1">
			
					<p><?php echo $row['email'];?></p>
					
				</div>
				
			<?php
			}?>
			<?php
				$sql1="SELECT * FROM register where email not in(select email from rejectedlist UNION select email from approvedlist)";
				$result_set1=mysqli_query($conn,$sql1);
				while($row=mysqli_fetch_array($result_set1))
				{
					if($row['email']!='facultycse@gmail.com')
					{?>
					<div class="style1">
				
						<p><?php echo $row['email'];?></p>
						
					</div>
				
			<?php
			}
				}?>
			
	</body>
</html>