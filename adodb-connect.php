<?php
//**************************************
//Project : 
//Location : 
//Design By : 
//Date : 
//**************************************

//Note: Please set to 0 for deployment to live
//For debugging set 1...  
ini_set("display_errors", "1"); 


//ADODB Library
include 'adodb/adodb.inc.php';


//Connection Parameters
// localhost only...
$server = 'localhost';
$user = 'root';
$password = '';
//$db = 'argie_tamera';	
$db = 'koptiara';	


//Connection
//MySQL 			-> 	mysql
//MS SQL Server 	-> 	mssql
//Oracle 7 below	-> 	oracle
//Oracle 8 above	->	oci8
$c = NewADOConnection('mysqli');
$c->PConnect($server, $user, $password, $db);
ob_start();

//Debug options 'true' or 'false'
$c->debug = false;
?>