<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
function db_conn(){
    try {
        $db_name = "ren_playlist"; //デプロイの時に"flowersknives_php_kadai"に変更
        $db_id = "root"; //デプロイの時に"flowersknives_php_kadai"に変更
        $db_pw = ""; //MAMPPだったらroot。デプロイの時に"php_kadai"に変更
        $db_host = "localhost"; //デプロイの時に"mysql80.flowersknives.sakura.ne.jp"に変更
        //$pdo = new PDO('mysql:dbname=ren_playlist;charset=utf8;host=localhost','root','');
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB_CONECT:'.$e->getMessage()); 
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}





