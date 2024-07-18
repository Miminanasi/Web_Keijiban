<?php
$dbhost="localhost";
$dbname="name";
$dbuser="ユーザー名";
$dbpass="パスワード";

try {
	$dbcon=new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch(PDOException $e){
	die("Database connection failed:" . $e->getMessage() ); 
}
?>
