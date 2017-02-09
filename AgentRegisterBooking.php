<?php
//$con = mysql_connect("localhost","root","root");
//$con = mysql_connect("localhost","hafizijainal","root12345");
$c->debug = true;
//if (!$con)
  //{
  //die('Could not connect: ' . mysql_error());
  //}

//mysql_select_db("argie_tamera", $con);
//mysql_select_db("koptiaradb", $con);
//mysql_select_db("shima", $con);


	//$datearrival = str_replace('/', '-', $_POST['start']);
	//$arival =  date("Y-m-d",strtotime($datearrival));
	
	//$datedep = str_replace('/', '-', $_POST['end']);
	//$departure = date("Y-m-d",strtotime($datedep));
	//$arival =  $_POST['start'];
	//$departure = $_POST['end'];
	//$adults = $_POST['adult'];
	//$child = $_POST['child'];	
	//$no_rooms = $_POST['no_rooms'];
	//$roomid = $_POST['roomid'];
	//$roomid2 = $_POST['roomid2'];
	//$roomid3 = $_POST['roomid3'];
	//$roomid3 = $_POST['pick'];
	//$roomid9 = $_POST['roomid9'];
	//$test9 = $_POST['pick'];
	//$roomid3a = $_POST['roomid3a'];
	//$roomid1 = $_POST['roomid'];
	//$results = $_POST['result'];
	
	//check room quantity
	//$query2 = mysql_query("SELECT * FROM room where room_id='$roomid2'");
	//$query2 = mysql_query("SELECT * FROM room where room_id='$roomid' and room_id='$roomid2'");
	//$query2 = mysql_query("SELECT * FROM room where room_id='$roomid3'");
	//while($row2 = mysql_fetch_array($query2))
	//{
		//$a=$row2['room_id'];
		//$b=$row2['type'];
		//$c=$row2['rate_publicday'];
		
		//$query3 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where arrival >= '$arival' and departure <= '$departure' and room_id='$roomid2'");
		//$query3 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where arrival <= '$arival' and departure >= '$departure' and room_id='$roomid'");
		
		//////Edited by Syima/////
		//$query3 = mysql_query("select max(sum) as qty_reserve from(
//select startdate,enddate,sum(qty_room) as sum from date_reservation where
//(str_to_date(startdate, '%Y-%m-%d') > DATE_FORMAT(str_to_date('$arival','%d/%m/%Y'),'%Y-%m-%d') 
//and str_to_date(startdate, '%Y-%m-%d') < DATE_FORMAT(str_to_date('$departure','%d/%m/%Y'),'%Y-%m-%d'))  
//or (str_to_date(enddate, '%Y-%m-%d') > DATE_FORMAT(str_to_date('$arival','%d/%m/%Y'),'%Y-%m-%d') 
//and str_to_date(enddate, '%Y-%m-%d') < DATE_FORMAT(str_to_date('$departure','%d/%m/%Y'),'%Y-%m-%d')) 
//or ((DATE_FORMAT(str_to_date('$arival','%d/%m/%Y'),'%Y-%m-%d') between str_to_date(startdate, '%Y-%m-%d') and str_to_date(enddate, '%Y-%m-%d')) 
//and (DATE_FORMAT(str_to_date('$departure','%d/%m/%Y'),'%Y-%m-%d') between str_to_date(startdate, '%Y-%m-%d') and str_to_date(enddate, '%Y-%m-%d')))
//and room_id = '$roomid3' group by startdate) roomrsvp");
 		

		//while($row3 = mysql_fetch_array($query3))
  		//{
  			//$qty_reserve=$row3['qty_reserve'];
  		//}
		//$angavil = $row2['qty'] - $inogbuwin;
		//echo $qty_reserve;
		//$qty_room = $row2['qty'] - $qty_reserve;
		//$qty_room_baru = $qty_room - $no_rooms;
		//$qty_room1 = $qty_room  
		//quantity bilik (x) = 3 
		//not available (y) = 2
		//nak booking (z) = 1
		//qty_bilik_baru =  3 - 2 - 1
		//               = 0 
		
		//if($qty_room < $no_rooms)
		//{
			//header("Location: index.php");
			//die("aaaaaa");
		//}
		
		//if ($qty_room_baru >= 0)
		//{
			//header("Location: index.php");
			//die();
		//}
		//if ($qty_room_baru < 0)
		//{
			//header("Location: selectRoomFailed.php");
			//die();
		//}
	//}

	//$result = mysql_query("SELECT * FROM room WHERE room_id='$roomid'");
	//$result = mysql_query("SELECT * FROM room WHERE room_id='$roomid2'");
	//$result = mysql_query("SELECT * FROM room WHERE room_id='$roomid3'");
	//while($row1 = mysql_fetch_array($result))
  	//{
  		//$roomtype=$row1['type'];
  	//}
	
	//$result = mysql_query("SELECT * FROM room WHERE room_id='$roomid'");
	//$result = mysql_query("SELECT * FROM room WHERE room_id='$roomid2'");
	//$result = mysql_query("SELECT * FROM room WHERE room_id='$roomid3'");
	//while($row1 = mysql_fetch_array($result))
  	//{
  		//$roomtype2=$row1['type'];
  	//}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tiara Prima Inland Booking Sytem (KOPTIARA)</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<!--sa poip up-->
 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
  <script type="text/javascript" src="js/datepicker.js"></script>
  <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<!--sa error trapping-->

<script type="text/javascript">
function validateForm()
{
var y=document.forms["personal"]["name"].value;
var a=document.forms["personal"]["last"].value;
var c=document.forms["personal"]["city"].value;
var x=document.forms["personal"]["cnumber"].value;
var code=document.forms["personal"]["codetype"].value;
var codetype=document.forms["personal"]["codetypecopy"].value;

if( codetype != code ) {
alert("Invalid Code Pls. try again........ thank you");
  return false;
}

if ((a=="Lastname" || a=="") || (c=="City" || c=="") || (x=="Contact Number" || x=="") || (y=="Firstname" || y==""))
  {
  alert("all field are required!");
  return false;
  }
}
</script>
<script type="text/javascript">
function validateForm1()
{

}
</script>

<!--sa input that accept number only-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
    //called when key is pressed in textbox
	$("#cnumber").keypress(function (a)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( a.which!=8 && a.which!=0 && (a.which<48 || a.which>57))
	  {
		//display error message
		$("#errmsg1").html("Number Only").show().fadeOut("slow"); 
	    return false;
      }	
	});

  });
  </script>
</script>
 <script type="text/javascript">

   //Created / Generates the captcha function    
    function DrawCaptcha()
    {
        var a = Math.ceil(Math.random() * 10)+ '';
        var b = Math.ceil(Math.random() * 10)+ '';       
        var c = Math.ceil(Math.random() * 10)+ '';  
        var d = Math.ceil(Math.random() * 10)+ '';  
        var e = Math.ceil(Math.random() * 10)+ '';  
        var f = Math.ceil(Math.random() * 10)+ '';  
        var g = Math.ceil(Math.random() * 10)+ '';  
        var code = a + b +  c +  d +  e +  f +  g;
        document.getElementById("txtCaptcha").value = code
    }
	
    </script>
 <style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:249px;
	height:27px;
	z-index:1;
	top: 446px;
	margin-left:3px;
	left: 141px;
}
.style1 {
	font-size: 12px;
	font-weight: bold;
}
.style3 {font-size: 12px; font-weight: bold; color: #FF6600; }
.style4 {color: #FFFF00}
-->
 </style>
</head>

<body onload="DrawCaptcha();">

<!-- TOP -->
<div id="top1">
<!-- a href="index.php"><img src="images/logo.jpg" border="0" style="margin-top:27px; margin-left:20px;" /></a -->
</div>
<div id="top">

<ul class="menu">
<li class="home"><a href="index.php">Home</a></li>
<li class="about"><a href="about.php">About</a></li>
<li class="contacts"><a href="contact.php">Contacts</a></li>
<li class="renting"><a href="gallery.php">GALLERY</a></li>
<li class="selling"><a href="rates.php">RATES</a></li>
</ul>
</div>
<!-- HEADER -->
<!-- CONTENT -->
<div id="content">
	<div id="leftPan">
		<div id="services">

		</div>
	</div>
	<br />
	<br />
	<br />
	<div id="featured">
		<br /> 
		<br />
		<h1>Agent Registration - Manual Booking</h1>
		<form action="AgentRegisterBookingProc.php" method="post" style="margin-top: -31px;" onsubmit="return validateForm()" name="personal">
			<br />
			<br />
			<br />
			<div align="center"><span class="style1"> All field mark with this symbol (<span class="style3">*</span>) are required to be fill up</span></div>
		 
			   <table width="502" border="0">
			   
			   	<tr>
					<td><div align="right" class="style1">Agent Name :</div></td>
					<td>
					<select name="agentname" id="agentname">
						<option value="Admin" selected>Admin</option>
						<option value="Marlina">Marlina</option>
						<option value="Rohaida">Rohaida</option>
						<option value="Jainal">Jainal</option>
						<option value="Kamariah">Kamariah</option>
					</select></td>
				</tr>
			   
				<tr>
					<td width="69"><div align="right" class="style1">Start Date : </div></td>
					<td width="101"><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start" id="sd" value="" maxlength="10" readonly="readonly" /></td>
				</tr>
				<tr>
					<td><div align="right" class="style1">End Date :</div></td>
					<td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end" id="ed" value="" maxlength="10" readonly="readonly" /></td>
				</tr>
				<tr>
					<td><div align="right" class="style1">Room Type :</div></td>
					<td>
					<select name="rm_id" id="rm_id">
						<option value="11">Suite Family</option>
						<option value="10">Family Jr Deluxe</option>
						<option value="9">Family Jr Standard</option>
						<option value="8" selected>Studio Standard</option>
					</select></td>
				</tr>
				
				<tr>
					<td><div align="right" class="style1">Number of Room :</div></td>
					<td>
					<select name="nroom" id="nroom">
						<option value="1" selected>1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select></td>
				</tr>
				
				
				
				<tr>
					<td width="133"><div align="right" class="style1">First Name:</div></td>
					<td width="262"><input name="name" type="text" class="ed" id="name" size="35" />
					<span class="style3">*</span></td>
					<td width="93">&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right" class="style1">Last Name:</div></td>
					<td><input name="last" type="text" class="ed" id="last" size="35" />
					<span class="style3">*</span></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right" class="style1">State:</div></td>
					<td><input name="city" type="text" class="ed" id="city" size="35" />
					<span class="style3">*</span></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right" class="style1">Customer Contact Number:</div></td>
					<td><input name="cnumber" type="text" class="ed" id="cnumber" size="25" />
					<span id="errmsg1"></span><span class="style3">*</span></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right" class="style1">Payment Status:</div></td>
					<td colspan="2"><label>
					<input type="checkbox" name="payable" value="checkbox" />
					<span class="style1">Paid</span></label></td>
				</tr>
				<tr>
					<td><div align="right" class="style1">Amount Pay: (Without RM)</div></td>
					<td><div align="right">&nbsp;</div><input name="amountpaid" type="text" class="ed" id="amountpaid" size="25" /></td>
				</tr>
				<tr>
					<td><div align="right">&nbsp;</div></td>
					<td><div align="right">&nbsp;</div></td>
				</tr>
				<tr>
					<td><div align="right"></div></td>
					<td><div id="Layer2">
					<input type="text" name="codetypecopy" id="txtCaptcha" style="text-align:center; border:none; font-weight:bold; font-family:Modern; font-size:20px; font-size: 20px; width: 230px;" />
					<img src="captcha.png" width="230" height="30" style="margin-top:-30px;" />
					</div></td>
					<td><a href="#" onclick="DrawCaptcha();"><img src="images/refresh.png" alt="refresh" border="0" style="margin-top:5px; margin-left:5px;" /></a>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><span class="style4">***If you dont see generated code here please use Internet Explorer/Mozila Firefox to make a booking</span></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right" class="style1">Enter the Code here: </div></td>
					<td><input name="codetype" type="text" class="ed" id="code" size="35" /><span class="style3">*</span></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right"></div></td>
					<td><input name="but" type="submit" value="Submit to system" />&nbsp;<span class="style4">Customer information</span></td>
					<td>&nbsp;</td>
				</tr>
			  </table>
		</form>
	</div>
	<div class="clear"></div>
</div>

<!-- FOOTER -->
<div id="footer">
	<img src="images/call.jpg" alt="" width="156" height="37" />
	<p><a href="index.php">HOME</a> |<a href="about.php"> ABOUT US </a>|<a href="contact.php"> CONTACTS </a>|<a href="gallery.php"> GALLERY </a>|<a href="rates.php"> ROOM RATES </a></p>
</div>

<!-- BOTTOM -->
<div id="bottom">
	<p>Copyright &copy; Prima Inland Sea Resort Port Dickson (KOPTIARA). Designed by <a href="http://www.fixiesite.com" target="_blank">Fixiesite IT Solution</a></p>
</div>
</body>
</html>
