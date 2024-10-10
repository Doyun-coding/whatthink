<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
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
    <form action="register_server.php" method="post">
        <h2>간편회원가입</h2>

        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php }?>

        <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php }?>
        
        <?php if(isset($_GET['user_id'])) { ?>
        <input type="text" placeholder="아이디 입력" name="user_id" value="<?php echo $_GET['user_id']; ?>">
        <?php } else { ?>
        <input type="text" placeholder="아이디 입력" name="user_id">
        <?php } ?>

        <?php if(isset($_GET['user_nick'])) { ?>
        <input type="text" placeholder="닉네임 입력" name="user_nick" value="<?php echo $_GET['user_nick']; ?>">
        <?php } else { ?>
        <input type="text" placeholder="닉네임 입력" name="user_nick">
        <?php } ?>

        <input type="password" placeholder="비밀번호 입력" name="pass1">
        <input type="password" placeholder="비밀번호 확인" name="pass2">
        
        <div class="register" style="display: block;">
            <button type="sumbit">가입</button>
        </div>
        
        <div style="display: block; text-align: center; padding-top: 5px;">
            <a href="http://www.whatthinkkr.com/login_view.php">이미 회원이신가요? (로그인 페이지)</a>
        </div>
    </form>
</body>
</html>