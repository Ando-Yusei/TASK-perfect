<?php
//1.  DB接続します
require_once("funcs.php");
$pdo = db_conn();

// 修正処理から戻ってきたときにURLにsuccessがあれば、この処理。
if ($_GET['success']) {
  $success = $_GET['success'];
}



//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status===false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($status);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){


    $view .= '<tr>';
    if ($result["kanri_flg"]) {
        $view .= '<td> ✅</td>';
     } else {
        $view .= '<td> - </td>';
     }
    $view .= '<td><a href="user_detail.php?id=' . $result["id"] . '">';
    $view .= $result['name'];
    $view .='</a>';
    $view .='</td>';

    $view .= '<td><a href="user_delete.php?id=' .$result["id"] . '">';
    $view .='[Delete]';
    $view .= '</a>';
    $view .= '</td>';
    $view .= '</tr>';
        
  }

}



// while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//   $view .="<p>";
//   $view .= '<a href="user_view.php?id='.$result["id"].'">';
//   $view .= $result['name'].' '.$result['lid'].' '. $result['lpw'].' '.$result['kanri_flg'].' '.$result['life_flg'];
//   $view .='</a>';
//       $view .=' ';
//       $view .= '<a href="user_delete.php?id='.$result["id"].'">';
//       $view .='[Delete]';
//       $view .='</a>';
//       $view .= "</p>";
      
// }


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
<div>
        <?php
        // 修正処理から戻ってきたときにURLにsuccessがあれば、この処理。
        if ($success) {
            echo '<p class="text-success">編集できました😄👍</p>';
        }
        ?>
        <div class="container jumbotron">
            <table class="table">
                <thead>
                    <tr>
                        <th>管理者</th>
                        <th>名前</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $view ?>
                </tbody>
            </table>

        </div>
    </div>
<!-- Main[End] -->
<a class="btn btn-border" href="user_index.php">To add</a>
</body>
</html>
