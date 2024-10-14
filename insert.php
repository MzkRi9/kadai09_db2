<?php
//1. POSTデータ取得
$title      = $_POST["title"];
$artist     = $_POST["artist"];
$backnumber = $_POST["backnumber"];
$onairdate  = $_POST["onairdate"];
$url        = $_POST["url"];

//2. DB接続します
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO mzkpl_dajets(title,artist,backnumber,onairdate,url) VALUES(:title,:artist,:backnumber,:onairdate,:url)");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':artist', $artist, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':backnumber', $backnumber, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':onairdate', $onairdate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or false

//４．データ登録処理後
if($status==false){
	sql_error($stmt);
}else{
	redirect("index.php");
}
?>
