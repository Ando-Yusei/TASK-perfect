<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Task List</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>

</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h2>Task List</h2>
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset class="fieldset">
    <legend>Task Menu</legend>
     <label>Task　　　　　<input type="text" name="bookname" autocomplete="off"></label><br>
     <label>Deadline　　　<input type="text" name="URL" autocomplete="off"></label><br>
     <label>Memo　　　　<textArea name="text" rows="2" cols="40"></textArea></label><br>
    
     <input class="button" type="submit" value="Send">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<a href="select.php" class="btn btn-border">ALL Task </a>

    


</body>
</html>
