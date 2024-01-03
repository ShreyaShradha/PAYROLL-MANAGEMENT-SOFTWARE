<?php
session_start();
if (isset($_SESSION['password']))
{
	$sp=$_SESSION["password"];
	$name=$_SESSION["name"];
	$type=$_SESSION["type"];
?>

<!DOCTYPE html>
<html>
<head>
<title>
Employee Entry
</title>
<style>
.button {
  border: none;
  border-radius: 4px;
  background-color: #0040ff;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 15px 72px;
  width: 300px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 4px 2px;
  font-weight: bold;
  display: inline-block;
  border-radius: 12px;
  font-size:26px;
  cursor: pointer;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
caption {
  color: red;
  font-weight: bold;
  font-size:30px;
  font-weight: bold;
}
select {
  font-size: 22px;
  font-weight: bold;
}
hr.new1 {
  border: 1px solid green;
  border-radius: 5px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
  margin-right: 5px;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.blink {
      animation: blinker 1.0s linear infinite;
      color: #1c87c9;
      font-size: 30px;
      font-weight: bold;
      font-family: sans-serif;
      }
      @keyframes blinker {  
      50% { opacity: 0; }
      }
      .blink-one {
      animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {  
      0% { opacity: 0; }
      }
      .blink-two {
      animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {  
      100% { opacity: 0; }
      }

input:focus {
  background-color: #FFEFD5;
select:focus {
  background-color: #FFEFD5;
}
}
h1 {
  text-shadow: 2px 2px 5px red;
}
.btn {
  background-color: red; 
  border: 2px solid #f44336;
  position: fixed;
  top: 5%;
  left: 2%;
  z-index: 99;
  border-radius: 50%;
  cursor: pointer;
  border: none;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width: 6%;
  font-face:bold;
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.btn:hover {
  background-color: #4CAF50; 
  border: 2px solid #4CAF50;
  position: fixed;
  top: 5%;
  left: 2%;
  z-index: 99;
  border-radius: 50%;
  cursor: pointer;
  border: none;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width: 8%;
  font-face:bold;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
</style>
</head>

<body bgcolor="#EEFDEF">
<form action="men.php" method="post" name="formx">
<button class="btn" type="submit" id="myBtn" name="Back" accesskey="q" ><< </button>
</form>
<?php
echo "<table width='100%' border='0'>";
echo "<tr>";
echo "<td width='70%' style='text-align:left;padding-left:100px;'><p style='color:#FA4734;display:inline;font-weight: bold;font-size:22px;'>&nbsp$name<p style='color:#138D75;display:inline;font-weight: bold;font-size:22px;'> ($type)";
echo "</td>";
echo "<td width='30%' style='text-align: center;'>";
?>
<form action="logout.php" method="post" name="form1">
<input style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;" type="submit" id="Logout" name="Logout" value="Logout">
</form>
<?php
echo "</td>";
echo "</tr>";
echo "</table>";
?>

<form method="post" action="add2.php" enctype="multipart/form-data">
<?php
include_once 'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
date_default_timezone_set('Asia/Kolkata');
$dt = date('Y-m-d');
$sql = "SELECT name FROM firm";
$result = $conn->query($sql);
$k=0;
$rg=0;
while($row = $result->fetch_assoc())
{
	$k=$k+1;
    if ($k==1)
		$N1=$row['name'];
		
    if ($k==2)
	  	$N2=$row['name'];

    if ($k==3)
	  	$N3=$row['name'];
 	  
    if ($k==4)
		$N4=$row['name'];
}
$eno=0;
$ename="";;
$department="";
$designation="";

$sqlE = "SELECT * FROM employee order by eno desc";
$resultE = $conn->query($sqlE);
while($rowE = $resultE->fetch_assoc())
{
	$eno=$rowE['eno'];
	$ename=$rowE['ename'];
	$department=$rowE['department'];
	$designation=$rowE['designation'];
	break;	
}

  echo "<table width='100%' border='0'>";
  echo "<tr>";
  echo "<td width='100%' bgcolor='#86592d' style='text-align:center'><p style='color:yellow; display:inline; font-size:25px;font-weight: bold'>
  $N1</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td width='100%' bgcolor='#ffffb3' style='text-align:center;'><p style='display:inline; font-size:14px;font-weight: bold'>
  $N2</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td width='100%' bgcolor='#ffffb3' style='text-align:center '><p style='display:inline; font-size:14px;font-weight: bold'>
  $N3</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td width='100%' bgcolor='#ffffb3' style='text-align:center '><p style='display:inline; font-size:14px;font-weight: bold'>
  $N4</td>";
  echo "</tr>";

?>

<script>
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();

today = dd + '-' + mm + '-' + yyyy;
document.getElementById("demo1").innerHTML =  today;

  var d = new Date();
  var weekday = new Array(7);
  weekday[0] = "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";
  var n = weekday[d.getDay()];
  document.getElementById("demo2").innerHTML = "("+n+")";

</script>


  <table width="100%" border="0">
  <tr>
  <td width="100%"></td>
  </tr>
  </table>

  <table width="100%" border="0">
  <tr>
   <td width="30%" style="text-align:right"><p style="color:white;display:inline; font-size:20px;font-weight: bold"></td>
   <td width="40%" td bgcolor="#F4D03F" style="text-align:center "><p style="color:black; display:inline; font-size:26px;font-weight: bold">Employee Entry</td>
   <td width="30%" style="text-align:center"><p style="display:inline; font-size:20px;font-weight: bold" id="lastadm" name="lastadm"></td>   
  </tr>
  <tr>
  <td width="100%" colspan="3">&nbsp</td>
  </tr>
  </table>
  
<?php

echo "<center><table width='100%' border='1' style='border-collapse:collapse'>";
if ($eno>0)
{
echo "<tr>";
echo "<td colspan='2' bgcolor='#FEF9E7' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
LAST EMPLOYEE FOUND<br>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
<u>Employee Id</u><br>
$eno
</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
<u>Name of Employee</u><br>
$ename
</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
<u>Designation</u><br>
$designation
</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
<u>Department</u><br>
$department
</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td style='text-align:center'><p style='color:red;display:inline; font-size:18px;font-weight: bold'>
NO EMPLOYEE ENTRY FOUND....<br>
</td>";
echo "</tr>";
}

echo "</table></center><br>";
$eno+=1;
echo "<input type='hidden' name='enov' id='enov' value=$eno>";
echo "<table width='100%' border='0' style='border-collapse:collapse'>";
echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Employee Id Assigned</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
$eno</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Name of Employee</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td style='text-align:left;'>
<input type='text' name='ename' id='ename' placeholder='Employee Name...' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>
</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";


echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Father's Name</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td style='text-align:left;'>
<input type='text' name='fname' id='fname' placeholder='Name of father...' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>
</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Employee's Gender</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td style='text-align:left;'>";

$queryG = "SELECT gender FROM settings where gender is not null";
$resultG = mysqli_query($conn, $queryG);
$optionsG ="";
$e=0;
while($rowG = mysqli_fetch_array($resultG))
{
	if ($e==0)
	{
	if ($rowG['gender']=='MALE')
		$optionsG = $optionsG."<option value=$rowG[gender] selected>$rowG[gender]</option>";
	else
		$optionsG = $optionsG."<option value=$rowG[gender]>$rowG[gender]</option>";
	$e=1;
	}
	if ($rowG['gender']=='MALE')
		$optionsG = $optionsG."<option value=$rowG[gender] selected>$rowG[gender]</option>";
	else
		$optionsG = $optionsG."<option value=$rowG[gender]>$rowG[gender]</option>";
}
echo "<select name='gender' id='gender' style='width: 40%; height:25px; font-size:14pt;font-weight: bold' required>";
echo "<option value='' disabled selected hidden></option>";
echo "<?php echo $optionsG;?>";
echo "</select>";

echo "</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Designation</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td style='text-align:left;'><p style='display:inline;text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>";
$queryDS = "SELECT designation FROM settings where designation is not null order by designation";
$resultDS = mysqli_query($conn, $queryDS);
$optionsDS ="";
$e=0;
while($rowDS = mysqli_fetch_array($resultDS))
{
	if ($e==0)
	{
		$optionsDS = $optionsDS."<option value=$rowDS[designation]>$rowDS[designation]</option>";
		$e=1;
	}
	$optionsDS = $optionsDS."<option value=$rowDS[designation]>$rowDS[designation]</option>";
}
echo "<select name='designation' id='designation' style='width: 40%; height:30px; font-size:14pt;font-weight: bold' required>";
echo "<option value='' disabled selected hidden></option>";
echo "<?php echo $optionsDS;?>";
echo "</select>";
echo "</td>";
echo "<td  style='text-align:center'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";



echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Department</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td style='text-align:left;'><p style='display:inline;text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>";
$queryDP = "SELECT department FROM settings where department is not null order by department";
$resultDP = mysqli_query($conn, $queryDP);
$optionsDP ="";
$e=0;
while($rowDP = mysqli_fetch_array($resultDP))
{
	if ($e==0)
	{
		$optionsDP = $optionsDP."<option value=$rowDP[department]>$rowDP[department]</option>";
		$e=1;
	}
	$optionsDP = $optionsDP."<option value=$rowDP[department]>$rowDP[department]</option>";
}
echo "<select name='department' id='department' style='width: 40%; height:30px; font-size:14pt;font-weight: bold' required>";
echo "<option value='' disabled selected hidden></option>";
echo "<?php echo $optionsDP;?>";
echo "</select>";
echo "</td>";
echo "<td style='text-align:center'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";





echo "<tr>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Basic Salary</td>";
echo "<td style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='number' name='basic' id='basic' placeholder='Basic Salary...' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Dearness Alowance (%)</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='number' name='da' id='da' placeholder='Dearness Allowance' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Provident Fund (12%)</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='number' readonly name='pf' id='pf' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' value='12'>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
House rent Allowance</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td width='70%' style='text-align:left;'>
<input type='number' name='hra' id='hra' placeholder='House Rent Allowance' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Mobile No</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='number' name='phone' id='phone' placeholder='Mobile no' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' min='1000000000' max='9999999999' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Aadhar No.</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='number' name='aadhar' id='aadhar' placeholder='Aadhar No' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' min='100000000000' max='999999999999' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Date of Birth</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='date' name='dob' id='dob' placeholder='Date of Birth' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";


echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Date of Retirement</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='date' name='dor' id='dor' readonly style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;'>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Date of Joining</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='date' name='doj' id='doj' placeholder='Date of Joining' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' value='$dt' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Email Id</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left;'>
<input type='email' name='email' id='email' placeholder='Email Id' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
&nbsp</td>";
echo "</tr>";







echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Correspondence Address</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";

echo "<td  style='text-align:left;'>
<input type='text' name='cad' id='cad' placeholder='Correspondence Address' style='width: 100%; text-align:left;height:25px; font-size:15pt;font-weight: bold;' oninput='myaddress()' required>
</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<tr>";

echo "<tr>";
echo "<td width='100%' colspan='5' style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>&nbsp</td>";
echo "<tr>";

echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td bgcolor='#D4EFDF' width='25%' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
Permanent Address</td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'>
:</td>";
echo "<td  style='text-align:left'><input type='text' name='pad' id='pad' placeholder='Permanent Address...' style='width: 100%; height:30px;text-align:left;height:25px; font-size:13pt;font-weight: bold;'></td>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<tr>";


echo "<tr>";
echo "<td  style='text-align:center'><p style='display:inline; font-size:18px;font-weight: bold'></td>";echo "<td width='18%' style='text-align:center;'><p style='display:inline; font-size:18px;font-weight: bold;color:red;'></td>";
echo "<td bgcolor='#D4EFDF' style='text-align:left;padding-left:5px;'><p style='display:inline; font-size:18px;font-weight: bold'>
<input type='checkbox' id='padd' name='padd' style='width: 30px; height: 20px;' onclick='myaddress()'>";
echo "<label for='padd' color='red'>Please (&#10004) for same</label><br>
</td>";
echo "<td  style='text-align:left;'>
<p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<td  style='text-align:center;'></td>";
echo "<td  style='text-align:center'>
<p style='display:inline; font-size:18px;font-weight: bold'></td>";
echo "<tr>";








echo "</table>";



?>

<input type="hidden" name="rcodev" id="rcodev">
<input type="hidden" name="bamtv" id="bamtv">
<input type="hidden" name="bsv" id="bsv">
<input type="hidden" name="btv" id="btv">
<input type="hidden" name="bfv" id="bfv">
<input type="hidden" name="bnv" id="bnv">

 
<table width="100%" border="0" style="border-collapse:collapse">
<tr>
<td width="30%"></td>
<td width="40%" style="text-align: center";>
<button class="button" id="save" name="save"><span>Submit </span></button>
</td>
<td width="30%"></td>
</tr>
</table>

<script>
function myaddress()
{
	var PADD = document.getElementById("padd");
	if (PADD.checked == true)
	{
		document.getElementById("pad").value=document.getElementById("cad").value;
	}
	
	if (PADD.checked == false)
	{
		document.getElementById("pad").value="";
	}
}
</script>

<script>
window.onload = function() 
{
	document.getElementById("ename").focus();
}
</script>
</form>
<?php
}
else
{
echo "<table width='100%' border='0'>";
echo "<tr>";
echo "<td width='100%' style='text-align:center;'>";
echo "<br><br><p style='color:#FA4734;display:inline;font-weight: bold;font-size:22px;text-align:center;'>Please LOGIN to continue...";
echo "</td>";
echo "</tr>";
echo "</table>";
?>
<form action="index.php" method="post" name="form1"><div align="center">
<?php	
	echo "<table width='100%' border='0'>";
	echo "<tr>";
	echo "<td width='100%' style='text-align:center'><p style='color:yellow; display:inline; font-size:18px;font-weight: bold'><br><br>";
	echo "<button class='button' id='save' name='save'>Continue...</button>";
	echo "</td>";
	echo "</tr>";
  	echo "<table>";
?>
</div></form>
<?php
}
?>

</body>
</html>