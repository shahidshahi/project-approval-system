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
			
	$mails=[];
	$i=0;
	$sent=0;
    if(isset($_POST["submit_approve"]))
    {
        if(!empty($_POST["checks"]))
        {
			foreach($_POST["checks"] as $approved)
            {
				
				$mails[$i++]=$approved;
				
			}
		}
		else
		{
			echo "<script>
					alert('Not checked');
					window.location.href='facultyhome.php';
				</script>";
		}
	}
	$mailscount=count($mails);
	
	
	foreach($mails as $sendmail)
	{
		
    $mailto = $sendmail;
    require_once 'PHPMailer-master/PHPMailerAutoload.php';
   
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "projectteam3cse@gmail.com";
   $mail ->Password = "project@team3";
   $mail ->SetFrom("projectteam3cse@gmail.com");
   
   $mail ->Body = "Abstract Approved";
   $mail ->AddAddress($mailto);

   if($mail->Send())
   {
	   mysqli_query($conn,"INSERT INTO approvedlist (email)VALUES ('$sendmail')");
	   //mysqli_query($conn,"DELETE FROM files WHERE email='$sendmail';");
       echo "<script>
			alert('Selected Abstracts Approved');
			window.location.href='facultyhome.php';
		</script>";
   }
  }
  
	
?>
