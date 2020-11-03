<?php
//①GETでid値を取得
$id = $_GET["id"];

//②DB接続
include("funcs.php");
$pdo = db_conn();

  //③UPDATE gs_bm_table SET

  $sql=$stmt=$pdo->prepare('DELETE FROM gs_bm_table WHERE id=:id');
  $stmt->bindValue(':id',$id,PDO::PARAM_INT);
  $status = $stmt->execute();

 //④データ登録処理後
  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    sql_error($stmt);
  }else{



  
  //⑤．select.phpへリダイレクト
    header('Location: select.php');
    exit;
  
  }
















?>