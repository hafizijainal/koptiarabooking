<?php
//**************************************
//Project : 2.0
//Location : 
//Design By : 
//Date : 
//**************************************

include 'session_class.php';
include 'validate_class.php';
$c->debug = false;

//$user_id = $_SESSION['user_id'];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Fasilitiv2.0 - Politeknik Seberang Perai</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/jquery.tools.min.js"></script>
<style>
#msg h2 {
	background:url(<?php echo $icon_h2; ?>) 0 50% no-repeat;
	margin:0px;
	padding:10px 0 10px 35px;
	border-bottom:1px solid #333;
	font-size:20px;
}
</style>

<!--[if IE]>
   <style type="text/css">
   .msg {
       background:transparent;
       filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#333333,endColorstr=#333333);
       zoom: 1;
    }
    </style>
<![endif]-->
</head>

<body>

<div id="body">

<div id="topShadow"></div>		

<!-- body pannel start -->
<div id="bodyPannel">
      
<div id="login">
<h2>Tambah <span>Fasiliti Baru</span></h2>
<br class="spacer" />
<form action="admin_addfsproc.php" method="post" name="addfs" class="search" id="addfs" enctype="multipart/form-data">
<table align="left" cellpadding="0" cellspacing="0" width="70%">
<tr>
    <td colspan="2">
	<label>Arahan : Sila pilih fail imej untuk upload dan borang akan dihantar. *(Required)</label>
    </td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td><label>*Nama Fasiliti : </label></td>
    <td><input name="desc" type="text" id="desc" /></td>
</tr>
<tr>
	<td><label>*Imej : </label></td>
    <td><input name="userfile" type="file" size="30" /></td>
</tr>
<tr>
	<td><label>Fail yang dibenarkan : </label></td>
    <td><label>.jpeg, .jpg, .jpeg, .gif, .png</label></td>
</tr>
<tr>
	<td><label>Saiz maksimum : </label></td>
    <td><label>50Kb</label></td>
</tr>
<tr>
    <td colspan="2">&nbsp;<input name="send" type="submit" id="send" value=" Send " title="Send" class="submit" /></td>
</tr>
<tr>
  	<td colspan="2"><label><a href="javascript:window.close();" style="text-decoration:none">Batal tambah fasiliti</a></label></td>
</tr>
</table>
<br />
</form>
</div>

<br class="spacer" />
</div>
	
<div id="bottomShadow"></div><br class="spacer" />
</div>
<!-- body end -->

<div id="msg"></div>

</body>
</html>