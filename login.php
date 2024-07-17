<?php
require_once("dbconnect.php");

$Femail=$_POST['email'];
$Fpass=$_POST['pass'];
$sql="SELECT UID,Handle FROM Account "
. " WHERE Email='$Femail' AND Pass='$Fpass' ";
try {
    $stmt = $dbcon->query($sql);
    if ($stmt->rowCount() == 0){
        echo<<<EOD
        <html>
        <head><title>エラー</title></head>
        <body>
        メールアドレスまたはパスワードが違います。
        </body>
        </html>
        EOD;
    } else {
        $tmp=$stmt->fetch(PDO::FETCH_ASSOC);
        $Ruid=$tmp['UID'];
        $Rhandle=$tmp['Handle'];
        echo<<<EOD
        ようこそ${Rhandle}さん。<br/>
        <a href="chat.php?uid=${Ruid}">次へ</a>
        EOD;

        session_start();
        $_SESSION['uid']=$Ruid;
        header("Location:chat.php");
        exit();
    }
}catch (PDOException $e) { echo $e->getMessage(); }
$dbcon=null;
?>
</body>
</html>
