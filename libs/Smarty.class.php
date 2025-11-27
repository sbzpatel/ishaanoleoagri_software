<?php
date_default_timezone_set("Asia/Calcutta");
$servername='localhost';     // Your MySql Server Name or IP address here
$dbusername='root';                // katalyst_dhwanih
$dbpassword='';                // eb*l4JIksKXv
$dbname='kdcc';     // katalyst_dhwanihs

connecttodb1($servername,$dbname,$dbusername,$dbpassword);
function connecttodb1($servername,$dbname,$dbuser,$dbpassword)
{
global $link;
$link=mysql_connect ("$servername","$dbuser","$dbpassword");
if(!$link){die("Could not connect to MySQL");}

mysql_select_db("$dbname",$link) or die ("could not open db".mysql_error());
}
mysql_query("SET SESSION time_zone = 'Asia/Calcutta'");
function setcookies_for_php($name,$value)
{
	
	
	setcookie($name, $value, time()+60*60*24*100);
	setcookie($name, $value, time()+60*60*24*100);
}
?>