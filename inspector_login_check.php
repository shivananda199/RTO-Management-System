<?php   
				session_start();
				$conn = mysqli_connect("localhost","root","");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				mysqli_select_db($conn,"dbms_p1");
				if(isset($_GET['submit'])){
					$username=$_GET["username"];
					$password=$_GET["password"];
					$sql="select id,privilege from inspector where username='$username' and password='$password'";
					
					
					$result = $conn->query($sql);
					
					$row2=mysqli_fetch_row($result);
					if (mysqli_num_rows($result) > 0) {
						
						$_SESSION['username'] = $username;
						
						if($row2[1]=='llr'){
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Welcome LLR Inspector')
							window.location.href='llr_inspector.php'
							</SCRIPT>");
						}
						else if($row2[1]=='reg'){
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Welcome Vehicle Registration Inspector')
							window.location.href='reg_inspector.php'
							</SCRIPT>");
						}
						else if($row2[1]=='dl'){
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Welcome DL Inspector')
							window.location.href='dl_inspector.php'
							</SCRIPT>");
						}
					}
					else {
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Invalid Credentials')
							window.location.href='inspector_login.php'
							</SCRIPT>");
					}
				}
?>