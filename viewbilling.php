<?php
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

			<div class="col-md-12 blog-posts">
				<div class="row">
					<div class="col-md-12">
						<div class="archive-wrapper">
                        
                        <form method="get" action="">
						  <table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
						    <tbody>
						      <tr>
						        <th scope="col">Select Electricity board</th>
						        <th scope="col">&nbsp;
								<select name="txtelectricity" id="txtelectricity">
										<option value="">Select Electricity board</option>
                                        <?php
										$sql1 ="SELECT * FROM electricityboard where status='active'";
										$qsql1= mysqli_query($con,$sql1);
										while($rs1 = mysqli_fetch_array($qsql1))
										{
											if($rs1['electricityboard_id'] == $_GET['txtelectricity'])
											{
											echo "<option value='$rs1[electricityboard_id]' selected>$rs1[electricityboard]</option>";
											}
											else
											{
											echo "<option value='$rs1[electricityboard_id]'>$rs1[electricityboard]</option>";
											}
										}
										?>
                                        </select></th>
						        <th scope="col">&nbsp;<input type="submit" name="submit"></th>
					          </tr>
					        </tbody>
					      </table>
                          </form>
						  <br>
						  <table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
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
                              $sql= "SELECT * FROM billing INNER JOIN customer ON customer.cust_id=billing.cust_id WHERE billing.status='Active'";
							  if($_GET['txtelectricity'] != "")
							  {
								  $sql  = $sql . " AND billing.electricityboard_id='$_GET[txtelectricity]'";
							  }
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
	
