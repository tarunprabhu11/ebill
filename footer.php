<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="footer-nav clearfix">
                    		<?php
							if(isset($_SESSION['customerloginid']))
							{
							?>
						<ul class="footer-menu">
							<li><a href="index.html">Home</a></li>
							<li><a href="about.php">About Us</a></li>
                            <li><a href="customerlogin.php">Login</a></li>
                             <li><a href="register.php">Register</a></li>   
							<li><a href="contact.php">Contact Us</a></li>
						</ul> <!-- /.footer-menu -->
                            <?php
							}
							else
							{
							?>
                        <ul class="footer-menu">
							<li><a href="index.html">Home</a></li>
							<li><a href="about.php">About Us</a></li>
                            <li><a href="customerlogin.php">Login</a></li>
                             <li><a href="register.php">Register</a></li>   
							<li><a href="contact.php">Contact Us</a></li>
						</ul> <!-- /.footer-menu -->
                                                    <?php
							}
							?>
					</nav> <!-- /.footer-nav -->
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			<div class="row">
				<div class="col-md-12">
					<p class="copyright-text">Copyright &copy; Electricity Bill |  <a href='adminlogin.php'>Admin Login</a></p>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
</footer> <!-- /.site-footer -->
	<!-- Scripts -->

	<script src="js/min/plugins.min.js"></script>
	<script src="js/min/medigo-custom.min.js"></script>
</body>
</html>