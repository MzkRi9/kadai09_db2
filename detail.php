<?php
$id = $_GET["id"];
//１．PHP
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM mzkpl_dajets WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Yusei+Magic&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <title>HiHi Jets のラジオだじぇっつ！ - 井上選曲</title>
</head>
<body>
    <header>
        <div id="logo"><img src="./img/radio_logo.jpg" style="height: 70px;"></div>
    </header>

    <main>
        <h3 style="margin: 30px 0;">HiHi Jets のラジオだじぇっつ！ - 井上選曲</h3>
        <h5>記録を変更</h5>
        <form method="POST" action="update.php">    
            <table align="center" class="memo">
                <tr>
                    <td align="right" class="td-left">曲名</td>
                    <td align="left"><input type="text" name="title" class="td-right" value="<?=$v["title"]?>"></td>
                </tr>
                <tr>
                    <td align="right" class="td-left">アーティスト名</td>
                    <td align="left"><input type="text" name="artist" class="td-right" value="<?=$v["artist"]?>"></td>
                </tr>
                <tr>
                    <td align="right" class="td-left">放送回</td>
                    <td align="left"><input type="text" name="backnumber" class="td-right" value="<?=$v["backnumber"]?>"></td>
                </tr>
                <tr>
                    <td align="right" class="td-left">放送日</td>
                    <td align="left"><input type="date" name="onairdate" id="onairDate" class="td-right" style="font-size: 10px;" value="<?=$v["onairdate"]?>"></td>
                </tr>
                <tr>
                    <td align="right" class="td-left" style="vertical-align: top;">埋め込みコード</td>
                    <td align="left"><textarea class="td-right" style="height: 100px; vertical-align: top; font-size: 10px; resize: none;"><?=$v["url"]?></textarea></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?=$v["id"]?>">
            <button type="submit" class="send">変更する</button>
        </form>
    </main>

<footer>
    <a href="select.php" class="list">過去の選曲一覧</a>
</footer>

</body>
</html>