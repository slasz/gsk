<?php

error_reporting(E_ALL &~E_WARNING &~E_NOTICE);

/*
$host="wh-db51.csloxinfo.com";
$hostname="wh-db51.csloxinfo.com";
*/
$host="127.0.0.1";
$hostname="127.0.0.1";

/*$dbname="gsk_db";
$user="root";
$pass="1234";*/

/*$user="LA01992971";
$pass="jh9xw6K3";
$dbname="LA01992971-62ssib";*/

/*
$user="gskcomsg";
$pass="hgIC#P!gR12i";
$dbname="gskcomsgdb";
*/

$user="root";
$pass="gsk123";
$dbname="gskcomsgdb";


$connection = mysql_pconnect($hostname, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($dbname) or die("Error DB");


mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");


date_default_timezone_set("Asia/Bangkok"); 

$error="error";
$ok="update success";
$dd=date("j/m/Y");

 $keywords="GSK GLOBAL NETWORK";
  $description="GSK GLOBAL NETWORK" ;
   $title="GSK GLOBAL NETWORK"; 




?>