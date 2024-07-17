<?php
 session_start();
 if(!isset($_SESSION['uid'])){
    header("Location:logout.php");
    exit;
 }
require_once("dbconnect.php");
require_once("dbfunctions.php");
?>
<html><head><title>chat</title></head><body>

<?php
$Fuid = $_SESSION['uid'];

if (isset( $_POST['msg'] )){
    $Fmsg=$_POST['msg'];
    if ($Fmsg!="") {
        StoreMessage($Fuid, $Fmsg);
    }
};

$Rhandle = GetHandlenameByUid($Fuid);

echo<<<EOD
<h1>ようこそ、{$Rhandle}さん</h1>

<form action="chat.php" method="POST">
    <input type="text" name="msg">
    <input type="submit" value="送信">
</form>

EOD;

echo "<hr/>";
ShowMessages();
echo "<hr/>";
?>
</body>
</html>
