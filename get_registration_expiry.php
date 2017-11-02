<!DOCTYPE HTML>
<html>
<title>Registration Table</title>
<body>
<p><h1><b><u>RTO Karnataka: Registration Table</u></b></h1></p>
<p><a href="rto_admin.php"><font color="blue" size="5"><b>Back</b></font></a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

<a href="admin_logout.php"><font color="red" size="5"><b>Logout</b></font></a></p>
<?php

				session_start();
				$username=$_SESSION['username'];
				$conn = mysqli_connect("localhost","root","");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				mysqli_select_db($conn,"dbms_p1");
				

$sql1 = "SELECT aadhar,name,cov,vno,reg_issue_date,reg_expiry_date,mail_id FROM reg where DATEDIFF(reg_expiry_date,CURDATE())<=30";

$result1 = $conn->query($sql1);


$subject="Vehicle Registration Update";

if($result1){
echo '<div align="center"><table align="left" border="2"
cellspacing="2" cellpadding="10">

<tr>
<td align="left"><b>Aadhaar No</b></td>
<td align="left"><b>Name</b></td>
<td align="left"><b>COV</b></td>
<td align="left"><b>Vehicle No</b></td>
<td align="left"><b>Registration Issue Date</b></td>
<td align="left"><b>Registration Expiry Date</b></td>
<td align="left"><b>Email</b></td>
</tr></div>';

while($row = mysqli_fetch_array($result1)){
$body='Hello,'.'Your Registration for vehicle with No '.$row['vno'].' will expire within a month. '.'Please visit nearest RTO Office to renew registration of your vehicle '.' - RTO Karnataka';
$link=$row['mail_id'];
echo '<div align="center"><tr><td align="left">' . 
$row['aadhar'] . '</td><td align="left">' . 
$row['name'] . '</td><td align="left">' .
$row['cov'] . '</td><td align="left">' . 
$row['vno'] . '</td><td align="left">' .
$row['reg_issue_date'] . '</td><td align="left">' . 
$row['reg_expiry_date'] . '</td><td align="left">' .
'<a href="mailto:'.$row['mail_id'].'?subject='.$subject.'&body='.$body.'">'.$row['mail_id'].'</a>'.'</td><td align="left"></td></tr></div>';
//echo '</tr>';
}

echo '</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

} else {

							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Couldn't fetch the data')
							window.location.href='rto_admin.php'
							</SCRIPT>");

}

mysqli_close($conn);
?>
<br>
</body>
</html>
