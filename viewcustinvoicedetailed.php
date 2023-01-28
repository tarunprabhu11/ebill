<?php
session_start();
include("header.php");
if(isset($_GET['delid']))
{
	$sql="DELETE FROM invoice WHERE invoice_id='$_GET[delid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "Failed to delete the record". mysqli_error($con);
	}
	else
	{
		echo" <scrtipt> alert('this record deleted succesfully');</script>";
        }
}        
?>
<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">View Invoice</h2>
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
                        
 <?php
    $sql = "SELECT * FROM invoice WHERE invoice_id='$_GET[invoice_id]'";
	$qsql =mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	
	$sqltariff_id="SELECT * FROM tariff WHERE tariff_id='$rs[tariff_id]'";
	$qsqltariff_id=mysqli_query($con,$sqltariff_id);
	$rstariff_id=mysqli_fetch_array($qsqltariff_id);
	
	$sqlelectricityboard="SELECT * FROM electricityboard WHERE electricityboard_id='$rs[electricityboard_id]'";
	$qsqlelectricityboard=mysqli_query($con,$sqlelectricityboard);
	$rselectricityboard=mysqli_fetch_array($qsqlelectricityboard);
	
      $sqlcustomer= "SELECT * FROM account WHERE cust_id='$_SESSION[customerloginid]'";
	$qsqlcustomer=mysqli_query($con,$sqlcustomer);
	$rsrcustomer= mysqli_fetch_array($qsqlcustomer);
?>

						<div id="dvContainer">
						  <table width="636" border="1">
						    <tbody>
						      <tr>
						        <td colspan="2" align="center" scope="col">&nbsp;
         <img src="electricityboardimg/<?php echo  $rselectricityboard['logo']; ?>" >
         <hr />
         <H4>ELECTRICITY BILL</H4>
         </td>
					          </tr>
						      
						      <tr>
						        <td scope="col"><strong>Name</strong></td>
						        <td scope="col">&nbsp;<?php echo $rsrcustomer['name']; ?></td>
					          </tr>
						      <tr>
						        <td scope="col"><strong>Address</strong></td>
						        <td scope="col">&nbsp;<?php echo $rsrcustomer['address']; ?></td>
					          </tr>
						      <tr>
						        <td width="354" scope="col"><strong>Electricity Board</strong> </td>
						        <th width="262" scope="col">&nbsp;<?php echo $rselectricityboard['electricityboard']; ?></th>
					          </tr>
						      <tr>
						        <td><strong>Account No</strong></td>
						        <td>&nbsp;<?php echo $rs['account_no']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Tariff</strong></td>
						        <td>&nbsp;<?php echo $rstariff_id['tariff_type']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Reading Date</strong></td>
						        <td>&nbsp;<?php echo $rs['readingdate']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Bill No</strong></td>
						        <td>&nbsp;<?php echo $rs['bill_no']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Present Reading</strong></td>
						        <td>&nbsp;<?php echo $rs['present_reading']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Previous Reading</strong></td>
						        <td>&nbsp;<?php echo $rs['previous_reading']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Consumption Unit</strong></td>
						        <td>&nbsp;<?php echo $rs['consumption_unit']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Fixed Charge</strong></td>
						        <td>&nbsp;<?php echo $rs['fixed_charge']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Energy Charge</strong></td>
						        <td>&nbsp;<?php echo $rs['energry_charge']; ?></td>
					          </tr>
						      <tr>
						        <td><strong><span class="archive-title">Tax</span></strong></td>
						        <td>&nbsp;<?php echo $rs['tax']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Bill Amount</strong></td>
						        <td>&nbsp;<?php echo $rs['bill_amount']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Interest</strong></td>
						        <td>&nbsp;<?php echo $rs['interest']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>previous balance</strong></td>
						        <td>&nbsp;<?php echo $rs['previous_balance']; ?></td>
					          </tr>
						      <tr>
			 <td><strong>Interest for previous balance</strong></td>
						        <td>&nbsp;<?php echo $rs['interest_pre_balance']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Others</strong></td>
						        <td>&nbsp;<?php echo $rs['others']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Credit</strong></td>
						        <td>&nbsp;<?php echo $rs['credit']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Consession</strong></td>
						        <td>&nbsp;<?php echo $rs['consession']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Net Amount</strong></td>
						        <td>&nbsp;<?php echo $rs['net_amount']+$rs['previous_balance']; ?></td>
					          </tr>
						      <tr>
						        <td><strong>Due Date</strong></td>
						        <td>&nbsp;<?php echo $rs['due_date']; ?></td>
					          </tr>
					        </tbody>
					      </table>
                        </div>
						  <table width="636" >
						    <tbody>
						      <tr>
						        <td width="622" height="46" colspan="2" align="center"><br>
                                <input type="button" value="Print Invoice Report" id="btnPrint" />
                                </td>
					          </tr>
					        </tbody>
					      </table>
						  <p>&nbsp;</p>
                          
				      </div>
                      
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
			</div>
			<!-- /.col-md-8 -->

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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
	$("#btnPrint").live("click", function () {
		var divContents = $("#dvContainer").html();
		var printWindow = window.open('', '', 'height=400,width=800');
		printWindow.document.write('<html><head><title>DIV Contents</title>');
		printWindow.document.write('</head><body> ');
		printWindow.document.write(divContents);
		printWindow.document.write('</body></html>');
		printWindow.document.close();
		printWindow.print();
	});
</script>