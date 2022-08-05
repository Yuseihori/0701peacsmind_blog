<?php
require"../functions.php";

// チェックトークンのエラー出たらセッションとポストをプリントして同じあたいが送られてるか確認したほうがいいね
checkToken();

$sql = "insert into news set title=?,details=?,date=?";
$stmt = connect() -> prepare($sql); //prepareでsqlインジェクション大丈夫かを確認してくれる(connectはfunctionで定義)
$stmt -> bindValue(1,$_POST['title'], PDO::PARAM_STR);
$stmt -> bindValue(2,$_POST['details'], PDO::PARAM_STR);
$stmt -> bindValue(3,$_POST['date'], PDO::PARAM_STR);
$stmt -> execute;

header("location:./news_list.php");
exit;