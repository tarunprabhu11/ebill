<?php
include("header.php");
?>
	<section id="homeIntro" class="parallax first-widget">
	    <div class="parallax-overlay">
		    <div class="container home-intro-content">
		        <div class="row">
		        	<div class="col-md-12">
		        		<h2>E~Bill - Online Electricity Bill Payment System</h2>
		        		<p>Our project Electricity Bill System proposes a computerized collection system which calculates electricity bill automatically and it simplifies the task and reduces the paper work. This system automates each and every activity of the manual system and increases its quality. The system calculates current bill, previous pending bill with penalty, etc.</p>
		        		<a href="customerlogin.php" class="large-button white-color">Login <i class="icon-button fa fa-arrow-right"></i></a>
		        	</div> <!-- /.col-md-12 -->
		        </div> <!-- /.row -->
		    </div> <!-- /.container -->
	    </div> <!-- /.parallax-overlay -->
	</section> <!-- /#homeIntro -->

	<section class="cta clearfix" >
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="cta-title"><strong>Want to Register?</strong> Kinldy enter your profile details..</h4>
					<a href="register.php" class="main-button accent-color">Create New account<i class="icon-button fa fa-arrow-right"></i></a>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.cta -->

	<section class="light-content services">
		<div class="container">
			<div class="row">

				<div class="col-md-4 col-sm-4">
					<div class="service-box-wrap">
						<div class="service-icon-wrap">
							<i class="fa fa-umbrella fa-2x"></i>
						</div> <!-- /.service-icon-wrap -->
						<div class="service-cnt-wrap">
							<h3 class="service-title">24X7 Care</h3>
							<p>Happy to help 24X7, call us on 0120-3062244 or <a href="contact.php">click here</a></p>
						</div> <!-- /.service-cnt-wrap -->
					</div> <!-- /.service-box-wrap -->
				</div> <!-- /.col-md-4 -->

				<div class="col-md-4 col-sm-4">
					<div class="service-box-wrap">
						<div class="service-icon-wrap">
							<i class="fa fa-mobile-phone fa-2x"></i>
						</div> <!-- /.service-icon-wrap -->
						<div class="service-cnt-wrap">
							<h3 class="service-title">Secure payment</h3>
							<p>Your money is yours! All refunds come with no question asked guarantee.</p>
						</div> <!-- /.service-cnt-wrap -->
					</div> <!-- /.service-box-wrap -->
				</div> <!-- /.col-md-4 -->

				<div class="col-md-4 col-sm-4">
					<div class="service-box-wrap">
						<div class="service-icon-wrap">
							<i class="fa fa-pencil-square-o fa-2x"></i>
						</div> <!-- /.service-icon-wrap -->
						<div class="service-cnt-wrap">
							<h3 class="service-title">100% Assurance</h3>
							<p> we provide 100% assurance. If you have any issue, your money is immediately refunded. </p>
						</div> <!-- /.service-cnt-wrap -->
					</div> <!-- /.service-box-wrap -->
				</div> <!-- /.col-md-4 -->

			</div>

			<div class="row">
				
				<div class="col-md-4 col-sm-4">
					<div class="service-box-wrap">
						<div class="service-icon-wrap">
							<i class="fa fa-code fa-2x"></i>
						</div> <!-- /.service-icon-wrap -->
						<div class="service-cnt-wrap">
							<h3 class="service-title">Our Promise</h3>
							<p>Happiness is guaranteed. If we fall short of your expectations, give us a shout.</p>
						</div> <!-- /.service-cnt-wrap -->
					</div> <!-- /.service-box-wrap -->
				</div> <!-- /.col-md-4 -->

				<div class="col-md-4 col-sm-4">
					<div class="service-box-wrap">
						<div class="service-icon-wrap">
							<i class="fa fa-eye-slash fa-2x"></i>
						</div> <!-- /.service-icon-wrap -->
						<div class="service-cnt-wrap">
							<h3 class="service-title">Online Bill Payment</h3>
							<p>E-Bill to offer you a simple, convenient and secure way to pay your electricity bills</p>
						</div> <!-- /.service-cnt-wrap -->
					</div> <!-- /.service-box-wrap -->
				</div> <!-- /.col-md-4 -->

				<div class="col-md-4 col-sm-4">
					<div class="service-box-wrap">
						<div class="service-icon-wrap">
							<i class="fa fa-suitcase fa-2x"></i>
						</div> <!-- /.service-icon-wrap -->
						<div class="service-cnt-wrap">
							<h3 class="service-title">Bill Payment facilities</h3>
							<p>Net Banking, ATMs, Tele Banking or Mobile Banking..</p>
						</div> <!-- /.service-cnt-wrap -->
					</div> <!-- /.service-box-wrap -->
				</div> <!-- /.col-md-4 -->

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.services -->

	<section class="dark-content portfolio">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header">
						<h2 class="section-title">Electricity Board</h2>
						<p class="section-desc">Currently you can make payment for following services..</p>
					</div> <!-- /.section-header -->
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
		
		<div id="portfolio-carousel" class="portfolio-carousel portfolio-holder">
<?php
$sqlelectricityboard="SELECT * FROM electricityboard where status='active'";
$qsqlelectricityboard=mysqli_query($con,$sqlelectricityboard);
while($rselectricityboard=mysqli_fetch_array($qsqlelectricityboard))
{
?>
            <div class="item">
				<div class="thumb-post">
					<div class="overlay">
						<div class="overlay-inner">
							<div class="portfolio-infos">
								<span class="meta-category"><?php echo $rselectricityboard['note']; ?></span>
								<h3 class="portfolio-title"><a href="#"><?php echo $rselectricityboard['electricityboard']; ?></a></h3>
							</div>
							<div class="portfolio-expand">
								<a class="fancybox" href="images/includes/project1.jpg"  title="Visual Admin">
									<i class="fa fa-expand"></i>
								</a>
							</div>
						</div>
					</div>
					<img src="electricityboardimg/<?php echo $rselectricityboard["logo"]; ?>" style="width:350px;height:250px;" alt="<?php echo $rselectricityboard['electricityboard']; ?>">
				</div>
			</div> <!-- /.item -->
<?php
}
?>           
		</div> <!-- /#owl-demo -->
	</section> <!-- /.portfolio-holder -->

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="bxslider">
						 <?php
									  $sql ="SELECT * FROM feedback where status='Approved'";
									  $qsql = mysqli_query($con,$sql);
									  while($rs = mysqli_fetch_array($qsql))
									  {
										  	$sqlcustomer ="SELECT * FROM customer WHERE cust_id='$rs[cust_id]'";
											$qsqlcustomer = mysqli_query($con,$sqlcustomer);
											$rscustomer =mysqli_fetch_array($qsqlcustomer);									 
									  ?>
                      <div class="testimonial">
							<div class="testimonial-content">
								<p class="testimonial-description">
								<b style="color: red;"><?php echo ucfirst($rscustomer['cust_name']); ?></b><br>
								<?php echo $rs['feedback']; ?></p>
							</div>
						</div>
                        <?php
                         }
						 ?>
						
					</div> <!-- /.bxslider -->
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	
	<section id="blogPosts" class="parallax">
	    <div class="parallax-overlay">
		    <div class="container">
		        <div class="row">
		        	<div class="col-md-12">
		        		<div class="section-header">
							<h2 class="section-title">Customers</h2>
							<p class="section-desc">
                           We have <?php
								$sqlcustomer ="SELECT * FROM customer";
								$qsqlcustomer = mysqli_query($con,$sqlcustomer);
								echo mysqli_num_rows($qsqlcustomer);
							?> customers and <?php
								$sqlcustomer ="SELECT * FROM account ";
								$qsqlcustomer = mysqli_query($con,$sqlcustomer);
								echo mysqli_num_rows($qsqlcustomer);
							?> accounts.
                            </p>
						</div> <!-- /.section-header -->
		        	</div> <!-- /.col-md-12 -->
		        </div> <!-- /.row -->
		       
		    </div> <!-- /.container -->
	    </div> <!-- /.parallax-overlay -->
	</section> <!-- /#blogPosts -->
<?php
include("footer.php");
?>
