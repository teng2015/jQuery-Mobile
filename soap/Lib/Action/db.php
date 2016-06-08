<?php

$mysql_server_name='123.59.51.174';
$mysql_username='root';
$mysql_password='jjwl@0825';
$mysql_database='jiajin';

$con = mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($mysql_database, $con);
$result = mysql_query($sql,$con);
?>
