<?php
					$conn = mysqli_connect("localhost","root","");
					mysqli_select_db($conn,"dbms_p1");
					if(isset($_POST['submit']))
					{
						$q1=$_POST['aad'];
						$com=$_POST['cdesc'];
						$date = date('Y-m-d');
						//echo $date;
						$sql="INSERT INTO complaint(aadhar,cdate,cdesc) VALUES('$q1','$date','$com')";

						$results2=mysqli_query($conn,$sql);
						
					if(!$results2)
					{
						echo "<script>alert(' unsuccessful')</script>";
					}
						echo "<script>windows.location.href='home.html'</script>";
					}
				?>
