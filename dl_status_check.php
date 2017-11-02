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
        <h3 class="tittle">Driver's License Status</h3>
        <div class="student-grids">
          <div class="col-md-10 student-grid">
			<?php
				$conn = mysqli_connect("localhost","root","");
				mysqli_select_db($conn,"dbms_p1");
				$results1=0;

					$aad=$_GET["aad"];
					$passwd = $_GET["passwd"];
					$sql = "SELECT first_name,middle_name,last_name,dob FROM citizen where aadhar=$aad";

					$sql1 = "SELECT aadhar,dl_status,passwd FROM dl where aadhar=$aad";
					$result2 = $conn->query($sql1);
					$row2=mysqli_fetch_row($result2);
					
					
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
					
					if (mysqli_num_rows($result2) > 0 && $passwd!=$row2[2]){
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Password incorrect')
							window.location.href='dl_status.php'
							</SCRIPT>");
					}
						
						
					if (mysqli_num_rows($result2) > 0 && $passwd==$row2[2]){
						$row2=mysqli_fetch_row($result2);
						if($row2[1]==1){
							echo "<br><br><br>&emsp; &emsp;Your DL Status: Approved";
						}	
						else if($row2[1]==-1){
							echo "<br><br><br>&emsp; &emsp;Your DL Status: Rejected, apply for DL again!!";
						}
						else{
							echo "<br><br><br>&emsp; &emsp;Your DL Status: Not yet approved";
						}
					}
					else{
						echo "<br><br>&emsp; &emsp; You have not applied for DL";
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
		</div>
		</div></div></div>
		<p align="center"><a href="home.html"><h2 align="center">Exit</h2></a></p>
		</body>
		</html>