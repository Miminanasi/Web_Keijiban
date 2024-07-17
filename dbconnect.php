<?php
$dbhost="localhost";
$dbname="s4";
$dbuser="s4user";
$dbpass="6Pikteam";

try {
	$dbcon=new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch(PDOException $e){
	die("Database connection failed:" . $e->getMessage() ); 
}
?>
