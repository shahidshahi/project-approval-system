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
			
			
	$notifies=[];
	$i=0;
	if(isset($_POST["submit_delete"]))
    {
        if(!empty($_POST["notifications"]))
        {
			foreach($_POST["notifications"] as $notification)
            {
				
				$notifies[$i++]=$notification;
				
			}
		}
		else
		{
			echo "<script>
					alert('Not checked');
					window.location.href='notification.php';
				</script>";
		}
	}
	foreach($notifies as $note)
	{
		$sql="DELETE from notification where message='$note'";
		if(mysqli_query($conn,$sql))
		{
			echo "<script>
					alert('Selected notifications deleted successfully');
					window.location.href='notification.php';
					</script>";
		}
	}
?>