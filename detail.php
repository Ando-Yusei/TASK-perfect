<?php
session_start();
$id = $_GET["id"];
include("funcs.php");
//GETでid値を取得
//2. DB接続します

sessionCheck();
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();







//4.データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);

}else{
//1データのみの抽出時はwhile文で取り出さない
$row = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Task List</title>
  <link href="css/style.css"  rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>

</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h2>Task List</h2>
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset class="fieldset">
    <legend>Task Menu</legend>
     <label>Task　　　　　<input type="text" name="bookname" value="<?=$row["bookname"]?>"></label><br>
     <label>Deadline　　　<input type="text" name="URL" value="<?=$row["URL"]?>"></label><br>
     <label>Memo　　　　<textArea name="comment" rows="4" cols="40"><?=$row["comment"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input class="button" type="submit" value="Send">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<a href="select.php" class="btn btn-border">ALL Task </a>

</body>
</html>
