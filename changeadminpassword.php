<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['btnsubmit']))
{
	$sql = "UPDATE admin SET password='$_POST[txtpassword1]' WHERE password='$_POST[txtpassword]' AND login_id='$_POST[txtlogid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Admin password updated successfully..');</script>";
	}
	else
	{
		echo "<script>alert('Invalid Email ID and password entered..')</script>";
	}
}
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
						<h2 class="page-title">Change Password</h2>
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.parallax-overlay -->
	</div> <!-- /.pageTitle -->

	<div class="container">	
		<div class="row">

			<div class="col-md-8 blog-posts">
				<div class="row">
					<div class="col-md-12">
						<div class="archive-wrapper">
						
                                <form method="post" action="" name="frmchangeadminpas" onSubmit="return funchangeadminpas()">
                                  <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                 <th width="178" scope="row">Login ID</th>
                                        <td width="379"><input name="txtlogid" type="text" id="txtlogid" size="50"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Old Password</th>
                                        <td><input type="password" name="txtpassword" id="txtpassword"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">New Password&nbsp;</th>
                                        <td><input type="password" name="txtpassword1" id="txtpassword1"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Confirm Password&nbsp;</th>
                                        <td><input type="password" name="txtpassword2" id="txtpassword2"></td>
                                      </tr>
                                      <tr>
                                        <th colspan="2" scope="row" ><center>
                                          <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit">
                                        </center></th>
                                      </tr>
                                    </tbody>
                                  </table>
                                  </form>
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
var alphaExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function funchangeadminpas()
{
	if(document.frmchangeadminpas.txtlogid.value == "")
	{
		alert("Kindly enter the login id...");
		document.frmchangeadminpas.txtlogid.focus();
		return false;
	}	
	else if(!document.frmchangeadminpas.txtlogid.value.match(alphaExp))
	{
		alert("Login Id is not valid...");
		document.frmchangeadminpas.txtlogid.focus();
		return false;
	}
else if(document.frmchangeadminpas.txtpassword.value == "")
	{
		alert("Kindly enter the  Oldpassword...");
		document.frmchangeadminpas.txtpassword.focus();
		return false;
	}	
	else if(!document.frmchangeadminpas.txtpassword.value.match( alphaExp))
	{
		alert("Old Password is not valid...");
		document.frmchangeadminpas.txtpassword.focus();
		return false;
	}
else if(document.frmchangeadminpas.txtpassword1.value == "")
	{
		alert("Kindly enter the Newpassword...");
		document.frmchangeadminpas.txtpassword1.focus();
		return false;
	}	
	else if(!document.frmchangeadminpas.txtpassword1.value.match( alphaExp))
	{
		alert("New Password is not valid...");
		document.frmchangeadminpas.txtpassword1.focus();
		return false;
	}
	else if(document.frmchangeadminpas.txtpassword2.value != document.frmchangeadminpas.txtpassword1.value)
	{
		alert("Password and confirm password not matching....");
		document.frmchangeadminpas.txtpassword2.focus();
		return false;
	}	
	else
	{
		return true;
	}
}
</script>
