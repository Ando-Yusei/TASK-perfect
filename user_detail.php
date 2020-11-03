<?php
require_once("funcs.php");
$id = $_GET['id'];

//2. DB接続します
$pdo = db_conn();
  // これはおまじないなので意味を考えなくても良い

//３．データ登録SQL作成

$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=" . $id . ';');
$status = $stmt->execute();

// $sql = "SELECT * FROM gs_user_table WHERE id=:id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id',$id,PDO::PARAM_INT);  
// $status = $stmt->execute();

//4.データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($status);
}else{
//idしか帰ってこないため下記の方法で。→1データのみの抽出時はwhile文で取り出さない
$row = $stmt->fetch();
}


?>





<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー更新</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
 
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h2>USER　entry</h2>
<form method="POST" action="user_update.php">
<div class="jumbotron">
<fieldset>
  <legend>会員詳細</legend>
  <label>名前：<input type="text" name="name" value=<?= $row['name'] ?>></label><br>
  <label>ID:<input type="text" name="lid" value=<?= $row['lid'] ?>></label><br>
  <label>PW：<input type="text" name="lpw" value=<?= $row['lpw'] ?>></label><br>
  <label>管理者：<input type="checkbox" name="kanri_flg" value="1" <?php if ($row['kanri_flg']) {
                                                                                    echo 'checked';
                                                                                } ?>></label><br>
  <label>退職者：<input type="checkbox" name="life_flg" value="1" <?php if ($row['life_flg']) {
                                                                                echo 'checked';
                                                                            } ?>></label><br>
                <input type="hidden" name="id" value=<?= $row['id'] ?>>
     <input class="button" type="submit" value="entry">
   
    </fieldset>
  </div>
</form>

<!-- Main[End] -->
<a href="user_select.php" class="btn btn-border">USER LIST </a>

</body>
</html>