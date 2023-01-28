<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql="DELETE  FROM account WHERE account_id='$_GET[delid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "Failed to delete the record";
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
						  <table  id="tableData"  class="table table-bordered table-striped" style="width:100%;">
                            <tbody>
                                      <tr>
                                        <td width="103">Customer</td>
                                        <td width="103">Account No</td>
                                        <td width="132">Electricity Board</td>
                                        <td width="121">Name</td>
                                        <td width="129">Address</td>
                                        <td width="137">RR Number</td>
                                        <td width="74">Status</td>
                                        <td width="78">Action</td>
                                      </tr>
                                      <?php
									  $sql ="SELECT * FROM account";
									  if(isset($_SESSION['customerloginid']))
									  {
										  $sql = $sql . " WHERE cust_id='" . $_SESSION['customerloginid'] . "'";
									  }
									  $qsql = mysqli_query($con,$sql);
									  while($rs = mysqli_fetch_array($qsql))
									  {
										  	$sqlcustomer ="SELECT * FROM customer WHERE cust_id='$rs[cust_id]'";
											$qsqlcustomer = mysqli_query($con,$sqlcustomer);
											$rscustomer =mysqli_fetch_array($qsqlcustomer);
											
										  	$sqlelectricityboard ="SELECT * FROM electricityboard WHERE electricityboard_id='$rs[electricityboard_id]'";
											$qsqlelectricityboard = mysqli_query($con,$sqlelectricityboard);
											$rselectricityboard =mysqli_fetch_array($qsqlelectricityboard);
                                      echo "<tr>
												<td>&nbsp;$rscustomer[cust_name]</td>
												<td>&nbsp;$rs[account_no]</td>
												<td>&nbsp;$rselectricityboard[electricityboard]</td>
												<td>&nbsp;$rs[name]</td>
												<td>&nbsp;$rs[address]</td>
												<td>&nbsp;$rs[rr_number]</td>
												<td>&nbsp;$rs[status]</td>
												<td>&nbsp; 
												<a href='account.php?editid=$rs[account_id]' class='btn btn-info'>Edit</a> |
												<a href='viewaccount.php?delid=$rs[account_id]' class='btn btn-danger' > Delete</a></td>
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
	
