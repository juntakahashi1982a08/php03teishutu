<?php
//1. POSTデータ取得
$title   = $_POST["title"];
$author  = $_POST["author"];
$link    = $_POST["link"];
$comment = $_POST["comment"]; //追加されています

//*** 外部ファイルを読み込む ***
include("funcs.php");
$pdo = db_conn();

//2. DB接続します
//*** function化を使う！  ***
// try {
    // $db_name = "gs_bm";    //データベース名
    // $db_id   = "root";      //アカウント名
    // $db_pw   = "";      //パスワード：XAMPPはパスワード無しに修正してください。
    // $db_host = "localhost"; //DBホスト
//     $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:'.$e->getMessage());
// }


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(title,author,link,comment,indate)VALUES(:title,:author,:link,:comment,sysdate())");
$stmt->bindValue(':title',  $title,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':link',   $link,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化を使う！*****************
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
}else{
    //*** function化を使う！*****************
    redirect("index.php");
    // header("Location: index.php");
    // exit();
}

?>