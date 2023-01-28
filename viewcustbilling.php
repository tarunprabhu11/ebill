<?php
session_start();
include("header.php");
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM billing WHERE cust_id='$_GET[editid]'";
	$qsql=mysqli_query($con,$sql);
	$rsedit=mysqli_fetch_array($qsql);
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">View Billing </h2>
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
						  <table width="854" height="77" border="2">
						    <tbody>
						      <tr>
						        <td width="113">Account number</td>
						        <td width="113">Electricity board</td>                                
						        <td width="151">Payment Mode</td>
                                <td width="125">Payment Date</td>
                                <td width="128">Payment Time</td>
                                <td width="98">Bill Amount</td>
                                <td width="95">Paid Amount</td>
						        <td width="96"> Excess Paid</td>
                                <td width="96"> Action</td>
					          </tr>
                              <?php
                              $sql= "SELECT * FROM billing INNER JOIN customer ON customer.cust_id=billing.cust_id WHERE customer.cust_id='$_SESSION[customerloginid]'";
                              $qsql=mysqli_query($con,$sql);
                              while($rs=mysqli_fetch_array($qsql))
                              {
								  	$sqlelectricityboard= "SELECT * FROM electricityboard where electricityboard_id='$rs[electricityboard_id]'";
                              		$qsqlelectricityboard=mysqli_query($con,$sqlelectricityboard);
                              		$rselectricityboard=mysqli_fetch_array($qsqlelectricityboard);
                              echo "<tr>
						             <td>&nbsp;$rs[account_no]</td>		
						             <td>&nbsp;$rselectricityboard[electricityboard]</td>							 
								   <td>&nbsp;$rs[payment_mode]</td>
								    <td>&nbsp;$rs[payment_date]</td>
									 <td>&nbsp;$rs[payment_time]</td>
									 <td>&nbsp;$rs[bill_amount]</td>
									    <td>&nbsp;$rs[paid_amount]</td>
										 <td>&nbsp;$rs[excess_paid]</td>
										 <td>&nbsp; <a href='printreceipt.php?bill_no=$rs[bill_no]' target='_blank'>Print</a> </td>										 
						 &nbsp";
							
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

	

	<div class="container">
		
	</div> <!-- /.container -->
<?php
include("footer.php");
?>
	
