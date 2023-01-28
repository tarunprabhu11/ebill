<?php
include("header.php");
if(isset($_POST['btncsubmit']))
{
	$sql = "UPDATE customer SET password='$_POST[txtpassnew]' WHERE password='$_POST[txtpassold]' AND email_id='$_POST[txtcloginid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Customer password updated successfully..');</script>";
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
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Change Password</h2>
					</div> <!-- /.col-md-6 -->
					<div class="col-md-6 col-sm-6 text-right">
							
					</div> <!-- /.col-md-6 -->
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
						  <form method="post" action=""  name="frmchangecustpas" onSubmit="return funchangecustpas()">
						    <table width="739" border="2">
						      <tbody>
						        <tr>
						          <th width="178" scope="row">Login ID</th>
						          <td width="379"><input name="txtcloginid" type="text" id="txtcloginid" size="50"></td>
					            </tr>
						        <tr>
						          <th scope="row">Old Password</th>
						          <td><input type="password" name="txtpassold" id="txtpassold"></td>
					            </tr>
						        <tr>
						          <th scope="row">New Password&nbsp;</th>
						          <td><input type="password" name="txtpassnew" id="txtpassnew"></td>
					            </tr>
						        <tr>
						          <th scope="row">Confirm Password&nbsp;</th>
						          <td><input type="password" name="txtpass2" id="txtpass2"></td>
					            </tr>
						        <tr>
						          <th colspan="2" scope="row" ><center>
						            <input type="submit" name="btncsubmit" id="btncsubmit" value="Change Password">
						            </center></th>
					            </tr>
					          </tbody>
					        </table>
					      </form>
                        </div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.col-md-8 -->

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
function funchangecustpas()
{
	if(document.frmchangecustpas.txtcloginid.value == "")
	{
		alert("Kindly enter the login id...");
		document.frmchangecustpas.txtcloginid.focus();
		return false;
	}	
	else if(!document.frmchangecustpas.txtcloginid.value.match(emailExp))
	{
		alert("Login Id is not valid...");
		document.frmchangecustpas.txtcloginid.focus();
		return false;
	}
	else if(document.frmchangecustpas.txtpassold.value == "")
	{
		alert("Kindly enter the  Oldpassword...");
		document.frmchangecustpas.txtpassold.focus();
		return false;
	}
	else if(document.frmchangecustpas.txtpassnew.value == "")
	{
		alert("Kindly enter the Newpassword...");
		document.frmchangecustpas.txtpassnew.focus();
		return false;
	}
	else if(document.frmchangecustpas.txtpass2.value != document.frmchangecustpas.txtpassnew.value)
	{
		alert("Password and confirm password not matching....");
		document.frmchangecustpas.txtpass2.focus();
		return false;
	}	
	else
	{
		return true;
	}
}
</script>

