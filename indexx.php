<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>User Type</title>
<style>
.button {
  border: none;
  border-radius: 4px;
  background-color: #2471A3;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 30px;
  padding: 10px 10px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 4px 2px;
  font-weight: bold;
  display: inline-block;
  border-radius: 12px;
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
.tooltip {
  position: relative;
  display: inline-block;  
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 300px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 2px 0;
  border-radius: 6px;
 
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>  
</head>

<body>

<?php
include_once 'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
date_default_timezone_set('Asia/Kolkata');
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
  
  //$rg=$_POST['rg'];
  $dt = date('d-m-Y');
  
  echo "<table width='100%' border='0'>";
  echo "<tr>";
  echo "<td width='100%' bgcolor='#86592d' style='text-align:center'><p style='color:yellow; display:inline; font-size:25px;font-weight: bold'>$N1</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td width='100%' bgcolor='#ffffb3' style='text-align:center;'><p style='display:inline; font-size:14px;font-weight: bold'>$N2</td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td width='100%' bgcolor='#ffffb3' style='text-align:center '><p style='display:inline; font-size:14px;font-weight: bold'>$N3</td>";
  echo "</tr>";
  $d=date("l");
  $t=date("h:i A");
  echo "</table>";
  echo "<br>";
  echo "<table width='100%' border='0'>";
  echo "<tr>";
  echo "<td width='25%' style='text-align:center;'><p style='display:inline; font-weight: bold;font-size:22px;'>Date  &nbsp<p style='color:#FF0000;display:inline;font-weight: bold;font-size:22px;'>$dt</td>";
  echo "</td>";
  echo "<td width='50%' bgcolor='#18918B' style='text-align:center;'><p style='color:white;font-size:18px; display:inline; font-weight: bold;'>";
  echo "User Login &nbsp&nbsp &nbsp&nbsp<p style='color:yellow;font-size:18px; display:inline; font-weight: bold;'> PAYROLL &nbspMANAGEMENT &nbspSOFTWARE";
  echo "</td>";
  echo "<td width='25%' style='text-align:center'><p style='display:inline; font-weight: bold;font-size:22px;'>$d &nbsp&nbsp<p style='color:#FF0000;display:inline;font-weight: bold;font-size:22px;'>&nbsp$t</td>";
  echo "</tr>";
  echo "</table>";
  echo "<hr align='center' bgcolor='#ffffb3' style='height: 10px; border: 0; box-shadow: 0 10px 10px -10px red inset;'>";
?>
<br>
<center>

<form action="index2.php" method="post" enctype="multipart/form-data">
<div class="tooltip">
<button class='button' id='save' name='save'>Admin Login
<span class="tooltiptext"><p style="font-size:15px;">Manage Office Users</span>
</div>
</form>
<br><br>

<form action="index2.php" method="post" enctype="multipart/form-data">
<div class="tooltip">
<button class='button' id='save' name='save'>Office Login
<span class="tooltiptext"><p style="font-size:15px;">Salary management work</span>
</div>
</form>
<br><br>

<form action="index3.php" method="post" enctype="multipart/form-data">
<div class="tooltip">
<button class='button' id='save' name='save'>Employee Login
<span class="tooltiptext"><p style="font-size:15px;">Individual Employee Login</span>
</div>
</form>
<br><br>

	</center>
<div id="fb-root"></div>
  </body>
</html>
