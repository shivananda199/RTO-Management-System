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
<script> function otp()
          {
            window.alert("Comlaint filed successfully");
          }
</script>
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
									<li class="active"><a href="home.html"><span data-hover="Home">Home</span></a></li>
									<li><a href="click_llr.php"><span data-hover="LLR">LLR</span></a></li>
									<li><a href="click_registration.php"><span data-hover="Registration">Registration</span></a></li>
									<li><a href="click_dl.php"><span data-hover="DL">DL</span></a></li>
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
        <h3 class="tittle">Complaint</h3>
        <div class="student-grids">
          <div class="col-md-6 student-grid">
			<form  method="post">
				<br><br><br>
				&emsp;&emsp;&emsp;Aadhar number: <input type="text" name="aad" ><br><br>
				&emsp;&emsp;&emsp;Compliant Description:<br>&emsp;&emsp;&emsp; <textarea rows="5" cols="50" name="cdesc" ></textarea><br><br>
				&emsp;&emsp;&emsp;<button type="submit"  name="submit" onclick="return otp()" class="btn btn-primary">Submit</button>
			</form>
    </div>
    <div class="col-md-6 student-grid">
      <img src="images/comp.jpg" class="img-responsive">
    </div>

    <div class="clearfix"></div>
  </div>
</div>
</div>
<!--student-->
</div>
<!--content-->
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
						$q1=$_POST['aad'];
						$com=$_POST['cdesc'];
						$date = date('Y-m-d');
						echo $date;
						$sql="INSERT INTO complaint(aadhar,cdate,cdesc) VALUES('$q1','$date','$com')";

						$results2=mysqli_query($conn,$sql);
					if(!$results2)
					{
						echo "<script>alert(' unsuccessfull')</script>";
					}
					}
				?>