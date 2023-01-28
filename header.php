<?php
if (session_status() === PHP_SESSION_NONE)
{
session_start();
}
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set('Asia/Kolkata');
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Electricity Bill - Online Electricity Bill Payment System</title>
           <style type="text/css">

.paging-nav {
  text-align: right;
  padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 1px 7px;
  background: #91b9e6;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #187ed5;
  font-weight: bold;
}

.paging-nav,
#tableData {
  width: 400px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}
</style>

    
	<!-- Google Fonts -->
	<link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700itali" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,500,200,100,600" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="bootstrap/bootstrap.css">
	<link rel="stylesheet" href="css/misc.css">
	<link rel="stylesheet" href="css/blue-scheme.css">
	
	<!-- JavaScripts -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

</head>
<body>
	<header class="site-header clearfix">
		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<div class="pull-left logo">
						<a href="index.php" style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif" >
							<img src="images/ebill.png" style="height: 50px;"  alt="Online Electricity Bill Payment System">
						</a>
					</div>	<!-- /.logo -->

					<div class="main-navigation pull-right">

						<nav class="main-nav visible-md visible-lg">
							<?php
							if(isset($_SESSION['customerloginid']))
							{
							?>
                            <ul class="sf-menu">
								<li  <?php
                                if(basename($_SERVER['PHP_SELF']) == "index.php")  
								{                           
								echo " class='active' ";
								}
								?>><a href="index.php">Home</a></li>
								                               
					            <li <?php
                                if(basename($_SERVER['PHP_SELF']) == "customerpanel.php" || basename($_SERVER['PHP_SELF']) == "profile.php" || basename($_SERVER['PHP_SELF']) == "changecustomerpassword.php" )
								{
								echo " class='active' ";
								}
								?>><a href="#">Customer Area</a>
					            	<ul>
					            		<li><a href="customerpanel.php">Customer Panel</a></li>
					            		<li><a href="profile.php">Profile</a></li>
					            		<li><a href="changecustomerpassword.php">Change Password</a></li>
					            	</ul>
					            </li>
					            <li <?php
								if(basename($_SERVER['PHP_SELF']) == "account.php" || basename($_SERVER['PHP_SELF']) == "viewaccount.php" )
								{
								echo " class='active' ";
								}
                               ?>><a href="viewaccount.php">Account</a>
									<ul>
										<li><a href="account.php">Add Account</a></li>
										<li><a href="viewcustomeraccount.php">View Accounts</a></li>
									</ul>
					            </li>
								
								<li  <?php
                                if(basename($_SERVER['PHP_SELF']) == "paymentpanel.php")
								{                        
								echo " class='active' ";
								}
								?>><a href="paymentpanel.php">Payment Panel</a></li> 
								
					           <li <?php
								if(basename($_SERVER['PHP_SELF']) == "viewcustbilling.php" || basename($_SERVER['PHP_SELF']) == "viewinvoice.php" )
								{
								echo " class='active' ";
								}
								?>><a href="viewinvoice.php">Billing</a>
									<ul>
                                       <li><a href="viewcustinvoice.php">View Invoice</a></li>
										<li><a href="viewcustbilling.php">View Billing</a></li>
									</ul>
					            </li>
					            <li><a href="feedback.php">Feedback</a></li>
					            <li><a href="logout.php">Logout</a></li>
							</ul> <!-- /.sf-menu -->
                            <?php
							}
							else if(isset($_SESSION['adminloginid']))
							{
							?>
								<ul class="sf-menu">
									<li  <?php
									if(basename($_SERVER['PHP_SELF']) == "adminpanel.php")  
									{                           
									echo " class='active' ";
									}
									?>><a href="adminpanel.php"><?php echo $_SESSION['logintype']; ?>  Panel</a></li>
																		
									<li <?php
									if(basename($_SERVER['PHP_SELF']) == "changeadminpassword.php" || basename($_SERVER['PHP_SELF']) == "profile.php" || basename($_SERVER['PHP_SELF']) == "changecustomerpassword.php" )
									{
									echo " class='active' ";
									}
									?>><a href="#">Staff</a>
										<ul>
											<li><a href="changeadminpassword.php">Change Password</a></li>
											<?php
											if($_SESSION['logintype'] == "Administrator")
											{
											?>
											<li><a href="admin.php">Add Staff</a></li>
											<li><a href="viewadmin.php">View Staff</a></li>
											<?php
											}
											?>
										</ul>
									</li>
																		
									<li <?php
									if(basename($_SERVER['PHP_SELF']) == "viewcustomer.php"  || basename($_SERVER['PHP_SELF']) =="viewfeedback.php" || basename($_SERVER['PHP_SELF']) == "viewaccount.php" )
									{
									echo " class='active' ";
									}
									?>><a href="#">Customer Accounts</a>
										<ul>
											<li><a href="viewcustomer.php">View Customers</a></li>
											<li><a href="viewaccount.php">View Accounts</a></li>
										   <li><a href="viewfeedback.php">View Feedbacks</a></li> 
										</ul>
									</li>
									<?php
											if($_SESSION['logintype'] == "Administrator")
											{
											?>
									<li <?php
									if(basename($_SERVER['PHP_SELF']) == "electricityboard.php" || basename($_SERVER['PHP_SELF']) == "viewelectricityboard.php"|| basename($_SERVER['PHP_SELF']) == "tariff.php" || basename($_SERVER['PHP_SELF']) == "viewtariff.php" )
									{
									echo " class='active' ";
									}
									?>><a href="#">Settings</a>
										<ul>
											<li><a href="electricityboard.php">Add Electricity board</a></li>
											<li><a href="viewelectricityboard.php">View Electricity board</a></li>
											<li><a href="tariff.php">Add Tariff</a></li>
											<li><a href="viewtariff.php">View Tariff</a></li>
										</ul>
									</li>
									<?php
											}
									?>
									<li <?php
									if(basename($_SERVER['PHP_SELF']) == "invoice.php" || basename($_SERVER['PHP_SELF']) == "viewinvoice.php" || basename($_SERVER['PHP_SELF']) == "invoice.php" || basename($_SERVER['PHP_SELF']) == "viewinvoice.php")
									{
									echo " class='active' ";
									}
									?>><a href="#">Invoice</a>
										<ul>
											<li><a href="invoice.php">Add invoice</a></li>
											<li><a href="viewinvoice.php">View invoice</a></li>
											<li><a href="viewbilling.php">View Billing Report</a></li>
										</ul>
									</li>
																		
									<li><a href="logout.php">Logout</a></li>
								</ul> <!-- /.sf-menu -->
                            <?php
                            }
							else
							{
							?> <ul class="sf-menu">
								<li <?php
                                if(basename($_SERVER['PHP_SELF']) == "index.php")  
								{                           
								echo " class='active' ";
								}
								?>><a href="index.php">Home</a></li>
                                <li <?php
                                if(basename($_SERVER['PHP_SELF']) == "about.php")  
								{                           
								echo " class='active' ";
								}
								?>><a href="about.php">About Us</a></li>
                                <li <?php
                                if(basename($_SERVER['PHP_SELF']) == "customerlogin.php")  
								{                           
								echo " class='active' ";
								}
								?>><a href="customerlogin.php">Login</a></li>
                                <li <?php
                                if(basename($_SERVER['PHP_SELF']) == "register.php")  
								{                           
								echo " class='active' ";
								}
								?>><a href="register.php">Register</a></li>                                
					            <li <?php
                                if(basename($_SERVER['PHP_SELF']) == "contact.php")  
								{                           
								echo " class='active' ";
								}
								?>><a href="contact.php">Contact</a></li>
							</ul> <!-- /.sf-menu -->
                            <?php
							}
							?>
						</nav> <!-- /.main-nav -->

						<!-- This one in here is responsive menu for tablet and mobiles -->
					    <div class="responsive-navigation visible-sm visible-xs">
					        <a href="#nogo" class="menu-toggle-btn">
					            <i class="fa fa-bars"></i>
					        </a>
					    </div> <!-- /responsive_navigation -->

					</div> <!-- /.main-navigation -->

				</div> <!-- /.col-md-12 -->

			</div> <!-- /.row -->

		</div> <!-- /.container -->
	</header> <!-- /.site-header -->