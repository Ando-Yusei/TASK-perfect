<?php
require_once('funcs.php');
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bookname= $_POST['bookname'];
$URL= $_POST['URL'];
$text= $_POST['text'];



// // バリデーション処理
// if (trim($_POST["name"]) === '') {
//   $err[] = 1;
// }
// if (trim($_POST["lid"]) === '') {
//   $err[] = 1;
// }
// if (trim($_POST["lpw"]) === '') {
//   $err[] = 1;
// }

// // もしerr配列に何か入っている場合はエラーなので、redirect関数でindexに戻す。その際、GETでerrを渡す。
// if (count($err) > 0) {
//   redirect("select.php?err=1");
// }



//2. DB接続します

$pdo = db_conn();
// これはおまじないなので意味を考えなくても良い

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,bookname,URL,comment,day)VALUES(NULL,:name,:URL,:comment,sysdate())");
$stmt->bindValue(':name',$bookname,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL',$URL,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$text,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect("index.php");
}

?>
