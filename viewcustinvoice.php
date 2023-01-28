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
					<div class="col-md-6 col-sm-6 text-right">
							
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
						  <table class="table table-bordered" style="width:100%;"  height="38" border="2">
						    <tbody>
						      <tr>
						        <td width="196" height="30" align="center"><strong>Electricity Board </strong></td>
						        <td width="132" align="center"><strong>Account No</strong></td>
						        <td width="187" align="center"><strong>Reading Date</strong></td>
						        <td width="81" align="center"><strong>Bill No</strong></td>
						        <td width="135" align="center"><strong>Net Amount</strong></td>
						        <td width="110" align="center"><strong>Due Date</strong></td>
						         <td width="78" align="center"><strong>Action</strong></td>
					          </tr>
                                <?php
								$sql="SELECT * FROM invoice  INNER JOIN account ON invoice.account_no=account.account_no WHERE account.cust_id='$_SESSION[customerloginid]'";
									$qsql=mysqli_query($con,$sql);
									while($rs=mysqli_fetch_array($qsql))
									{
										$sqlelectricityboard="SELECT * FROM electricityboard WHERE electricityboard_id='$rs[electricityboard_id]'";
										$qsqlelectricityboard=mysqli_query($con,$sqlelectricityboard);
										$rselectricityboard=mysqli_fetch_array($qsqlelectricityboard);
									echo "<tr>
							    <td>&nbsp;$rselectricityboard[electricityboard]</td>
						  	    <td>&nbsp;$rs[account_no]</td>
						        <td>&nbsp;" . date("d-m-Y",strtotime($rs['readingdate'])) . "</td>
						        <td>&nbsp;$rs[bill_no]</td>
						        <td>&nbsp;" . ($rs['net_amount'] + $rs['previous_balance']) . "</td>
						        <td>&nbsp;" . date("d-m-Y",strtotime($rs['due_date'])) . "</td>
						        <td>&nbsp; <a href='viewcustinvoicedetailed.php?invoice_id=$rs[invoice_id]'>Print invoice</a></td>
					          </tr>";
						         }
									?>
					        </tbody>
					      </table>
						  <h3 class="archive-title">&nbsp;</h3>
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
			</div>
			  <!-- /.col-md-8 -->


		</div> <!-- /.row -->
	</div> <!-- /.container -->	

	

	<div class="container">
		
	</div> <!-- /.container -->
<?php
include("footer.php");
?>
	
