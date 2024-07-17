<?php
require_once("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Database Initialize</title>
</head>

<body>
このスクリプトでは、データベースの初期化を行います。</br>
<?php
echo "UserAccountテーブルの作成<br>";
$sql = "CREATE TABLE IF NOT EXISTS Account ("
		."UID int UNSIGNED AUTO_INCREMENT,"
		."Email varchar(100) NOT NULL UNIQUE,"
		."Pass varchar(100),"
		."Handle varchar(20),"
		."PRIMARY KEY(UID))";
//echo "[".$sql."]";
try{
	$stmt = $dbcon->query($sql);
}catch(PDOException $e){
	die("Create Account failed:" . $e->getMessage() );
}


$sql = "CREATE TABLE IF NOT EXISTS Messages ("
		."MID int UNSIGNED AUTO_INCREMENT, "
		."Mdate datetime NOT NULL, "
		."UID int NOT NULL, "
		."Text varchar(1000), "
		."PRIMARY KEY(MID)) ";
//echo "[".$sql."]";
try{
	$stmt = $dbcon->query($sql);
}catch(PDOException $e){
	die("Create Account failed:" . $e->getMessage() );
}




echo "完了しました。";
$dbcon=null;
?>

</body>
</html>

