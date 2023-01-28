<?php
if (session_status() === PHP_SESSION_NONE)
{
session_start();
}
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
include("dbconnection.php");
$sq1lac="SELECT * FROM account WHERE account_id='$_GET[accid]' ";
$qsqlac=mysqli_query($con,$sq1lac);
$rs1ac=mysqli_fetch_array($qsqlac);
$sq1lacinvoice="SELECT sum(net_amount) FROM invoice WHERE account_no='$rs1ac[account_no]' AND electricityboard_id='$rs1ac[electricityboard_id]'";
$qsqlacinvoice=mysqli_query($con,$sq1lacinvoice);
$rs1acinvoice=mysqli_fetch_array($qsqlacinvoice);
$sq1lacbilling="SELECT sum(paid_amount) FROM billing WHERE account_no='$rs1ac[account_no]' AND electricityboard_id='$rs1ac[electricityboard_id]'";
$qsqlacbilling=mysqli_query($con,$sq1lacbilling);
$rs1acbilling=mysqli_fetch_array($qsqlacbilling);
$pendingamt = $rs1acinvoice[0] - $rs1acbilling[0];
$advamt = $rs1acbilling[0] - $rs1acinvoice[0];
if($advamt<0)
{
	$advamt=0;
}
?>
<table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
  <tbody>
    <tr>
      <th scope="row">Advance Paid</th>
      <td><input type="text" name="taxadvpaid" id="taxadvpaid" readonly value="<?php
	  if($advamt == 0)
	  {
		  echo 0;
	  }
	  else
	  {
      echo $advamt;
	  }
	  ?>"></td>
    </tr>
    <tr>
      <th scope="row">Previous Balance</th>
      <td><input type="text" name="txtprevbal" id="txtprevbal" readonly value="<?php
	  if($advamt > 0)
	  {
		  echo "0";
	  }
	  else
	  {
      echo $pendingamt;
	  }
	  ?>"></td>
    </tr>
    <tr>
      <th scope="row">Penalty Interest (In percentage)</th>
      <td><input type="text" name="txtinterest" id="txtinterest" value="<?php echo 1; ?>" readonly></td>
    </tr>
    <tr>
      <th scope="row">Fine for previous balance</th>
      <td><input type="text" name="txtinterprevbal" id="txtinterprevbal" value="<?php if($advamt > 0)
	  {
		  echo "0";
	  }
	  else
	  {
      	echo ($pendingamt*1)/100;
	  }
	  ?>" readonly></td>
    </tr>
  </tbody>
</table>