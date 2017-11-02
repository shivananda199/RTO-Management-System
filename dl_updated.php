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
					$dl_id=$_GET["dl_id"];
					$dl_status=$_GET["dl_status"];
					$sql="select dl_id,dl_status,name,cov,mail_id from dl where aadhar='$aad' and dl_id='$dl_id'";
					
					
					$result = $conn->query($sql);
					
					$row3=mysqli_fetch_row($result);
					$name = $row3[2];
					$cov = $row3[3];
					$mail_id = $row3[4];
					if (mysqli_num_rows($result) > 0) 
					{
						if($row3[1]==0)
						{
							$date=Date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")))."<br>";
							$sql1="update dl set dl_status=$dl_status,dl_issue_date='$date' where aadhar='$aad' and dl_id='$dl_id'";
							if($dl_status==1)
							{
								$date=Date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")))."<br>";
								$sql1="update dl set dl_status=$dl_status,dl_issue_date='$date' where aadhar='$aad' and dl_id='$dl_id'";
								$sql6="select license_no from license order by id desc limit 1";
								$result6=$conn->query($sql6);
								$row6=mysqli_fetch_row($result6);
								$strnum=substr($row6[0],-8,8);
								$num = (int)$strnum;
								$num =$num+1;
								$strnum = (string)$num;
								$lno = 'KA'.$strnum;
								$exp = Date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")+2))."<br>";
							$sql7="insert into license(aadhar,name,license_no,cov,license_issue_date,license_expiry_date,mail_id) values ('$aad','$name','$lno','$cov','$date','$exp','$mail_id')";
							
								if($conn->query($sql1)==TRUE && $conn->query($sql7)==TRUE){
								echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Record Updated successfully!!')
								window.location.href='dl_update.php'
								</SCRIPT>");
								}
								else
								{
									echo "Error updating record: " . $conn->error;
								}
							}
							if($conn->query($sql1)==TRUE){
								echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Record Updated successfully!!')
								window.location.href='dl_update.php'
								</SCRIPT>");
							}
							else
							{
								echo "Error updating record: " . $conn->error;
							}
							
						}
						else if($row3[1]==1 || $row3[1]==-1){
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Already updated!!')
							window.location.href='dl_update.php'
							</SCRIPT>");
						}
					}
					else {
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('DL entry not found')
							window.location.href='dl_update.php'
							</SCRIPT>");
					}
				}
?>