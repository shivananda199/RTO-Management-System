<?php   
				session_start();
				$username=$_SESSION['username'];
				$conn = mysqli_connect("localhost","root","");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				mysqli_select_db($conn,"dbms_p1");
				if(isset($_POST['submit'])){
					$password=$_POST["password"];
					$username=$_POST["username"];
					$privilege=$_POST["privilege"];
					$sql="insert into inspector(username,password,privilege) values ('$username','$password','$privilege')";
					$result = $conn->query($sql);
					if (mysqli_affected_rows($conn)==1) {
								echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Inspector added successfully!!')
								window.location.href='rto_admin.php'
								</SCRIPT>");
					}
					else
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Error adding Inspector!!')
								window.location.href='rto_admin.php'
								</SCRIPT>");
					}
				}
					
?>