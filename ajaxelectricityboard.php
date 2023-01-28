<?php
if (session_status() === PHP_SESSION_NONE)
{
session_start();
}
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
include("dbconnection.php");
$sql = "SELECT * FROM account WHERE electricityboard_id='$_GET[electricityboardid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
$sql1 = "SELECT * FROM invoice WHERE electricityboard_id='$_GET[electricityboardid]'";
$qsql1 = mysqli_query($con,$sql1);
echo mysqli_error($con);
$sql2 = "SELECT * FROM billing WHERE electricityboard_id='$_GET[electricityboardid]'";
$qsql2 = mysqli_query($con,$sql2);
echo mysqli_error($con);
?>
<table width="100%" border="3">
  <tbody>
    <tr>
      <th width="384" scope="row">&nbsp;Number of accounts</th>
      <td width="264">&nbsp;<?php echo mysqli_num_rows($qsql); ?></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;Number of Invoice records</th>
      <td>&nbsp;<?php echo mysqli_num_rows($qsql1); ?></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;Number of Billing records</th>
      <td>&nbsp;<?php echo mysqli_num_rows($qsql2); ?></td>
    </tr>
  </tbody>
</table>