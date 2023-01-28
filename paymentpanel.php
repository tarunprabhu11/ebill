<?php
include("header.php");
if(!isset($_SESSION['customerloginid']))
{
	header("Location:customerlogin.php");
}
if(isset($_POST['btnsubmit']))
{
	$dt = date("Y-m-d");
	$tim = date("h:i:s");
	$sql ="INSERT INTO billing( cust_id, account_no,electricityboard_id, payment_mode, payment_date, payment_time, rr_number, bill_amount, paid_amount, excess_paid, status) VALUES ('$_SESSION[customerloginid]','$_POST[accno]','$_POST[electricityboard_id]','$_POST[drpayment]','$dt','$tim','$_POST[rrnumber]','$_POST[txtbillamt]','$_POST[txtpamt]','$_POST[txtepaid]','Active')";
			if(!$qsql = mysqli_query($con,$sql))
			{
				echo "<script>alert('failed to insert record');</script>";
			}
			else
			{
				$lastinsid=  mysqli_insert_id($con);
				echo "<script>alert('billing record inserted successfully..');</script>";				
				$sql = "SELECT * FROM customer WHERE cust_id='$_SESSION[customerloginid]'";
				$qsql = mysqli_query($con,$sql);
				$rsrec = mysqli_fetch_array($qsql);
				$msg ="Dear $rsrec[cust_name] , We have received payment of Rs. $_POST[txtpamt] for $_POST[accno] .. Thanks for making payment.. " ;
				echo "<script>window.location='printreceipt.php?bill_no=$lastinsid';</script>";
			}
}

if(isset($_GET['editid']))
{
	$sql = "SELECT * FROM billing where account_id='$_GET[editid]'";
	$qsql =mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
if(isset($_GET['accid']))
{
	$sq1lac="SELECT * FROM account WHERE account_id='$_GET[accid]' ";
	$qsqlac=mysqli_query($con,$sq1lac);
	echo mysqli_error($con);
	$rs1ac=mysqli_fetch_array($qsqlac);	
	$sq1lacinvoice1="SELECT * FROM invoice WHERE account_no='$rs1ac[account_no]' AND electricityboard_id='$rs1ac[electricityboard_id]'";
	$qsqlacinvoice1=mysqli_query($con,$sq1lacinvoice1);
	echo mysqli_error($con);
	$rs1acinvoice1=mysqli_fetch_array($qsqlacinvoice1);		
	$sq1lacinvoice="SELECT sum(net_amount) FROM invoice WHERE account_no='$rs1ac[account_no]' AND electricityboard_id='$rs1ac[electricityboard_id]'";
	$qsqlacinvoice=mysqli_query($con,$sq1lacinvoice);
	echo mysqli_error($con);
	$rs1acinvoice=mysqli_fetch_array($qsqlacinvoice);	
	$sq1lacbilling="SELECT sum(paid_amount) FROM billing WHERE account_no='$rs1ac[account_no]' AND electricityboard_id='$rs1ac[electricityboard_id]'";
	$qsqlacbilling=mysqli_query($con,$sq1lacbilling);
	echo mysqli_error($con);
	$rs1acbilling=mysqli_fetch_array($qsqlacbilling);
	$pendingamt = $rs1acinvoice[0] - $rs1acbilling[0];
}
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Payment Panel</h2>
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

                              <form method="post" action=""  name="frmpaypanel" onSubmit="return funpaypanel()">

                                  <table width="739" border="2">
                                    <tbody>
                                      <tr>
                                        <th width="178" scope="row">Account No</th>
                                        <td width="379"><select name="draccountno" id="draccountno" onChange="loadinvoicedetail(this.value)">
                                        <option value="">Select</option>
            <?php                            
           $sql1 ="SELECT * FROM account where status='Active' and cust_id='$_SESSION[customerloginid]' ";
				$qsql1= mysqli_query($con,$sql1);
				while($rs1 = mysqli_fetch_array($qsql1))
										{
											if($rs1['account_id'] == $_GET['accid'])
											{
											echo "<option value='$rs1[account_id]' selected>$rs1[account_no]</option>";
											}
											else
											{
											echo "<option value='$rs1[account_id]'>$rs1[account_no]</option>";
											}
										}
										?>
</select></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">bill Month</th>
                                        <td><?php 
                                        if(isset($rs1acinvoice1['readingdate']))
                                        {
																					echo date("d-m-Y",strtotime($rs1acinvoice1['readingdate'])); 
                                        }                      
                                      ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Payment Mode</th>
                                        <td><select name="drpayment" id="drpayment">
                                        <option value="">Select</option>
                                          <option value="Credit card">Credit card</option>
                                          <option value="Debit card">Debit card</option>
                                          <option value="VISA">VISA</option>
                                          <option value="Master Card">Master Card</option>
                                        </select><br>
                                        
                                        <img src="images/payments.jpg" width="339" height="24" alt=""/></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Card number</th>
                                        <td><input type="text" name="cardnumber" id="cardnumber"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">CVV Code</th>
                                        <td><input type="text" name="cvvnumber" id="cvvnumber"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Expiry Date</th>
                                        <td><input type="date" name="expirydate" id="expirydate"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">RR Number</th>
                                        <td><input type="text" name="rrnumber" id="rrnumber" value="<?php echo $rs1ac['rr_number']; ?>" readonly></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Bill Amount</th>
                                        <td><input type="text" name="txtbillamt" id="textbillamt" value="<?php echo $pendingamt; ?>" readonly></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Paid Amount</th>
                                        <td><input type="text" name="txtpamt" id="txtpamt" onKeyUp="calculateexcess()" onChange="calculateexcess()" ></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Excess Paid</th>  
                                        <td><input name="txtepaid" type="text" id="txtepaid" readonly></td>
                                      </tr>                                      
                                      <tr>
                                        <th colspan="2" scope="row" ><center>
                                          <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" >
                                        </center></th>
                                      </tr>
                                    </tbody>
                                  </table>                              
                                  <input type="hidden" name="electricityboard_id" value="<?php echo $rs1ac['electricityboard_id']; ?>">		
                              <input type="hidden" name="accno" value="<?php echo $rs1ac['account_no']; ?>" />
                                  
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.col-md-8 -->


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
var decimalExpression= /^\s*-?[1-9]\d*(\.\d{1,2})?\s*$/;     
function funpaypanel()
{
	if(document.frmpaypanel.draccountno.value == "")
	{
		alert("Kindly enter the Account number...");
		document.frmpaypanel.draccountno.focus();
		return false;
	}	
else if(document.frmpaypanel.drpayment.value == "")
	{
		alert("Kindly enter the Payment Mode...");
		document.frmpaypanel.drpayment.focus();
		return false;
	}	
	else if(document.frmpaypanel.cardnumber.value == "")
	{
		alert("Kindly enter the Card Number...");
		document.frmpaypanel.cardnumber.focus();
		return false;
	}	
	else if(!document.frmpaypanel.cardnumber.value.match(numericExpression))
	{
		alert(" Alert the user to enter the proper card number...");
		document.frmpaypanel.cardnumber.focus();
		return false;
	}
	else if(document.frmpaypanel.cardnumber.value.length != 16)
	{
		alert("Kindly enter the valid Card Number...");
		document.frmpaypanel.cardnumber.focus();
		return false;
	}
	else if(document.frmpaypanel.cvvnumber.value == "")
	{
		alert("Kindly enter the CVV Number..");
		document.frmpaypanel.cvvnumber.focus();
		return false;
	}	
	else if(document.frmpaypanel.cvvnumber.value.length != 3)
	{
		alert("Kindly enter the valid CVV Number..");
		document.frmpaypanel.cvvnumber.focus();
		return false;
	}	
	else if(!document.frmpaypanel.cvvnumber.value.match(alphaExp))
	{
		alert(" CVV Number is not valid...");
		document.frmpaypanel.cvvnumber.focus();
		return false;
	}
	else if(document.frmpaypanel.expirydate.value == "")
	{
		alert("Kindly enter the expiry date...");
		document.frmpaypanel.expirydate.focus();
		return false;
	}	
	else if(document.frmpaypanel.rrnumber.value == "")
	{
		alert("Kindly enter the RR Number..");
		document.frmpaypanel.rrnumber.focus();
		return false;
	}	
	else if(!document.frmpaypanel.rrnumber.value.match(alphaExp))
	{
		alert(" RR Number is not valid...");
		document.frmpaypanel.rrnumber.focus();
		return false;
	}
	else if(document.frmpaypanel.txtbillamt.value == "")
	{
		alert("Kindly enter the Bill amount..");
		document.frmpaypanel.txtbillamt.focus();
		return false;
	}	
	else if(!document.frmpaypanel.txtbillamt.value.match(decimalExpression))
	{
		alert(" Bill Amount is not valid...");
		document.frmpaypanel.txtbillamt.focus();
		return false;
	}
	else if(document.frmpaypanel.txtpamt.value == "")
	{
		alert("Kindly enter the Payment amount..");
		document.frmpaypanel.txtpamt.focus();
		return false;
	}	
	else if(document.frmpaypanel.txtpamt.value < 0 )
	{
		alert("Paid amount is not valid...");
		document.frmpaypanel.txtpamt.focus();
		return false;
	}	
		else if(!document.frmpaypanel.txtpamt.value.match(decimalExpression))
	{
		alert(" Payment amount is not valid...");
		document.frmpaypanel.txtpamt.focus();
		return false;
	}
else
	{
		return true;
	}
}
function loadinvoicedetail(accno)
{
	window.location = "paymentpanel.php?accid=" + accno;
}
function calculateexcess()
{
document.getElementById("txtepaid").value = parseFloat(document.getElementById("txtpamt").value) - parseFloat(document.getElementById("textbillamt").value);
}
</script>