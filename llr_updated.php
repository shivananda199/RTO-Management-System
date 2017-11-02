<?php   
				session_start();
				$username=$_SESSION['username'];
				$conn = mysqli_connect("localhost","root","");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				mysqli_select_db($conn,"dbms_p1");
				if(isset($_GET['submit'])){
					$aad=$_GET["aad"];
					$llr_id=$_GET["llr_id"];
					$llr_status=$_GET["llr_status"];
					$sql="select llr_id,llr_status from llr where aadhar='$aad' and llr_id='$llr_id'";
					
					
					$result = $conn->query($sql);
					
					$row2=mysqli_fetch_row($result);
					
					if (mysqli_num_rows($result) > 0) {
						if($row2[1]==0){
							$date=Date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")))."<br>";
							$sql1="update llr set llr_status=$llr_status,llr_issue_date='$date' where aadhar='$aad' and llr_id='$llr_id'";
							if($conn->query($sql1)==TRUE){
								echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Record Updated successfully!!')
								window.location.href='llr_update.php'
								</SCRIPT>");
							}
							else
							{
								echo "Error updating record: " . $conn->error;
							}
							
						}
						else if($row2[1]==1 || $row2[1]==-1){
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Already updated!!')
							window.location.href='llr_update.php'
							</SCRIPT>");
						}
					}
					else {
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('LLR entry not found')
							window.location.href='llr_update.php'
							</SCRIPT>");
					}
				}
?>