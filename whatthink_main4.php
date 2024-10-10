<?php

session_start();
include('db.php');

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
            <form action="logout.php" method="post">
            <h5 style="display: block; text-align: right; padding-right: 40px;">
                <button type="sumbit"><span><?php echo $_SESSION['mb_nick']; echo " (로그아웃)"; ?></span></button>
                <?php $user_nick = $_SESSION['mb_nick'];
                $user_no = $_SESSION['no']; ?>
            </h5>
            </form>
            <h1>
                <a href="http://www.whatthinkkr.com/whatthink_main.php" style="color: crimson;"> What </a>
                <a href="http://www.whatthinkkr.com/whatthink_main.php" style="color: deepskyblue;"> Think </a>
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
        <h3>세기의 논쟁</h3>
        <aside class="adv_left">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9038097951545766"
     crossorigin="anonymous"></script>
        </aside>
        <aside class="adv_right">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9038097951545766"
     crossorigin="anonymous"></script>
        </aside>
        <section class="mainsection">
            <div id="page">
            <?php
                if (isset($user_nick)) {
                    $sql1 = "select boardnum from dp_select where boardnum = 16 and user_nick = '$user_nick'";
                    $res1 = mysqli_query($db, $sql1);
                    $row1 = mysqli_fetch_row($res1);
                    
                    if($row1[0] == 16) { ?>                       
                        <?php
                        $sql1_choice = "select choice from dp_select where user_nick = '$user_nick' and boardnum = 16";
                        $res1_choice = mysqli_query($db, $sql1_choice);
                        $row1_choice = mysqli_fetch_row($res1_choice);
                        $sql1_red_num = "select * from dp_select where boardnum = 16 and choice = 'red'";
                        $sql1_blue_num = "select * from dp_select where boardnum = 16 and choice = 'blue'";
                        $res1_red_num = mysqli_query($db, $sql1_red_num);
                        $res1_blue_num = mysqli_query($db, $sql1_blue_num);
                        $red1_num = mysqli_num_rows($res1_red_num);
                        $blue1_num = mysqli_num_rows($res1_blue_num);

                        $sum1 = $red1_num + $blue1_num;
                        $red1_per = round($red1_num / $sum1 * 100, 1);
                        $blue1_per = round($blue1_num / $sum1 * 100, 1);
                        $blue1_per = 100 - $blue1_per;
                        
                        if ($row1_choice[0] == "red") { ?>
                            <h4> 햄버거는 고기패티, 치킨패티 중 뭐가 더 맛있나? </h4>
                            <div class="graph stack1">                        
                                <span class="gph stack1"> <?php echo $red1_per; ?>%</span>
                                <style>
                                    .gph.stack1 {
                                        width: calc(<?php echo $red1_per; ?> * 1%);
                                    }
                                    @keyframes stack1 {
                                        0% {width: 0%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $red1_per; ?> * 1%);}
                                    }
                                    .graph.stack1 span.gph {
                                        animation: stack1 4s 1;
                                    } 
                                </style>    
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="16">
                                    <strong><span style="color: crimson; text-decoration:underline; cursor: default;">고기패티 <?php echo $red1_num; ?> </span></strong> 
                                    <strong><input class="opinion" id="reply1_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><input class="change_right" type="submit" name="changetoblue" value="치킨패티 <?php echo $blue1_num; ?>"></input></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>

                        <?php } 
                        elseif ($row1_choice[0] == "blue") { ?>
                            <h4> 햄버거는 고기패티, 치킨패티 중 뭐가 더 맛있나? </h4>
                            <div class="graph stack1">       
                                <span class="gph stack1"> <?php echo $blue1_per; ?>%</span>
                                <style>
                                    .gph.stack1 {
                                        width: calc(<?php echo $blue1_per; ?> * 1%);
                                    }
                                    @keyframes stack1 {
                                        0% {width: 100%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $blue1_per; ?> * 1%);}
                                    }
                                    .graph.stack1 span.gph {
                                        animation: stack1 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="16">
                                    <strong><input class = "change_left" type="submit" name="changetored" value="고기패티 <?php echo $red1_num; ?>"> </input></strong> 
                                    <strong><input class="opinion" id="reply1_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><span style="color: deepskyblue; text-decoration:underline;"> 치킨패티 <?php echo $blue1_num; ?> </span></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>
                        <?php } ?>
                        
                    <?php
                    }
                    else { ?>
                        <form action="main_server.php" method="post" target="main_page_iframe">
                            <h4> 햄버거는 고기패티, 치킨패티 중 뭐가 더 맛있나? </h4>
                            <div class="ngraph">
                                <div style="display: flex; justify-content: space-between; height: 40px; line-height: 50px;">
                                    <input type="hidden" name="boardnum" value="16">
                                    <strong><input class="red" type="submit" name="dp_red" value="고기패티"></strong>
                                    <strong><input class="blue" type="submit" name="dp_blue" value="치킨패티"></strong>
                                </div>
                            </div>
                        </form>
                        <iframe name="main_page_iframe" style="display: none;"></iframe>
                    <?php }
                } ?>
                
                <div class="boardnum_reply" id="reply1_screen" style="display: none;" >
                    <fieldset id="reply1" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply_iframe">
                            <input type="hidden" name="reply_boardnum" value="16">
                            <input type="hidden" name="reply_choice" value="<?php echo $row1_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reps" value="rep16">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply1_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <form action="whatthink_reply.php" method="post" target="reply_iframe">
                            <div class="reply1_background">
                                <input type="hidden" name="reply_boardnum" value="16">
                                <input type="hidden" name="reply_choice" value="<?php echo $row1_choice[0]; ?>">
                                <textarea class="reply_write" id="reply_write" type="text" placeholder="자신의 의견을 적어주세요." name="reply_contents" value=""></textarea>
                                <input class="reply_transmit" type="submit" name="leave_comment" value="작성"></input>
                            </div>            
                        </form>
                        <iframe name="reply_iframe" style="display: none;"></iframe>
                        <div id="16">
                            <div id="rep16">
                            <?php // 댓글 본문
                                $sql1_reply = "SELECT * FROM reply WHERE reply_boardnum = '16' ORDER BY reply.reply_no DESC LIMIT 100";
                                $res1_reply = mysqli_query($db, $sql1_reply);
                                while($row1_reply = mysqli_fetch_array($res1_reply)) { ?>
                                    <div style="height: auto; border: 1px solid #9C9393; overflow: auto;
                                    <?php if($row1_reply['reply_choice'] == "red") { ?> background-color: #EBBFBB; <?php } 
                                    elseif ($row1_reply['reply_choice'] == "blue") { ?> background-color: #AED4E8 <?php } else { ?>
                                    background-color: #9C9393; <?php }?>">
                                        <div style="padding-top: 6px; padding-right: 6px; padding-left: 6px; font-size:13px;">
                                            <strong><span><?php echo $row1_reply['user_nick']; ?></span></strong>
                                            <span style="float: right;"><?php echo date('y/m/d', $row1_reply['starttime']); ?></span> 
                                        </div>
                                        <?php // 댓글 삭제 수정
                                        if($_SESSION['mb_nick'] == $row1_reply['user_nick']) { ?>
                                            <form action="re_reply.php" method="post" target="re_reply_iframe">
                                                <input type="hidden" name="reps" value="rep16">
                                                <input type="hidden" name="reply_boardnum" value="16">
                                                <input type="hidden" name="reply_no" value="<?php echo $row1_reply['reply_no']; ?>">
                                                <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
                                                <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
                                            </form>
                                            
                                            <iframe name="re_reply_iframe" style="display: none;"></iframe>
                                        <?php }
                                        ?>
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row1_reply['reply_contents'])); ?>
                                        </div>
                                        <form action="reply_like.php" method="post" target="like_iframe">
                                            <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                                <input type="hidden" name="reps" value="rep16">
                                                <input type="hidden" name="reply_boardnum" value="16">
                                                <input type="hidden" name="reply_no" value="<?php echo $row1_reply['reply_no']; ?>">
                                                <input class="reply_agree" style="font-size: 12px;" type="submit" name="reply_like" value="인정 <?php echo $row1_reply['reply_like']; ?>"></input>
                                                <input class="reply_not_agree" style="font-size: 12px;" type="submit" name="reply_unlike" value="<?php echo $row1_reply['reply_unlike']; ?> 노인정"></input>
                                            </div>
                                        </form>
                                        <iframe name="like_iframe" style="display: none;"></iframe>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    <?php
                    if($row1_choice[0] == "red") { ?>
                        .reply1_background {
                            background-color: #EBBFBB;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php } 
                    elseif($row1_choice[0] == "blue") { ?>
                        .reply1_background {
                            background-color: #AED4E8;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php }?>
                </style>

                <script>
                    if(document.getElementById("reply1_button").click) {
                        document.getElementById("reply1_button").addEventListener('click', function() {
                            if(document.getElementById("reply1_screen").style.display == "none") {
                                document.getElementById("reply1_screen").style.display = "inline";
                            }
                            else {
                                document.getElementById("reply1_screen").style.display = "none";
                            }
                        })
                    }
                    if(document.getElementById("reply1_close").click) {
                        document.getElementById("reply1_close").addEventListener('click', function() {
                            document.getElementById("reply1_screen").style.display = "none";
                        })
                    }
                </script>               

                <?php
                if (isset($user_nick)) {
                    $sql2 = "select boardnum from dp_select where boardnum = 17 and user_nick = '$user_nick'";
                    $res2 = mysqli_query($db, $sql2);
                    $row2 = mysqli_fetch_row($res2);
                    
                    if ($row2[0] == 17) { ?>                       
                        <?php
                        $sql2_choice = "select choice from dp_select where user_nick = '$user_nick' and boardnum = 17";
                        $res2_choice = mysqli_query($db, $sql2_choice);
                        $row2_choice = mysqli_fetch_row($res2_choice);
                        $sql2_red_num = "select * from dp_select where boardnum = 17 and choice = 'red'";
                        $sql2_blue_num = "select * from dp_select where boardnum = 17 and choice = 'blue'";
                        $res2_red_num = mysqli_query($db, $sql2_red_num);
                        $res2_blue_num = mysqli_query($db, $sql2_blue_num);
                        $red2_num = mysqli_num_rows($res2_red_num);
                        $blue2_num = mysqli_num_rows($res2_blue_num);

                        $sum2 = $red2_num + $blue2_num;
                        $red2_per = round($red2_num / $sum2 * 100, 1);
                        $blue2_per = round($blue2_num / $sum2 * 100, 1);
                        $blue2_per = 100 - $blue2_per;

                        if ($row2_choice[0] == "red") { ?>
                            <h4 class="dpt"> 블루투스 논쟁, 애인 차에 이성인 직장 동료가 블루투스 연결해도 되는가? </h4>
                            <div class="graph stack2">                        
                                <span class="gph stack2"> <?php echo $red2_per; ?>%</span>
                                <style>
                                    .gph.stack2 {
                                        width: calc(<?php echo $red2_per; ?> * 1%);
                                    }
                                    @keyframes stack2 {
                                        0% {width: 0%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $red2_per; ?> * 1%);}
                                    }
                                    .graph.stack2 span.gph {
                                        animation: stack2 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="17">
                                    <strong><span style="color: crimson; text-decoration:underline;">된다 <?php echo $red2_num; ?> </span></strong> 
                                    <strong><input class="opinion" id="reply2_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><input class = "change_right" type="submit" name="changetoblue" value="안 된다 <?php echo $blue2_num; ?>"></input></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>

                        <?php } elseif ($row2_choice[0] == "blue") { ?>
                            <h4 class="dpt"> 블루투스 논쟁, 애인 차에 이성인 직장 동료가 블루투스 연결해도 되는가? </h4>
                            <div class="graph stack2">       
                                <span class="gph stack2"> <?php echo $blue2_per; ?>%</span>
                                <style>
                                    .gph.stack2 {
                                        width: calc(<?php echo $blue2_per; ?> * 1%);
                                    }
                                    @keyframes stack2 {
                                        0% {width: 100%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $blue2_per; ?> * 1%);}
                                    }
                                    .graph.stack2 span.gph {
                                        animation: stack2 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="17">
                                    <strong><input class="change_left" type="submit" name="changetored" value="된다 <?php echo $red2_num; ?>"> </input></strong> 
                                    <strong><input class="opinion" id="reply2_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><span style="color: deepskyblue; text-decoration:underline;"> 안 된다 <?php echo $blue2_num; ?> </span></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>

                        <?php } ?>
                    <?php }
                    else { ?>
                        <form action="main_server.php" method="post" target="main_page_iframe">
                            <h4 class="dpt"> 블루투스 논쟁, 애인 차에 이성인 직장 동료가 블루투스 연결해도 되는가? </h4>
                            <div class="ngraph">
                                <div style="display: flex; justify-content: space-between; height: 40px; line-height: 50px;">
                                    <input type="hidden" name="boardnum" value="17">
                                    <strong><input class="red" type="submit" name="dp_red" value="된다"></strong>
                                    <strong><input class="blue" type="submit" name="dp_blue" value="안 된다"></strong>
                                </div>
                            </div>
                        </form>
                        <iframe name="main_page_iframe" style="display: none;"></iframe>
                    <?php }
                } ?>

                <div class="boardnum_reply" id="reply2_screen" style="display: none;" >
                    <fieldset id="reply2" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply2_iframe">
                            <input type="hidden" name="reply_boardnum" value="17">
                            <input type="hidden" name="reply_choice" value="<?php echo $row2_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reps" value="rep17">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply2_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <form action="whatthink_reply.php" method="post" target="reply2_iframe">
                            <div class="reply2_background">
                                <input type="hidden" name="reply_boardnum" value="17">
                                <input type="hidden" name="reply_choice" value="<?php echo $row2_choice[0]; ?>">
                                <textarea class="reply_write" type="text" placeholder="자신의 의견을 적어주세요." name="reply_contents" value=""></textarea>
                                <input class="reply_transmit" type="submit" name="leave_comment" value="작성"></input>
                            </div>            
                        </form>
                        <iframe name="reply2_iframe" style="display: none;"></iframe>
                        <div id="17">
                            <div id="rep17">
                            <?php // 댓글 본문
                                $sql2_reply = "SELECT * FROM reply WHERE reply_boardnum = '17' ORDER BY reply.reply_no DESC LIMIT 100";
                                $res2_reply = mysqli_query($db, $sql2_reply);
                                while($row2_reply = mysqli_fetch_array($res2_reply)) { ?>
                                    <div style="height: auto; border: 1px solid #9C9393; overflow: auto;
                                    <?php if($row2_reply['reply_choice'] == "red") { ?> background-color: #EBBFBB; <?php } 
                                    elseif ($row2_reply['reply_choice'] == "blue") { ?> background-color: #AED4E8 <?php } else { ?>
                                    background-color: #9C9393; <?php }?>">
                                        <div style="padding-top: 6px; padding-right: 6px; padding-left: 6px; font-size:13px;">
                                            <strong><span><?php echo $row2_reply['user_nick']; ?></span></strong>
                                            <span style="float: right;"><?php echo date('y/m/d', $row2_reply['starttime']); ?></span> 
                                        </div>
                                        <?php // 댓글 삭제 수정
                                        if($_SESSION['mb_nick'] == $row2_reply['user_nick']) { ?>
                                            <form action="re_reply.php" method="post" target="re_reply2_iframe">
                                                <input type="hidden" name="reps" value="rep17">
                                                <input type="hidden" name="reply_boardnum" value="17">
                                                <input type="hidden" name="reply_no" value="<?php echo $row2_reply['reply_no']; ?>">
                                                <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
                                                <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
                                            </form>
                                            
                                            <iframe name="re_reply2_iframe" style="display: none;"></iframe>
                                        <?php }
                                        ?>
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row2_reply['reply_contents'])); ?>
                                        </div>
                                        <form action="reply_like.php" method="post" target="like2_iframe">
                                            <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                                <input type="hidden" name="reps" value="rep17">
                                                <input type="hidden" name="reply_boardnum" value="17">
                                                <input type="hidden" name="reply_no" value="<?php echo $row2_reply['reply_no']; ?>">
                                                <input class="reply_agree" style="font-size: 12px;" type="submit" name="reply_like" value="인정 <?php echo $row2_reply['reply_like']; ?>"></input>
                                                <input class="reply_not_agree" style="font-size: 12px;" type="submit" name="reply_unlike" value="<?php echo $row2_reply['reply_unlike']; ?> 노인정"></input>
                                            </div>
                                        </form>
                                        <iframe name="like2_iframe" style="display: none;"></iframe>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    <?php
                    if($row2_choice[0] == "red") { ?>
                        .reply2_background {
                            background-color: #EBBFBB;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php } 
                    elseif($row2_choice[0] == "blue") { ?>
                        .reply2_background {
                            background-color: #AED4E8;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php }?>
                </style>

                <script>
                    if(document.getElementById("reply2_button").click) {
                        document.getElementById("reply2_button").addEventListener('click', function() {
                            if(document.getElementById("reply2_screen").style.display == "none") {
                                document.getElementById("reply2_screen").style.display = "inline";
                            }
                            else {
                                document.getElementById("reply2_screen").style.display = "none";
                            }
                        })
                    }
                    if(document.getElementById("reply2_close").click) {
                        document.getElementById("reply2_close").addEventListener('click', function() {
                            document.getElementById("reply2_screen").style.display = "none";
                        })
                    }
                </script>

                <?php
                if (isset($user_nick)) {
                    $sql3 = "select boardnum from dp_select where boardnum = 18 and user_nick = '$user_nick'";
                    $res3 = mysqli_query($db, $sql3);
                    $row3 = mysqli_fetch_row($res3);
                    
                    if ($row3[0] == 18) { ?>                       
                        <?php
                        $sql3_choice = "select choice from dp_select where user_nick = '$user_nick' and boardnum = 18";
                        $res3_choice = mysqli_query($db, $sql3_choice);
                        $row3_choice = mysqli_fetch_row($res3_choice);
                        $sql3_red_num = "select * from dp_select where boardnum = 18 and choice = 'red'";
                        $sql3_blue_num = "select * from dp_select where boardnum = 18 and choice = 'blue'";
                        $res3_red_num = mysqli_query($db, $sql3_red_num);
                        $res3_blue_num = mysqli_query($db, $sql3_blue_num);
                        $red3_num = mysqli_num_rows($res3_red_num);
                        $blue3_num = mysqli_num_rows($res3_blue_num);

                        $sum3 = $red3_num + $blue3_num;
                        $red3_per = round($red3_num / $sum3 * 100, 1);
                        $blue3_per = round($blue3_num / $sum3 * 100, 1);
                        $blue3_per = 100 - $blue3_per;

                        if ($row3_choice[0] == "red") { ?>
                            <h4 class="dpt"> 유튜브 쇼츠, 인스타 릴스 중 더 선호하는 것은? </h4>
                            <div class="graph stack3">                        
                                <span class="gph stack3"> <?php echo $red3_per; ?>%</span>
                                <style>
                                    .gph.stack3 {
                                        width: calc(<?php echo $red3_per; ?> * 1%);
                                    }
                                    @keyframes stack3 {
                                        0% {width: 0%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $red3_per; ?> * 1%);}
                                    }
                                    .graph.stack3 span.gph {
                                        animation: stack3 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="18">
                                    <strong><span style="color: crimson; text-decoration:underline;">쇼츠 <?php echo $red3_num; ?> </span></strong> 
                                    <strong><input class="opinion" id="reply3_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><input class="change_right" type="submit" name="changetoblue" value="릴스 <?php echo $blue3_num; ?>"></input></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>

                        <?php } elseif ($row3_choice[0] == "blue") { ?>
                            <h4 class="dpt"> 유튜브 쇼츠, 인스타 릴스 중 더 선호하는 것은? </h4>
                            <div class="graph stack3">       
                                <span class="gph stack3"> <?php echo $blue3_per; ?>%</span>
                                <style>
                                    .gph.stack3 {
                                        width: calc(<?php echo $blue3_per; ?> * 1%);
                                    }
                                    @keyframes stack3 {
                                        0% {width: 100%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $blue3_per; ?> * 1%);}
                                    }
                                    .graph.stack3 span.gph {
                                        animation: stack3 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="18">
                                    <strong><input class="change_left" type="submit" name="changetored" value="쇼츠 <?php echo $red3_num; ?>"> </input></strong> 
                                    <strong><input class="opinion" id="reply3_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><span style="color: deepskyblue; text-decoration:underline;"> 릴스 <?php echo $blue3_num; ?> </span></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>

                        <?php } ?>
                    <?php }
                    else { ?>
                        <form action="main_server.php" method="post" target="main_page_iframe">
                            <h4 class="dpt"> 유튜브 쇼츠, 인스타 릴스 중 더 선호하는 것은? </h4>
                            <div class="ngraph">
                                <div style="display: flex; justify-content: space-between; height: 40px; line-height: 50px;">
                                    <input type="hidden" name="boardnum" value="18">
                                    <strong><input class="red" type="submit" name="dp_red" value="쇼츠"></strong>
                                    <strong><input class="blue" type="submit" name="dp_blue" value="릴스"></strong>
                                </div>
                            </div>
                        </form>
                        <iframe name="main_page_iframe" style="display: none;"></iframe>
                    <?php }
                } ?>

                <div class="boardnum_reply" id="reply3_screen" style="display: none;" >
                    <fieldset id="reply3" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply3_iframe">
                            <input type="hidden" name="reply_boardnum" value="18">
                            <input type="hidden" name="reply_choice" value="<?php echo $row3_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reps" value="rep18">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply3_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <form action="whatthink_reply.php" method="post" target="reply3_iframe">
                            <div class="reply3_background">
                                <input type="hidden" name="reply_boardnum" value="18">
                                <input type="hidden" name="reply_choice" value="<?php echo $row3_choice[0]; ?>">
                                <textarea class="reply_write" type="text" placeholder="자신의 의견을 적어주세요." name="reply_contents" value=""></textarea>
                                <input class="reply_transmit" type="submit" name="leave_comment" value="작성"></input>
                            </div>            
                        </form>
                        <iframe name="reply3_iframe" style="display: none;"></iframe>
                        <div id="18">
                            <div id="rep18">
                            <?php // 댓글 본문
                                $sql3_reply = "SELECT * FROM reply WHERE reply_boardnum = '18' ORDER BY reply.reply_no DESC LIMIT 100";
                                $res3_reply = mysqli_query($db, $sql3_reply);
                                while($row3_reply = mysqli_fetch_array($res3_reply)) { ?>
                                    <div style="height: auto; border: 1px solid #9C9393; overflow: auto;
                                    <?php if($row3_reply['reply_choice'] == "red") { ?> background-color: #EBBFBB; <?php } 
                                    elseif ($row3_reply['reply_choice'] == "blue") { ?> background-color: #AED4E8 <?php } else { ?>
                                    background-color: #9C9393; <?php }?>">
                                        <div style="padding-top: 6px; padding-right: 6px; padding-left: 6px; font-size:13px;">
                                            <strong><span><?php echo $row3_reply['user_nick']; ?></span></strong>
                                            <span style="float: right;"><?php echo date('y/m/d', $row3_reply['starttime']); ?></span> 
                                        </div>
                                        <?php // 댓글 삭제 수정
                                        if($_SESSION['mb_nick'] == $row3_reply['user_nick']) { ?>
                                            <form action="re_reply.php" method="post" target="re_reply3_iframe">
                                                <input type="hidden" name="reps" value="rep18">
                                                <input type="hidden" name="reply_boardnum" value="18">
                                                <input type="hidden" name="reply_no" value="<?php echo $row3_reply['reply_no']; ?>">
                                                <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
                                                <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
                                            </form>
                                            
                                            <iframe name="re_reply3_iframe" style="display: none;"></iframe>
                                        <?php }
                                        ?>
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row3_reply['reply_contents'])); ?>
                                        </div>
                                        <form action="reply_like.php" method="post" target="like3_iframe">
                                            <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                                <input type="hidden" name="reps" value="rep18">
                                                <input type="hidden" name="reply_boardnum" value="18">
                                                <input type="hidden" name="reply_no" value="<?php echo $row3_reply['reply_no']; ?>">
                                                <input class="reply_agree" style="font-size: 12px;" type="submit" name="reply_like" value="인정 <?php echo $row3_reply['reply_like']; ?>"></input>
                                                <input class="reply_not_agree" style="font-size: 12px;" type="submit" name="reply_unlike" value="<?php echo $row3_reply['reply_unlike']; ?> 노인정"></input>
                                            </div>
                                        </form>
                                        <iframe name="like3_iframe" style="display: none;"></iframe>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    <?php
                    if($row3_choice[0] == "red") { ?>
                        .reply3_background {
                            background-color: #EBBFBB;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php } 
                    elseif($row3_choice[0] == "blue") { ?>
                        .reply3_background {
                            background-color: #AED4E8;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php }?>
                </style>

                <script>
                    if(document.getElementById("reply3_button").click) {
                        document.getElementById("reply3_button").addEventListener('click', function() {
                            if(document.getElementById("reply3_screen").style.display == "none") {
                                document.getElementById("reply3_screen").style.display = "inline";
                            }
                            else {
                                document.getElementById("reply3_screen").style.display = "none";
                            }
                        })
                    }
                    if(document.getElementById("reply3_close").click) {
                        document.getElementById("reply3_close").addEventListener('click', function() {
                            document.getElementById("reply3_screen").style.display = "none";
                        })
                    }
                </script>
                
                <?php
                if (isset($user_nick)) {
                    $sql4 = "select boardnum from dp_select where boardnum = 19 and user_nick = '$user_nick'";
                    $res4 = mysqli_query($db, $sql4);
                    $row4 = mysqli_fetch_row($res4);
                    
                    if ($row4[0] == 19) { ?>                       
                        <?php
                        $sql4_choice = "select choice from dp_select where user_nick = '$user_nick' and boardnum = 19";
                        $res4_choice = mysqli_query($db, $sql4_choice);
                        $row4_choice = mysqli_fetch_row($res4_choice);
                        $sql4_red_num = "select * from dp_select where boardnum = 19 and choice = 'red'";
                        $sql4_blue_num = "select * from dp_select where boardnum = 19 and choice = 'blue'";
                        $res4_red_num = mysqli_query($db, $sql4_red_num);
                        $res4_blue_num = mysqli_query($db, $sql4_blue_num);
                        $red4_num = mysqli_num_rows($res4_red_num);
                        $blue4_num = mysqli_num_rows($res4_blue_num);

                        $sum4 = $red4_num + $blue4_num;
                        $red4_per = round($red4_num / $sum4 * 100, 1);
                        $blue4_per = round($blue4_num / $sum4 * 100, 1);
                        $blue4_per = 100 - $blue4_per;

                        if ($row4_choice[0] == "red") { ?>
                            <h4 class="dpt"> 라면 끓일 때 면 먼저? 스프 먼저? </h4>
                            <div class="graph stack4">                        
                                <span class="gph stack4"> <?php echo $red4_per; ?>%</span>
                                <style>
                                    .gph.stack4 {
                                        width: calc(<?php echo $red4_per; ?> * 1%);
                                    }
                                    @keyframes stack4 {
                                        0% {width: 0%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $red4_per; ?> * 1%);}
                                    }
                                    .graph.stack4 span.gph {
                                        animation: stack4 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="19">
                                    <strong><span style="color: crimson; text-decoration:underline;">면 <?php echo $red4_num; ?> </span></strong> 
                                    <strong><input class="opinion" id="reply4_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><input class="change_right" type="submit" name="changetoblue" value="스프 <?php echo $blue4_num; ?>"></input></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>

                        <?php } elseif ($row4_choice[0] == "blue") { ?>
                            <h4 class="dpt"> 라면 끓일 때 면 먼저? 스프 먼저? </h4>
                            <div class="graph stack4">       
                                <span class="gph stack4"> <?php echo $blue4_per; ?>%</span>
                                <style>
                                    .gph.stack4 {
                                        width: calc(<?php echo $blue4_per; ?> * 1%);
                                    }
                                    @keyframes stack4 {
                                        0% {width: 100%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $blue4_per; ?> * 1%);}
                                    }
                                    .graph.stack4 span.gph {
                                        animation: stack4 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="19">
                                    <strong><input class="change_left" type="submit" name="changetored" value="면 <?php echo $red4_num; ?>"> </input></strong> 
                                    <strong><input class="opinion" id="reply4_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><span style="color: deepskyblue; text-decoration:underline;"> 스프 <?php echo $blue4_num; ?> </span></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>
                           
                        <?php } ?>
                    <?php }
                    else { ?>
                        <form action="main_server.php" method="post" target="main_page_iframe">
                            <h4 class="dpt"> 라면 끓일 때 면 먼저? 스프 먼저? </h4>
                            <div class="ngraph">
                                <div style="display: flex; justify-content: space-between; height: 40px; line-height: 50px;">
                                    <input type="hidden" name="boardnum" value="19">
                                    <strong><input class="red" type="submit" name="dp_red" value="면"></strong>
                                    <strong><input class="blue" type="submit" name="dp_blue" value="스프"></strong>
                                </div>
                            </div>
                        </form>
                        <iframe name="main_page_iframe" style="display: none;"></iframe>
                    <?php }
                } ?>

                <div class="boardnum_reply" id="reply4_screen" style="display: none;" >
                    <fieldset id="reply4" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply4_iframe">
                            <input type="hidden" name="reply_boardnum" value="19">
                            <input type="hidden" name="reply_choice" value="<?php echo $row4_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reps" value="rep19">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply4_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <form action="whatthink_reply.php" method="post" target="reply4_iframe">
                            <div class="reply4_background">
                                <input type="hidden" name="reply_boardnum" value="19">
                                <input type="hidden" name="reply_choice" value="<?php echo $row4_choice[0]; ?>">
                                <textarea class="reply_write" type="text" placeholder="자신의 의견을 적어주세요." name="reply_contents" value=""></textarea>
                                <input class="reply_transmit" type="submit" name="leave_comment" value="작성"></input>
                            </div>            
                        </form>
                        <iframe name="reply4_iframe" style="display: none;"></iframe>
                        <div id="19">
                            <div id="rep19">
                            <?php // 댓글 본문
                                $sql4_reply = "SELECT * FROM reply WHERE reply_boardnum = '19' ORDER BY reply.reply_no DESC LIMIT 100";
                                $res4_reply = mysqli_query($db, $sql4_reply);
                                while($row4_reply = mysqli_fetch_array($res4_reply)) { ?>
                                    <div style="height: auto; border: 1px solid #9C9393; overflow: auto;
                                    <?php if($row4_reply['reply_choice'] == "red") { ?> background-color: #EBBFBB; <?php } 
                                    elseif ($row4_reply['reply_choice'] == "blue") { ?> background-color: #AED4E8 <?php } else { ?>
                                    background-color: #9C9393; <?php }?>">
                                        <div style="padding-top: 6px; padding-right: 6px; padding-left: 6px; font-size:13px;">
                                            <strong><span><?php echo $row4_reply['user_nick']; ?></span></strong>
                                            <span style="float: right;"><?php echo date('y/m/d', $row4_reply['starttime']); ?></span> 
                                        </div>
                                        <?php // 댓글 삭제 수정
                                        if($_SESSION['mb_nick'] == $row4_reply['user_nick']) { ?>
                                            <form action="re_reply.php" method="post" target="re_reply4_iframe">
                                                <input type="hidden" name="reps" value="rep19">
                                                <input type="hidden" name="reply_boardnum" value="19">
                                                <input type="hidden" name="reply_no" value="<?php echo $row4_reply['reply_no']; ?>">
                                                <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
                                                <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
                                            </form>
                                            
                                            <iframe name="re_reply4_iframe" style="display: none;"></iframe>
                                        <?php }
                                        ?>
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row4_reply['reply_contents'])); ?>
                                        </div>
                                        <form action="reply_like.php" method="post" target="like4_iframe">
                                            <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                                <input type="hidden" name="reps" value="rep19">
                                                <input type="hidden" name="reply_boardnum" value="19">
                                                <input type="hidden" name="reply_no" value="<?php echo $row4_reply['reply_no']; ?>">
                                                <input class="reply_agree" style="font-size: 12px;" type="submit" name="reply_like" value="인정 <?php echo $row4_reply['reply_like']; ?>"></input>
                                                <input class="reply_not_agree" style="font-size: 12px;" type="submit" name="reply_unlike" value="<?php echo $row4_reply['reply_unlike']; ?> 노인정"></input>
                                            </div>
                                        </form>
                                        <iframe name="like4_iframe" style="display: none;"></iframe>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    <?php
                    if($row4_choice[0] == "red") { ?>
                        .reply4_background {
                            background-color: #EBBFBB;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php } 
                    elseif($row4_choice[0] == "blue") { ?>
                        .reply4_background {
                            background-color: #AED4E8;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php }?>
                </style>

                <script>
                    if(document.getElementById("reply4_button").click) {
                        document.getElementById("reply4_button").addEventListener('click', function() {
                            if(document.getElementById("reply4_screen").style.display == "none") {
                                document.getElementById("reply4_screen").style.display = "inline";
                            }
                            else {
                                document.getElementById("reply4_screen").style.display = "none";
                            }
                        })
                    }
                    if(document.getElementById("reply4_close").click) {
                        document.getElementById("reply4_close").addEventListener('click', function() {
                            document.getElementById("reply4_screen").style.display = "none";
                        })
                    }
                </script>

                <?php
                if (isset($user_nick)) {
                    $sql5 = "select boardnum from dp_select where boardnum = 20 and user_nick = '$user_nick'";
                    $res5 = mysqli_query($db, $sql5);
                    $row5 = mysqli_fetch_row($res5);
                    
                    if ($row5[0] == 20) { ?>                       
                        <?php
                        $sql5_choice = "select choice from dp_select where user_nick = '$user_nick' and boardnum = 20";
                        $res5_choice = mysqli_query($db, $sql5_choice);
                        $row5_choice = mysqli_fetch_row($res5_choice);
                        $sql5_red_num = "select * from dp_select where boardnum = 20 and choice = 'red'";
                        $sql5_blue_num = "select * from dp_select where boardnum = 20 and choice = 'blue'";
                        $res5_red_num = mysqli_query($db, $sql5_red_num);
                        $res5_blue_num = mysqli_query($db, $sql5_blue_num);
                        $red5_num = mysqli_num_rows($res5_red_num);
                        $blue5_num = mysqli_num_rows($res5_blue_num);

                        $sum5 = $red5_num + $blue5_num;
                        $red5_per = round($red5_num / $sum5 * 100, 1);
                        $blue5_per = round($blue5_num / $sum5 * 100, 1);
                        $blue5_per = 100 - $blue5_per;

                        if ($row5_choice[0] == "red") { ?>
                            <h4 class="dpt"> 평생 한 계절로 살아야 한다면? </h4>
                            <div class="graph stack5">                        
                                <span class="gph stack5"> <?php echo $red5_per; ?>%</span>
                                <style>
                                    .gph.stack5 {
                                        width: calc(<?php echo $red5_per; ?> * 1%);
                                    }
                                    @keyframes stack5 {
                                        0% {width: 0%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $red5_per; ?> * 1%);}
                                    }
                                    .graph.stack5 span.gph {
                                        animation: stack5 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="20">
                                    <strong><span style="color: crimson; text-decoration:underline;">여름 <?php echo $red5_num; ?> </span></strong> 
                                    <strong><input class="opinion" id="reply5_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><input class="change_right" type="submit" name="changetoblue" value="겨울 <?php echo $blue5_num; ?>"></input></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>

                        <?php } elseif ($row5_choice[0] == "blue") { ?>
                            <h4 class="dpt"> 평생 한 계절로 살아야 한다면? </h4>
                            <div class="graph stack5">       
                                <span class="gph stack5"> <?php echo $blue5_per; ?>%</span>
                                <style>
                                    .gph.stack5 {
                                        width: calc(<?php echo $blue5_per; ?> * 1%);
                                    }
                                    @keyframes stack5 {
                                        0% {width: 100%; color: rgba(255, 255, 255, 0);}
                                        60% {color: rgba(255, 255, 255, 1);}
                                        100% {width: calc(<?php echo $blue5_per; ?> * 1%);}
                                    }
                                    .graph.stack5 span.gph {
                                        animation: stack5 4s 1;
                                    } 
                                </style>                        
                            </div>
                            <form action="change_opinion.php" method="post" target="main_opinion_iframe">
                                <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                    <input type="hidden" name="boardnum" value="20">
                                    <strong><input class="change_left" type="submit" name="changetored" value="여름 <?php echo $red5_num; ?>"> </input></strong> 
                                    <strong><input class="opinion" id="reply5_button" type="button" value="의견" style="text-align: center;"></input></strong>
                                    <strong><span style="color: deepskyblue; text-decoration:underline;"> 겨울 <?php echo $blue5_num; ?> </span></strong>
                                </div>
                            </form>
                            <iframe name="main_opinion_iframe" style="display: none;"></iframe>
                            
                        <?php } ?>
                    <?php }
                    else { ?>
                        <form action="main_server.php" method="post" target="main_page_iframe">
                            <h4 class="dpt"> 평생 한 계절로 살아야 한다면? </h4>
                            <div class="ngraph">
                                <div style="display: flex; justify-content: space-between; height: 40px; line-height: 50px;">
                                    <input type="hidden" name="boardnum" value="20">
                                    <strong><input class="red" type="submit" name="dp_red" value="여름"></strong>
                                    <strong><input class="blue" type="submit" name="dp_blue" value="겨울"></strong>
                                </div>
                            </div>
                        </form>
                        <iframe name="main_page_iframe" style="display: none;"></iframe>
                    <?php }
                } ?>
                
                <div class="boardnum_reply" id="reply5_screen" style="display: none;" >
                    <fieldset id="reply5" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply5_iframe">
                            <input type="hidden" name="reply_boardnum" value="20">
                            <input type="hidden" name="reply_choice" value="<?php echo $row5_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reps" value="rep20">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply5_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <form action="whatthink_reply.php" method="post" target="reply5_iframe">
                            <div class="reply5_background">
                                <input type="hidden" name="reply_boardnum" value="20">
                                <input type="hidden" name="reply_choice" value="<?php echo $row5_choice[0]; ?>">
                                <textarea class="reply_write" type="text" placeholder="자신의 의견을 적어주세요." name="reply_contents" value=""></textarea>
                                <input class="reply_transmit" type="submit" name="leave_comment" value="작성"></input>
                            </div>            
                        </form>
                        <iframe name="reply5_iframe" style="display: none;"></iframe>
                        <div id="20">
                            <div id="rep20">
                            <?php // 댓글 본문
                                $sql5_reply = "SELECT * FROM reply WHERE reply_boardnum = '20' ORDER BY reply.reply_no DESC LIMIT 100";
                                $res5_reply = mysqli_query($db, $sql5_reply);
                                while($row5_reply = mysqli_fetch_array($res5_reply)) { ?>
                                    <div style="height: auto; border: 1px solid #9C9393; overflow: auto;
                                    <?php if($row5_reply['reply_choice'] == "red") { ?> background-color: #EBBFBB; <?php } 
                                    elseif ($row5_reply['reply_choice'] == "blue") { ?> background-color: #AED4E8 <?php } else { ?>
                                    background-color: #9C9393; <?php }?>">
                                        <div style="padding-top: 6px; padding-right: 6px; padding-left: 6px; font-size:13px;">
                                            <strong><span><?php echo $row5_reply['user_nick']; ?></span></strong>
                                            <span style="float: right;"><?php echo date('y/m/d', $row5_reply['starttime']); ?></span> 
                                        </div>
                                        <?php // 댓글 삭제 수정
                                        if($_SESSION['mb_nick'] == $row5_reply['user_nick']) { ?>
                                            <form action="re_reply.php" method="post" target="re_reply5_iframe">
                                                <input type="hidden" name="reps" value="rep20">
                                                <input type="hidden" name="reply_boardnum" value="20">
                                                <input type="hidden" name="reply_no" value="<?php echo $row5_reply['reply_no']; ?>">
                                                <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
                                                <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
                                            </form>
                                            
                                            <iframe name="re_reply5_iframe" style="display: none;"></iframe>
                                        <?php }
                                        ?>
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row5_reply['reply_contents'])); ?>
                                        </div>
                                        <form action="reply_like.php" method="post" target="like5_iframe">
                                            <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                                <input type="hidden" name="reps" value="rep20">
                                                <input type="hidden" name="reply_boardnum" value="20">
                                                <input type="hidden" name="reply_no" value="<?php echo $row5_reply['reply_no']; ?>">
                                                <input class="reply_agree" style="font-size: 12px;" type="submit" name="reply_like" value="인정 <?php echo $row5_reply['reply_like']; ?>"></input>
                                                <input class="reply_not_agree" style="font-size: 12px;" type="submit" name="reply_unlike" value="<?php echo $row5_reply['reply_unlike']; ?> 노인정"></input>
                                            </div>
                                        </form>
                                        <iframe name="like5_iframe" style="display: none;"></iframe>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    <?php
                    if($row5_choice[0] == "red") { ?>
                        .reply5_background {
                            background-color: #EBBFBB;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php } 
                    elseif($row5_choice[0] == "blue") { ?>
                        .reply5_background {
                            background-color: #AED4E8;
                            height: 80px;
                            border: 1px solid #9C9393;
                        }
                    <?php }?>
                </style>

                <script>
                    if(document.getElementById("reply5_button").click) {
                        document.getElementById("reply5_button").addEventListener('click', function() {
                            if(document.getElementById("reply5_screen").style.display == "none") {
                                document.getElementById("reply5_screen").style.display = "inline";
                            }
                            else {
                                document.getElementById("reply5_screen").style.display = "none";
                            }
                        })
                    }
                    if(document.getElementById("reply5_close").click) {
                        document.getElementById("reply5_close").addEventListener('click', function() {
                            document.getElementById("reply5_screen").style.display = "none";
                        })
                    }
                </script>                             
            </div>
        </section>
        <div class="page">
            <ul class="pagination modal">
                <li><a href="http://www.whatthinkkr.com/whatthink_main.php" class="first">처음페이지</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main.php" class="arrow left"><<</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main.php" class="num">1</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main2.php" class="num">2</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main3.php" class="num">3</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main4.php" class="active num">4</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main5.php" class="num">5</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main5.php" class="arrow right">>></a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink_main5.php" class="last">마지막페이지</a></li>
            </ul>
        </div>
        <div class="adv_hori">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9038097951545766"
     crossorigin="anonymous"></script>
        </div>
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
    </body>
</html>