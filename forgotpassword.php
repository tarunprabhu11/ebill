<?php
session_start();
include("header.php");
if(isset($_SESSION['customerloginid']))
{
	header("Location: customerpanel.php");
}
if(isset($_POST['btnlogin']))
{
	$sql ="SELECT * FROM customer WHERE email_id='$_POST[txtemailid]' and status='Active'";
	$qsql = mysqli_query($con,$sql);
  if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin=mysqli_fetch_array($qsql);
		$email_id =  $rslogin['mobno'];
		$password =   $rslogin['password'];		
		$custname=   $rslogin['cust_name'];
		
		$to = $email_id;
		
		$mailid = $rslogin['email_id'];
		$subject = "e-Bill Login credentials";
		$messagetext = "Hello $custname, <br>
		<b>Your Registered mail ID is:</b> $mail <br>
		<b>Password is :</b> $password ";
		$headers = "From: electricitybill@php.family";
		include("phpmailer.php");
		//sendmail($to,"E-Bill Login Credentials",$txt);
		//$smsmsg = "http://login.smsgatewayhub.com/api/mt/SendSMS?APIKey=qyQgcDu3EEiw1VfItgv1tA&senderid=WEBSMS&channel=1&DCS=0&flashsms=0&number=$to&text=$txt;&route=1";
		echo "<script>alert('Login credentials sent to registered Email ID...');</script>";
		//echo "<script>window.location='customerlogin.php';</script>";
	}
	else
	{
		echo "<script>alert('Invalid login credentials..');</script>";
	}
}
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Forgot Password?</h2>
					</div> <!-- /.col-md-6 -->
							
					</div> <!-- /.col-md-6 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.parallax-overlay -->
					<div class="col-md-6 col-sm-6 text-right">
	</div> <!-- /.pageTitle -->

	<div class="container">	
		<div class="row">

			<div class="col-md-8 blog-posts">
				<div class="row">
					<div class="col-md-12">
						<div class="archive-wrapper">
						
						  <h3 class="archive-title">Kindly enter Email ID to recover password</h3>
							<ul class="archive-list">
                                <li>
                                <form method="post" action="" name="frmcustlogin" onSubmit="return funcustlogin()">
                                  <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th width="178" height="41" scope="row">Email ID</th>
                                        <td width="379"><input name="txtemailid" type="text" id="txtemailid" size="50"></td>
                                      </tr>
                                      <tr>
                                        <th height="37" colspan="2" scope="row" ><center><input type="submit" name="btnlogin" id="btnlogin" value="Recover password"></center></th>
                                      </tr>
                                    </tbody>
                                  </table>
                                  </form>
                                </li>
							</ul>
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
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphaExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function funcustlogin()
{
	if(document.frmcustlogin.txtemailid.value == "")
	{
		alert("Kindly enter the customer email id...");
		document.frmcustlogin.txtemailid.focus();
		return false;
	}	
	else if(!document.frmcustlogin.txtemailid.value.match(emailExp))
	{
		alert("email id is not valid...");
		document.frmcustlogin.txtemailid.focus();
		return false;
	}
else if(document.frmcustlogin.txtpas.value == "")
	{
		alert("Kindly enter the password...");
		document.frmcustlogin.txtpas.focus();
		return false;
	}
	else if(!document.frmcustlogin.txtpas.value.match(alphaExp))
	{
		alert("Password is not valid...");
		document.frmcustlogin.txtpas.focus();
		return false;
	}
		
	else
	{
		return true;
	}
}
</script>
<?php
/*
function sendmail($toaddress,$subject,$message)
{
	require 'PHPMailer-master/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'mail.php.family';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'electricitybill@php.family';                 // SMTP username
	$mail->Password = '.3-WJtw-jQpp';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	
	$mail->From = 'sendmail@dentaldiary.in';
	$mail->FromName = 'Web Mall';
	$mail->addAddress($toaddress, 'Joe User');     // Add a recipient
	$mail->addAddress($toaddress);               // Name is optional
	$mail->addReplyTo('aravinda@technopulse.in', 'Information');
	$mail->addCC('cc@example.com');
	$mail->addBCC('bcc@example.com');
	
	$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->AltBody = $subject;
	
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo '<center><strong><font color=green>Login credentails sent to your Email ID.</font></strong></center>';
	}
}
*/
?>