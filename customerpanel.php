<?php
session_start();
include("header.php");
if(!isset($_SESSION['customerloginid']))
{
	header("Location:customerlogin.php");
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<h2 class="page-title">Customer Panel</h2>
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
					<form method="POST" action="">
                                    <table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
						    <tbody>
						      <tr>
								<th width="168" height="23" scope="row" ><center><strong>Account Number</strong></center></th>
                                <th width="140" scope="row" ><center><strong>Reading date</strong></center></th>
						        <td width="152"><center><strong>Previous Balance</strong></center></td>
						        <td width="166"><center><strong>Current Bill Amount</strong></center></td>
						        <td width="187"><center><strong>Net Amount</strong></center></td>
						        <td width="189"><strong>View</strong></td>
                                <td width="191"><strong>Make Payment</strong></td>
					          </tr>
                              <?php
                              $sql = "SELECT * FROM account WHERE status='Active' AND cust_id='$_SESSION[customerloginid]'";
							  $qsql = mysqli_query($con,$sql);
							  while($rs = mysqli_fetch_array($qsql))
							  {
									$sqlinvoice = "SELECT * FROM invoice WHERE account_no='$rs[account_no]' ORDER BY invoice_id DESC limit 1";
							  		$qsqlinvoice = mysqli_query($con,$sqlinvoice);
							 		$rsinvoice = mysqli_fetch_array($qsqlinvoice);
							  ?>
						      <tr>
						        <th scope="row">&nbsp;<?php echo $rs['account_no']; ?></th>
                                <th >&nbsp;<?php echo date("d-m-Y",strtotime($rsinvoice['readingdate'])); ?></th>
						        <td>&nbsp;Rs. <?php echo $rsinvoice['previous_balance']; ?></td>
						        <td>&nbsp;Rs. <?php echo $rsinvoice['bill_amount']; ?></td>
						        <td>&nbsp;Rs. <?php echo $rsinvoice['net_amount']+$rsinvoice['previous_balance']; ?></td>
						        <td>&nbsp; <a href='viewcustinvoicedetailed.php?invoice_id=<?php echo $rsinvoice[0]; ?>'>View detailed bill</a></td>
                                <td><div align="center"><a href='paymentpanel.php?account_no=<?php echo $rs['account_no']; ?>'>  Click here</a></div></td>
                        </tr>
                              <?php
                              }
							  ?>                              
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