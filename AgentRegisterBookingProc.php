<?php
$c->debug = true;

if(!isset($_POST['submit']))
{
	$errmsg_arr = array();
	$errflag = false;
	//$con = mysql_connect("localhost","root","root");
	$con = mysql_connect("localhost","hafizijainal","root12345");
	
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("koptiaradb", $con);
	
	function createRandomPassword() 
	{
    	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
    	srand((double)microtime()*1000000);

		$i = 0;
		$pass = '' ;
		while ($i <= 7) 
		{
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
    	return $pass;
	}
	
	$confirmation = createRandomPassword();
	$agentname = $_POST['agentname'];
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$roomid = $_POST['rm_id'];
	$nroom = $_POST['nroom'];
	$name = $_POST['name'];
	$last = $_POST['last'];
	$city = $_POST['city'];
	$cnumber = $_POST['cnumber'];
	$payable = $_POST['payable'];//true or false
	//$payable= '100';
	$amountpaid = $_POST['amountpaid'];
	$stat= 'Active';
	
	//echo $confirmation;
		//echo " | ";
	//echo $arival;
		//echo " | ";
	//echo $departure;
		//echo " | ";
	//echo $roomid;
		//echo " | ";
	//echo $nroom;
		//echo " | ";
	//echo $name;
		//echo " | ";
	//echo $last;
		//echo " | ";
	//echo $city;
		//echo " | ";
	//echo $cnumber;
		//echo " | ";
	//echo $amountpaid;
		//echo " | ";
	//echo $stat;
		//echo " ||| ";
	
	$result1 = mysql_query("SELECT * FROM room where room_id='$roomid'");
	while($row = mysql_fetch_array($result1))
	{
		$rate=$row['rate'];
		$type=$row['type'];		
		$rate_publicday=$row['rate_publicday'];
	}
	
	//echo $rate;
	//echo " | ";
	//echo $type;
	//echo " | ";
	//echo $rate_publicday;
	
	$sql="INSERT INTO reservation (arrival, departure, 
	room_id, no_room, firstname, lastname, city, password,
	contact, payable, confirmation, saluran, status, createdDate)
	VALUES ('$arival', '$departure', 
	'$roomid', '$nroom' ,'$name', '$last', '$city', '$confirmation',
	'$cnumber', '$amountpaid', '$confirmation', '$agentname' , 'new', CURDATE())";
	
	if (!mysql_query($sql,$con))
	{
		die('Error: ' . mysql_error());
	}
	else
	{
		mysql_query("INSERT INTO roominventory (arrival, departure, 
		qty_reserve, room_id, confirmation, status) 
		VALUES ('$arival','$departure',
		'$nroom','$roomid','$confirmation','$stat')");
		
		////Added by Syima///
		$datearrival = str_replace('/', '-', $_POST['start']);
		$startDate =  date("Y-m-d",strtotime($datearrival));
		$datedep = str_replace('/', '-', $_POST['end']);
		$endDate = date("Y-m-d",strtotime($datedep));
		
		while ($startDate < $endDate) 
		{
			mysql_query("INSERT INTO date_reservation (startdate, enddate, 
			room_id, qty_room) 
			VALUES ('$startDate', DATE_ADD(str_to_date('$startDate','%Y-%m-%d'), INTERVAL 1 DAY),
			'$roomid','$nroom')");

			$startDate = date("Y-m-d",strtotime($startDate . "+1 days"));
		}
	}
}
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
	
	var atpos=f.indexOf("@");
	var dotpos=f.lastIndexOf(".");

	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
	{
		alert("Not a valid e-mail address");
		return false;
	}

	if( codetype != code ) 
	{
	alert("Invalid Code Pls. try again........ thank you");
  	return false;
	}


	if ((a=="Lastname" || a=="") || (c=="City" || c=="")  || (x=="Contact Number" || x=="") || (y=="Firstname" || y==""))
	{
		alert("all field are required!");
		return false;
	}
}
</script>

<!--sa input that accept number only-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
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
	top: 327px;
	margin-left:3px;
}
.style1 {
	font-size: 14px;
	font-weight: bold;
}
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
<h2>Webmaster Contact </h2>
<p>
  <ul>
      <li>webmaster[at]koptiara[dot]com</li>
 </ul>
    </p>
</p>
</div>

<div id="services">
<!-- iframe src="https://www.facebook.com/plugins/like.php?href=tameraplazainn.x10.mx"
        scrolling="no" frameborder="0"
        style="border:none; width:180px; height:250px">
		</iframe -->
</div>

</div><br /><br /><br />
<div id="featured">
  <br />
	<table>
		<tr>
			<td>Successfully register your customer 1 room booking unit. </td>
			<td><a href="AgentRegisterBooking.php"> Back to Register room</a></td>
		</tr>
	</table>
</div>
<div class="clear"> </div>

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
