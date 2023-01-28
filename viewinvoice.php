<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
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

			<div class="col-md-12 blog-posts">
				<div class="row">
					<div class="col-md-12">
						<div class="archive-wrapper">
						  <table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
						    <tbody>
						      <tr>
						        <td width="39"><strong>Bill Details</strong></td>						       
						        <td width="60"><strong>Date</strong></td>
						        <td width="131"><strong>Reading details</strong></td>
						        <td width="49"><strong>Charges</strong></td>
						        <td width="53"><strong>Interest</strong></td>
						        <td width="42"><strong>Credit & Consession</strong></td>
						        <td width="69"><strong>Net Amount</strong></td>
						         <td width="49"><strong>Action</strong></td>
					          </tr>
                                <?php
									$sql="SELECT * FROM invoice";
									$qsql=mysqli_query($con,$sql);
									while($rs=mysqli_fetch_array($qsql))
									{
										$sqltariff_id="SELECT * FROM tariff WHERE tariff_id='$rs[tariff_id]'";
										$qsqltariff_id=mysqli_query($con,$sqltariff_id);
										$rstariff_id=mysqli_fetch_array($qsqltariff_id);
										
										$sqlelectricityboard="SELECT * FROM electricityboard WHERE electricityboard_id='$rs[electricityboard_id]'";
										$qsqlelectricityboard=mysqli_query($con,$sqlelectricityboard);
										$rselectricityboard=mysqli_fetch_array($qsqlelectricityboard);
									
										echo "<tr>
						        <td>&nbsp; Bill No. $rs[bill_no]
								Electricity Board - &nbsp;$rselectricityboard[electricityboard]<br>
								&nbsp;Account Number - &nbsp;$rs[account_no]</td> 
						        <td>&nbsp;Reading date - <br>&nbsp;$rs[readingdate]<br>
						        &nbsp; Due date - <br>&nbsp;$rs[due_date]</td>
						        <td>Present reading - &nbsp;$rs[present_reading]<br>
									Previous reading - &nbsp;$rs[previous_reading]<br>
									Consumption Unit - &nbsp;$rs[consumption_unit]</td>
						        <td> Fixed charge - &nbsp;$rs[fixed_charge]<br>
									Energy charge - &nbsp;$rs[energry_charge]<br>
									Tax - &nbsp;$rs[tax]<br>
									Bill amount - &nbsp;$rs[bill_amount]
								</td>
						        <td>&nbsp;Interest amount - $rs[interest]<br>
								Previous balance - &nbsp;$rs[previous_balance]<br>
								Interest for previous balance - &nbsp;$rs[interest_pre_balance]
								Others - $rs[others]
								</td>
						        <td
								>Credit - &nbsp;$rs[credit]<br>
									Consession - &nbsp;$rs[consession]</td>
						        <td>&nbsp;Rs. " . ( $rs['net_amount'] +$rs['previous_balance'] ). "</td>
						      
						        <td>&nbsp;<a href='viewinvoice.php?delid=$rs[invoice_id]' class='btn btn-danger' > Delete</a></td>
								
								
					          </tr>";
						         }
									?>
					        </tbody>
					      </table>
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
	
