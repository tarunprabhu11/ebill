<?php
include("header.php");
if(isset($_POST['btnreg']))
{
$sql= "UPDATE customer set cust_name='$_POST[txtname]',account_type='$_POST[csttype]',address='$_POST[txtaddress]',mobno='$_POST[mobileno]',state='$_POST[txtstate]',city='$_POST[txtcity]',pincode='$_POST[txtpin]',email_id='$_POST[txtemail]',status='Active' where cust_id='$_SESSION[customerloginid]'";
	if(!mysqli_query($con,$sql))
	{
			echo "Failed to insert record..". mysqli_error($con);
	}
	else
	{
			echo "<script>alert('Profile record updated successfully......');</script>";
	}
}
$sql = "SELECT * FROM customer WHERE cust_id='$_SESSION[customerloginid]'";
$qsql = mysqli_query($con,$sql);
$rsrec = mysqli_fetch_array($qsql);
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Customer Profile</h2>
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
                                <form method="POST"action=""name="frmprofile" onSubmit="return funprofile()" >
                                  <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th width="178" scope="row">Customer Type</th>
                                        <td width="379">
                                        <select name="csttype" id="csttype">
                                        <option value="">Select</option>
                                        <?php
										$arr=array("Individual","Corporate");
										foreach ($arr as $val)
										{
											if($val==$rsrec['account_type'])
											{
												echo "<option value='$val' selected>$val</option>";
											}
											else
											{
												echo "<option values='$val'>$val</option>";
											}
										}
										?>
                                        </select></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Customer Name</th>
                                        <td><input name="txtname" type="text" id="txtname" size="50" value="<?php echo $rsrec['cust_name']; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Address</th>
                                        <td><textarea name="txtaddress" id="txtaddress"><?php echo $rsrec['address']; ?></textarea></td>
                                      </tr>
                                      <tr>
                                        <th scope="row" >State</th>
                                        <th scope="row" ><select name="txtstate" id="txtstate">
                                        <option value="">Select</option>
                                        <?php
										$arr=array("Karnataka","Assam","Andrapradesh","Kerala","Tamilnadu","Madhyapradesh");
										foreach ($arr as $val)
										{
											if($val==$rsrec['state'])
											{
												echo "<option value='$val'selected>$val</option>";
											}
											else
											{
												echo "<option values='$val'>$val</option>";
											}
										}
										?>
                                        </select></th>
                                      </tr>
                                      <tr>
                                        <th scope="row" >City</th>
                                        <th scope="row" ><input type="text" name="txtcity" id="txtcity" value="<?php echo $rsrec['city']; ?>"></th>
                                      </tr>
                                      <tr>
                                        <th scope="row" >Pincode</th>
                                        <th scope="row" ><input type="text" name="txtpin" id="txtpin" value="<?php echo $rsrec['pincode']; ?>"></th>
                                      </tr>
                                      <tr>
                                        <th scope="row" >Email Id</th>
                                        <th scope="row" ><input type="text" name="txtemail" id="txtemail" value="<?php echo $rsrec['email_id']; ?>"></th>
                                      </tr>
                                      <tr>
                                        <th scope="row" >Mobile Number</th>
                                        <th scope="row" ><input type="text" name="mobileno" id="mobileno" value="<?php echo $rsrec['mobno']; ?>"></th>
                                      </tr>
                                      <tr>
                                        <th colspan="2" scope="row" ><center><input type="submit" name="btnreg" id="btnreg" value="Update">
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

function funprofile()
{
	if(document.frmprofile.csttype.value == "")
	{
		alert("Kindly select the customer type...");
		document.frmprofile.csttype.focus();
		return false;
	}	
	
	else if(document.frmprofile.txtname.value == "")
	{
		alert("Kindly enter the customer name...");
		document.frmprofile.txtname.focus();
		return false;
	}	
	else if(!document.frmprofile.txtname.value.match(alphaspaceExp))
	{
		alert("Customer name is not valid...");
		document.frmprofile.txtname.focus();
		return false;
	}
	else if(document.frmprofile.txtaddress.value == "")
	{
		alert("Kindly enter the address...");
		document.frmprofile.txtaddress.focus();
		return false;
	}	
	else if(!document.frmprofile.txtaddress.value.match(alphaExpcomma))
	{
		alert("Address is not valid...");
		document.frmprofile.txtaddress.focus();
		return false;
	}
	else if(document.frmprofile.txtstate.value == "")
	{
		alert("Kindly enter the state...");
		document.frmprofile.txtstate.focus();
		return false;
	}	
	else if(!document.frmprofile.txtstate.value.match(alphaspaceExp))
	{
		alert("State name is not valid...");
		document.frmprofile.txtstate.focus();
		return false;
	}
	
	else if(document.frmprofile.txtcity.value == "")
	{
		alert("Kindly enter the city...");
		document.frmprofile.txtcity.focus();
		return false;
	}	
	else if(!document.frmprofile.txtcity.value.match(alphaspaceExp))
	{
		alert("City name is not valid...");
		document.frmprofile.txtcity.focus();
		return false;
	}
	else if(document.frmprofile.txtpin.value == "")
	{
		alert("Kindly enter the pincode...");
		document.frmprofile.txtpin.focus();
		return false;
	}	
	else if(!document.frmprofile.txtpin.value.match(numericExpression))
	{
		alert("Pincode is not valid...");
		document.frmprofile.txtpin.focus();
		return false;
	}
	else if(document.frmprofile.txtemail.value == "")
	{
		alert("Kindly enter the email...");
		document.frmprofile.txtemail.focus();
		return false;
	}	
	else if(!document.frmprofile.txtemail.value.match(emailExp))
	{
		alert("Alert the user to enter correct E_mail Id......");
		document.frmprofile.txtemail.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
	