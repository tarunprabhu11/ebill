<?php
session_start();
include("header.php");
if(isset($_SESSION['customerloginid']))
{
		echo "<script>window.location='customerpanel.php';</script>";
}
if(isset($_POST['btnlogin']))
{
	$sql ="SELECT * FROM customer WHERE email_id='$_POST[txtemailid]' AND password='$_POST[txtpas]' and status='Active'";
	$qsql = mysqli_query($con,$sql);
   if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin=mysqli_fetch_array($qsql);
		$_SESSION['customerloginid']= $rslogin["cust_id"];
		echo "<script>window.location='customerpanel.php';</script>";
	}
	else
	{
		echo "<script>alert('Invalid login credentials..');</script>";
	}
}
?>
<style type="text/css">
.container .row .col-md-8.blog-posts .row .col-md-12 .archive-wrapper .archive-title {
	text-align: left;
}
</style>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Login Panel</h2>
					</div> <!-- /.col-md-6 -->
							
					</div> <!-- /.col-md-6 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.parallax-overlay --> <!-- /.pageTitle -->

	<div class="container">	
		<div class="row">

			<div class="col-md-8 blog-posts">
				<div class="row">
					<div class="col-md-12">
						<div class="archive-wrapper">
						
						  <h3 align="center" class="archive-title">Kindly enter Login ID and password to Login..</h3>
						  <ul class="archive-list">
						  <li>
						    <form method="post" action="" name="frmcustlogin" onSubmit="return funcustlogin()">
                              <table width="670" border="2">
                                <tbody>
                                  <tr>
                                    <th width="185" scope="row">Email ID</th>
                                    <td width="467"><input name="txtemailid" type="text" id="txtemailid" size="50"></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Password</th>
                                    <td><input name="txtpas" type="password" id="txtpas" size="50"></td>
                                  </tr>
                                  <tr>
                                    <th colspan="2" scope="row" ><center><input type="submit" name="btnlogin" id="btnlogin" value="Login"></center></th>
                                  </tr>
                                  <tr>
                                    <th colspan="2" scope="row" ><div align="center"><a href="forgotpassword.php">Forgot Password</a></div></th>
                                  </tr>
                                </tbody>
                              </table> 
                            </form>
                            </li>
							</ul>
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.col-md-8 -->
<?php
include("sidebar.php");
?>
		</div> <!-- /.row -->
	</div> <!-- /.container -->	

	

	<div class="container">
		
	</div> <!-- /.container -->
<?php
include("footer.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphaExp1 = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 
var passwordexpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

function funcustlogin()
{
	if(document.frmcustlogin.txtemailid.value == "")
	{
		alert("Kindly enter the customer email id...");
		document.frmcustlogin.txtemailid.focus();
		return false;
	}	
	else if(!document.frmcustlogin.txtemailid.value.match(emailExp))
	{
		alert("email id is not valid...");
		document.frmcustlogin.txtemailid.focus();
		return false;
	}
else if(document.frmcustlogin.txtpas.value == "")
	{
		alert("Kindly enter the password...");
		document.frmcustlogin.txtpas.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
</script>
	
