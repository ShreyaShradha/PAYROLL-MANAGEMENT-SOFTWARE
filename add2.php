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
<style>
.button {
  background-color: #0040ff;
  border: none;
  color: white;
  padding: 15px 72px;
  text-align: center;
  font-size:16px;
  font-weight: bold;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
}
div {
  height: 580px;
  width: 816px;
  background-color: powderblue;
  font-size:10px;
  margin-left: 0;
  margin-right: 0;
  margin-top: 0;
  align:center;
}
.center {
  margin: auto;
  height: 580px;
  width: 816px;
  border: 3px solid #73AD21;
  padding: 10px;
}
@page {
      size: A4; /* DIN A4 standard, Europe */
      margin-top:0px;
    }
th, td {
  padding: 0px;
  spacing:0px;
}
body {
   margin: 0;
   padding: 0;
}
.btn {
  background-color: red; 
  border: 2px solid #f44336;
  position: fixed;
  top: 1%;
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
  top: 1%;
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
<script type="text/JavaScript">
var doc = new jsPDF();

 function saveDiv(divId, title) {
 doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
 doc.save('div.pdf');
}

function printDiv(divId, title) {

  let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

  mywindow.document.write(`<html><head><title>${title}</title>`);
  mywindow.document.write('</head><body >');
  mywindow.document.write(document.getElementById(divId).innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  mywindow.print();
  mywindow.close();

  return true;
}
</script>

<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script> 

</head>

<body>
<form action="fgen.php" method="post" name="formx">
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

include_once 'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name FROM mfrm";
$result = $conn->query($sql);
$k=0;
$rg=0;
$tot=0;
$total_once=0;
$montfee=0;
$rdt="";
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
  
if(isset($_POST['save']))
{	 
	 $rg = $_POST['l11'];
	 $ct = $_POST['l1111'];
	 $nm=$_POST['l22'];
	 $cl=$_POST['l2222'];
	 $sc=$_POST['l222222'];
	 $rl = $_POST['l22222222'];
	 $fnm = $_POST['l33'];
	 $mnm = $_POST['l3333'];
	 $bs = $_POST['l33333333n'];
	 $bt = $_POST['bustypen'];
	 $ad = $_POST['l44'];
	 $ph = $_POST['l44444444'];
	 $adm = $_POST['admnon'];
	 $rmn = $_POST['prev_year_monn'];
	 $dm =  $_POST['c4'];
	 $advm =  $_POST['advancen'];
	 $dtot =  $_POST['lessamtn'];
	 $rdtot =  $_POST['freeamtn'];
	 
	 $p_dtot =  $_POST['lesspay'];
	 $p_rdtot =  $_POST['freeship'];
	 $total_once =  $_POST['total_once'];
	 
	 if ($total_once=="1111111111")
		 $total_once=0;
	 	 
	 $anfee =  $_POST['annualfee'];
	 $afs =  $_POST['afs'];
	 
	 $anfeep=0;
	 
	 if ($anfee=='true')
		 $anfeep=0;
	 else
		 $anfeep=1;
	 
	 if ($afs==0)
		 $anfeep=0;
 
	 
	
	 
	 $tot =$_POST['pamtn'];
	 $dtotal=$_POST['dtotaln'];
	 $pd =$_POST['pdn'];
	 $ref =$_POST['refn'];
	 $pmode =$_POST['mdn'];
	 
	 if ($pmode=='C')
		 $pmode="CASH";
	 if ($pmode=='K')
		 $pmode="CHEQUE";
	 if ($pmode=='D')
		 $pmode="CARD";
	 if ($pmode=='N')
		 $pmode="ONLINE";
	 
	 if ((empty($pd)) && $pmode=="ONLINE")
	 {
		 $pd=$tot;
		 $ref=0;
	 }
	 

 	 if (($pmode=='CASH') and (empty($pd)))
	 {
		$pd=$tot;
		$ref=0;
	 }
	 
	 $chn =$_POST['chnn'];
	 $chdt=$_POST['cdaten'];
	 $cbnk=$_POST['bnmn'];
	 $lamt=$_POST['lastamtn'];
	 $ldate=$_POST['lastdaten'];
	 $lrec=$_POST['lastrecn'];
	 $lfee=$_POST['lastfeen'];
//	 $lfee=$_POST['prevmonth'];
	 $mfee=$_POST['mfeen'];
	 $afee=$_POST['afeen'];
	 $tfee=$_POST['tfeen'];
	 
	 $tf=$_POST['tfv'];
	 $fn=$_POST['fnv'];
	 $bsa=$_POST['bsav'];
	 $cm=$_POST['cmv'];
	 $lbb=$_POST['lbbv'];
	 $dg=$_POST['dgv'];
	 $af=$_POST['afv'];
	 $jn=$_POST['jnv'];
	 $ex=$_POST['exv'];
	 $akn=$_POST['aknv'];
	 $lb=$_POST['lbv'];
	 $anf=$_POST['anfv'];
	 $mg=$_POST['mgv'];
	 $as=$_POST['asv'];
	 $kbh=$_POST['kbhv'];
	 $fs=$_POST['fsv'];
	 $akl=$_POST['aklv'];
	 $cau=$_POST['cauv'];
	 $md=$_POST['mdv'];
	 $sy=$_POST['syv'];
	 $fr=$_POST['frv'];
	 $kn=$_POST['knv'];
	 $sp=$_POST['spv'];
	 $el=$_POST['elv'];
	 $sm=$_POST['smv'];
	 $san=$_POST['sanv'];
	 $fa=$_POST['fav'];
	 $build=$_POST['buildv'];
	 $asam=$_POST['asamv'];
	 $psf=$_POST['psfv'];
	 $blt=$_POST['bltv'];
	 $di=$_POST['div'];
	 $cftot=$_POST['cftot'];
	 $montfee=$_POST['montfeen'];
	 $ccrmonth=$_POST['crmonth'];
	 $mftf=$_POST['mftfvv'];
	 $rdt=$_POST['r_datev'];


	if (empty($tf)) 
		$tf=0;
	if (empty($mftf)) 
		$mftf=0;
	if (empty($fn)) 
		$fn=0;
 	if (empty($bsa)) 
		$bsa=0;
	if (empty($cm)) 
		$cm=0;
	if (empty($lbb)) 
		$lbb=0;
	if (empty($dg)) 
		$dg=0;
	if (empty($af)) 
		$af=0;
	if (empty($jn)) 
		$jn=0;
	if (empty($ex)) 
		$ex=0;
	if (empty($akn)) 
		$akn=0;
	if (empty($lb)) 
		$lb=0;
	if (empty($anf))
		$anf=0;
	if (empty($mg)) 
		$mg=0;
	if (empty($as)) 
		$as=0;
	if (empty($kbh)) 
		$kbh=0;
	if (empty($fs)) 
		$fs=0;
	if (empty($akl)) 
		$akl=0;
	if (empty($cau)) 
		$cau=0;
	if (empty($md)) 
		$md=0;
	if (empty($sy)) 
		$sy=0;
	if (empty($fr)) 
		$fr=0;
	if (empty($kn)) 
		$kn=0;
	if (empty($sp)) 
		$sp=0;
	if (empty($el)) 
		$el=0;
	if (empty($sm)) 
		$sm=0;
	if (empty($san)) 
		$san=0;
	if (empty($fa)) 
		$fa=0;
	if (empty($build)) 
		$build=0;
	if (empty($asam)) 
		$asam=0;
	if (empty($psf)) 
		$psf=0;
	if (empty($blt)) 
		$blt=0;
	if (empty($di)) 
		$di=0;
	if (empty($cftot)) 
		$cftot=0;

	 $dtf=$_POST['tfvvv'];
	 $dfn=$_POST['fnvvv'];
	 $dbsa=$_POST['bsavvv'];
	 $dcm=$_POST['cmvvv'];
	 $dlbb=$_POST['lbbvvv'];
	 $ddg=$_POST['dgvvv'];
	 $daf=$_POST['afvvv'];
	 $djn=$_POST['jnvvv'];
	 $dex=$_POST['exvvv'];
	 $dakn=$_POST['aknvvv'];
	 $dlb=$_POST['lbvvv'];
	 $danf=$_POST['anfvvv'];
	 $dmg=$_POST['mgvvv'];
	 $dmd=$_POST['mdvvv'];
	 $das=$_POST['asvvv'];
	 $dkbh=$_POST['kbhvvv'];
	 $dfs=$_POST['fsvvv'];
	 $dakl=$_POST['aklvvv'];
	 $dcau=$_POST['cauvvv'];
	 $dmd=$_POST['mdvvv'];
	 $dsy=$_POST['syvvv'];
	 $dfr=$_POST['frvvv'];
	 $dkn=$_POST['knvvv'];
	 $dsp=$_POST['spvvv'];
	 $del=$_POST['elvvv'];
	 $dsm=$_POST['smvvv'];
	 $dsan=$_POST['sanvvv'];
	 $dfa=$_POST['favvv'];
	 $dbuild=$_POST['buildvvv'];
	 $dasam=$_POST['asamvvv'];
	 $dpsf=$_POST['psfvvv'];
	 $dblt=$_POST['bltvvv'];
	 $ddi=$_POST['divvv'];
	 //$clmonth=$_POST['myDate'];
	 $pymon=$_POST['prev_year_monn'];
	 $cymon=$_POST['c4'];
	 $bsfac=$_POST['l33333333n'];
	 $ann=$_POST['annualn'];
	 $bn=$_POST['busnon'];
	 $clmonth=$_POST['clmonthn'];
	 $chn=$_POST['chnn'];
	 $chdt=$_POST['cdaten'];
	 $cbn=$_POST['bnamen'];
	 //$pd=$_POST['pdn'];
	 //$ref=$_POST['refn'];
	 $ph=$_POST['phonen'];
	 $cmnths=$_POST['fee_monthn']; // current month fee
	 $nad=$_POST['nadn'];
	 $ssn=$_POST['sessionn'];
	 $cftf=$_POST['cftfn'];
	 $cffn=$_POST['cffnn'];
	 $cfbs=$_POST['cfbsn'];
	 $cfcm=$_POST['cfcmn'];
	 $cflbb=$_POST['cflbbn'];
	 $cfdg=$_POST['cfdgn'];
	 $cfaf=$_POST['cfafn'];
	 $cfjn=$_POST['cfjnn'];
	 $cfex=$_POST['cfexn'];
	 $cfakn=$_POST['cfaknn'];
	 $cflb=$_POST['cflbn'];
	 $cfanf=$_POST['cfanfn'];
	 $cfmg=$_POST['cfmgn'];
	 $cfas=$_POST['cfasn'];
	 $cfkbh=$_POST['cfkbhn'];
	 $cffs=$_POST['cffsn'];
	 $cfakl=$_POST['cfakln'];
	 $cfcau=$_POST['cfcaun'];
	 $cfmd=$_POST['cfmdn'];
	 $cfsy=$_POST['cfsyn'];
	 $cffr=$_POST['cffrn'];
	 $cfkn=$_POST['cfknn'];
	 $cfsp=$_POST['cfspn'];
	 $cftf=$_POST['cftfn'];
	 $cfel=$_POST['cfeln'];
	 $cfsm=$_POST['cfsmn'];
	 $cfsan=$_POST['cfsann'];
	 $cffa=$_POST['cffan'];
	 $cfbuild=$_POST['cfbuildn'];
	 $cfab=$_POST['cfabn'];
	 $cfpsf=$_POST['cfpsfn'];
	 $cfblt=$_POST['cfbltn'];
	 $cfdi=$_POST['cfdin'];
	 $thou=$_POST['thoughtn'];
	 $auth=$_POST['authorn'];
	 $dt=$_POST['currdate'];
	 $tm=$_POST['currtime'];
}
$tot=$tf+$cm+$bsa+$fn+$dg+$psf+$sp+$af+$cau+$mg+$md+$el+$kn+$ex+$di+$blt+$sy+$kbh+$lb+$fs+$akl+$lbb+$akn+$jn+$anf+$fr+$san+$as+$build+$sm+$fa+$asam;
$tms=$dg+$psf+$sp+$md+$el+$kn+$di+$sy+$kbh+$lb+$fs+$akl+$lbb+$akn+$jn+$anf+$fr+$san+$as+$sm+$fa+$asam;
$rdtot=0;
date_default_timezone_set('Asia/Kolkata');
$cdt = date('d-M-Y');

$ctm = date('h:i A');
$ldate1 = date('d-m-Y',strtotime($ldate));

$chdt = strtotime ( $chdt); 
$chdt= date ( 'd-m-Y' , $chdt );
$rc=0;
$query1 = "SELECT rec_no FROM recs";
$result1 = mysqli_query($conn, $query1);

while($row1 = mysqli_fetch_array($result1))
{
	$rc=$row1['rec_no'];
}
$rc=$rc+1;
$tp="Gen";

/////////
$totdiff=0;
$tot=(int)$tot;
$totdiff=$total_once-$tot-$rdtot;

$dmess="";
if ($totdiff>0)
	$dmess="Rs. "."$totdiff"."/- "."Till ".date("M")."-".date("Y");

function getamount(float $number)
    {
        $no = floor($number);
        $decimal = round($number - $no, 2) * 100;
        $decimal_part = $decimal;
        $hundred = null;
        $hundreds = null;
        $digits_length = strlen($no);
        $decimal_length = strlen($decimal);
        $i = 0;
        $str = array();
        $str2 = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
        
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }

        $d = 0;
        while( $d < $decimal_length ) {
            $divider = ($d == 2) ? 10 : 100;
            $decimal_number = floor($decimal % $divider);
            $decimal = floor($decimal / $divider);
            $d += $divider == 10 ? 1 : 2;
            if ($decimal_number) {
                $plurals = (($counter = count($str2)) && $decimal_number > 9) ? 's' : null;
                $hundreds = ($counter == 1 && $str2[0]) ? ' and ' : null;
                @$str2 [] = ($decimal_number < 21) ? $words[$decimal_number].' '. $digits[$decimal_number]. $plural.' '.$hundred:$words[floor($decimal_number / 10) * 10].' '.$words[$decimal_number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str2[] = null;
        }
        
        $Rupees = implode('', array_reverse($str));
        $paise = implode('', array_reverse($str2));
        $paise = ($decimal_part > 0) ? $paise . ' Paise' : '';
        return ($Rupees ? $Rupees . ' Only ' : '');
    }
?>
<div class="center" id="mydiv">
<?php

 echo "<table width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;font-family: 'Arial Black', Gadget, sans-serif'>";
  echo "<tr>";
	$h1=strlen($N1);
	$h2=strlen($N2);
	$h3=strlen($N3);
	$h4=strlen($N4);
	
	if ($h1<=26)
	{
	    echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;padding: 0px;spacing:0px;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:18px'>$N1</td>";
		echo "<td width='4%' style='padding: 0;margin: 0;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:18px'>$N1</td>";
	}
	
	if (($h1>26) and ($h1<=30))
	{
	    echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:17px'>$N1</td>";
		echo "<td width='4%' style='padding: 0;margin: 0;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:17px'>$N1</td>";
	}
	
	if (($h1>30) and ($h1<=35))
	{
	    echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:13px'>$N1</td>";
		echo "<td width='4%' ><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:13px'>$N1</td>";
	}
	
	if (($h1>35) and ($h1<=40))
	{
	    echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>$N1</td>";
		echo "<td width='4%' ><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>$N1</td>";
	}

	if (($h1>40) and ($h1<=45))
	{
	    echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:10px'>$N1</td>";
		echo "<td width='4%' ><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:10px'>$N1</td>";
	}

	if ($h1>45)
	{
	    echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N1</td>";
		echo "<td width='4%' ><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N1</td>";
	}

 echo "</tr>";
 echo "</table>";
 echo "<table width='100%' border='0' style='border-spacing: 0;border-collapse: collapse; padding: 0px'>";

 echo "<tr>";
	if ($h2<=26)
	{
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:17px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:17px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
	}
	
	if (($h2>26) and ($h2<=30))
	{
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:14px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:14px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
	}
	
	if (($h2>30) and ($h2<=35))
	{
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
	}
	
	if (($h2>35) and ($h2<=40))
	{
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:10px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:10px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
	}

	if (($h2>40) and ($h2<=45))
	{
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='display:inline; font-weight: bold;font-size:9px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
	}

	if ($h2>45)
	{
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:7px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='LL1'><img src='svmlogo.jpg' alt='School Logo' width='55' height='40'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:7px'>$N2</td>";
		echo "<td width='9%' style='padding: 0;margin: 0;text-align:center;' rowspan='3'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'><img src='cbselogo.jpg' alt='CBSE Logo' width='55' height='40'></td>";
	}
 echo "</tr>";
 echo "<tr>";
	if ($h3<=26)
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:16px'>$N3</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:16px'>$N3</td>";
	}
	
	if (($h3>26) and ($h3<=30))
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:14px'>$N3</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:14px'>$N3</td>";
	}
	
	if (($h3>30) and ($h3<=35))
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>$N3</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>$N3</td>";
	}
	
	if (($h3>35) and ($h3<=40))
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:10px'>$N3</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:10px'>$N3</td>";
	}

	if (($h3>40) and ($h3<=45))
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N3</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N3</td>";
	}

	if ($h3>45)
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:7px'>$N3</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:7px'>$N3</td>";
	}

 echo "</tr>";
 echo "<tr>";
	if ($h4<=26)
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>$N4</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>$N4</td>";
	}
	
	if (($h4>26) and ($h4<=30))
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N4</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N4</td>";
	}
	
	if (($h4>30) and ($h4<=35))
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N4</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:9px'>$N4</td>";
	}
	
	if (($h4>35) and ($h4<=40))
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:8px'>$N4</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:8px'>$N4</td>";
	}

	if (($h4>40) and ($h4<=45))
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:7px'>$N4</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:7px'>$N4</td>";
	}

	if ($h4>45)
	{
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:6px'>$N4</td>";
		echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
		echo "<td width='31%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:6px'>$N4</td>";
	}
 echo "</tr>";
 echo "</table>";
 
 echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; font-size:10px;'>";
 echo "<tr>";
	echo "<td width='16%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:12px;'>Receipt No</td>";
    echo "<td width='1%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='17%' style='padding: 0;margin: 0;padding: 0;margin: 0;border-top:solid 1px #060;text-align:center; font-family: 'Times New Roman', serif;text-align:center;'><p style='padding: 0;margin: 0;font-size:15px;display:inline; font-weight: bold;'>FEE &nbspRECEIPT</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='13%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:right;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:12px;'>Time</td>";

	echo "<td width='4%' style='padding: 0;margin: 0;'><p style='padding: 0;margin: 0;padding: 0;margin: 0;display:inline; font-weight: bold'></td>";

	echo "<td width='16%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:12px;'>Receipt No</td>";
    echo "<td width='1%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='17%' style='padding: 0;margin: 0;padding: 0;margin: 0;border-top:solid 1px #060;text-align:center; font-family: 'Times New Roman', serif;text-align:center;'><p style='padding: 0;margin: 0;font-size:15px;display:inline; font-weight: bold;'>FEE &nbspRECEIPT</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='13%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:right;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:12px;'>Time</td>";
 echo "</tr>";

 echo "<tr>";
	echo "<td width='16%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:left'><p id='receipt_no1' style='padding: 0;margin: 0;font-size:15px;display:inline;font-weight: bold'>$rc</td>";
    echo "<td width='1%'><p style='padding: 0;margin: 0;padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='17%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;font-size:15px;display:inline; font-weight: bold'>$cdt</td>";
	echo "<td width='1%'><p style='padding: 0;margin: 0;padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='13%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;font-size:15px;display:inline; font-weight: bold'>$ctm</td>";

	echo "<td width='4%' style='padding: 0;margin: 0;padding: 0;margin: 0;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";

	echo "<td width='16%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:left'><p id='receipt_no2' style='padding: 0;margin: 0;font-size:15px;display:inline;font-weight: bold'>$rc</td>";
    echo "<td width='1%' style='padding: 0;margin: 0;padding: 0;margin: 0;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='17%' style='padding: 0;margin: 0;padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;font-size:15px;display:inline; font-weight: bold'>$cdt</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;padding: 0;margin: 0;'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='13%' style='padding: 0;margin: 0;text-align:right;padding: 0;margin: 0;'><p style='padding: 0;margin: 0;font-size:15px;display:inline; font-weight: bold'>$ctm</td>";
 echo "</tr>";
 echo "</table>";
 
 echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:11px'>";
 echo "<tr>";
    echo "<td width='48%' style='padding: 0;margin: 0;border-bottom:solid 1px #060;border-left:solid 1px #060;border-right:solid 1px #060;text-align:center;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:13px'>$cmnths</td>";
	echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:10px'></td>";
    echo "<td width='48%' style='padding: 0;margin: 0;border-bottom:solid 1px #060;border-left:solid 1px #060;border-right:solid 1px #060;text-align:center;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:13px'>$cmnths</td>";
 echo "</tr>";
 echo "</table>";

 echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
 echo "<tr>";
   echo "<td width='12%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Comp_No. </td>";
   echo "<td width='1%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
   echo "<td width='8%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:13px;'>$rg</td>";
   
   $adlen=strlen($adm);
	if ($adlen>0)
		echo "<td width='27%' colspan='3' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>Adm_No : &nbsp&nbsp$adm</td>";
	else
		echo "<td width='27%' colspan='3' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'></td>";
   
   echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:10px'></td>";

   echo "<td width='12%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Comp_No.</td>";
   echo "<td width='1%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
   echo "<td width='8%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:13px;'>$rg</td>";
	if ($adlen>0)
		echo "<td width='27%' colspan='3' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'>Adm_No : &nbsp&nbsp$adm</td>";
	else
		echo "<td width='27%' colspan='3' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline; font-weight: bold;font-size:11px'></td>";

 echo "</table>";
$nlen=strlen($nm);

 echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
 echo "<tr>";
    echo "<td width='12%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Student's Name</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	if ($nlen<=23)
		echo "<td width='25%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:13px;'>$nm</td>";
	if (($nlen>23) and ($nlen<=27))
		echo "<td width='25%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'>$nm</td>";
	if (($nlen>27) and ($nlen<=31))
		echo "<td width='25%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:10px;'>$nm</td>";
	if ($nlen>31)
		echo "<td width='25%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:9px;'>$nm</td>";

	echo "<td width='10%' colspan='2' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>BUS :&nbsp&nbsp$bs</td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>	";
	
    echo "<td width='12%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Student's Name</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
		if ($nlen<=23)
		echo "<td width='25%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:13px;'>$nm</td>";
	if (($nlen>23) and ($nlen<=27))
		echo "<td width='25%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'>$nm</td>";
	if (($nlen>27) and ($nlen<=31))
		echo "<td width='25%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:10px;'>$nm</td>";
	if ($nlen>31)
		echo "<td width='25%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:9px;'>$nm</td>";

	echo "<td width='10%' colspan='2' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>BUS :&nbsp&nbsp$bs</td>"; echo "</tr>";
 echo "</table>";

 echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
 echo "<tr>";
	echo "<td width='12%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Father's Name</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='35%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:13px;'>$fnm</td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='12%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Father's Name</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='35%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:13px;'>$fnm</td>";
	echo "</tr>";
 echo "</table>";
 echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
 echo "<tr>";
    echo "<td width='12%' style='padding: 0;margin: 0;text-align:left; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Class/Sec</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;text-align:center;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='6%'  style='padding: 0;margin: 0;text-align:left; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:13px;'>$cl-$sc</td>";
	echo "<td width='6%' style='padding: 0;margin: 0;text-align:center; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Roll :</td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:left; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:13px;'>$rl</td>";
	if (strlen($ph)>0)
		echo "<td width='19%' style='padding: 0;margin: 0;text-align:right; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:10px;'>Contact No : &nbsp&nbsp$ph</td>";
	else
		echo "<td width='19%' style='padding: 0;margin: 0;text-align:right; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Contact No : &nbsp&nbspNot Found</td>";

	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>	";

    echo "<td width='12%' style='padding: 0;margin: 0;text-align:left; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Class/Sec</td>";
	echo "<td width='1%' style='padding: 0;margin: 0;text-align:center;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='6%'  style='padding: 0;margin: 0;text-align:left; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:14px;'>$cl-$sc</td>";
	echo "<td width='6%' style='padding: 0;margin: 0;text-align:center; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Roll :</td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:left; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:13px;'>$rl</td>";
	if (strlen($ph)>0)
		echo "<td width='19%' style='padding: 0;margin: 0;text-align:right; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:10px;'>Contact No : &nbsp&nbsp$ph</td>";
	else
		echo "<td width='19%' style='padding: 0;margin: 0;text-align:right; border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Contact No : &nbsp&nbspNot Found</td>";

echo "</tr>";
echo "</table>";

 echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:13px'>";

 echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Tuition Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$tf</td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Tuition Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$tf</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>I.T. Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$cm</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";

	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>	";

	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>I.T. Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$cm</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Transport Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$bsa</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Transport Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$bsa</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Late Fine</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$fn</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Late Fine</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$fn</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Examination</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$ex</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Examination</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$ex</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";
echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Admission Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$af</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Admission Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$af</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Security Money</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$cau</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Security Money</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$cau</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Building</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$build</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Building</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$build</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Miscellaneous</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$tms</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Miscellaneous</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$tms</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Others</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$blt</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Others</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$blt</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Computer Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$mg</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>•</td>";
    echo "<td width='24%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Computer Fee</td>";
	echo "<td width='2%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='border-bottom: 1px inset #ddd;padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$mg</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

$afp=0;
$afp=$anf+$kbh+$el+$sp+$fr+$lb+$sy+$san+$md+$mg+$sm+$psf+$fs+$as;
echo "</table>";

echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:9px'>";
echo "<tr>";
	echo "<td width='12%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Payment Mode :</td>";
	echo "<td width='11%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$pmode</td>";
	echo "<td width='9%' style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Total</td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;font-size:15px;display:inline;font-weight: bold'>$tot</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";

	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";

	echo "<td width='12%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Payment Mode :</td>";
	echo "<td width='11%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$pmode</td>";
	echo "<td width='9%' style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Total</td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>:</td>";
	echo "<td width='10%' style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;font-size:15px;display:inline;font-weight: bold'>$tot</td>";
	echo "<td width='4%'  style='padding: 0;margin: 0;text-align:right;border-top:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";
echo "</table>";

if ($pmode=='CASH')
{
	echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
	echo "<tr>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='8%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Received :</td>";
	echo "<td width='6%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='pay2'>$pd</td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>//</td>";
	echo "<td width='8%'  style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Refund :</td>";
	echo "<td width='6%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$ref</td>";
	echo "<td width='14%'  style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='8%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Received :</td>";
	echo "<td width='6%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='pay2'>$pd</td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>//</td>";
	echo "<td width='8%'  style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Refund :</td>";
	echo "<td width='6%' style='padding: 0;margin: 0;text-align:center;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>$ref</td>";
	echo "<td width='14%'  style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "</tr>";
	echo "</table>";
}


if ($pmode=='CHEQUE')
{
	echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
	echo "<tr>";
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='cqnumber1'></td>";
	echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='cqnumber2'></td>";
	echo "</tr>";
	echo "</table>";
}

if ($pmode=='CARD' || $pmode=='ONLINE')
{
	echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
	echo "<tr>";
	echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='9%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>BANK : </td>";
	echo "<td width='35%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='cdbank1'></td>";
	
	echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	echo "<td width='4%'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='9%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>BANK : </td>";
	echo "<td width='35%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='cdbank1'></td>";
	
	echo "</tr>";
	echo "</table>";
}

$wrd="Rupees in word : &nbsp&nbsp".getamount($tot);
echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
echo "<tr>";
if (strlen($wrd)<=75)
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;text-decoration: underline;display:inline;font-weight: bold;font-size:10px;'>$wrd</td>";
if ((strlen($wrd)>75) and (strlen($wrd)<=80))
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;text-decoration: underline;display:inline;font-weight: bold;font-size:9px'>$wrd</td>";
if (strlen($wrd)>80)
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;text-decoration: underline;display:inline;font-weight: bold;font-size:8px'>$wrd</td>";
	
echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";

if (strlen($wrd)<=75)
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;text-decoration: underline;display:inline;font-weight: bold;font-size:10px;'>$wrd</td>";
if ((strlen($wrd)>75) and (strlen($wrd)<=80))
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;text-decoration: underline;display:inline;font-weight: bold;font-size:9px'>$wrd</td>";
if (strlen($wrd)>80)
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;text-decoration: underline;display:inline;font-weight: bold;font-size:8px'>$wrd</td>";
echo "</tr>";
echo "</table>";

echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:12px'>";
echo "<tr>";
if (($dtot>0) and ($rdtot>0))
{
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Less Payment : &nbsp$dtot</td>";
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Freeship : &nbsp$rdtot</td>";
	echo "<td width='4%' style='padding: 0;margin: 0;font-style: italic;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";	
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Less Payment : &nbsp$dtot</td>";
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Freeship : &nbsp$rdtot</td>";
}

if (($dtot>0) and ($rdtot==0))
{
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Less Payment : &nbsp$dtot</td>";
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";	
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Less Payment : &nbsp$dtot</td>";
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'></td>";
}

if (($dtot==0) and ($rdtot>0))
{
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Freeship : &nbsp$rdtot</td>";
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";	
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'>Freeship : &nbsp$rdtot</td>";
	echo "<td width='24%' style='padding: 0;margin: 0;font-style: italic;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'></td>";
}

if (($dtot==0) and ($rdtot==0))
{
	echo "<td width='24%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'></td>";
	echo "<td width='24%' style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";	
	echo "<td width='24%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'></td>";
	echo "<td width='24%' style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'></td>";
}
echo "</tr>";
echo "</table>";





echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
echo "<tr>";
	echo "<td width='15%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060;border-right:solid 1px #060;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:9px'>Prev. Fee Information</td>";
if ($lamt>0)	
	echo "<td width='16%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;padding-left:5px;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Date : $ldate1</td>";
else
	echo "<td width='16%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;padding-left:5px;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Date : N/A</td>";

if ($lamt>0)
	echo "<td width='17%' style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060;border-top:solid 1px #060;padding-right:5px;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Receipt No : $lrec</td>";
else
	echo "<td width='17%' style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060;border-top:solid 1px #060;padding-right:5px;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Receipt No : N/A</td>";
	
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='15%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060;border-right:solid 1px #060;border-top:solid 1px #060;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:9px'>Prev. Fee Information</td>";
	if ($lamt>0)	
	echo "<td width='16%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;padding-left:5px;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Date : $ldate1</td>";
else
	echo "<td width='16%' style='padding: 0;margin: 0;text-align:left;border-top:solid 1px #060;padding-left:5px;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Date : N/A</td>";

if ($lamt>0)
	echo "<td width='17%' style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060;border-top:solid 1px #060;padding-right:5px;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Receipt No : $lrec</td>";
else
	echo "<td width='17%' style='padding: 0;margin: 0;text-align:right;border-right:solid 1px #060;border-top:solid 1px #060;padding-right:5px;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Receipt No : N/A</td>";

	echo "</tr>";
	
	echo "<tr>";
	if ($lamt>0)
		echo "<td width='15%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Paid: $lamt/-</td>";
	else
		echo "<td width='15%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Paid: N/A</td>";
		
	if ($lamt>0)
	{
		if ($p_dtot>0)	
			echo "<td width='33%' colspan='2' style='padding: 0;margin: 0;text-align:center;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='prevpayv1'>$lfee &nbsp(Less : $p_dtot)</td>";
		else
			echo "<td width='33%' colspan='2' style='padding: 0;margin: 0;text-align:center;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='prevpayv1'>$lfee</td>";
	}
	else
		echo "<td width='33%' colspan='2' style='padding: 0;margin: 0;text-align:center;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='prevpayv1'></td>";
	
		
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	
	
	
	if ($lamt>0)
		echo "<td width='15%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Paid: $lamt/-</td>";
	else
		echo "<td width='15%' style='padding: 0;margin: 0;text-align:center;border-left:solid 1px #060;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Paid: N/A</td>";
	if ($lamt>0)
	{
		if ($p_dtot>0)	
			echo "<td width='33%' colspan='2' style='padding: 0;margin: 0;text-align:center;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='prevpayv1'>$lfee &nbsp(Less : $p_dtot)</td>";
		else
			echo "<td width='33%' colspan='2' style='padding: 0;margin: 0;text-align:center;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='prevpayv1'>$lfee</td>";
	}
	else
		echo "<td width='33%' colspan='2' style='padding: 0;margin: 0;text-align:center;border-right:solid 1px #060;border-bottom:solid 1px #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='prevpayv1'></td>";

	echo "</tr>";
echo "</table>";


echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;font-size:10px'>";
echo "<tr>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='br1'></td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<tr>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='br2'></td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
echo "</tr>";

echo "<br>";

echo "<tr>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:left;border-bottom:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Received With Thanks...</td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:center;border-bottom:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:right;border-bottom:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Sign(Cashier)</td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:left;border-bottom:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Received With Thanks...</td>";
	echo "<td width='2%' style='padding: 0;margin: 0;text-align:center;border-bottom:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'></td>";
	echo "<td width='23%' style='padding: 0;margin: 0;text-align:right;border-bottom:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold'>Sign(Cashier)</td>";
echo "</tr>";
echo "</table>";

echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;'>";
echo "<tr>";
$message=$thou.$auth;
if (strlen($message)<=60)
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:10px;'>$thou--$auth</td>";
if ((strlen($message)>60) and (strlen($message)<=70))
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:9px;'>$thou--$auth</td>";
if ((strlen($message)>70) and (strlen($message)<=80))
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:8px;'>$thou--$auth</td>";
if ((strlen($message)>80) and (strlen($message)<=90))
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:7px;'>$thou--$auth</td>";
if (strlen($message)>90)
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:6px;'>$thou--$auth</td>";

	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'></td>";

if (strlen($message)<=60)
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:10px;'>$thou--$auth</td>";
if ((strlen($message)>60) and (strlen($message)<=70))
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:9px;'>$thou--$auth</td>";
if ((strlen($message)>70) and (strlen($message)<=80))
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:8px;'>$thou--$auth</td>";
if ((strlen($message)>80) and (strlen($message)<=90))
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:7px;'>$thou--$auth</td>";
if (strlen($message)>90)
	echo "<td width='48%' style='padding: 0;margin: 0;text-align:center;border-top:1px solid #060'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:6px;'>$thou--$auth</td>";

echo "</tr>";
echo "</table>";

if ($totdiff>0)
{
	echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;'>";
	echo "<tr>";
	echo "<td width='15%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'>User : $name</td>";
	echo "<td width='33%' style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:10px;'>Outstanding Dues : $dmess</td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'></td>";
	echo "<td width='15%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'>User : $name</td>";
	echo "<td width='33%' style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:10px;'>Outstanding Dues : $dmess</td>";
	echo "</tr>";
	echo "</table>";
}
else
{
	echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px;'>";
	echo "<tr>";
	echo "<td width='15%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'>User : $name</td>";
	echo "<td width='33%' style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'></td>";
	echo "<td width='4%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;'></td>";
	echo "<td width='15%' style='padding: 0;margin: 0;text-align:left;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'>User : $name</td>";
	echo "<td width='33%' style='padding: 0;margin: 0;text-align:right;'><p style='padding: 0;margin: 0;display:inline;font-weight: bold;font-size:11px;'></td>";
	echo "</tr>";
	echo "</table>";
}

	 $rdtf=0;
	 $rdfn=0;
	 $rdbsa=0;
	 $rdcm=0;
	 $rdlbb=0;
	 $rddg=0;
	 $rdaf=0;
	 $rdjn=0;
	 $rdex=0;
	 $rdakn=0;
	 $rdlb=0;
	 $rdanf=0;
	 $rdmg=0;
	 $rdas=0;
	 $rdkbh=0;
	 $rdfs=0;
	 $rdakl=0;
	 $rdcau=0;
	 $rdmd=0;
	 $rdsy=0;
	 $rdfr=0;
	 $rdkn=0;
	 $rdsp=0;
	 $rdel=0;
	 $rdsm=0;
	 $rdsan=0;
	 $rdfa=0;
	 $rdbuild=0;
	 $rdasam=0;
	 $rdpsf=0;
	 $rdblt=0;
	 $rddi=0;
	 
$clmon = strtotime ( $clmonth); 
$clmn= date ( 'Y-m-d' , $clmon );

date_default_timezone_set('Asia/Kolkata');

if ($pd==0)
	$pd=$tot;

$dmon=$dtf+$dfn+$dbsa+$dcm+$dlbb+$ddg+$dasam;
$dann=$daf+$djn+$dex+$dakn+$dlb+$danf+$dmg+$dmd+$das+$dkbh+$dfs+$dakl+$dcau+$dmd+$dsy+$dfr+$dkn+$dsp+$del+$dsm+$dsan+$dfa+$dbuild+$dpsf+$dblt+$ddi;

echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px'>";
echo " <tr>";
    echo "<td width='14%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='pfee1'></td>";
    echo "<td width='35%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'  id='pfee2'>'</td>";
	echo "<td width='3%' style='padding: 0;margin: 0;text-align:center'><p style='padding: 0;margin: 0;display:inline; font-weight: bold' id='tim'></td>";
	echo "<td width='14%'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='pfee3'></td>";
    echo "<td width='35%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'  id='pfee4'></td>";
 echo "</tr>";
 echo "</table>";

 echo "<table width='100%' border='0' style='padding: 0;margin: 0;border-spacing: 0;border-collapse: collapse; padding: 0px'>";
 echo "<tr>";
    echo "<td width='16%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='paidamt1'></td>";
	echo "<td width='8%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='dated1'></td>";
	echo "<td width='24%'  style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='receipt1'></td>";
	echo "<td width='2%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
	echo "<td width='16%' style='padding: 0;margin: 0;text-align:right'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='paidamt2'></td>";
	echo "<td width='8%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='dated2'></td>";
	echo "<td width='24%' style='padding: 0;margin: 0;text-align:left'><p style='padding: 0;margin: 0;display:inline;font-weight: bold' id='receipt2'></td>";
	echo "<td width='2%'><p style='padding: 0;margin: 0;display:inline; font-weight: bold'></td>";
 echo "</tr>";
 echo "</table>";
$dtm=date("Y-m-d h:i:s");

$rgp=0;
$dtp="";
$tmp="";

$sqlr = "SELECT reg_no,date,time FROM recs where '$rg'=reg_no";
$resultr = $conn->query($sqlr);
$done=0;
while($rowr = $resultr->fetch_assoc())
{
  	$rgp=$rowr['reg_no'];
	$dtp=$rowr['date'];
	$tmp=$rowr['time'];

	if (($rg==$rgp) and ($dt==$dtp) and ($tm==$tmp))
		$done=1;
}

if ($done==0)
{
$sql1 = "INSERT INTO recs (rec_no,type,reg_no,date,time)
VALUES ('$rc','FEE','$rg','$dt','$tm')";

if (mysqli_query($conn, $sql1))
	echo "";
else 
 	echo "Error: " . $sql1 . "" . mysqli_error($conn);

$sql2 = "INSERT INTO data (reg_no,name, class, sec, roll,f_name,t_fee,comp,   bus, bus_type, fine, digi,  pr_st_fn,sports,ad_fee, cau_fee, mag,  medi,elec, kend, exam, diary,  belt,  syl,  k_bharti, lib,   fes,  ach_kal, lab, ak_nid,  janj,  ann_fee, furn,  sans, asge, building, sms, famd,  no_mon, bus_fac, adv_mon, crec_no, ctotal, date, time, absent, rec_no, category, type, annual,bus_no, cr_month, chno, chdate, chbank, paid, refund, mode,   phone,  month,  cmonth, new_adm, total, dtotal, rdtotal, session, dt_fee, dcomp, dbus_o, dfine, ddigi, dpr_st_fn,dsports, dad_fee, dcau_fee,  dmag, dmedi, delec, dkend, dexam, ddiary, dbelt,  dsyl, dk_bharti,dlib, dfes, dach_kal, dlab, dak_nid,   djanj,  dann_fee, dfurn,   dsans, dasge, dbuilding, dsms, dfamd, rdt_fee, rdcomp, rdbus_o,  rdfine, rddigi, rdpr_st_fn, rdsports, rdad_fee, rdcau_fee, rdmag, rdmedi, rdelec, rdkend, rdexam, rddiary, rdbelt,  rdsyl,rdk_bharti,rdlib,  rdfes,  rdach_kal, rdlab,  rdak_nid, rdjanj,  rdann_fee,rdfurn,  rdsans, rdasge, rdbuilding, rdsms, rdfamd, ct_fee,  ccomp,  cbus,   cfine,  cdigi, cpr_st_fn, csports, cad_fee, ccau_fee,  cmag,  cmedi,  celec,  ckend,  cexam, cdiary,  cbelt,   csyl,  ck_bharti,clib,   cfes, cach_kal,  clab,   cak_nid,  cjanj, cann_fee, cfurn,  csans,   casge, cbuilding,  csms,   cfamd, datetime,updated,annualfee,description,dues_mess,  out_dues, u_id,  sch_id,pr_yr_mon, mon_tfee,   cdate,  cdtotal, ccr_month, mft_fee, r_date)
VALUES (                    '$rg','$nm','$cl','$sc','$rl','$fnm','$tf','$cm','$bsa', '$bt',  '$fn','$dg',  '$psf', '$sp',  '$af',  '$cau','$mg','$md','$el','$kn','$ex','$di', '$blt','$sy',  '$kbh', '$lb', '$fs',  '$akl','$lbb','$akn', '$jn',  '$anf', '$fr','$san','$as','$build','$sm','$fa','$cymon','$bsfac','$advm', '$lrec', '$lamt','$dt','$tm','$asam','$rc',   '$ct',   '$tp','$ann','$bn',   '$clmn','$chn','$cdt', '$cbn','$pd', '$ref','$pmode','$ph','$cmnths','$lfee','$nad', '$tot','$dtot','$rdtot',  '$ssn', '$dtf', '$dcm','$dbsa','$dfn','$ddg', '$dpsf',  '$dsp', '$daf',   '$dcau', '$dmg','$dmd','$del','$dkn','$dex','$ddi','$dblt','$dsy','$dkbh','$dlb','$dfs', '$dakl','$dlb',  '$dakn', '$djn',  '$danf', '$dfr', '$dsan','$das','$dbuild','$dsm','$dfa','$rdtf','$rdcm', '$rdbsa', '$rdfn','$rddg', '$rdpsf',   '$rdsp',  '$rdaf', '$rdcau', '$rdmg','$rdmd','$rdel','$rdkn','$rdex','$rddi','$rdblt','$rdsy','$rdkbh','$rdlb','$rdfs', '$rdakl', '$rdlb', '$rdakn', '$rdjn', '$rdanf', '$rdfr','$rdsan','$rdas','$rdbuild','$rdsm','$rdfa','$cftf','$cfcm','$cfbs','$cffn','$cfdg', '$cfpsf', '$cfsp', '$cfaf', '$cfcau','$cfmg','$cfmd','$cfel','$cfkn','$cfex','$cfdi','$cfblt','$cfsy','$cfkbh','$cflb','$cffs','$cfakl','$cflbb', '$cfakn','$cfjn','$cfanf','$cffr','$cfsan','$cfas','$cfbuild','$cfsm','$cffa', '$dtm',    1,    '$anfeep','$cmnths', '$dmess', '$totdiff','$name',  '',   '$rmn',  '$montfee','$ldate','$p_dtot','$ccrmonth', '$mftf','$rdt')";

if (mysqli_query($conn, $sql2))
	include_once 'aentry.php';
else 
 	echo "Error: " . $sql2 . "" . mysqli_error($conn);

$sql3 = "update dstud
		set name='$nm', class='$cl', sec='$sc', roll='$rl', t_fee='$dtf', fine='$dfn', comp='$dcm',
		bus='$dbsa', digi='$ddg', janj='$djn', pr_st_fn='$dpsf', sports='$dsp', ad_fee='$daf',
		cau_fee='$dcau', mag='$dmg', medi='$dmd', elec='$del', kend='$dkn', exam='$dex', diary='$ddi', syl='$dsy',
		k_bharti='$dkbh', lib='$dlb', fes='$dfs', ach_kal='$dakl', belt='$dblt', lab='$dlbb',ak_nid='$dakn',
		ann_fee='$danf', furn='$dfr', sans='$dsan', asge='$das', building='$dbuild', sms='$dsm', famd='$dfa', 
		total='$dtot', total_mon='$dmon', total_ann='$dann', absent=0, updated=1
		where reg_no='$rg'";

	if ($conn->query($sql3) === TRUE) 
	{
		echo "";
	} 
	else 
	{
		echo "Error updating record: " . $conn->error;
	}

	$sql4 = "update stud
		set r_month=0, absent=0, phone='$ph',
		lastamt='$tot', lastrec='$rc', lastmon='$cmnths', lastdue='$dtot', lastdate='$dt', cr_month='$clmn',updated=1, annual='$anfeep', dtotal='$dtotal'
		where reg_no='$rg'";
	 
	if ($conn->query($sql4) === TRUE) 
	{
		echo "";
	}
	else 
	{
		echo "Error updating record: " . $conn->error;
	}
	
if ($ann=='Y')
{
	$sql44 = "update stud 
	set new_add='N'
	where reg_no='$rg'";
	if ($conn->query($sql44) === TRUE) 
	{
		echo "";
	}
	else 
	{
		echo "Error updating record: " . $conn->error;
	}
}
	
if ($bsa>0)
{
	$sql444 = "update stud 
	set bus_date=null
	where reg_no='$rg'";
	if ($conn->query($sql444) === TRUE) 
	{
		echo "";
	}
	else 
	{
		echo "Error updating record: " . $conn->error;
	}
}

		$sql5 = "update stud 
		set r_date=NULL
		where (reg_no='$rg' and $cymon>0)";
	 
	if ($conn->query($sql5) === TRUE) 
	{
		include_once 'aentry.php';
	}
	else 
	{
		echo "Error updating record: " . $conn->error;
	}

}

if ($done==1)
{
?>
<script>
var RC="<?php echo $rc ?>"-1;
document.getElementById("receipt_no1").innerHTML = +RC;
document.getElementById("receipt_no12").innerHTML = +RC;
</script>
<?php	
}

?>	 

</div>

<table width="100%" border="0" style="border-collapse: collapse;font-family: 'Arial Black', Gadget, sans-serif">
<tr>
<td width="100%" colspan="3" style="text-align:right;font-size:20px;">&nbsp</td>
</tr>
<tr>
<td width="40%" style="text-align:right;">
<form method="post" action="fgen.php">
<button style="height:40px; font-size:18pt; width: 200px; font-weight: bold;text-align:center;" onclick="saveDiv('mydiv','Title')"><< Back</button>
</form>
<td width="20%" style="text-align:right;"></td>
</td>
<td width="40%" style="text-align:left;">
<button style="height:40px; font-size:18pt; width: 200px; font-weight: bold;text-align:center;" onclick="printDiv('mydiv','Title')">Print</button>
</td>
</tr>
<tr>
<td width="100%" colspan="3" style="text-align:right;font-size:20px;">&nbsp</td>
</tr>
</table>
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