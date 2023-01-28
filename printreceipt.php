<?php
session_start();
include("header.php");
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
<?php
	$sql="SELECT * FROM billing WHERE bill_no='$_GET[bill_no]'";
	$qsql=mysqli_query($con,$sql);
	$rsbill_id=mysqli_fetch_array($qsql);
	
					 $sq1electricityboard="SELECT * FROM electricityboard WHERE electricityboard_id='$rsbill_id[electricityboard_id]' ";
					$qsqlelectricityboard=mysqli_query($con,$sq1electricityboard);
					$rs1electricityboard=mysqli_fetch_array($qsqlelectricityboard);
?>
<div id="printableArea">
<table width="737" height="447" border="3">
  <tbody>
    <tr>
      <th height="38" colspan="2" scope="col">&nbsp;
      <?php
	  echo "<img src='electricityboardimg/$rs1electricityboard[logo]' width='350' height='150' ><br>";
	  echo $rs1electricityboard['electricityboard'];
	  ?>
      </th>
    </tr>
    <tr>
      <th width="309" height="38" scope="col">Customer Details</th>
      <th width="408" scope="col">Billing Details</th>
    </tr>
    <tr>
      <td height="62">&nbsp;
      <?php
                              $sql= "SELECT * FROM customer WHERE cust_id='$rsbill_id[cust_id]'";
                              $qsql=mysqli_query($con,$sql);
                        while($rs=mysqli_fetch_array($qsql))
                              {
                              echo "&nbsp;Name : &nbsp;$rs[cust_name]<br>
						        &nbsp;&nbsp;Address : &nbsp;$rs[address]<br>
						        &nbsp;&nbsp;State : &nbsp;$rs[state], 
						        &nbsp;&nbsp;City : &nbsp;$rs[city]<br>
						       &nbsp;&nbsp;PIN Code : &nbsp;$rs[pincode]<br>
						       &nbsp;&nbsp;Email ID : &nbsp;$rs[email_id]";
                              }
                              ?> </td>
      <td>&nbsp;
        <?php
                              $sql= "SELECT * FROM billing WHERE bill_no='$rsbill_id[bill_no]'";
                              $qsql=mysqli_query($con,$sql);
                        while($rs=mysqli_fetch_array($qsql))
                              {

                              echo "
								&nbsp;Payment_mode: $rs[payment_mode]  <br>
								&nbsp;&nbsp;Payment Date: &nbsp;$rs[payment_date]<br>
								&nbsp;&nbsp;Payment Time: &nbsp;$rs[payment_time]";
                              }
                              ?> </td>
    </tr>
    <tr>
      <td height="37"> <div align="center"><strong> Electricity board Account Details</strong></div></td>
      <td><div align="center"><strong>Payment Details</strong></div></td>
    </tr>
    <tr>
      <td height="151">&nbsp;
        <?php
                $sqlaccount= "SELECT * FROM account WHERE account_no='$rsbill_id[account_no]' AND cust_id='$rsbill_id[cust_id]'";
                 $qsqlaccount=mysqli_query($con,$sqlaccount);
                 $rsaccount=mysqli_fetch_array($qsqlaccount);
				 
				 	$sq1electricityboard="SELECT * FROM electricityboard WHERE electricityboard_id='$rsaccount[electricityboard_id]' ";
					$qsqlelectricityboard=mysqli_query($con,$sq1electricityboard);
					$rs1electricityboard=mysqli_fetch_array($qsqlelectricityboard);
                              echo "
						       &nbsp;Account Number: &nbsp;$rsbill_id[account_no]<br>
						      &nbsp; Electricity Board  : &nbsp;$rs1electricityboard[electricityboard]<br>
						        &nbsp;RR number : &nbsp; $rsaccount[rr_number]<br>";
                              ?> </td>
      <td>&nbsp;
        <?php
                              $sql= "SELECT * FROM billing WHERE bill_no='$rsbill_id[bill_no]'";
                              $qsql=mysqli_query($con,$sql);
                        while($rs=mysqli_fetch_array($qsql))
                              {
                              echo "
						       Bill Amount: &nbsp;" . ($rs['bill_amount']+ $rs['previous_balance']) . "<br>
						       Paid Amount : &nbsp;$rs[paid_amount]<br>
							Excess Paid : &nbsp;$rs[excess_paid]<br>
							    &nbsp;";
                              }
                              ?>
        </td>
    </tr>
    </tbody>
</table> 
</div>
<table width="737" height="51" border="3">
  <tbody>
    <tr>
      <td height="41" colspan="2"><div align="center">
        <input type="button" name="btnprint" id="btnprint2" value="Print Receipt" onclick="myFunction('printableArea')" />
        </div></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>
  <script>
function myFunction(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
</p>
                      </div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.col-md-8 -->
			<div class="col-md-4">
				<div class="sidebar">
					<div class="sidebar-widget">
						
                        <div class="last-post clearfix">
							<div class="content">
<strong>                          <center><img src="images/sharefeedback.jpg" width="230" height="78" alt=""/></center></strong>
								<h4><a href="feedback.php">
                                <img src="images/feedback.jpg" width="322" height="307" alt=""/> <br>
                                <strong><center>Click Here</center></strong>
</a></h4>
							</div>
						</div> <!-- /.last-post -->       
					</div> <!-- /.sidebar-widget -->

				
				</div> <!-- /.sidebar -->
			</div> <!-- /.col-md-4 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->	

	

	<div class="container">
		
	</div> <!-- /.container -->
<?php
include("footer.php");
?>
	
