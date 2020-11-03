<?php

// 関数の読み込み
include("funcs.php");


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
    $view .= '<a href="NO_USER_detail.php?id='.$result["id"].'">';
    $view .= $result["day"]." : ".$result["bookname"]." : ".$result["URL"]." : ".$result["comment"];
    $view .='</a>';
    $view .= "</p>";

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
<a href="login.php"class="btn btn-border">Login</a>
</body>
</html>
