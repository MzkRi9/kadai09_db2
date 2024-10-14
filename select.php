<?php
//1.  DB接続します
include("funcs.php"); //外部のファイルを読み込む
$pdo = db_conn(); //読み込んだファイルの中のdb_connを実行する

//２．データ登録SQL作成
$sql = "SELECT * FROM mzkpl_dajets";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or false

//３．データ表示
$values = ""; 
if($status==false) {
    sql_error($stmt);
}

//全データ取得
$values = $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONに値を渡す場合に使う
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
    <title>井上がHiHi Jets のラジオだじぇっつ！で流した曲</title>
</head>
<body>
    <header>
        <div id="logo"><img src="./img/radio_logo.jpg" style="height: 70px;"></div>
        <h3 style="margin: 30px 0;">井上がHiHi Jets のラジオだじぇっつ！で流した曲一覧</h3>
    </header>

    <main style="font-size: 12px;">
        <div>
            <table class="listview" style="margin: 0 auto; border: 1px solid black;">
                <tr>
                    <th style="width: 30px; border: 1px solid black;">No.</th>
                    <th style="width: 220px; border: 1px solid black;">曲名</th>
                    <th style="width: 160px; border: 1px solid black;">アーティスト名</th>
                    <th style="width: 70px; border: 1px solid black;">放送回</th>
                    <th style="width: 100px; border: 1px solid black;">放送日</th>
                    <th style="width: 500px; border: 1px solid black;">聞いてみよう</th>
                    <th style="width: 100px; border: 1px solid black;">操作</th>
                </tr>
                <?php foreach($values as $value){ ?> 
                <tr>
                    <td style="border: 1px solid black;"><?=$value["id"]?></td>
                    <td align="left" style="border: 1px solid black;"><?=$value["title"]?></td>
                    <td align="left" style="border: 1px solid black;"><?=$value["artist"]?></td>
                    <td style="border: 1px solid black;"><?=$value["backnumber"]?></td>
                    <td style="border: 1px solid black;"><?=$value["onairdate"]?></td>
                    <td align="left" style="border: 1px solid black;"><?=$value["url"]?></td>
                    <td style="border: 1px solid black;">
                        <a href="detail.php?id=<?=h($value["id"])?>"><img src="./img/edit.png" style="width: 20px; margin:5px 10px;"></a>
                        <a href="delete.php?id=<?=h($value["id"])?>"><img src="./img/delete.png" style="width: 20px; margin:5px 10px;"></a>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </main>

    <footer>
        <a href="index.php" class="back">入力フォームに戻る</a>
    </footer>

</body>
</html>
