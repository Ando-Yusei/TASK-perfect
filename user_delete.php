<?php
require_once('funcs.php');

//①GETでid値を取得
$id = $_GET["id"];

//②DB接続
$pdo = db_conn();

  //③UPDATE gs_bm_table SET

  $stmt=$pdo->prepare('DELETE FROM gs_user_table WHERE id=:id');
  $stmt->bindValue(':id',$id,PDO::PARAM_INT);
  $status = $stmt->execute();

 //④データ登録処理後
  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    sql_error($stmt);
  }else{
    redirect('user_select.php');
  
  }
















?>