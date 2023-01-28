<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Dashboard</h2>
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
<table width="100%" border="3">
  <tbody>
    <tr>
      <th width="414" scope="col">&nbsp;Electricity board</th>
      <td scope="col" width="234"><select name="txtelectricity" id="txtelectricity" onChange="calulatecustomer(this.value)">
          <option value="">Select</option>
          <?php
										$sql1 ="SELECT * FROM electricityboard where status='active'";
										$qsql1= mysqli_query($con,$sql1);
										while($rs1 = mysqli_fetch_array($qsql1))
										{
											if($rs1['electricityboard'] == $rsedit['electricityboard'])
											{
											echo "<option value='$rs1[electricityboard_id]' selected>$rs1[electricityboard]</option>";
											}
											else
											{
											echo "<option value='$rs1[electricityboard_id]'>$rs1[electricityboard]</option>";
											}
										}
										?>
        </select>
        </td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><span id="ajaxcustomer"></span></th>
    </tr>
    </tbody>
</table>

						  <table width="100%" height="252" border="2">
						      <tbody>
						        <tr>
						          <td width="415" height="39" >Number of Accounts</td>
						          <td width="235">&nbsp;
                                  <?php
								  $sql = "SELECT * FROM account";
								  $qsql = mysqli_query($con,$sql);
								  echo mysqli_num_rows($qsql);
								  ?>
                                  </td>
					            </tr>
						        <tr>
						          <td height="39" >Number of Users</td>
                                   <td width="235">&nbsp;
                                  <?php
								  $sql = "SELECT * FROM admin";
								  $qsql = mysqli_query($con,$sql);
								  echo mysqli_num_rows($qsql);
								  ?>
                                  </td>
					            </tr>
                                <tr>
                                  <tr>
						          <td height="39" >Number of Billings</td>
						          <td width="235">&nbsp;
                                  <?php
								  $sql = "SELECT * FROM billing";
								  $qsql = mysqli_query($con,$sql);
								  echo mysqli_num_rows($qsql);
								  ?>
                                  </td>
					            </tr>
                          
                                  <tr>
						          <td height="39" >Number of Customers </td>
						          <td width="235">&nbsp;
                                  <?php
								  $sql = "SELECT * FROM customer";
								  $qsql = mysqli_query($con,$sql);
								  echo mysqli_num_rows($qsql);
								  ?>
                                  </td>
					            </tr>
                             
                                  <tr>
						          <td height="39" >Number of ElectricityBoards</td>
						          <td width="235">&nbsp;
                                  <?php
								  $sql = "SELECT * FROM electricityboard";
								  $qsql = mysqli_query($con,$sql);
								  echo mysqli_num_rows($qsql);
								  ?>
                                  </td>
					            </tr>
                                  <tr>
						          <td height="39" >Number of Invoices</td>
						          <td width="235">&nbsp;
                                  <?php
								  $sql = "SELECT * FROM invoice";
								  $qsql = mysqli_query($con,$sql);
								  echo mysqli_num_rows($qsql);
								  ?>
                                  </td>
					            </tr>
                                  <tr>
						          <td height="39" >Number of Tariffs</td>
						          <td width="235">&nbsp;
                                  <?php
								  $sql = "SELECT * FROM tariff";
								  $qsql = mysqli_query($con,$sql);
								  echo mysqli_num_rows($qsql);
								  ?>
                                  </td>
					            </tr>
						         
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
<script type="application/javascript">
function calulatecustomer(electricityboardid)
{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("ajaxcustomer").innerHTML = xmlhttp.responseText;
					calculatenetamount();
				}
			};
			xmlhttp.open("GET", "ajaxelectricityboard.php?electricityboardid=" + electricityboardid, true);
			xmlhttp.send();
	
}
</script>