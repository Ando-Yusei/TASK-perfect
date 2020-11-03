<?php
//①POSTでid,bookname,URL,commentを取得

$bookname= $_POST['bookname'];
$URL= $_POST['URL'];
$text= $_POST['comment'];
$id= $_POST['id'];




  //②DB接続
  include("funcs.php");
$pdo = db_conn();

  //③UPDATE gs_bm_table SET

  $sql=$stmt=$pdo->prepare("UPDATE gs_bm_table SET bookname=:bookname,URL=:URL,comment=:comment WHERE id=:id");

  $stmt->bindValue(':bookname',$bookname,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':URL',$URL,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':comment',$text,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':id',$id,PDO::PARAM_INT);//Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();

 //④データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    sql_error($stmt);
  }else{



  
  //⑤．select.phpへリダイレクト
  redirect('select.php');
  }




























?>