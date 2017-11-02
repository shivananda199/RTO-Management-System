<!DOCTYPE html>
<html>
<head>
<title>RTO Karnataka</title>
<!--css-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/ken-burns.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/animate.min.css" type="text/css" media="all" />
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RTO WEB TEMPLATE" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--js-->
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--webfonts-->
</head>
<body>
	<!--header-->
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
				<!---Brand and toggle get grouped for better mobile display--->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="navbar-brand">
								<h1><a href="index.html">RTO <span>Karnataka</span></a></h1>
							</div>
						</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<nav class="link-effect-2" id="link-effect-2">
								<ul class="nav navbar-nav">
									<li><a href="home.html"><span data-hover="Home">Home</span></a></li>
									<li><a href="click_llr.php"><span data-hover="LLR">LLR</span></a></li>
									<li><a href="click_registration.php"><span data-hover="Registration">Registration</span></a></li>
									<li><a href="click_dl.php"><span data-hover="DL">DL</span></a></li>
									<!--<li><a href="status.php"><span data-hover="Status">Status</span></a></li>-->
									<li><a href="complaint.php"><span data-hover="Complaint">Complaint</span></a></li>
									<li><a href="gallery.html"><span data-hover="Gallery">Gallery</span></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</nav>
			</div>
		</div>
	<!--header-->
  <div class="content">
    <!--banner-bottom-->

    <!--student-->
    <div class="student-w3ls">
      <div class="container">
        <h3 class="tittle">Driver's License Registration</h3>
        <div class="student-grids">
          <div class="col-md-10 student-grid">
<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"dbms_p1");
					if(isset($_POST['submit']))
					{
						$q1=implode(',',$_POST['q1']);
						$aad = $_POST['aad'];
						$passwd = $_POST['passwd'];
						$results1=0;
						$flag=0;
						
					$sql1="select llr_issue_date,llr_status,llr_id,cov from llr where aadhar=$aad order by llr_id desc" ;
					$result1=$conn->query($sql1);

					$sql5="select first_name,middle_name,last_name,mail_id from citizen where aadhar=$aad";
					$result5=$conn->query($sql5);
					$row5=mysqli_fetch_row($result5);
					
					if(mysqli_num_rows($result1)>0)
					{
						while($row=mysqli_fetch_assoc($result1))
						{
							$llr_issue_date=$row["llr_issue_date"];
							$llr_status=$row["llr_status"];
							$llr_id=$row["llr_id"];
							$cov=$row["cov"];
						}
					}
					else
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Apply for LLR first')
							window.location.href='applyforllr.php'
							</SCRIPT>");
					}
					if($cov!=$q1)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Apply for vehicles for which LLR has been approved')
							window.location.href='applyfordl.php'
							</SCRIPT>");
					}
					if($llr_status==-1)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('You did not pass the LLR test. Apply for it again.')
							window.location.href='applyforllr.php'
							</SCRIPT>");
					}
					if($llr_status==0)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Your LLR is not yet approved')
							window.location.href='home.html'
							</SCRIPT>");
					}
					$age = floor((time() - strtotime($llr_issue_date)) / 2592000);
					if($age<1)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Apply after one month of LLR issue')
							window.location.href='home.html'
							</SCRIPT>");
					}
					else if($age>6)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Your LLR has expired. Apply for LLR again.')
							window.location.href='applyforllr.php'
							</SCRIPT>");
					}
					else
					{
						$sql="select edate,eid,dl_id from dl order by dl_id desc limit 1";
						$result=$conn->query($sql);
						$flag=1;
						
						$row=mysqli_fetch_array($result);
						
						$x=$row[2]+1;
						$d=$row[0];
						$d=date("Y-m-d", strtotime("+1 week"));
						$dayofweek = date('w', strtotime($d));
						if($dayofweek == 'Sunday')
							$d = date("Y-m-d", strtotime("+1 day"));
						$sub=substr($row[1],1);
						$y=(int)$sub;
						$y=$y+1;
						$sub=(string)$y;
						$eid='e'.$sub;

						$sql2 = "select city from address where aadhar='$aad'";
						$result2=$conn->query($sql2);
						$row2=mysqli_fetch_row($result2);
						$city=$row2[0];
						$sql3="SELECT rto_address from offices where district='$city'";
						$result3=$conn->query($sql3);
						$row3=mysqli_fetch_row($result3);
						$rto_address = $row3[0];
						
						$name = $row5[0] ." ".$row5[1]." ".$row5[2] ;
						$mail_id = $row5[3];
						
						$sql="INSERT INTO dl(aadhar,name,cov,edate,eid,passwd,mail_id) VALUES('$aad','$name','$q1','$d','$eid','$passwd','$mail_id')";
						if (mysqli_query($conn, $sql))
						{
								echo "<script>window.alert('Record created successfully')</script>";
								/*
								echo "---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
								echo "<br>Your DL test date:".$d."<br>";
								echo "---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
								echo "<br>Your DL test ID:".$eid."<br>";
								echo "---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
								//echo "Your LLR exam password:".$pwd."<br>";
								echo "<br>Your DL test venue:<br>".$rto_address."<br>";
								echo "---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
								echo "<br>Please note down above details to be able to take the DL test<br>
								<br>Please report to the test venue at 10:00AM on the specified date<br>";
								echo "---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
								*/
								//echo "<script>window.location.href='home.html'</script>";
						}
						else
						{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
					}
			}
?>
</div>

<div class="col-md-10">
	
<table border ="1" cellpadding="10" cellspacing="5" align="center">
<tr>
  <td align = "center" colspan="2"><b>DL TEST DETAILS</b></td>
</tr>

<tr>
  <td>Test Date</td>
  <td><?php echo "  ".$d ?></td>
</tr>
<tr>
  <td>Test ID</td>
  <td><?php echo "  ".$eid ?></td>
</tr>
<!--<tr>
<td>Exam password</td>
<td><?php echo $pwd ?></td>
</tr>-->
<tr>
<td>DL Test Venue</td>
<td> <?php echo "  ".$rto_address ?></td>
</tr>

<tr>
 <td colspan="2">
  <ul>
  <!--<li>Do not share password and ID</li>-->
  <li>Please be at 10:00 am on given date and venue </li>
  <li>Bring Aadhar card,2 passport size photographs</br>DOB proof and Address Proof</li>
  </ul>
 </td>
</tr>
</table>

<p align="center"><a href="home.html"><h2 align="center">Exit</h2></a></p>

    <div class="clearfix"></div>
  </div>
</div>
</div>
<!--student-->
</div>


<!--footer-->
  <div class="footer-w3">
    <div class="container">
      <div class="footer-grids">
        <div class="col-md-8 footer-grid">
          <h4>About Us</h4>
          <p>  Organisation of the Indian government responsible for maintaining a database of drivers and a database of vehicles for Karnataka.<span>
              It issues driving licences, organises collection of vehicle excise duty and sells personalised registrations.
              It also is responsible to inspect vehicle's insurance and clear the pollution test.</span></p>
        </div>
        <div class="col-md-4 footer-grid">
        <h4>Information</h4>
          <ul>
            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Bengaluru</li>
            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>080 2956789</li>
            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:karnataka@rto.com"> karnataka@rto.com</a></li>
            <li><i class="glyphicon glyphicon-time" aria-hidden="true"></i>Mon-Sat 10:00 hr to 17:00 hr</li>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
<!--footer-->
<!---copy--->
  <div class="copy-section">
    <div class="container">
      <div class="social-icons">
        <a href="#"><i class="icon1"></i></a>
        <a href="#"><i class="icon2"></i></a>
        <a href="#"><i class="icon3"></i></a>
        <a href="#"><i class="icon4"></i></a>
      </div>
    </div>
  </div>
  <!---copy--->
  </body>
</html>