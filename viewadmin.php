<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql="DELETE FROM admin WHERE admin_id='$_GET[delid]'";
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
	$sql="SELECT * FROM admin WHERE admin_id='$_GET[editid]'";
	$qsql=mysqli_query($con,$sql);
	$rsedit=mysqli_fetch_array($qsql);
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">View Admin</h2>
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
						      <tr>
						        <th>Admin Name</th>
						        <th>Login Id</th>
                                <th>Admin Type</th>
						        <th>Action</th>
					          </tr>
                              <?php
                              $sql= "SELECT * FROM admin";
                              $qsql=mysqli_query($con,$sql);
                              while($rs=mysqli_fetch_array($qsql))
                              {
                              echo "<tr>
						        <td>&nbsp;$rs[admin_name]</td>
						        <td>&nbsp;$rs[login_id]</td>
						        <td>&nbsp;$rs[admin_type]</td>
                                <td>&nbsp;
								<a href='admin.php?editid=$rs[admin_id]' class='btn btn-info'>Edit</a>  |
								<a href='viewadmin.php?delid=$rs[admin_id]' class='btn btn-danger'> Delete</a></td>
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
	
