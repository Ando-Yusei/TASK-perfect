<?php
$id = $_GET["id"];
include("funcs.php");
//GETでid値を取得


//2. DB接続します
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
  
     <p>Task　　　　　<?=$row["bookname"]?></p><br>
     <p>Deadline　　　<?=$row["URL"]?></p><br>
     <p>Memo　　　　<?=$row["comment"]?></p><br>

<!-- Main[End] -->
<a href="NO_USER_select.php" class="btn btn-border">ALL Task </a>

</body>
</html>
