<?php
session_start();
if(!isset($_SESSION['customerloginid']))
{
	header("Location:customerlogin.php");
}
include("header.php");
if(isset($_GET['delid']))
{
	$sql="DELETE  FROM account WHERE account_id='$_GET[delid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "failed to delete the record";
	}
	else
	{
		echo"<script>alert('this record deleted sucessfully.....');</script>";
	}
}
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">View Account</h2>
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
						  <table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
                            <tbody>
                                      <tr align="center">
                                        <td width="118"><strong>Account No</strong></td>
                                        <td width="151"><strong>Electricity Board</strong></td>
                                        <td width="138"><strong>Name</strong></td>
                                        <td width="147"><strong>Address</strong></td>
                                        <td width="98"><strong>RR Number</strong></td>
                                        <td width="133"><strong>Action</strong></td>
                                      </tr>
                                      <?php
									  $sql ="SELECT * FROM account where cust_id='$_SESSION[customerloginid]'";
									  $qsql = mysqli_query($con,$sql);
									  while($rs = mysqli_fetch_array($qsql))
									  {
	$sqlcustomer = "SELECT * FROM customer WHERE cust_id='$rs[cust_id]'";
											$qsqlcustomer = mysqli_query($con,$sqlcustomer);
											$rscustomer =mysqli_fetch_array($qsqlcustomer);
											
										  	$sqlelectricityboard ="SELECT * FROM electricityboard WHERE electricityboard_id='$rs[electricityboard_id]'";
											$qsqlelectricityboard = mysqli_query($con,$sqlelectricityboard);
											$rselectricityboard =mysqli_fetch_array($qsqlelectricityboard);
                                      echo "<tr>
												
												<td>&nbsp;$rs[account_no]</td>
												<td>&nbsp;$rselectricityboard[electricityboard]</td>
												<td>&nbsp;$rs[name]</td>
												<td>&nbsp;$rs[address]</td>
												<td>&nbsp;$rs[rr_number]</td>
												<td>&nbsp; 
												<a href='account.php?editid=$rs[account_id]' class='btn btn-info'>Edit</a> |
												<a href='viewcustomeraccount.php?delid=$rs[account_id]' class='btn btn-danger'> Delete</a></td>
                                      		</tr>";
									  }
									  ?>
                                    </tbody>
                                  </table>
                                  <p>&nbsp;</p>
                                
					  </div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.col-md-8 -->



		</div> <!-- /.row -->
	</div> <!-- /.container -->	

	

	<div class="container">
		
	</div> <!-- /.container -->
<?php
include("footer.php");
?>
	
