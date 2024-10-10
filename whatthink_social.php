<?php 

include('db.php');
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title> What Think </title>
            <link rel="stylesheet" href="style.css" type="text/css">
            <base href="http://www.whatthinkkr.com/whatthink.php">
            <meta name="author" content="김도윤">
            <meta name="description" content="사람들의 생각을 모아둔 사이트">
            <meta name="keyword" content="what, think, what do you think, 토론, 의견">
            <meta charset="UTF-8">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9038097951545766"
        crossorigin="anonymous"></script>
    </head>
    <body>
    <header>
            <h5 style="display: block; text-align: right; padding-right: 40px;">
                <a href="http://www.whatthinkkr.com/login_view.php">login</a>
            </h5>
            <h1>
                <a href="http://www.whatthinkkr.com/whatthink.php" style="color: crimson;"> What </a>
                <a href="http://www.whatthinkkr.com/whatthink.php" style="color: deepskyblue;"> Think </a>
            </h1>
            <h2>what do you think</h2>
        </header>
        <hr>
        <nav class="menu">
            <ul>
                <li><a href="http://www.whatthinkkr.com/whatthink_hot.php">HOT</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink.php">세기의 논쟁</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_social.php">사회 이슈</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_personal.php">개인</a></li>
            </ul>
        </nav>
        <hr>
        <h3>사회 이슈</h3>
        <aside class="adv_left">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9038097951545766"
     crossorigin="anonymous"></script>
            <span>광고 문의</span></br>
            <span>www.whatthinkcp</span></br>
            <span>@gmail.com</span>
        </aside>
        <aside class="adv_right">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9038097951545766"
     crossorigin="anonymous"></script>
            <span>광고 문의</span></br>
            <span>www.whatthinkcp</span></br>
            <span>@gmail.com</span>
        </aside>

        <section class="mainsection">
            <div class="social_issue_board">
                <fieldset class="reply" style="height: 100%; overflow: auto;">
                    <?php 
                    $sql_board = "SELECT * FROM social_issue ORDER BY social_issue.boardnum DESC LIMIT 100";
                    $res_board = mysqli_query($db, $sql_board);
                    while($row_board = mysqli_fetch_array($res_board)) { ?>
                        <div style="display: center;">
                            <h4> <?php echo $row_board[1]; ?> </h4>
                            <div class="graph">

                            </div>
                            <div style="display=flex; ">
                                
                            </div>
                        </div>
                    <?php } ?>
                </fieldset> 
            </div>
        </section>
    </body>
</html>