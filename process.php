<?php
header('Access-Control-Allow-Origin: *'); 
$token =  $_GET['token'];
if(!$token){
	header('Location: http://softwareshade.com/');
}
echo $_GET['id'];
?>