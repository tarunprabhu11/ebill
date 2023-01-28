<?php
session_start();
include("header.php");
if(isset($_POST['btnsubmit']))
	{
		$dt = date("Y-m-d");
		$sql ="INSERT INTO feedback(cust_id,feedback_date,feedback,status) VALUES ('$_SESSION[customerloginid]','$dt','$_POST[txtfeedback]','Pending')";
		if(!$qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('failed to insert record');</script>";
		}
		else
		{
			echo "<script>alert('Feedback record inserted successfully..');</script>";
		}
	}
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Feedback</h2>
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
if(isset($_POST['btnsubmit']))
{
?>
                <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th colspan="2" scope="row"><div align="center"><img src="images/thanks.png" width="230" height="78" alt=""/></div></th>
                                      </tr>
                                      <tr>
                                        <th width="178" scope="row">feedback&nbsp;</th>
                                        <td width="379"><?php
                                        echo $_POST['txtfeedback'];
										?>
										</td>
                                      </tr>                                      
                                      <tr>
                                        <th colspan="2" scope="row" ><center>
                                         Admin will verify this feedback before publishing in the website..<br>
                                         <a href="index.php">Main Page</a>
                                        </center></th>
                                      </tr>
                                    </tbody>
              </table>
<?php
}
else
{
?>
						  <form method="post" action="" name="frmfeedback" onSubmit="return funfeedback()">
                <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th colspan="2" scope="row"><div align="center"><img src="images/sharefeedback.jpg" width="230" height="78" alt=""/></div></th>
                                      </tr>
                                      <tr>
                                        <th width="178" scope="row">feedback&nbsp;</th>
                                        <td width="379"><textarea name="txtfeedback" id="txtfeedback" style="width:100%" ></textarea></td>
                                      </tr>                                      
                                      <tr>
                                        <th colspan="2" scope="row" ><center>
                                          <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" >
                                        </center></th>
                                      </tr>
                                    </tbody>
              </table>
                          </form>
<?php
}
?>
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
function funfeedback()
{
	if(document.frmfeedback.txtfeedback.value == "")
	{
		alert("Kindly enter the feedback...");
		document.frmfeedback.txtfeedback.focus();
		return false;
	}	

	else
	{
		return true;
	}
}
</script>