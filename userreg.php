<?php
require_once("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>User Registration</title>
</head>
<body>
<?php
//var_dump($_POST);
  $Femail  = $_POST['email'];
  $Fpass   = $_POST['pass'];
  $Fhandle = $_POST['handle'];

$sql = "INSERT INTO Account"
			."(Email, Pass, Handle)"
			."VALUES ('$Femail', '$Fpass', '$Fhandle')";
	//echo $sql;

	try{
		$stmt = $dbcon->query($sql);
		echo "登録が完了しました。<br/>";

	}catch(PDOException $e){
		echo "そのメールアドレスは登録済みです。<br/>";
		// echo $e->getMessage() ."<br>\n";
	}
	
?>

<a href="index.html">ログイン画面</a>から利用を開始してください。
</body>
</html>

