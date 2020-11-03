<?php
require_once('funcs.php');

//①POSTでid,bookname,URL,commentを取得
$id= $_POST['id'];
$name= $_POST['name'];
$lid= $_POST['lid'];
$lpw= $_POST['lpw'];
$kanri_flg=$_POST['kanri_flg'];
$life_flg=$_POST['life_flg'];
$err = [];
if (trim($_POST["name"]) === '') {
    $err[] = 1;
}
if (trim($_POST["lid"]) === '') {
    $err[] = 1;
}
if (trim($_POST["lpw"]) === '') {
    $err[] = 1;
}
if (count($err) > 0) {
    redirect("user_detail.php?id=${id}&err=1");
}

// 空白がなければ、$_POST["kanri_flg"]と、$_POST["life_flg"]をチェック
if (isset($_POST["kanri_flg"])) {
  $kanri_flg = 1;
} else {
  $kanri_flg = 0;
}

if (isset($_POST["life_flg"])) {
  $life_flg = 1;
} else {
  $life_flg = 0;
}


//②DB接続
$pdo = db_conn();
  //③UPDATE gs_bm_table SET

  $sql=$stmt=$pdo->prepare("UPDATE gs_user_table SET name=:name,lid=:lid,lpw=:lpw,kanri_flg=:kanri_flg,life_flg=:life_flg  WHERE id=:id");
  $stmt->bindValue(':name', h($name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':lid', h($lid), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':lpw', h($lpw), PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':kanri_flg', h($kanri_flg), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':life_flg', h($life_flg), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();

 //④データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
  }else{

    redirect("user_select.php?id=${id}&success=1");
  }
    
  




























?>