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
$type = $_GET['room_type'];
?>
 <div style="width:400px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;">
   <h2 align="center">Room Available</h2>
   <table width="50%" height="32" cellpadding="1" cellspacing="1" id="resultTable">
     <thead>
       <tr bgcolor="#33FF00" style="margin-bottom:10px;">
         <th>Room Number</th>
		 <th>Room Type</th>
       </tr>
     </thead>
     <tbody>
       <?php
			  // $con = mysql_connect("localhost","hafizijainal","root12345");
			   $con = mysql_connect("localhost","root","root");
					if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
								
					mysql_select_db("koptiaradb", $con);

					//$result3 = mysql_query("SELECT * FROM room_owner where roomtypeid='".$type."' AND status = 'Available'");			
					$result3 = mysql_query("SELECT ro.roomtypeid, ro.roomnumber, r.type 
											FROM room_owner ro
											inner join room r
											on  ro.roomtypeid = r.room_id
											where ro.roomtypeid='".$type."'
											AND 
											status = 'Available'");
					
					
										
					while($row3 = mysql_fetch_array($result3))
					{
						echo '<tr>';
							echo '<td>'.$row3['roomnumber'].'</td>';
							echo '<td>'.$row3['type'].'</td>';
												
					}			  
			  ?>
     </tbody>
   </table>
</div>
</body>
</html>
