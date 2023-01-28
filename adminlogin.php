<?php
session_start();
include("header.php");
if(isset($_SESSION['adminloginid']))
{
	header("Location:adminpanel.php");
}
if(isset($_POST['btnlogin']))
{
    $sql="SELECT * FROM admin WHERE login_id='$_POST[txtids]' AND password='$_POST[txtpas]' and status='Active'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql)==1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION['adminloginid'] = $rslogin["admin_id"];
		$_SESSION['logintype'] = $rslogin["admin_type"];
		header("Location:adminpanel.php");
	}
	else
	{
		echo "<script>alert('invalid login credentials......')</script>";
	}
}
?>
<style type="text/css">
.container .row .col-md-8.blog-posts .row .col-md-12 .archive-wrapper .archive-title {
	text-align: justify;
}
</style>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<center><h2 class="page-title">Admin Login Panel </h2></center>
					</div> <!-- /.col-md-6 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.parallax-overlay -->
	</div> <!-- /.pageTitle -->

	<div class="container">	
		<div class="row">

			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="archive-wrapper">
						  <h3 align="center" class="archive-title"> Kindly enter Login ID and password to Login..</h3>
							<ul class="archive-list">
                                <li>
								<centeR>
									<form method="POST" action=""  name="frmadminlogin" onSubmit="return funadminlogin()">
									 <table width="739" border="2">
										<tbody>
										  <tr>
											<th width="178" scope="row"><center>Login ID</center></th>
											<td width="379"><input name="txtids" type="text" id="txtids" size="50"></td>
										  </tr>
										  <tr>
											<th scope="row"><center>Password</center></th>
											<td><input name="txtpas" type="password" id="txtpas" size="50"></td>
										  </tr>
										  <tr>
											<th colspan="2" scope="row" ><center><input type="submit" name="btnlogin" id="btnlogin" value="Login"></center></th>
										  </tr>
										</tbody>
									  </table>
									  </form>
								  </center>
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
var alphaExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 
var passwordexpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  

function funadminlogin()
{
	if(document.frmadminlogin.txtids.value == "")
	{
		alert("Kindly enter the Admin login id...");
		document.frmadminlogin.txtids.focus();
		return false;
	}	
	else if(!document.frmadminlogin.txtids.value.match(alphaExp))
	{
		alert("Login Id is not valid...");
		document.frmadminlogin.txtids.focus();
		return false;
	}
else if(document.frmadminlogin.txtpas.value == "")
	{
		alert("Kindly enter the password...");
		document.frmadminlogin.txtpas.focus();
		return false;
	}
	else if(!document.frmadminlogin.passwordexpression.value.match(alphaspaceExpSpcharacters))
	{
		alert("Password should contain charaters, numbers and special characters -  !@#$%^&*..");
		document.funadminlogin.passwordexpression.focus();
		return false;
	}		
	
	else
	{
		return true;
	}
}
</script>
