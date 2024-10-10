<?php

session_start();
include('db.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title> What Think HOT </title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <base href="http://www.whatthinkkr.com/whatthink_main_hot.php">
        <meta name="author" content="김도윤">
        <meta name="description" content="사람들의 생각을 모아둔 사이트">
        <meta name="keyword" content="HOT">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <form action="logout.php" method="post">
                <h5 style="display: block; text-align: right; padding-right: 40px;">
                    <button type="sumbit"><span><?php echo $_SESSION['mb_nick']; echo " (로그아웃)"; ?></span></button>
                    <?php $user_nick = $_SESSION['mb_nick'];
                    $user_no = $_SESSION['no']; ?>
                </h5>
            </form>
            <h1>
                <span style="color: crimson;"> What </span>
                <span style="color: deepskyblue;"> Think </span>
            </h1>
            <h2>what do you think</h2>
        </header>
        <hr>
        <nav class="menu">
            <ul>
                <li><a href="http://www.whatthinkkr.com/whatthink_main_hot.php">HOT</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main.php">세기의 논쟁</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main_personal.php">개인</a></li>
            </ul>
        </nav>
        <hr>
        <h3>HOT</h3>
        <span style="display: block; text-align: center;">*곧 업데이트 예정입니다*</span>
        <footer>
            <nav>
                <a href='' target='_blank'>SNS</a> |
                <a href='http://www.whatthinkkr.com/whatthink_gate.php' target='_blank'>Mainsite</a>
            </nav>
            <p>
                <span>문의 : instagram whatthink DM 문의</span><br/>
                <span>Author : Kim Do-yun</span><br/>
                <span>E-mail : www.whatthinkcp@gmail.com</span><br/>
                <span>Copyright 2023. Kim Do-yun. All rights reserved.</span>
            </p>
        </footer>
        <style>
            footer {
                position: absolute;
                width: 100%;
                height: 90px;
                bottom: 0;
                border-top: 1px solid #c4c4c4;
                padding-top: 15px;
                color: #808080;
                font-size: 11px;
            }
            footer a {
                display: inline-block;
                margin: 0 20px 10px 20px;
                color: #808080; font-size: 11px;
            }
            
            footer a:visited {
                color: #808080;
            }

            footer p {
                margin-top: 0; margin-bottom: 0;   
            }
            
            footer p span {
                display: inline-block;
                margin-left: 20px;
            }
        </style>
    </body>
</html>