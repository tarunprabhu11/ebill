<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['editid']))
{
	$sql="UPDATE  feedback SET status='Approved' WHERE feedback_id='$_GET[editid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "Failed to approve the record";
	}
	else
	{
		echo "<script>alert('This feedback approved..');</script>";
	}
	
}
if(isset($_GET['delid']))
{
	$sql="DELETE FROM feedback WHERE feedback_id='$_GET[delid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "Failed to delete the record";
	}
	else
	{
		echo "<script>alert('This record is deleted successfully.......');</script>";
	}
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">View Feedback</h2>
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
						 <td width="195">Customer Name</td>
                         <td width="121">Feedback</td>
						  <td width="136">Feedback Date</td>
						     <td width="135">Status</td>
                            <td width="73">Action</td>
					          </tr>
                               <?php
					 $sql ="SELECT * FROM feedback";
				 $qsql = mysqli_query($con,$sql);
		 while($rs = mysqli_fetch_array($qsql))
									  {
				$sqlcustomer ="SELECT * FROM customer WHERE cust_id='$rs[cust_id]'";
				$qsqlcustomer = mysqli_query($con,$sqlcustomer);
				$rscustomer =mysqli_fetch_array($qsqlcustomer);

       echo "<tr>
								<td>&nbsp; $rscustomer[cust_name]</td>
								<td>&nbsp;$rs[feedback]</td>
                                 <td>&nbsp;$rs[feedback_date]</td>
								<td>&nbsp;$rs[status]</td>
								<td>
				<a href='viewfeedback.php?editid=$rs[feedback_id]' class='btn btn-info' style='width: 100%;'>Approve</a> <br>
		<a href='viewfeedback.php?delid=$rs[feedback_id]' class='btn btn-danger' style='width: 100%;'> Delete</a></td>
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

	

	<div class="container">
		
	</div> <!-- /.container -->
<?php
include("footer.php");
?>
	
