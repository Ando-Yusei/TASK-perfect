<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/range.css">
<link href="css/style.css"  rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>

</head>

<body id="main">

    <header>
        <h2 class="btn btn-border">LOGIN</h2>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>



    <!-- <! lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form name="form1" action="login_act.php" method="post">
        ID:<input type="text" name="lid" />
        PW:<input type="password" name="lpw" />
        <input type="submit" value="LOGIN" />
    </form>

    <a href="NO_USER_select.php">Non-member</a>
</body>

</html> 
