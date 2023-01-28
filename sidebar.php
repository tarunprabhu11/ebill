<?php
session_start();
if($_SESSION['logintype'] == "Administrator")
{
?>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="sidebar-widget"></div> <!-- /.sidebar-widget -->

				
				</div> <!-- /.sidebar -->
			</div> <!-- /.col-md-4 -->
 <?php
 }

if($_SESSION['logintype'] == "Employee")
{
?>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="sidebar-widget">
<h5 class="widget-title"><?php echo $_SESSION['logintype']; ?> Menu</h5>
						
                        <div class="last-post clearfix">
							<div class="content">
								<h4><a href="adminpanel.php"><?php echo $_SESSION['logintype']; ?> Panel</a></h4>
							</div>
						</div> <!-- /.last-post -->
                          <div class="last-post clearfix">
							<div class="content">
								<h4><a href="changeadminpassword.php">Change Password</a></h4>
							</div>
						</div> <!-- /.last-post -->
                        <div class="last-post clearfix">
							<div class="content">
								<h4><a href="">View Customer</a></h4>
							</div>
						</div> <!-- /.last-post -->                           
                        <div class="last-post clearfix">
							<div class="content">
								<h4><a href="viewaccount.php">View Account</a></h4>
							</div>
						</div> <!-- /.last-post -->                
                          <div class="last-post clearfix">
							<div class="content">
								<h4><a href="invoice.php">Add Invoice</a></h4>
							</div>
						</div> <!-- /.last-post -->
                          <div class="last-post clearfix">
							<div class="content">
								<h4><a href="viewinvoice.php">View Invoice</a></h4>
							</div>
						</div> <!-- /.last-post -->
                          <div class="last-post clearfix">
							<div class="content">
								<h4><a href="#">View Billing Report</a></h4>
							</div>
						</div> <!-- /.last-post -->
                          <div class="last-post clearfix">
							<div class="content">
								<h4><a href="viewfeedback.php">View Feedback</a></h4>
							</div>
						</div> <!-- /.last-post -->                        
                          <div class="last-post clearfix">
							<div class="content">
								<h4><a href="logout.php">Logout</a></h4>
							</div>
						</div> <!-- /.last-post -->
					</div> <!-- /.sidebar-widget -->

				
				</div> <!-- /.sidebar -->
			</div> <!-- /.col-md-4 -->
 <?php
 }
 ?>