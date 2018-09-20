<?
error_reporting(0);

$mysql_Conn = mysql_connect('localhost','root','');
if(!$mysql_Conn) echo 'mysql failed';
$db_Conn = mysql_select_db('dashboard');
// if($db_Conn) echo 'Success';
if(!$db_Conn) echo 'db failed';
?>
