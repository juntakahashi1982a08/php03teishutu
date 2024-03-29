<?php
//1. POSTデータ取得
$title   = $_POST["title"];
$author  = $_POST["author"];
$link    = $_POST["link"];
$comment = $_POST["comment"];   //今回追加してます
$id      = $_POST["id"];   //idを取得

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET title=:title, author=:author, link=:link, comment=:comment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title',  $title,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':link',   $link,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',    $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}

?>