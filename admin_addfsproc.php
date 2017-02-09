<?php
//**************************************
//Project : e-Fasilitiv2.0
//Location : Politeknik Seberang Perai
//Design By : Rosnah
//Date : Oct 2009
//**************************************

include 'session_class.php';
include 'validate_class.php';
$c->debug = false;

$user_id = $_SESSION['user_id'];
$valid = true;
$msg = array();
$str = '';

if(isset($_POST['desc']))
{
	//Validate empty entry...
	if($v->empty_char($_POST['desc']) == true)
	{
		$str = 'Sila berikan nama fasiliti ini.';
		array_push($msg, $str);
		$valid = false;
	}
	
	//Upload file...	
	if(!is_uploaded_file($_FILES['userfile']['tmp_name']))
	{ 
		$str = 'Sila pilih fail gambar untuk upload.'; 
		array_push($msg, $str);
		$valid = false;
	}	
	else
	{	
		//Cek kalo folder xde lg create dulu...
		if(!is_dir('facility'))
		{ mkdir('facility'); }
		
		$upload_name = addslashes($_FILES['userfile']['name']);
		$upload_size = $_FILES['userfile']['size'];
		$upload_tmpfile = $_FILES['userfile']['tmp_name'];
		
		$path = 'facility/';
		$fullpath = $path.$upload_name;
		
		//Allowed extensions of the files uploaded
		//Approx. 25Kb
		//Jgn bg upoad gamba besar2 sgt...
		$max_size = 51200; 										    
		$allowedExtensions = array("jpeg","jpg","jpeg","gif","png");
		
		//Check Entension
		$extension = pathinfo($upload_name);
		$extension = $extension['extension'];
		
		if(!in_array($extension, $allowedExtensions, true))
		{
			$str = 'Hanya fail imej sahaja yang dibenarkan upload.';
			array_push($msg, $str);
			$valid = false;
		}		

		//Check File Size
		if($upload_size > $max_size)
		{
			$str = 'Fail terlalu besar untuk upload. Fail anda : '.$upload_size;
			array_push($msg, $str);
			$valid = false;
		}
		
		if(file_exists($fullpath))
		{
			$str = 'Fail telah wujud. Sila upload fail yang lain atau berikan nama lain sebelum upload.';
			array_push($msg, $str);
			$valid = false;
		}
	}	
	
	$desc = $_POST['desc'];
	
	if($valid == true)
	{
		move_uploaded_file($upload_tmpfile, $fullpath);
		$q = "insert into item values (null, '$desc', '$fullpath', 1)";
		$r = $c->Execute($q);				
		$str = 'Fasiliti baru anda telah ditambah.';
		array_push($msg, $str);
	}	
	
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
	background:url('icons/info.png') 0 50% no-repeat;
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
 
 
<script language="javascript" type="text/javascript">
$(document).ready(function(){	
	$("#bodyPannel").css("float", "none");
	$("#bodyPannel").css("padding", "0 128px");
	$("#bodyPannel").show();
	$("#msg").show();	
	
	$("#msg").overlay({
		top: 150,
		left: 200,
		expose: {
		color: '#333',
		loadSpeed: 200,
		opacity: 0.9
		},	
	closeOnClick: true,
	api: true,	
	
	onClose: function(event) { 
		<?php 
		//kalo add ok...
		//close window n refresh senarai... err.. panggil fasiliti()...
		if($valid == true){		
		?>
		window.opener.fasiliti();
		window.close();		
		<?php 
		}else{ 
		//Kalo add ade problem...
		//back balik...
		?>
		history.go(-1);
		<?php } ?>
	}	
		
	}).load();
	
});
</script>

    
<body>

<div id="body"> 
<div id="topShadow"></div>
<div id="bodyPannel" align="center">
    
<div id="msg" align="center">    
    <div>
	<h2>&nbsp;Message</h2>
    <p>&nbsp;</p>
    <?php
	
	if($valid)
	{ ?><p><img src="icons/s_okay.png" width="12" height="12" />&nbsp;<?php echo $msg[0]; ?></p><?php }
	else
	{
		for($i=0; $i<count($msg); $i++)
		{ ?><p><img src="icons/s_error.png" width="12" height="12" />&nbsp;<?php echo $msg[$i]; ?></p><?php } 
	}
	
	?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </div>
</div>
    <?php
	
}
?>

</div>

<div id="bottomShadow"></div><br class="spacer" />

</div>

</body>
</html>