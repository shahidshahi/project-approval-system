<html>
	<head>
		<style>
				.style1{
					background:#404040;
					border-style:thick;
					padding-top:5px;
					padding-bottom:5px;
					margin-top:1%;
					}
				h2{
				color:white;
				font-family:sans serif;
				padding-left:20px;
				}
				.style3{
				color:white;
				font-family:sans serif;
				padding-left:20px;
				}
				textarea{
							width:1300px;
							height:50px;
							margin-top:2%;
							margin-left:1%;
							margin-bottom:1%;
							background:#404040;
							color:white;
						}
				.button1{
					border-radius: 8px;
					background-color: #404040;
					color: white;
					border: 1px solid white;
					font-family:sans serif;
					width:100px;
					height:33px;
					position:absolute;
					cursor:pointer;
					left:1370;
					top:125;
					}
				.button2{
					border-radius: 8px;
					background-color: #404040;
					color: white;
					border: 1px solid white;
					font-family:sans serif;
					width:100px;
					height:33px;
					position:absolute;
					cursor:pointer;
					left:1370;
					top:325;
					}
				.style2{
						background:#404040;
					border-style:thick;
					padding-top:5px;
					padding-bottom:5px;
					margin-top:1%;
				}
		</style>
	</head>
	<body>
		<div class="style1">
			<h2>Notify</h2>
			<form action="notify.php" method="POST">
			<textarea name="notification" ></textarea>
			<button type="submit" class="button1">Notify</button>
			</form>
		</div>
		<div class="style2">
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
				?>
				<form method="POST">
				<?php
				while($row=mysqli_fetch_array($msg))
				{
				$notification=$row['message'];
				?>
				<label class="style3"><input type="checkbox" name="notifications[]" value="<?php echo $notification;?>"><?php echo $notification;?></input></label><br>
				<?php
				}
			?>
			<input class="button2" type="submit" name="submit_delete" value="Delete" onclick="form.action='deletenotification.php'"/>
			</form>
		</div>
	</body>
</html>