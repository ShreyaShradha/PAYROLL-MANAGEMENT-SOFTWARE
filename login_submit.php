<!DOCTYPE html>
<html>
<head>
<title>
Login Submit

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

	  input[type=number] {

  -moz-appearance: textfield;

}



</style>

</head>



<?php 

include 'config.php';
$table_name="user";
$email =  $_POST['email'];
$pass =  $_POST['pass'];
$conn = new mysqli($servername, $username, $password, $dbname);

//mysql_connect("$host", "$username", "$password")or die("cannot connect"); 

if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
} 


$sql="SELECT * FROM $table_name where email='$email' && pass='$pass'";
$result = $conn->query($sql);
if ($result->num_rows <1) 
{
	echo "<b><br><center>Please check your details.Wrong E-Mail or Password</b>";
}
else
{
	while($rows = $result->fetch_assoc()) 
	{
		$name=$rows['name'];
		$email=$rows['email'];
		$RID=$rows['RID'];
		$pass=$rows['pass'];
		$type=$rows['type'];
		echo "<br><br>";
		if (($type=='Payroll') or ($type=='Admin'))
		{
			echo "<center><p style='display:inline;font-weight: bold;font-size:30px;'>
			Welcome <b><p style='color:#FA4734;display:inline;font-weight: bold;font-size:30px;'>&nbsp$name.&nbsp&nbsp&nbsp&nbsp </b><p style='display:inline;font-weight: bold;font-size:30px;'>Your Role is <b><p style='color:#FA4734;display:inline;font-weight: bold;font-size:30px;'>
			&nbsp&nbsp$type</b><center><br>";
			echo "<table width='100%' border='0'>";
			echo "<tr>";
			echo "<td width='100%' style='text-align:center;'>";
			echo "<br><br>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<hr align='center' bgcolor='#ffffb3' style='height: 10px; border: 0; box-shadow: 0 10px 10px -10px red inset;'>";					
			?>
			<form action="men.php" method="post" name="form1"><div align="center">
			<?php	
			echo "<table width='100%' border='0'>";
			echo "<tr>";
			echo "<td width='100%' style='text-align:center'><p style='color:yellow; display:inline; font-size:18px;font-weight: bold'><br><br>";
			echo "<button class='button' id='save' name='save'><span>Click to Login</span></button>";
			echo "</td>";
			echo "</tr>";
			echo "<table>";
			?>
			</form>
			<?php
			}
			}

session_start(); 
$text = $RID.rand(1000,9999); 
$_SESSION["password"] = $text; 
$_SESSION["email"] = $email;
$_SESSION["pass"] = $pass;
$_SESSION["name"] = $name;
$_SESSION["type"] = $type;
$_SESSION["RID"] = $RID;


$password=$text;
$msg="Your OTP for login is ".$password;	  
?>
<html>
<head><title>Password Check</title></head>
<body>
<?php 
}

?>

</body></html>