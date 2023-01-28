<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql="DELETE FROM electricityboard WHERE electricityboard_id='$_GET[delid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "Failed to delete the record";
	}
	else
	{
		echo "<script>alert('This record is deleted successfully......');</script>";
		echo "<script>window.location='viewelectricityboard.php';</script>";
	}
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<h2 class="page-title">Electricity Board</h2>
					</div> <!-- /.col-md-6 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.parallax-overlay -->
	</div> <!-- /.pageTitle -->

	<div class="container">	
		<div class="row">

			<div class="col-md-12 blog-posts">
				<div>
					<div >
						<div >

                                <table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
                                  <tbody>
                                    <tr>
                                      <td width="156"><strong>Electricity Board</strong></td>
                                      <td width="107"><strong>Note</strong></td>
                                    
                                      <td width="126"><strong>Action</strong></td>
                                    </tr>
                                    <?php
									$sql="SELECT * FROM electricityboard";
									$qsql=mysqli_query($con,$sql);
									while($rs=mysqli_fetch_array($qsql))
									{
										echo "<tr>
                                      <td align='center'>
									  <img src='electricityboardimg/$rs[logo]' width='150' height='150'>
									  <br>
&nbsp;<strong>$rs[electricityboard]</strong></td>
                                      
                                      <td>&nbsp;$rs[note]</td>
                                      <td>&nbsp;<a href='electricityboard.php?editid=$rs[electricityboard_id]' class='btn btn-info'>Edit </a> <a href= 'viewelectricityboard.php?delid=$rs[electricityboard_id]' class='btn btn-danger' > Delete</a></td>
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
	
