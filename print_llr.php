<html>
<title>Print LLR</title>
<body>
<?php
session_start();
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"dbms_p1");

$aad = $_SESSION['aadhar'];
//echo $aad;

$sql1 = "select gender,first_name,middle_name,last_name from citizen where aadhar='$aad'";
$result1 = $conn->query($sql1);
$row1 = mysqli_fetch_row($result1);
$name = $row1[1] ." ".$row1[2]." ".$row1[3];
$gender = $row1[0];
if($gender=='M')
	$image = "images/t3.jpg";
else $image = "images/t2.jpg";
//echo $name;


$sql2 = "select street,city,state from address where aadhar='$aad'";
$result2 = $conn->query($sql2);
$row2 = mysqli_fetch_row($result2);
$address = $row2[0].", ".$row2[1].", ".$row2[2];
//echo $address;

$sql3 = "select llr_issue_date,cov from llr where aadhar='$aad' order by llr_id desc limit 1";
$result3 = $conn->query($sql3);
$row3 = mysqli_fetch_row($result3);
$llr_issue_date = $row3[0];
$cov = $row3[1];
$llr_expiry_date = date("Y-m-d", strtotime("+6 months",strtotime($llr_issue_date)));
//echo $llr_expiry_date;
?>

<br><br><br>
<table border ="1" cellpadding="10" cellspacing="5" align="center">
<tr>
  <td align = "center" colspan="3" ><b>RTO Karnataka</br> Learner's License</b></td>
</tr>

<tr>
  <td>Aadhar </td>
  <td width="200px"><?php echo $aad ?></td>
  <td width="100px" rowspan="3">  <img src="<?php echo $image ?>" height="100px" width="100px">    </td>   
</tr>
<tr>
  <td>Name  </td>
  <td><?php echo $name ?></td>
  
</tr>
<tr>
<td>COV</td>
<td><?php echo $cov ?></td>
</tr>
<tr>
<td>Address</td>
<td colspan="2"><?php echo $address ?> </td>
</tr>

<tr>
<td>LLR Issue-Date</td>
<td colspan="2"><?php echo $llr_issue_date ?></td>
</tr>


<tr>
<td>LLR Expiry-Date</td>
<td colspan="2"><?php echo $llr_expiry_date ?></td>
</tr>

<tr >
<td  colspan="3" height=100px align=center>
<img src="images/GOVERNMENT-LOGO-1.jpg" height="100px" width="100px">
</td>
</tr>

<tr>
<td colspan="3" align="center">
This is the PROVISIONAL Learner's License
</td>
</tr>

</table>
<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button onclick="myFunction()" align="center">Print</button>

<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>


