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
        <h5>記録する</h5>
        <form action="insert.php" method="POST">    
            <table align="center" class="memo">
                <tr>
                    <td align="right" class="td-left">曲名</td>
                    <td align="left"><input type="text" name="title" class="td-right"></td>
                </tr>
                <tr>
                    <td align="right" class="td-left">アーティスト名</td>
                    <td align="left"><input type="text" name="artist" class="td-right"></td>
                </tr>
                <tr>
                    <td align="right" class="td-left">放送回</td>
                    <td align="left"><input type="text" name="backnumber" class="td-right"></td>
                </tr>
                <tr>
                    <td align="right" class="td-left">放送日</td>
                    <td align="left"><input type="date" name="onairdate" id="onairDate" class="td-right" style="font-size: 10px;
"></td>
                </tr>
                <tr>
                    <td align="right" class="td-left" style="vertical-align: top;">埋め込みコード</td>
                    <td align="left"><textarea class="td-right" style="height: 100px; vertical-align: top; font-size: 10px; resize: none;"></textarea></td>
                </tr>
            </table>
            <button type="submit" class="send">メモる</button>
        </form>
    </main>

<footer>
    <a href="select.php" class="list">過去の選曲一覧</a>
</footer>

</body>
</html>