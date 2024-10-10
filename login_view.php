<!DOCTYPE html>
<html>
<head>
    <title>로그인</title>
    <link rel="stylesheet" href="register.css" type="text/css">
    <meta charset="UTF-8">
</head>
<body>
    <style>
        * {
            font-style: normal;
            font-family: sans-serif;
        }
    </style>
    <header>
        <h5 style="display: block; text-align: left; padding-left: 20px;">
            <a href="http://www.whatthinkkr.com/whatthink.php">back</a>
        </h5>
        <h1>
            <a href="http://www.whatthinkkr.com/whatthink.php" style="color: crimson;"> What </a>
            <a href="http://www.whatthinkkr.com/whatthink.php" style="color: deepskyblue;"> Think </a>
        </h1>
        <h2>what do you think</h2>
    </header>
    <hr>
    <form action="login_server.php" method="post">
        <h2>로그인</h2>

        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php }?>

        <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php }?>

        <input type="text" placeholder="아이디 입력" name="user_id">
        <input type="password" placeholder="비밀번호 입력" name="pass1">
        
        <div class="login" style="display: block; text-align: center;">
            <button type="sumbit" name="login_btn">로그인</button>
        </div>
        
        <div style="display: block; text-align: center; padding-top: 5px;">
            <a href="http://www.whatthinkkr.com/register_view.php">아직 회원이 아니신가요? (회원가입 페이지)</a>
        </div>
    </form>
</body>
</html>