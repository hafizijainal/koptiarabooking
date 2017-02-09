<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tiara Prima Inland Booking Sytem (KOPTIARA) - Owner Unit Management</title>
<link href="css/ble.css" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./febe/style.css" type="text/css" media="screen" charset="utf-8">
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
  <script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
  <script src="./js/application.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php
if ($_SESSION['SESS_FIRST_NAME']=="admin")
{	
	echo '<ul class="menu">';
  		echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  		echo '<li class="g"><a href="verifyReceiptPayment.php"><img src="images/vPayment.png" alt="view" /></a></li>';
  		echo '<li class="b"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  		echo '<li class="c"><a href="reports.php"><img src="images/report.png" alt="report" /></a></li>';
  		echo '<li class="d"><a href="roominventory.php"><img src="images/inventory.png" alt="inventory" /></a></li>';
  		echo '<li class="e"><a href="room.php"><img src="images/maintenance.png" alt="maintenance" /></a></li>';
		echo '<li class="owner"><a href="ownerunit_mgm.php"><img src="images/owner.png" alt="owner" /></a></li>';
  		echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
 	echo '</ul>';
 }
 ?> 
 <?php
if ($_SESSION['SESS_FIRST_NAME']=="frontdesk")
{
	echo '<ul class="menu">';	
  		echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  		echo '<li class="b"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  		echo '<li class="c"><a href="reports.php"><img src="images/report.png" alt="report" /></a></li>';
  		echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
  		echo '</ul>';
}
?> 
<div style="width:600px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;">
  <h2>Add Room</h2> 
  <form id="form1" name="form1" method="post" action="addroomexec.php">
  <table cellpadding="1" cellspacing="1" id="resultTable">
          
            <tr style="margin-bottom:10px;">
              <th>Room Number</th>
              <td><label>
                <input type="text" name="roomno" id="roomno" />
              </label></td>
            </tr>
            <tr style="margin-bottom:10px;">
              <th>Owner Name</th>
              <td><input type="text" name="owner" id="owner" width="200"/></td>
            </tr>
            <tr style="margin-bottom:10px;">
              <th>Member since</th>
              <td><input type="text" name="membersince" id="membersince" width="200"/></td>
            </tr>
            <tr style="margin-bottom:10px;">
              <th>Room Type</th>
              <td><select name="roomType" id="roomType">
                <?php
            $con = mysql_connect("localhost","root","root");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								
								mysql_select_db("koptiaradb", $con);
           
            $cdquery="SELECT * FROM room";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $roomType=$cdrow["type"];
			$roomId=$cdrow["room_id"];
                echo "<option value=$roomId>$roomType</option>";
            
            } 
            ?>
              </select></td>
            </tr>
            <tr style="margin-bottom:10px;">
              		<th>Status</th>
					<td><select name="roomstatus" id="roomstatus">
					  
					  <option value="Unavailable">Unavailable</option>
                      <option value="Available">Available</option>
                                        </select></td>
            </tr>
            <tr>
            <td>            </td>
            <td>
            <input type="submit" name="Submit" id="Submit" value="Submit"/>&nbsp;            </td>
            </tr>
       </table>  
  </form>
</div>
</body>
</html>
