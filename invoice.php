<?php
include("header.php");
if(!isset($_SESSION['adminloginid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['btnsubmit']))
{
		$sql="INSERT INTO invoice(electricityboard_id, account_no, readingdate, bill_no, present_reading, previous_reading, consumption_unit, fixed_charge, energry_charge, tax, bill_amount, interest, previous_balance, interest_pre_balance, others, credit, consession, net_amount, due_date, status)VALUES('$_POST[electricityboardid]','$_POST[txtaccount]','$_POST[txtreadingdate]','$_POST[txtbill]','$_POST[txtpresent]','$_POST[txtprev]','$_POST[txtcunit]','$_POST[txtfixed]','$_POST[txtenergy]','$_POST[txttax]','$_POST[txtbillamt]','$_POST[txtinterest]','$_POST[txtprevbal]','$_POST[txtinterprevbal]','$_POST[txtothers]','$_POST[txtcredit]','$_POST[txtconsession]','" . ($_POST['txtnetamount'] - $_POST['txtprevbal']) . "','$_POST[txtdate]','Active')";
		if(!$qsql= mysqli_query($con,$sql))
		{
			echo "Failed to insert record.." . mysqli_error($con); 
	  }
	  else
	  {
	  	echo "<script>alert('invoice record inserted successfully.........');</script>";
	  	echo "<script>window.location='viewinvoice.php';</script>";
	  }
}
?>
	<div class="first-widget parallax" id="blog">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Invoice</h2>
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
                      
                        <form method="get" action="">
                   		<table  id="tableData"  class="table table-bordered table-striped" style="width:100%;">	
                                    <tbody>
                                      <tr>
                                        <th scope="col">Enter Electricity Account Number</th>
                                        <th scope="col"><input type="text" name="acno" id="acno" value="<?php echo $_GET['acno']; ?>"></th>
                                        <th scope="col"><input type="submit" name="submit" id="submit" value="Submit"></th>
                                      </tr>
                                    </tbody>
                                  </table><hr>
                        </form>
                       
                        <?php						
						if(isset($_GET['acno']))
						{
								$sq1lac="SELECT * FROM account WHERE account_no='$_GET[acno]' ";
								$qsqlac=mysqli_query($con,$sq1lac);
								$rs1ac=mysqli_fetch_array($qsqlac);
								$sq1laccustomer="SELECT * FROM customer WHERE cust_id='$rs1ac[cust_id]' ";
								$qsqlaccustomer=mysqli_query($con,$sq1laccustomer);
								$rs1accustomer=mysqli_fetch_array($qsqlaccustomer);
						?>
								<form method="POST" action="" name="frminvoice" onSubmit="return funinvoice()">
                                <input type="hidden" name="accountid" value="<?php echo $rs1ac['account_id']; ?>" >
                                <input type="hidden" name="cust_id" value="<?php echo $rs1accustomer['cust_id']; ?>" >
                                
                                
                                  <table  id="tableData"  class="table table-bordered table-striped" style="width:100%;">
                                    <tbody>
    
                                     <tr>
                                        <th scope="row">Customer Name</th>
                                        <td><input type="text" name="txtcustomername" id="txtcustomername" readonly value="<?php echo $rs1ac['name']; ?>" ></td>
                                      </tr>
                                     <tr>
                                        <th scope="row">Account type</th>
                                        <td><input type="text" name="maccount_type" id="maccount_type" value="<?php echo $rs1accustomer['account_type']; ?>" /></td>
                                      </tr>
                                      <tr>
                                        <th width="178" scope="row">Electricity Board</th>
                                        <td width="379">                                     
<?php
$sql1 ="SELECT * FROM electricityboard where status='active' AND electricityboard_id= '" . $rs1ac['electricityboard_id'] . "'";
$qsql1= mysqli_query($con,$sql1);
$rsss = mysqli_fetch_array($qsql1);
?>
							<input type="text" name="txtaccount2" id="txtaccount2" readonly value="<?php echo $rsss['electricityboard']; ?>" >
										
                                        <input type="hidden" name="electricityboardid" value="<?php echo $rs1ac['electricityboard_id']; ?>" >
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Account No.</th>
                                        <td><input type="text" name="txtaccount" id="txtaccount" value="<?php echo $rs1ac['account_no']; ?>" readonly ></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">RR No.</th>
                                        <td><input type="text" name="rrno" id="rrno"   value="<?php echo $rs1ac['rr_number']; ?>" readonly ></td>
                                      </tr>                                      
                                      <tr>
                                        <th scope="row">Reading Date</th>
                                        <td><input type="date" name="txtreadingdate" id="txtreadingdate" value="<?php echo date("Y-m-d"); ?>"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Invoice No</th>
                                        <td>
                                        <?php
											$sqlmax = "SELECT max(invoice_id) FROM invoice";
											$qsqlmax = mysqli_query($con,$sqlmax);
											$rsmax = mysqli_fetch_array($qsqlmax);
										?>                                        
                                        <input type="text" name="txtbill" id="txtbill" value="<?php echo $rsmax[0] + 1; ?>" readonly></td>
                                      </tr>
                                      
                                      <tr>
                                        <th scope="row">Previous Reading (in unit)</th>
                                        <td>
<?php
$previousreading=0;
$sqlprevreading = "SELECT max(bill_no),coalesce(present_reading,0) FROM invoice where account_no='$_GET[acno]'";
$qsqlprevreading = mysqli_query($con,$sqlprevreading);
$rsprevreading = mysqli_fetch_array($qsqlprevreading);

$previousreading = $rsprevreading[1];
?> 
                                        <input type="text" name="txtprev" id="txtprev" readonly value="<?php echo $previousreading; ?>" ></td>
                           </tr>
                                      <tr>
                                        <th scope="row">Present Reading (in unit)</th>
                                        <td>
<?php
$sql1 ="SELECT * FROM electricityboard where status='active' AND electricityboard_id= '$rs1ac[electricityboard_id]'";
$qsql1= mysqli_query($con,$sql1);
$rsss = mysqli_fetch_array($qsql1);
?>
                               <input type="text" name="txtpresent" id="txtpresent" onKeyUp="calculatetot()" style="background-color: yellow;" ></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Consumption Unit</th>
                                        <td><input type="text" name="txtcunit" id="txtcunit" readonly></td>
                                      </tr>
                                      <tr>
                                        <th colspan="2" scope="row">&nbsp;<span id="txtHint"></span></th>
                                      </tr>
                                      <tr>
                                        <th scope="row">Fixed Charge</th>
                                        <td><input type="text" name="txtfixed" id="txtfixed" value="100" readonly></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Energy Charge</th>
                                        <td><input type="text" name="txtenergy" id="txtenergy" readonly></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Tax (14.5%)</th>
                                        <td><input type="text" name="txttax" id="txttax" readonly></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Bill Amount</th> 
                                        <td><input type="text" name="txtbillamt" id="txtbillamt" readonly></td>
                                      </tr>
                                      <tr>
                                        <th colspan="2" scope="row"><span id="ajaxpreviousbal"></span></th>
                                      </tr>                                      
                                      <tr>
                                        <th scope="row">Others</th>
                                        <td><input type="text" name="txtothers" id="txtothers" value="0" onChange="calculatenetamount()"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Credit</th>
                                        <td><input type="text" name="txtcredit" id="txtcredit" value="0" onChange="calculatenetamount()"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Concession</th>
                                        <td><input type="text" name="txtconsession" id="txtconsession" value="0" readonly ></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Net Amount</th>
                                        <td><input type="text" name="txtnetamount" id="txtnetamount" readonly></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Due Date</th>
                                        <td><input type="date" name="txtdate" id="txtdate" value="<?php echo date('Y-m-d', strtotime("+15 days")); ?>" ></td>
                                      </tr>
                                      <tr>
                                        <th colspan="2" scope="row" ><center>
                                          <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit">
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
	var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphaExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 
var decimalExpression= /^\s*-?[1-9]\d*(\.\d{1,2})?\s*$/;   
function funinvoice()
{

	if(document.frminvoice.txtcustomername.value == "")
	{
		alert("Kindly enter customer detail...");
		document.frminvoice.txtcustomername.focus();
		return false;
	}	
	else if(document.frminvoice.txtaccount.value == "")
	{
		alert("Kindly enter the Account Number...");
		document.frminvoice.txtaccount.focus();
		return false;
	}
	else if(document.frminvoice.txtreadingdate.value == "")
	{
		alert("Kindly enter the Reading Date...");
		document.frminvoice.txtreadingdate.focus();                                     
       return false;
	}
	else if(document.frminvoice.txtbill.value == "")
	{
		alert("Kindly enter the bill number...");
		document.frminvoice.txtbill.focus();
		return false;
	}
	else if(document.frminvoice.txtpresent.value == "")
	{
		alert("Present reading should not be empty...");
		document.frminvoice.txtpresent.focus();
		return false;
	} 
	else if(document.frminvoice.txtprev.value == "")
	{
		alert("Previous reading should not be empty ...");
		document.frminvoice.txtprev.focus();
		return false;
	}
else if( document.frminvoice.txtprev.value > document.frminvoice.txtpresent.value  )
	{
		alert("Present reading should be greater than previous reading...");
		document.frminvoice.txtpresent.focus();
		return false;
	}	
  else if(document.frminvoice.txtcunit.value == "")
	{
		alert("Kindly enter the consumption unit...");
		document.frminvoice.txtcunit.focus();
		return false;
	}
	else if(document.frminvoice.txtfixed.value == "")
	{
		alert("Kindly enter the fixed charge...");
		document.frminvoice.txtfixed.focus();
		return false;
	}	
	else if(document.frminvoice.txtenergy.value == "")
	{
		alert("Kindly enter the energy charge...");
		document.frminvoice.txtenergy.focus();
		return false;
	}	
	else if(document.frminvoice.txttax.value == "")
	{
		alert("Kindly enter the tax...");
		document.frminvoice.txttax.focus();
		return false;
	}
	else if(document.frminvoice.txtbillamt.value == "")
	{
		alert("Kindly enter the bill amount..");
		document.frminvoice.txtbillamt.focus();
		return false;                                                                 
	}
	else if(document.frminvoice.txtothers.value == "")  
	{
		alert("Kindly enter the others...");
		document.frminvoice.txtothers.focus();
		return false;
	}		
	else if(document.frminvoice.txtconsession.value == "")
	{
		alert("Kindly enter the consession...");
		document.frminvoice.txtconsession.focus();
		return false;
	}	
	else if(document.frminvoice.txtnetamount.value == "")
	{
		alert("Kindly enter the net amount...");
		document.frminvoice.txtnetamount.focus();
		return false;
	}		
	else if(document.frminvoice.txtdate.value == "")
	{
		alert("Kindly enter the due date...");
		document.frminvoice.txtdate.focus();
		return false;
	}
	else if(document.frminvoice.txtstatus.value == "")
	{
		alert("Kindly select the status...");
		document.frminvoice.txtstatus.focus();
		return false;
	}	
	else
	{
		return true;
	}
}

function calculatetot()
{
		document.frminvoice.txtcunit.value = document.frminvoice.txtpresent.value - document.frminvoice.txtprev.value;
		
		var accid = document.frminvoice.accountid.value;
		var totunit = document.frminvoice.txtcunit.value;
		var electricityboardid = document.frminvoice.electricityboardid.value;		
		
		var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					document.getElementById("txtenergy").value = document.getElementById("totenergycharge").value;
					document.getElementById("txttax").value = (document.getElementById("totenergycharge").value * 14.5) / 100;
					document.getElementById("txtbillamt").value = parseFloat(document.getElementById("txtenergy").value) + parseFloat(document.getElementById("txttax").value) + parseFloat(document.getElementById("txtfixed").value);
					calulatepreviousbalance(accid);			
				}
			};
			xmlhttp.open("GET", "ajaxenergycharge.php?accid=" + accid + "&totunit=" + totunit + "&electricityboardid=" + electricityboardid, true);
			xmlhttp.send();
	
}
function calulatepreviousbalance(accid)
{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("ajaxpreviousbal").innerHTML = xmlhttp.responseText;
					calculatenetamount();
				}
			};
			xmlhttp.open("GET", "ajaxcalulatepreviousbalance.php?accid=" + accid, true);
			xmlhttp.send();
	
}
function calculatenetamount()
{
	var totnetamt = 0;	
	var totnetamt1 = 0;
	var cons = 0;
	var prevbal = 0;
	var consamt = 0;
	var advpaid =0;
			prevbal = (parseFloat(document.getElementById("txtprevbal").value) + parseFloat(document.getElementById("txtinterprevbal").value) );
		 	consamt =  parseFloat(document.getElementById("txtcredit").value) ;			
		  	advpaid =  parseFloat(document.getElementById("taxadvpaid").value);
	 	 	totnetamt1 =  (parseFloat(document.getElementById("txtbillamt").value) + parseFloat(document.getElementById("txtothers").value) + prevbal) - (consamt) ;
			totnetamt =  totnetamt1 - advpaid ;
			if(totnetamt < 0)
			{
				totnetamt=0;
			}
	if(document.getElementById("maccount_type").value == "Corporate")
	{		
		document.getElementById("txtconsession").value = totnetamt/2;		
	}
	else
	{
		document.getElementById("txtconsession").value = 0;	
	}
	
		document.getElementById("txtnetamount").value = (totnetamt.toFixed(2) - document.getElementById("txtconsession").value) + prevbal;	
}
</script>