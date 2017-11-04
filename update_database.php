<?php   
				session_start();
				$username=$_SESSION['username'];
				$conn = mysqli_connect("localhost","root","");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				mysqli_select_db($conn,"dbms_p1");
					$sql1 = "delete from llr where llr_status=1";
					$result1 = $conn->query($sql1);
					$sql2 = "delete from dl where dl_status=1";
					$result2 = $conn->query($sql2);
					$sql3 = "delete from complaint";
					$result3 = $conn->query($sql3);
					if (($result1 && $result2 && $result3) == TRUE) {
								echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Database updated successfully!!')
								window.location.href='rto_admin.php'
								</SCRIPT>");
					}
?>