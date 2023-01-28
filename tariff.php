<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['btnsubmit']))
{
	if(isset($_GET['editid']))
	{
		$sql="UPDATE tariff SET  electricityboard_id='$_POST[txtelect]',tariff_type='$_POST[txttariff]',f_unit='$_POST[txtfrom]',t_unit='$_POST[txtto]',tariff_cost='$_POST[txtcost]',tariff_description='$_POST[txtdes]',status='$_POST[txtstatus]' WHERE tariff_id='$_GET[editid]'";
		if(!$sql= mysqli_query($con,$sql))
		{
			echo "<script>alert('failed to Update record');</script>";
		}
		else
		{
			echo "<script>alert('tariff record Updated sucessfully......');</script>";
		}
     }
	else
	{
	$sql= "INSERT INTO tariff(	electricityboard_id,tariff_type,f_unit,t_unit,tariff_cost,tariff_description,status)VALUES('$_POST[txtelect]','$_POST[txttariff]','$_POST[txtfrom]','$_POST[txtto]','$_POST[txtcost]','$_POST[txtdes]','$_POST[txtstatus]')";
		if(!$sql= mysqli_query($con,$sql))
		{
			echo "<script>alert('failed to insert record');</script>";
		}
		else
		{
			echo "<script>alert('tariff record inserted sucessfull');</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM tariff WHERE tariff_id='$_GET[editid]'";
	$qsql=mysqli_query($con,$sql);
	$rsedit=mysqli_fetch_array($qsql);
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
						<h2 class="page-title">Tariff</h2>
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.parallax-overlay -->
	</div> <!-- /.pageTitle -->

	<div class="container">	
		<div class="row">

			<div class="col-md-12">
				<div>
					<div>
						<div>
						
						  <h3 class="archive-title">&nbsp;</h3>
                                <form method= "POST" action="" name="frmtariff" onSubmit="return funtariff()">
                                  <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th scope="row">Electricity Board</th>
                                        <td><select name="txtelect" id="txtelect"> <option value="">Select</option>                                        
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
                                        </select></td>
                                      
                                      </tr>
                                      <tr>
                                        <th width="178" scope="row">Tariff Type</th>
                                        <td width="379"><input type="text" name="txttariff" id="txttariff" value="<?php echo $rsedit['tariff_type'];?>" ></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">From Unit</th>
                                        <td><input type="text" name="txtfrom" id="txtfrom" value="<?php echo $rsedit['f_unit'];?>" ></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">To Unit</th>
                                        <td><input type="text" name="txtto" id="txtto" value="<?php echo $rsedit['t_unit'];?>" ></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Tariff Cost</th>
                                        <td><input type="text" name="txtcost" id="txtcost" value="<?php echo $rsedit['tariff_cost'];?>" ></td>
                                      </tr>
                                      <tr>
                                        <th scope="row"> Description</th>
                                        <td><textarea name="txtdes" id="txtdes" ><?php echo $rsedit['tariff_description'];?></textarea></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Status</th>
                                        <td><select name="txtstatus" id="txtstatus">
                                        <option value="">select</option>
                                        <?php
										$arr=array("active","inactive");
										foreach($arr as $val)
										{
											if($val==$rsedit['status'])
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
                                        <th colspan="2" scope="row" > <div align="center">
                                          <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit">
                                        </div>                                        </th>
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
<?php
include("footer.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphaExp1 = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 
var decimalExpression= /^\s*-?[1-9]\d*(\.\d{1,2})?\s*$/;   
function funtariff()
{
	if(document.frmtariff.txtelect.value == "")
	{
		alert("Kindly select the Electricity Board.....");
		document.frmtariff.txtelect.focus();
		return false;
	}
	if(document.frmtariff.txttariff.value == "")
	{
		alert("Kindly enter the Tariff Type.....");
		document.frmtariff.txttariff.focus();
		return false;
	}
	if(document.frmtariff.txtfrom.value == "")
	{
		alert("Kindly enter the From Unit.....");
		document.frmtariff.txtfrom.focus();
		return false;
	}
	else if(!document.frmtariff.txtfrom.value.match(numericExpression))
	{
		alert(" From unit is not valid...");
		document.frmtariff.txtfrom.focus();
		return false;
	}
	if(document.frmtariff.txtto.value == "")
	{
		alert("Kindly enter the To Unit.....");
		document.frmtariff.txtto.focus();
		return false;
	}
	else if(!document.frmtariff.txtto.value.match(alphaExp1))
	{
		alert(" To unit is not valid...");
		document.frmtariff.txtto.focus();
		return false;
	}
	if(document.frmtariff.txtcost.value == "")
	{
		alert("Kindly enter the Tariff Cost.....");
		document.frmtariff.txtcost.focus();
		return false;
	}
	else if(!document.frmtariff.txtcost.value.match(decimalExpression))
	{
		alert(" Tariff cost is not valid...");
		document.frmtariff.txtcost.focus();
		return false;
	}
	else if(document.frmtariff.txtdes.value == "")
	{
		alert("Tariff Discription should not be empty......");
		document.frmtariff.txtdes.focus();
		return false;	
	}
	
	else if(document.frmtariff.txtstatus.value == "")
	{
		alert("Alert the user to select the status....");
		document.frmtariff.txtstatus.focus();
		return false;	
	}
	
	else
	{
		return true;
	}
}
</script>