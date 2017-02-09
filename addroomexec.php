<?php
session_start();

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("koptiaradb", $con);
$roomid = $_POST['roomno'];
$roomOwner=$_POST['owner'];
$member=$_POST['membersince'];
$roomType=$_POST['roomType'];
$roomStatus=$_POST['roomstatus'];

mysql_query("INSERT INTO room_owner (roomnumber, ownername , yearsince , datestamp, roomtypeid, status) VALUES ('$roomid','$roomOwner','$member',now(),'$roomType', '$roomStatus')");
header("location: room.php");
mysql_close($con);
?> 