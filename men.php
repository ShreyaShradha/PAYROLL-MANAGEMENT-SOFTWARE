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
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

body {

  font-family: Arial, Helvetica, sans-serif;

}



.navbar {

  overflow: hidden;

  background-color: #333;

}



.navbar a {

  float: left;

  font-size: 16px;

  color: white;

  text-align: center;

  padding: 14px 16px;

  text-decoration: none;

}



.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}


.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: green;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;

}



.dropdown-content a {

  float: none;

  color: black;

  padding: 10px 14px;

  text-decoration: none;

  display: block;

  text-align: left;

}



.dropdown-content a:hover {

  background-color: #008B8B;

  color: white;

  font-weight: bold;

  font-size: 100%;

  text-decoration: underline;

    border: 1px solid;

  padding: 10px;

  box-shadow: 5px 10px 12px blue;

}



.dropdown:hover .dropdown-content {

  display: block;

}

.button {

  border: none;

  border-radius: 4px;

  background-color: #0040ff;

  border: none;

  color: #FFFFFF;

  text-align: center;

  font-size: 28px;

  width: 350px;

  height: 60px;

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

  text-align:center;

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

</style>

</head>

<body>

<?php

echo "<table width='100%' border='0'>";

echo "<tr>";

echo "<td width='80%' style='text-align:left;'><p style='color:#FA4734;display:inline;font-weight: bold;font-size:22px;'>&nbsp$name<p style='color:#138D75;display:inline;font-weight: bold;font-size:22px;'> ($type)";

echo "</td>";

echo "<td width='20%' style='text-align: center;padding-right:10px;'>";

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

<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Entry
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	  <a href="fless.php">Generate Salary</a>
	<?php
  	  if ($type=='Admin')
	  {
		echo "<a href='add1.php'>Add Employee</a>";
		echo "<a href='#'>Update Employee</a>";
		echo "<a href='#'>Remove Employee</a>";
	  }
	  else
	  {
		  echo "<a href='' style='color:red; font-we'>Add Employee</a>";
		  echo "<a href='' style='color:red; font-we'>Update Employee</a>";
		  echo "<a href='' style='color:red; font-we'>Remove Employee</a>";
 	  }
	?>
	<a href="#">Change Password</a>
    </div>
  </div> 

<div class="dropdown">
    <button class="dropbtn">Reports
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="dc.php">Employee List</a>
	  <a href="mr.php">Salary Register</a>
      <a href="lc.php">Salary Not Generated List</a>
	  <a href="lcr.php">Pay Slip</a>
    </div>
</div> 




  <div class="dropdown">
    <button class="dropbtn">Manage
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	<?php
  	  if ($type=='Admin')
	  {
		echo "<a href='#'>Manage Payroll Users</a>";
		echo "<a href='#'>Manage Department</a>";
		echo "<a href='#'>Manage Designation</a>";
	  }
	  else
	  {
		  echo "<a href='' style='color:red; font-we'>Manage Payroll Users</a>";
		  echo "<a href='' style='color:red; font-we'>Manage Department</a>";
		  echo "<a href='' style='color:red; font-we'>Manage Employee</a>";
 	  }
	?>
    </div>
  </div> 



</div>



<?php
}
else
{
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