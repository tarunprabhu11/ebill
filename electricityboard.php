<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$boardlogo = rand(). $_FILES["txtlogo"]["name"];
	move_uploaded_file($_FILES['txtlogo']['tmp_name'],"electricityboardimg/".$boardlogo);
	
	if(isset($_GET['editid']))
	{
			$sql="UPDATE electricityboard SET electricityboard='$_POST[txtelect]',logo='$boardlogo',note='$_POST[textarea]',status='$_POST[txtstatus]' WHERE electricityboard_id='$_GET[editid]'";
			if(!$sql=mysqli_query($con,$sql))
			{
				echo "<script>alert('failed to update record');</script>";
			}
			else
			{
				echo "<script>alert('Electricity board record updated successfully');</script>";
			}
	}
	else
	{
		$sql= "INSERT INTO electricityboard(electricityboard,logo,note,status)VALUES('$_POST[txtelect]','$boardlogo','$_POST[textarea]','$_POST[txtstatus]')";
		if(!$sql=mysqli_query($con,$sql))
		{
			echo "<script>alert('failed to insert record');</script>";
		}
		else
		{
			echo "<script>alert('Electricity board record inserted successfully');</script>";
		}
	}
}

if(isset($_GET['editid']))
{
	$sql="SELECT * FROM electricityboard WHERE electricityboard_id='$_GET[editid]'";
	$qsql=mysqli_query($con,$sql);
	$rscredit=mysqli_fetch_array($qsql);
}
?>

	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Electricity Board</h2>
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
						<div class="archive-wrapper">
						  <ul class="archive-list">
                              <li>
	 <form method="post" action="" name="frmelectricityboard" onSubmit="return funelectricityboard()" enctype="multipart/form-data">
                                  <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th width="178" scope="row">Electricity Board</th>
                                        <td width="379"><input type="text" name="txtelect" id="txtelect" value="<?php echo $rscredit['electricityboard'];?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Logo</th>
                                        <td><input type="file" name="txtlogo" id="txtlogo" value="<?php echo $rscredit['logo'];?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Note</th>
                                        <td><textarea name="textarea" id="textarea"><?php echo $rscredit['note']; ?></textarea></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Status</th>
                                        <td><select name="txtstatus" id="txtstatus">
                                         <option value="">select</option>
                                         <?php
										 $arr=array("active","inactive");
										 foreach($arr as $val)
										 {
												 
											 if($val==$_GET['status'])
											 {
												 
											 echo"<option value='$val'selected>$val</option>";
											 }
											 else
											 {
											 echo"<option value='$val'>$val</option>";
											 }
										 }
										 ?>
											 
                                         
                                         
                                      </select></td>
                                      </tr>
                                      <tr>
                                        <th colspan="2" scope="row" ><center>
                                          <input type="submit" name="submit" id="submit" value="Submit" class='btn btn-info btn-lg'>
                                        </center></th>
                                      </tr>
                                    </tbody>
                                  </table>
								  </form>
                                </li>
							</ul>
						</div>
			</div> <!-- /.col-md-8 -->

<?php
include("sidebar.php");
?>

		</div> <!-- /.row -->
	</div> <!-- /.container -->	

<?php
include("footer.php");
?>
	<script type="application/javascript">
	var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphaExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function funelectricityboard()
{
	if(document.frmelectricityboard.txtelect.value == "")
	{
		alert("Kindly enter the Electricity Board...");
		document.frmelectricityboard.txtelect.focus();
		return false;
	}	
	else if(!document.frmelectricityboard.txtelect.value.match(alphaspaceExp))
	{
		alert("Electricityboard Name is not valid...");
		document.frmelectricityboard.txtelect.focus();
		return false;
	}
else if(document.frmelectricityboard.txtlogo.value == "")
	{
		alert("Kindly choose the logo...");
		document.frmelectricityboard.txtlogo.focus();
		return false;
	}
	else if(document.frmelectricityboard.textarea.value == "")
	{
		alert("Kindly enter the note...");
		document.frmelectricityboard.textarea.focus();
		return false;
	}
	else if(document.frmelectricityboard.txtstatus.value == "")
	{
		alert("Kindly select the status...");
		document.frmelectricityboard.txtstatus.focus();
		return false;
	}
else
	{
		return true;
	}
}
</script>

