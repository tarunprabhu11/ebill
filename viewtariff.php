<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM tariff where tariff_id='$_GET[delid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "Failed to delete the record";
	}
	else
	{
		echo "<script>alert('This record deleted successfully...');</script>";
	}
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">View Tariff</h2>
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
						  <form method="post" action="">
                          <table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
						    <tbody>
						      <tr>
						        <th width="190" scope="col">Select electricity Board</th>
						        <th width="292" scope="col">
                                <select name="electricityboard" id="electricityboard">
                                		<option value="">Select</option>
                                        <?php
										$sql1 ="SELECT * FROM electricityboard where status='active'";
										$qsql1= mysqli_query($con,$sql1);
										while($rs1 = mysqli_fetch_array($qsql1))
										{
											if($rs1['electricityboard_id'] == $_POST['electricityboard'])
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
						        <th width="263" scope="col"><input type="submit" name="submit" id="submit" value="Submit"></th>
					          </tr>
					        </tbody>
					      </table>
                          </form>
						  <br>
						  <table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
						    <tbody>
    <tr>
      <th width="166" height="42" scope="row">Electricity Board </th>
      <td width="57"><strong>Tariff Type</strong></td>
      <td width="57"><strong>Tariff Unit</strong></td>
      <td width="100"><strong>Tariff Cost</strong></td>
      <td width="87"><strong>Description</strong></td>
      <td width="77"><strong>Status</strong></td>
      <td width="83"><strong>Action</strong></td>
    </tr>
     <?php
									  $sql ="SELECT * FROM tariff WHERE electricityboard_id='$_POST[electricityboard]'";
										  $qsql = mysqli_query($con,$sql);
										  while($rs = mysqli_fetch_array($qsql))
										  {		
												$sqlelectricityboard ="SELECT * FROM electricityboard WHERE electricityboard_id='$rs[electricityboard_id]'";
												$qsqlelectricityboard = mysqli_query($con,$sqlelectricityboard);
												$rselectricityboard =mysqli_fetch_array($qsqlelectricityboard);
										  echo "<tr>
				<td>&nbsp;$rselectricityboard[electricityboard]</td>
				<td>&nbsp;$rs[tariff_type]</td>
			<td>&nbsp;$rs[f_unit] - &nbsp;$rs[t_unit]</td>
					<td>&nbsp;$rs[tariff_cost]</td>
					<td>&nbsp;$rs[tariff_description]</td>
					<td>&nbsp;$rs[status]</td>
			<td>&nbsp; <a href='tariff.php?editid=$rs[tariff_id]' class='btn btn-info'>Edit</a> |
		<a href='viewtariff.php?delid=$rs[tariff_id]' class='btn btn-danger'> Delete</a></td>
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