<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql="DELETE FROM customer WHERE cust_id='$_GET[delid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "Failed to delete the record";
	}
	else
	{
		echo "<script>alert('This record is deleted successfully.......');</script>";
	}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM customer WHERE cust_id='$_GET[editid]'";
	$qsql=mysqli_query($con,$sql);
	$rsedit=mysqli_fetch_array($qsql);
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">View Customer</h2>
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

 <table id="tableData" class="table table-bordered table-striped" style="width:100%;">
          <thead>
    <tr>
						        <th>Customer Name</th>
						        <th>Account Type</th>
                                <th>Address</th>
                                <th>Contact detail</th>
                                          <th>Status</th>
                                              <th>Action</th>
					          </tr>
  </thead>
  <tbody>
<?php
                              $sql= "SELECT * FROM customer";
                              $qsql=mysqli_query($con,$sql);
                              while($rs=mysqli_fetch_array($qsql))
                              {
                              echo "<tr>
						        <td>&nbsp;$rs[cust_name]</td>
						        <td>&nbsp;$rs[account_type]</td>
						        <td>&nbsp;$rs[address]<br>
&nbsp;$rs[state]<br>
&nbsp;$rs[city]<br>
&nbsp;PIN: &nbsp;$rs[pincode]</td>
								<td>&nbsp;Email ID - $rs[email_id]<br />
Contact Number - $rs[mobno]
</td>
								<td>&nbsp;$rs[status]</td>
								 <td>&nbsp;
								<a href='viewcustomer.php?delid=$rs[cust_id]' class='btn btn-danger'> Delete</a></td>
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
	
