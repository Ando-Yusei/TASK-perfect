<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
    <header>
        <!-- <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
                
            </div>
        </nav> -->
    </header>
<!-- Head[End] -->

<?php

    // 簡単なバリデーション。どれか空白（管理者チェックは空白ok）の場合、insert.phpから戻される。
    if ($_GET['err']) {
        echo ('<p class="text-danger">名前、ID、PWには必ず入力してください。</p>');
    }
    // 登録できた場合は↓
    if ($_GET['success']) {
        echo ('<p class="text-success">登録できました！</p>');
    }

    ?>


<!-- Main[Start] -->
<h2>USER　entry</h2>
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset class="fieldset">
    <legend>Form</legend>
     <label>NAME:　　<input type="text" name="name" autocomplete="off"></label><br>
     <label>ID:　　　　<input type="text" name="lid" autocomplete="off"></label><br>
     <label>PASS:　　<input type="text" name="lpw" autocomplete="off"></label><br>
     <label>管理者：<input type="checkbox" name="kanri_flg"></label><br>
                        
     <input class="button" type="submit" value="entry">
   
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<a href="user_select.php" class="btn btn-border">USER LIST </a>
<a href="select.php"class="btn btn-border">TaskList</a></div>
<a href="logout.php"class="btn btn-border">LOGOUT</a>


