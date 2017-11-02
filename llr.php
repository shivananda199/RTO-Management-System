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
        <h3 class="tittle">Learner's License Registration</h3>
        <div class="student-grids">
          <div class="col-md-3 student-grid">
			<?php
				$conn = mysqli_connect("localhost","root","");
				mysqli_select_db($conn,"dbms_p1");
				$results1=0;

					$aad=$_GET["aad"];
					$passwd=$_GET["passwd"];
					$sql = "SELECT first_name,middle_name,last_name,dob FROM citizen where aadhar=$aad";

					$result = $conn->query($sql);
					if (mysqli_num_rows($result) > 0) {

						while($row = mysqli_fetch_assoc($result)) {
							echo "<p><br><br><br>";
							echo "<p><b>&emsp; &emsp; Aadhar number: " . $aad . "<br>";
							echo "<p>&emsp; &emsp; Name: " . $row["first_name"] ." ".$row["middle_name"]." ".$row["last_name"] . "<br>";
							echo "<p>&emsp; &emsp; Date of birth: " . $row["dob"] . "<br>";
							$dob=$row["dob"];						}
					}
					else {
						echo "0 results";
					}
					$age = floor((time() - strtotime($dob)) / 31556926);


					if($age<18)
					{echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Not eligible')
							window.location.href='home.html'
							</SCRIPT>");
					}
			?>
    </div>
    <div class="col-md-3 student-grid">
			<form method="post" action="llr_entry.php">
			
			<br><br>
				
<p><input name="aad" type="hidden" id="a" value="<?php echo $_GET["aad"] ?>"></p>
<p><input name="passwd" type="hidden" id="b" value="<?php echo $_GET["passwd"] ?>"></p>
				
				<p>&emsp;&emsp;&emsp;Select category of vehicle
				<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="one" value="LMV">LMV</p>
				<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="two" value="MCWG">MCWG</p>
				<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="three" value="MCWoG">MCWoG</p>
				<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="four" value="HPMV">HPMV</p>
				<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="five" value="HGMV">HGMV</p>
				<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type="submit"  name="submit" class="btn btn-primary">Submit</button>
      </b>
			</form>
    </div>
    <div class="col-md-3 student-grid">
      <img src="images/llr1.jpg" class="img-responsive">
    </div>
    <div class="col-md-3 student-grid">
      <img src="images/llr2.jpg" class="img-responsive">
    </div>
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

<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"dbms_p1");
if(isset($_POST['submit']))
{
	$q1=implode(',',$_POST['q1']);

	$sql="select edate,eid,id from llr order by id desc limit 1";
	$result=$conn->query($sql);
	$row=mysqli_fetch_row($result);
	
	echo "edate: ".$row;
	
	$x=$row[2]+1;
	$d=$row[0];
	$sub=substr($row[1],1);
	$y=(int)$sub;
	if(!strcmp('e10',$row[1]))
	{
		$date=date($d);
		$date_arr=explode('-',$date);
		$date2=Date("Y-m-d",mktime(0,0,0,$date_arr[1],$date_arr[2]+1,$date_arr[0]))."<br>";
		$eid='e01';
		$d=$date2;
	}
	else
	{
		$y=$y+1;
		$z=0;
		if($y==10)
			$z=1;
		else
			$z=0;
		$eid='e' . $z . $y%10;

	}
	function generate_password($length)
	{
		$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789$_';
		$str = '';
		$max = strlen($chars) - 1;
		for ($i=0; $i < $length; $i++)
			$str .= $chars[random_int(0, $max)];
		return $str;
	}
	$pwd=generate_password(10);

	$sql="INSERT INTO llr(aadhar,vtype,edate,eid,epwd) VALUES('$aad','$q1','$d','$eid','$pwd')";
	if (mysqli_query($conn, $sql))
		{
			echo "<script>window.alert('Record created successfully')</script>";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

}
?>



