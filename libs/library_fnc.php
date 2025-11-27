<?php
require('config.inc.php');
error_reporting (E_ALL ^ E_NOTICE);
	function select($field,$table,$condition)
	{
	$sql = "select " .$field. " from " . $table. " where " .$condition;
	    //echo $sql;    
    $result = mysql_query($sql) or die ("Query failed :" .mysql_error());
			
	return $result; 		
	}
	
	   function remove($tname , $ay)
	 {
	   $qu3="delete from ".$tname." where ".$ay;

	   mysql_query($qu3);
	 }
	
function insert($tablename,$tablefield,$value)
{
$query="INSERT INTO " .$tablename. "(".$tablefield.") VALUES (" .$value.")";

mysql_query($query);
}

	function update($table,$field,$value,$condition)
	{
		$sql=" update ".$table." set ";
		foreach($field as $k => $v)
		{
			if(count($field)-1==$k)
			{
				$sql=$sql.$field[$k]." = '".$value[$k]."' where ".$condition;
			}
			else
			{
				$sql=$sql.$field[$k]." = '".$value[$k]."', ";
			}
		}
		//echo $sql;
		mysql_query($sql);
		
		
	
	}//update ends
function filterstring($var)
{
$var=strip_tags($var);
$var=htmlentities($var);
$var=stripslashes($var);
return mysql_real_escape_string($var);
}


$s_id=$_SESSION['s_username'];

$user=$_SESSION['username1'];
$user=$_SESSION['username2'];


?>