<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


function db_conn(){
    try {
        $db_name = "";    //データベース名
        $db_id   = "";      //アカウント名
        $db_pw   = "";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = ""; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;//ココを追記！！（重要）
    } catch (PDOException $e) {
      exit('DBConnectError:'.$e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)

function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}
//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}