<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tiara Prima Inland Booking Sytem (KOPTIARA)</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />


<!--sa nivo slider-->
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	
<!--sa calendar-->	
	<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
//<![CDATA[

/*
        A "Reservation Date" example using two datePickers
        --------------------------------------------------

        * Functionality

        1. When the page loads:
                - We clear the value of the two inputs (to clear any values cached by the browser)
                - We set an "onchange" event handler on the startDate input to call the setReservationDates function
        2. When a start date is selected
                - We set the low range of the endDate datePicker to be the start date the user has just selected
                - If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

        * Caveats (aren't there always)

        - This demo has been written for dates that have NOT been split across three inputs

*/

function makeTwoChars(inp) {
        return String(inp).length < 2 ? "0" + inp : inp;
}

function initialiseInputs() {
        // Clear any old values from the inputs (that might be cached by the browser after a page reload)
        document.getElementById("sd").value = "";
        document.getElementById("ed").value = "";

        // Add the onchange event handler to the start date input
        datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
}

var initAttempts = 0;

function setReservationDates(e) {
        // Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
        // until they become available (a maximum of ten times in case something has gone horribly wrong)

        try {
                var sd = datePickerController.getDatePicker("sd");
                var ed = datePickerController.getDatePicker("ed");
        } catch (err) {
                if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
                return;
        }

        // Check the value of the input is a date of the correct format
        var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

        // If the input's value cannot be parsed as a valid date then return
        if(dt == 0) return;

        // At this stage we have a valid YYYYMMDD date

        // Grab the value set within the endDate input and parse it using the dateFormat method
        // N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
        var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

        // Set the low range of the second datePicker to be the date parsed from the first
        ed.setRangeLow( dt );
        
        // If theres a value already present within the end date input and it's smaller than the start date
        // then clear the end date value
        if(edv < dt) {
                document.getElementById("ed").value = "";
        }
}

function removeInputEvents() {
        // Remove the onchange event handler set within the function initialiseInputs
        datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
}

datePickerController.addEvent(window, 'load', initialiseInputs);
datePickerController.addEvent(window, 'unload', removeInputEvents);

//]]>
</script>

<!--sa error trapping-->
<script type="text/javascript">
function validateForm()
{
var x=document.forms["index"]["start"].value;
if (x==null || x=="")
  {
  alert("you must enter your check in Date(click the calendar icon)");
  return false;
  }
var y=document.forms["index"]["end"].value;
if (y==null || y=="")
  {
  alert("you must enter your check out Date(click the calendar icon)");
  return false;
  }
}
</script>
<!--end sa nivo slider-->
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {
	font-size: 1.4em;
	font-weight: bold;
	color: #FFFFFF;
}
-->
</style>
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
</head>

<body>

<!-- TOP -->
<div id="top1">
<!-- a href="index.php"><img src="images/logo.jpg" border="0" style="margin-top:27px; margin-left:20px;" /></a -->
</div>
<div id="top">

<ul class="menu">
<li class="home"><a href="index.php">Home</a></li>
<li class="about1"><a href="about.php">About</a></li>
<li class="contacts"><a href="contact.php">Contacts</a></li>
<li class="renting"><a href="gallery.php">GALLERY</a></li>
<li class="selling"><a href="rates.php">RATES</a></li>


</ul>


</div>




<!-- HEADER -->

<div id="header">

<div id="formPan">
<h2 class="style2">RESERVATION FORM </h2>

<form method="post" action="testing.php" name="index" onsubmit="return validateForm()">
<div style="margin-top:20px; margin-left:10px;">
 <table width="186" border="0">
  <tr>
    <td width="69"><div align="right">
      <label>Start Date : </label>
    </div></td>
    <td width="101"><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start" id="sd" value="" maxlength="10" readonly="readonly" /></td>
  </tr>
  <tr>
    <td><div align="right">
      <label>End Date : </label>
    </div></td>
    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end" id="ed" value="" maxlength="10" readonly="readonly" /></td>
  </tr>
  <tr>
    <td><div align="right">
      <label>Adult : </label>
    </div></td>
    <td><select name="adult" class="ed" >
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select></td>
  </tr>
  <tr>
    <td><div align="right">
      <div align="right">
        <label>Child : </label>
      </div>
    </div></td>
    <td><select name="child" class="ed">
      <option>0</option>
      <option>1</option>
      <option>2</option>
    </select></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="Input" type="submit" value="Check Availability" id="button" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right"><!-- a rel="facebox" href="modifyindex.php">Modify</a --> <a rel="facebox" href="UploadResitIndex.php">Upload Resit</a> / <a href="cancelindex.php">Cancel Reservation</a> </div></td>
    </tr>
</table> 
 </div>    
</form>
 
</div>

<div id="mainimgPan">
  <div id="mainimg">
<div id="slider" class="nivoSlider" style="float:right;">
                <img src="images/toystory.jpg" alt="" />
                <img src="images/up.jpg" alt="" />
                <img src="images/walle.jpg" alt="" />
                <img src="images/nemo.jpg" alt=""/>
      </div>
</div>


</div>
</div>

<!-- CONTENT -->

<div id="content">

<div id="leftPan">

<div id="services">
<h2><strong>OUR HOTEL AMeNITiES</strong></h2>
<p>
  <ul>
      <li>AIR CONDITIONING IN EVERY ROOM</li><br />
	  <li>HOT AND COLD SHOWERS  </li><br />
	  <li>TELEPHONE AND CABLE TV </li><br />
	  <li>OUTDOOR POOL </li><br />
	  <li>LAGOON SHAPE WATERPARK POOL </li><br />
	  <li>STATIONARY BIKE </li><br />
	  <li>BASKETBALL </li><br />
	  <li>VOLLEYBALL, BEACH AND WATER VOLLEYBALL </li>
 </ul>
    </p>
</p>
<h2><strong>HOW TO BOOK ROOM UNIT</strong></h2>
 <ul>
      <li>1 - Check room availability</li><br />
	  <li>2 - Make a booking</li><br />
	  <li>3 - Do a deposit transfer payment </li><br />
	  <li>4 - Upload Receipt</li><br />
	  <li>5 - Take a room key and pay balance</li><br />
	  <li><a href="howToDoDepositPayment.php">details...</a></li>
 </ul>
</div>


<div id="services">
<!-- iframe src="https://www.facebook.com/plugins/like.php?href=tameraplazainn.x10.mx"
        scrolling="no" frameborder="0"
        style="border:none; width:180px; height:250px">
</iframe -->
</div>

</div>
<div id="rightPan">

<div id="welcome">
<div><img src="images/HISTORY.jpg" /></div>
<br />
<div align="justify"><img src="photos/About02.jpg" width="306" height="192" style="float:right; padding-left: 5px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prima Inland Sea Resort (Formelly known as Tiara Beach Resort) an `inland sea resort' spread over 23 acres is the biggest man-made beach in Malaysia. It is an ideal place for the whole family to have an enjoyable clean, safe and fun seaside vacation with top class facilities for corporate and private functions.<br /><br />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The first fully integrated resort in Port Dickson with 980 studio suites (1264 rooms) is just 90 minutes drive from Kuala Lumpur city. <br /> <br /> 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photos/About01.jpg" width="212" height="166" style="float:left; padding-right: 5px;" />There are 4 F&B outlets; Canopy Beachfront Café, Terrace Café, Fun Pub and Chinese Restaurant. The Terrace Café – an outdoor all day dining restaurant acclaimed local and international dishes and Canopy Café overlooking the beachfront provides a small selection of local snacks and hawker favorites and refreshing beverages. The Canopy Café is an ideal rendezvous place to relax with live sports events, pool tables, darts and many exciting games. <BR /><BR />
                  
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other facilities include the mini theatre, giant inflatable, gymnasium, sauna rooms and karaoke theaters.<br />
                  
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Therefore, to our guests, enjoy your stay, and if you need something that we missed, please let us know, and we will do our best to provide it to you.<br><br><center>Welcome! Enjoy not only our quality service but also enjoy our Outdoor theme park.</center><br></div>










</div>
<div id="fcontainer"></div>
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
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</body>
</html>
