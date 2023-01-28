<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql=" UPDATE admin SET admin_name='$_POST[txtadmin]',login_id='$_POST[txtlogin]',password='$_POST[txtpassword]',admin_type='$_POST[select]',status='$_POST[selectstatus]' WHERE admin_id='$_GET[editid]'";
		if(!$qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Error in mysqli code.');</script>";
		}
		else
		{
			echo "<script>alert('Record updated successfully.');</script>";
		}
	}
	else
	{
		$sql ="INSERT INTO admin(admin_name,login_id,password,admin_type,status) VALUES ('$_POST[txtadmin]','$_POST[txtlogin]','$_POST[txtpassword]','$_POST[select]','$_POST[selectstatus]')";
		if(!$qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('failed to insert record');</script>";
		}
		else
		{
			echo "<script>alert('Admin record inserted successfully..');</script>";
		}
	}
}

if(isset($_GET['editid']))
{
	$sql = "SELECT * FROM admin where admin_id='$_GET[editid]'";
	$qsql =mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Staff Account</h2>
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
						  <ul class="archive-list">
                              <li>
                              
                              <form method="post" action="" name="frmadmin" onSubmit="return funadmin()">
                                  <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th width="178" scope="row">Admin Name</th>
                                        <td width="379"><input type="text" name="txtadmin" id="txtadmin" value="<?php echo $rsedit['admin_name']; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Login Id</th>
                                        <td><input type="text" name="txtlogin" id="txtlogin" value="<?php echo $rsedit['login_id']; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Password</th>
                                        <td><input type="password" name="txtpassword" id="txtpassword" value="<?php echo $rsedit['password']; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Confirm Password</th>
                                        <td><input type="password" name="txtconfirm" id="txtconfirm"  value="<?php echo $rsedit['password']; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Staff Type</th>
                                        <td><select name="select" id="select">
                                        		<option value="">Select</option>
                                        		<?php
												$arr = array("Administrator","Employee");
												foreach($arr as $val)
												{
													if($val == $rsedit['admin_type'])
													{
													echo "<option value='$val' selected>$val</option>";
													}
													else
													{
													echo "<option value='$val'>$val</option>";													
													}
												}
												?>
                                        </select></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Status</th>
                                        <td><select name="selectstatus" id="selectstatus">
                                              <option value="">Select</option>
                                        		<?php
												$arr = array("Active","Inactive");
												foreach($arr as $val)
												{
													if($val == $rsedit['status'])
													{
													echo "<option value='$val' selected>$val</option>";
													}
													else
													{
													echo "<option value='$val'>$val</option>";													
													}
												}
												?>
                                        </select></td>
                                      </tr>                                      
                                      <tr>
                                        <th colspan="2" scope="row" ><center>
                                          <input type="submit" name="submit" id="submit" value="Submit" >
                                        </center></th>
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
var alphaExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function funadmin()
{
	if(document.frmadmin.txtadmin.value == "")
	{
		alert("Kindly enter the Admin name...");
		document.frmadmin.txtadmin.focus();
		return false;
	}	
	else if(!document.frmadmin.txtadmin.value.match(alphaspaceExp))
	{
		alert("Admin name is not valid...");
		document.frmadmin.txtadmin.focus();
		return false;
	}
	else if(document.frmadmin.txtlogin.value == "")
	{
		alert("Kindly enter the Login ID...");
		document.frmadmin.txtlogin.focus();
		return false;
	}	
	else if(!document.frmadmin.txtlogin.value.match(alphaExp))
	{
		alert("Login ID is not valid...");
		document.frmadmin.txtlogin.focus();
		return false;
	}
	else if(document.frmadmin.txtpassword.value == "")
	{
		alert("Kindly enter the Password...");
		document.frmadmin.txtpassword.focus();
		return false;
	}
	else if(!document.frmadmin.txtpassword.value.match(alphaExp))
	{
		alert("Password is not valid...");
		document.frmadmin.txtpassword.focus();
		return false;
	}
		
	else if(document.frmadmin.txtpassword.value != document.frmadmin.txtconfirm.value )
	{
		alert("Password and Confirm password not matching...");
		document.frmadmin.txtpassword.focus();
		return false;
	}
	else if(document.frmadmin.select.value == "")
	{
		alert("Kindly select the Admin type...");
		document.frmadmin.select.focus();
		return false;
	}
	else if(document.frmadmin.selectstatus.value == "")
	{
		alert("Kindly Select the Status...");
		document.frmadmin.selectstatus.focus();
		return false;
	}			
	else
	{
		return true;
	}
}
</script>
	