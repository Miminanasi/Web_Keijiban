<?php
//Accountテーブルにアクセスし、uidに対応するハンドル名を取得する。
function GetHandlenameByUid($uid)
{
	global $dbcon;

	$sql = "SELECT Handle FROM Account WHERE UID=$uid";
	try {
		$stmt = $dbcon->query($sql);
		$tmp = $stmt->fetch(PDO::FETCH_ASSOC);
	} catch(PDOException $e){
		echo "GetHandlenameByUid failed:" . $e->getMessage() . "<br>\n";
	}
	return $tmp['Handle'];
}

function ShowMessages()
{
	global $dbcon;
	$sql="SELECT Mdate,Handle,Text FROM Messages "
	. " LEFT OUTER JOIN Account "
	. " ON Messages.UID=Account.UID";
	try {
		$stmt = $dbcon->query($sql);
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ){
			echo $row['Handle'] . ":" . $row['Text'] . "[" . $row['Mdate'] . "]<br/>";
		}
	}catch(PDOException $e){
		die("Message read failed:" . $e->getMessage());
	}
}

function StoreMessage($uid, $text)
{
	global $dbcon;
	date_default_timezone_set("Asia/Tokyo");
	$mdate=date("Y/m/d H:i:s");
	$sql= "INSERT INTO Messages "
	. "(Mdate,UID,Text) "
	. "VALUES ('$mdate', $uid, '$text')";
	try {
		$stmt=$dbcon->query($sql);
	} catch (PDOException $e) {
		die("StoreMessage Failed:" . $e->getMessage() );
	}
}
?>