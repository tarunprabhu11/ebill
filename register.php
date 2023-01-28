<?php
include("header.php");
if(isset($_POST['btnreg']))
{
	echo $sql= "INSERT INTO customer(cust_name,account_type,address,state,city,pincode,email_id,mobno,password,status)VALUES('$_POST[txtname]','$_POST[csttype]','$_POST[txtaddress]','$_POST[txtstate]','$_POST[txtcity]','$_POST[txtpin]','$_POST[txtemail]','$_POST[mobno]','$_POST[txtpas]','Active')";
	if(!mysqli_query($con,$sql))
	{
		echo "<script>alert('Email ID already exists..');</script>" ;
	}
	else
	{
		echo "<script>alert('Customer registration done successful;y.....');</script>";
		echo "<script>window.location='customerlogin.php';</script>";
	}
}
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Registration Panel</h2>
					</div> <!-- /.col-md-6 --> <!-- /.col-md-6 -->
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
						
						  <h3 align="center" class="archive-title"><img src="images/includes/th (6).jpg" width="330" height="92" /></h3><ul class="archive-list"><li><form method="POST" action="" name="frmregister" onSubmit="return funregister()">
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
											if($val==$_GET['state'])
											{
												echo "<option value='$val'selected>$val</option>";
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
                                    <td><input name="txtname" type="text" id="txtname" size="50"></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Address</th>
                                    <td><textarea name="txtaddress" id="txtaddress"></textarea></td>
                                  </tr>
                                  <tr>
                                    <th scope="row" >State</th>
                                    <th scope="row" ><select name="txtstate" id="txtstate">
                                      <option value="">Select</option>
                                      <?php
										$arr=array("Karnataka","Assam","Andrapradesh","Kerala","Tamilnadu","Madhyapradesh");
										foreach ($arr as $val)
										{
											if($val==$_GET['state'])
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
                                    <th scope="row" ><input type="text" name="txtcity" id="txtcity"></th>
                                  </tr>
                                  <tr>
                                    <th scope="row" >Pincode</th>
                                    <th scope="row" ><input type="text" name="txtpin" id="txtpin"></th>
                                  </tr>
                                  <tr>
                                    <th scope="row" >Email Id</th>
                                    <th scope="row" ><input type="text" name="txtemail" id="txtemail"></th>
                                  </tr>
                                  <tr>
                                    <th scope="row" >Mobile number</th>
                                    <th scope="row" ><input type="text" name="mobno" id="mobno"></th>
                                  </tr>
                                  <tr>
                                    <th scope="row" >Password</th>
                                    <th scope="row" ><input type="password" name="txtpas" id="txtpas"></th>
                                  </tr>
                                  <tr>
                                    <th scope="row" >Confirm Password</th>
                                    <th scope="row" ><input type="password" name="txtconfirm" id="txtconfirm"></th>
                                  </tr>
                                  <tr>
                                    <th colspan="2" scope="row" ><center><input type="submit" name="btnreg" class='btn btn-info' id="btnreg" value="Register">
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
var decimalExpression= /^\s*-?[1-9]\d*(\.\d{1,2})?\s*$/; 
var alphaspaceExpSpcharacters = /^[a-zA-Z\*\@\#\&\%\!]+$/; //Variable to validate Password
var passwordexpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  
function funregister()
{
	if(document.frmregister.csttype.value == "")
	{
		alert("Alert the user to select the customer type....");
		document.frmregister.csttype.focus();
		return false;
	}
	else if(document.frmregister.txtname.value == "")
	{
		alert("Kindly enter customer name");
		document.frmregister.txtname.focus();
		return false;	
	}
	else if(!document.frmregister.txtname.value.match(alphaspaceExp))
	{
		alert("Customer Name is not valid...");
		document.frmregister.txtname.focus();
		return false;
	}
	else if(document.frmregister.txtaddress.value == "")
	{
		alert("Kindly enter Address");
		document.frmregister.txtaddress.focus();
		return false;	
	}
	
	else if(document.frmregister.txtstate.value == "")
	{
		alert("Kindly select the State");
		document.frmregister.txtstate.focus();
		return false;	
	}
	
	else if(document.frmregister.txtcity.value == "")      
	{
		alert("Kindly enter city");
		document.frmregister.txtcity.focus();
		return false;	
	}	
	else if(!document.frmregister.txtcity.value.match(alphaExp))
	{
		alert("City Name is not valid...");
		document.frmregister.txtcity.focus();
		return false;
	}
	else if(document.frmregister.txtpin.value == "")
	{
		alert("Kindly enter PIN Code");
		document.frmregister.txtpin.focus();
		return false;	
	}	
	else if(document.frmregister.txtpin.value.length > 6)
	{
		alert("Kindly enter the proper PIN Code");
		document.frmregister.txtpin.focus();
		return false;	
	}	
	else if(!document.frmregister.txtpin.value.match(numericExpression))
	{
		alert("Pincode is not valid...");
		document.frmregister.txtpin.focus();
		return false;
	}
	 else if(document.frmregister.txtemail.value == "")
	{
		alert("Kindly enter Email");
		document.frmregister.txtemail.focus();
		return false;	
	}	
	else if(!document.frmregister.txtemail.value.match(emailExp))
	{
		alert("Email_id is not valid...");
		document.frmregister.txtemail.focus();
		return false;
	}
	 else if(document.frmregister.mobno.value == "")
	{
		alert("Kindly enter the Mobile Number....");
		document.frmregister.mobno.focus();
		return false;	
	}	
	else if(!document.frmregister.mobno.value.match(numericExpression))
	{
		alert("Mobile Number is not valid...");
		document.frmregister.mobno.focus();
		return false;
	}
	else if(document.frmregister.txtpas.value == "")
	{
		alert("Kindly enter Password");
		document.frmregister.txtpas.focus();
		return false;	
	}
	else if(document.frmregister.txtpas.value != document.frmregister.txtconfirm.value )
	{
		alert("Password and Confirm password not matching...");
		document.frmregister.txtpas.focus();
		return false;	
	}
	else
	{
		return true;
	}
}
</script>