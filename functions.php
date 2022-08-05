<?php
ini_set('display_errors', "On");
require "core/config.php";

/**
*今日の日付を取得
*@return string $today 本日の日付
*/
function get_today()
{
    return date("Y-m-d");
}

/**
 * XSS対策：エスケープ対策
 * @param string $str 対象の文字列
 * @return string 処理された文字列
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


function connect()
{
$dsn = "mysql:host=DB_HOST;dbname=DB_NAMEcharset=utf8mb4";

try{
    $pdo = new PDO($dsn,DB_USER,DB_PASS,[
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    ]);
    return $pdo;
}catch(PDOException $e){
    echo '接続失敗'.$e->getMessage();
    exit;
}
}


/**
 * CSRF対策 - トークン発行
 * @param void
 * @return strings $csrf_token
 */
function setToken()
{
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    return $csrf_token;
}

/**
 * @param void
 */
function checkToken()
{
    $token = filter_input(INPUT_POST, 'csrf_token');
    if(empty($token) || !isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
        print "不正アクセスです。";
        exit;
    }
    unset($_SESSION['csrf_token']); //多重リクエスト対策
}