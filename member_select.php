<?php

// 関数の読み込み
include("funcs.php");

// session開始
session_start();


// loginチェック処理
// 以下、セッションIDを持っていたら。ok
// 持っていなければ、閲覧できない処理にする。

// if(!セッションIDをもっていたら もしくは && ! 人の盗んだ奴を使っていないか){
//   ダメ
// }else{
//   ok
// }

// isset：中に何が入っているか確認する関数
// ！：打ち消し
// ||:もしくは

// if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){
//   // ログインに異常がある人
//   exit('Login Error');
// }else{
//   // ログインOKな人
//   // SES IDを新しくしてあげる
//   session_regenerate_id(true);
//   $_SESSION['chk_ssid'] = session_id();

// }
sessionCheck();

//1.  DB接続します
$pdo = db_conn();
//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    $view .="<p>";
    //更新ページの作成
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["day"]." : ".$result["bookname"]." : ".$result["URL"]." : ".$result["comment"];
    $view .='</a>';
    $view .='　';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .='[Delete]';
    $view .='</a>';
    $view .= "</p>";
    // $view .= $result['day'].' '.$result['bookname'].' '. $result['URL'].' '.$result['comment'];
   
  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Task List</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/style.css"  rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>


</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h2>Task List</h2>
<table>
  <tr>
    <th><?= $view ?></th>
    
  </tr>

</table>

<!-- Main[End] -->
<a class="btn btn-border" href="index.php">To add</a>
<a href="logout.php"class="btn btn-border">LOGOUT</a>
</body>
</html>
