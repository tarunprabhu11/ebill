<?php
if (session_status() === PHP_SESSION_NONE)
{
session_start();
}
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
include("dbconnection.php");
//echo $_GET[accid];
$totunitconsumption =  $_GET['totunit'];
$totunitconsumptionremaining = $_GET['totunit'];
?>
<table  id="tableData" class="table table-bordered table-striped" style="width:100%;">
  <tbody>
    <tr>
      <th width="133" height="23" scope="col">Tariff Type</th>
      <th width="145" scope="col">F Unit</th>
      <th width="133" scope="col">T Unit</th>
      <th width="160" scope="col">Tariff Cost</th>
      <th width="177" scope="col">Total</th>
    </tr>
<?php    
$sqltariff_id="SELECT * FROM tariff WHERE electricityboard_id='$_GET[electricityboardid]' ORDER BY f_unit";
$qsqltariff_id=mysqli_query($con,$sqltariff_id);
$totamt =0;
$totenergycharge = 0;
while($rstariff_id=mysqli_fetch_array($qsqltariff_id))
{
	$totamt = 0;
	echo "<tr>
		 	<td>&nbsp;$rstariff_id[tariff_type]</td>
		 	<td>&nbsp;$rstariff_id[f_unit]</td>
			<td>&nbsp;";
			 if($rstariff_id['t_unit'] == 0)
			 {
				 echo "or more";
			 }
			 else
			 {
				 echo $rstariff_id['t_unit'];
			 }
			 echo "</td>
			<td>&nbsp;Rs. $rstariff_id[tariff_cost]</td>
		 	<td>&nbsp;";			
					if($totunitconsumption >= $rstariff_id['f_unit'])
					{		
						if($rstariff_id['t_unit'] == 0)
						{
								echo $totamt = $rstariff_id['tariff_cost'] * ($totunitconsumption - $deductunit);							
						}
						else
						{
							if($totunitconsumption >= $rstariff_id['t_unit'])
							{		
								echo $totamt = $rstariff_id['tariff_cost'] * ($rstariff_id['t_unit'] - $deductunit);					
							}
							else
							{
								//$uremain = $totunitconsumptionremaining - 
								echo $totamt = $rstariff_id['tariff_cost'] * ($totunitconsumption - $deductunit);
							}	
						}
					}
			echo "</td></tr>";
	$deductunit = $rstariff_id['t_unit'];
	$totunitconsumptionremaining = $totunitconsumptionremaining - $rstariff_id['t_unit'];
	$totenergycharge = $totenergycharge + $totamt;
}
?>
  </tbody>
</table>
<input type='hidden' value='<?php echo $totenergycharge; ?>' name='totenergycharge' id="totenergycharge" />