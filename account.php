<?php
session_start();
include("header.php");

if(isset($_POST['btnsubmit']))
{
		if(isset($_GET['editid']))
		{
			$sql = "UPDATE account SET cust_id='$_SESSION[customerloginid]', account_no='$_POST[txtaccount]', electricityboard_id='$_POST[txtelectricity]', name='$_POST[txtname]',address='$_POST[textarea]', rr_number='$_POST[txtrr]',status='$_POST[txtselect]' WHERE account_id='$_GET[editid]'";
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
				$sqlaccountcount = "SELECT * FROM account where account_no='$_POST[txtaccount]' AND cust_id='$_SESSION[customerloginid]'";
				$qsqlaccountcount =mysqli_query($con,$sqlaccountcount);
				if(mysqli_num_rows($qsqlaccountcount) == 0)
				{
					$sql = "INSERT INTO account(cust_id,account_no,electricityboard_id,name,address,rr_number,status) VALUES('$_SESSION[customerloginid]','$_POST[txtaccount]','$_POST[txtelectricity]','$_POST[txtname]','$_POST[textarea]','$_POST[txtrr]','$_POST[txtselect]')";
					if(!$qsql = mysqli_query($con,$sql))
					{
						echo "<script>alert('Error in mysqli code.');</script>";
					}
					else
					{
						echo "<script>alert('New account record inserted successfully.');</script>";
					}
				}
				else
				{
					echo "<script>alert('This account already exits.');</script>";
				}
		}
}
if(isset($_GET['editid']))
{
	$sql = "SELECT * FROM account where account_id='$_GET[editid]'";
	$qsql =mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Account</h2>
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
                          <form method="post" action="" name="frmaccount" onSubmit="return funaccount()">                    
                                  <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th width="178" scope="row">Account No</th>
                                        <td width="379"><input type="text" name="txtaccount" id="txtaccount" value="<?php echo $rsedit['account_no']; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Electricity Board</th>
                                        <td>
                                        <select name="txtelectricity" id="txtelectricity">
										<option value="">Select</option>
                                        <?php
										$sql1 ="SELECT * FROM electricityboard where status='active'";
										$qsql1= mysqli_query($con,$sql1);
										while($rs1 = mysqli_fetch_array($qsql1))
										{
											if($rs1['electricityboard_id'] == $rsedit['electricityboard_id'])
											{
											echo "<option value='$rs1[electricityboard_id]' selected>$rs1[electricityboard]</option>";
											}
											else
											{
											echo "<option value='$rs1[electricityboard_id]'>$rs1[electricityboard]</option>";
											}
										}
										?>
                                        </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Name</th>
                                        <td><input type="text" name="txtname" id="txtname" value="<?php echo $rsedit['name']; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Address</th>
                                        <td><textarea name="textarea" id="textarea"><?php echo $rsedit['address']; ?></textarea></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">RR Number</th>
                                        <td><input type="text" name="txtrr" id="txtrr" value="<?php echo $rsedit['rr_number']; ?>"></td>
                                      </tr>

<?php
if(isset($_SESSION['adminloginid']))
{
?>
	<tr>
	<th scope="row">Account Status</th>
	<td>
	<select name="txtselect" id="txtselect">
		  <option value="">Select Status</option>
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
	</select>
	</td>
	</tr>
<?php
}
else
{
?>
	<input type="hidden" name="txtselect" id="txtselect" value="<?php 
	if(isset($_GET['editid']))
	{
	echo $rsedit['status']; 
	}
	else
	{
		echo "Active";
	}
	?>">
<?php
}
?>
								
									  
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
var alphaExp1 = /^[0-9a-zA-Z\s]+$/; //Variable to validate numbers and alphabets
var alphaExpcomma = /^[0-9a-zA-Z\s\.\,]+$/; //Validate with space, comma and full stop
function funaccount()
{
	if(document.frmaccount.txtaccount.value == "")
	{
		alert("Kindly enter the Account number......");
		document.frmaccount.txtaccount.focus();
		return false;
	}
	if(document.frmaccount.txtaccount.value.length >16)
	{
		alert("Kindly enter the proper account number...");
		document.frmaccount.txtaccount.focus();
		return false;
	}
	else if(!document.frmaccount.txtaccount.value.match(alphaExp1))
	{
		alert("Account number is not valid..."); 
		document.frmaccount.txtaccount.focus();
		return false;
	}
	else if(document.frmaccount.txtelectricity.value == "")
	{
		alert("Kindly select the electricity board....");
		document.frmaccount.txtelectricity.focus();
		return false;	
	}
	else if(document.frmaccount.txtname.value == "")
	{
		alert("Kindly enter the customer name...");
		document.frmaccount.txtname.focus();
		return false;	
	}
	else if(!document.frmaccount.txtname.value.match(alphaspaceExp))
	{
		alert("Name is not valid...");
		document.frmaccount.txtname.focus();
		return false;
	}
	else if(document.frmaccount.textarea.value == "")
	{
		alert("Kindly enter the address...");
		document.frmaccount.textarea.focus();
		return false;	
	}
	else if(!document.frmaccount.textarea.value.match(alphaExpcomma))
	{
		alert("Address is not valid...");
		document.frmaccount.textarea.focus();
		return false;
	}
	else if(document.frmaccount.txtrr.value == "")
	{
		alert("Kindly enter the RR number...");
		document.frmaccount.txtrr.focus();
		return false;	
	}
	else if(!document.frmaccount.txtrr.value.match(alphaExp1))
	{
		alert("RR Number is not valid...");
		document.frmaccount.txtrr.focus();
		return false;
	}
	else if(document.frmaccount.txtselect.value == "")
	{
		alert("Kindly select the status...");
		document.frmaccount.txtselect.focus();
		return false;	
	}
	else
	{
		return true;
	}
}
</script>
	
	
