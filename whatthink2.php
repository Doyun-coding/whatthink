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
                <li><a href="http://www.whatthinkkr.com/whatthink_personal.php">개인</a></li>
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
            <div>
                <div id="dp1">
                    <h4> 대한민국 근본 예능은? </h4>
                    <div class="ngraph">
                        <div style="display: flex; justify-content: space-between; height: 50px; line-height: 50px;">
                            <span class="result_choice">무한도전</span>
                            <span class="result_vote" id="result1_vote">결과보기</span>
                            <span class="result_choice">1박2일</span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    if (document.getElementById("result1_vote").click) {
                        document.getElementById("result1_vote").addEventListener('click', function() {
                        document.getElementById("dp1").style.display = "none"; 
                        document.getElementById("result1_dp").style.display = "inline";
                        })
                    }
                </script>
                <div id="result1_dp" style="display: none;">
                    <?php
                    $res1_choice = mysqli_query($db, "select choice from dp_select where boardnum = 6");
                    $row1_choice = mysqli_fetch_row($res1_choice);
                    $res1_red_num = mysqli_query($db, "select * from dp_select where boardnum = 6 and choice = 'red'");
                    $res1_blue_num = mysqli_query($db, "select * from dp_select where boardnum = 6 and choice = 'blue'");
                    $red1_num = mysqli_num_rows($res1_red_num);
                    $blue1_num = mysqli_num_rows($res1_blue_num);

                    $sum1 = $red1_num + $blue1_num;
                    $red1_per = round($red1_num / $sum1 * 100, 1);
                    $blue1_per = round($blue1_num / $sum1 * 100, 1);
                    $blue1_per = 100 - $blue1_per;
                    
                    if ($red1_num >= $blue1_num) { ?>
                        <h4> 대한민국 근본 예능은? </h4>
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
                        <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                            <strong><span class="result_choice_red" style="color: crimson;">무한도전 <?php echo $red1_num; ?> </span></strong> 
                            <strong><span class="opinion" id="reply1_button" type="button" style="text-align: center;">의견</span></strong>
                            <strong><span class="result_choice_blue" style="color: deepskyblue;">1박2일 <?php echo $blue1_num; ?></span></strong>
                        </div>
                    <?php } 
                    elseif ($blue1_num >= $red1_num) { ?>
                        <h4> 대한민국 근본 예능은? </h4>
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
                        <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                            <strong><span class="result_choice_red" style="color: crimson;">무한도전 <?php echo $red1_num; ?></span></strong> 
                            <strong><span class="opinion" id="reply1_button" type="button" style="text-align: center;">의견</span></strong>
                            <strong><span class="result_choice_blue" style="color: deepskyblue;"> 1박2일 <?php echo $blue1_num; ?> </span></strong>
                        </div>
                    <?php } ?>
                </div>

                <div class="boardnum_reply" id="reply1_screen" style="display: none;" >
                    <fieldset id="reply1" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply_iframe">
                            <input type="hidden" name="reply_boardnum" value="6">
                            <input type="hidden" name="reply_choice" value="<?php echo $row1_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reply_boardnum" value="6">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply1_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <div class="reply1_background">
                            <span>비회원은 의견을 남길 수 없습니다.</span></br>
                            <span>의견을 선택하고 남기기 위해서는 로그인을 해주십시오.</span></br>
                            <a href="http://www.whatthinkkr.com/login_view.php">로그인 하러 가기</a>
                        </div>            
                        <iframe name="reply_iframe" style="display: none;"></iframe>
                        <div id="replys">
                            <div id="6">
                            <?php // 댓글 본문
                                $sql1_reply = "SELECT * FROM reply WHERE reply_boardnum = '6' ORDER BY reply.reply_no DESC LIMIT 100";
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
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row1_reply['reply_contents'])); ?>
                                        </div>
                                        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                            <span class="reply_agree">인정 <?php echo $row1_reply['reply_like']; ?></span>
                                            <span class="reply_not_agree" ><?php echo $row1_reply['reply_unlike']; ?> 노인정</span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    .reply1_background {
                        background-color: #9C9393;
                        height: 80px;
                        border: 1px solid #9C9393;
                        text-align: center;
                    }
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


                <div class="dpt" style="padding-top: 80px;">
                    <div id="dp2">
                        <h4> 탕수육은 찍먹인가 부먹인가? </h4>
                        <div class="ngraph">
                            <div style="display: flex; justify-content: space-between; height: 50px; line-height: 50px;">
                                <span class="result_choice">찍먹</span>
                                <span class="result_vote" id="result2_vote">결과보기</span>
                                <span class="result_choice">부먹</span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        if (document.getElementById("result2_vote").click) {
                            document.getElementById("result2_vote").addEventListener('click', function() {
                            document.getElementById("dp2").style.display = "none"; 
                            document.getElementById("result2_dp").style.display = "inline";
                            })
                        }
                    </script>
                    <div id="result2_dp" style="display: none; padding-top: 80px;">
                        <?php
                        $res2_choice = mysqli_query($db, "select choice from dp_select where boardnum = 7");
                        $row2_choice = mysqli_fetch_row($res2_choice);
                        $res2_red_num = mysqli_query($db, "select * from dp_select where boardnum = 7 and choice = 'red'");
                        $res2_blue_num = mysqli_query($db, "select * from dp_select where boardnum = 7 and choice = 'blue'");
                        $red2_num = mysqli_num_rows($res2_red_num);
                        $blue2_num = mysqli_num_rows($res2_blue_num);

                        $sum2 = $red2_num + $blue2_num;
                        $red2_per = round($red2_num / $sum2 * 100, 1);
                        $blue2_per = round($blue2_num / $sum2 * 100, 1);
                        $blue2_per = 100 - $blue2_per;
                        
                        if ($red2_num >= $blue2_num) { ?>
                            <h4> 탕수육은 찍먹인가 부먹인가? </h4>
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
                            <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                <strong><span class="result_choice_red" style="color: crimson;">찍먹 <?php echo $red2_num; ?> </span></strong> 
                                <strong><span class="opinion" id="reply2_button" type="button" style="text-align: center;">의견</span></strong>
                                <strong><span class="result_choice_blue" style="color: deepskyblue;">부먹 <?php echo $blue2_num; ?></span></strong>
                            </div>
                        <?php } 
                        elseif ($blue2_num >= $red2_num) { ?>
                            <h4> 탕수육은 찍먹인가 부먹인가? </h4>
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
                            <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                <strong><span class="result_choice_red" style="color: crimson;">찍먹 <?php echo $red2_num; ?></span></strong> 
                                <strong><span class="opinion" id="reply2_button" type="button" style="text-align: center;">의견</span></strong>
                                <strong><span class="result_choice_blue" style="color: deepskyblue;"> 부먹 <?php echo $blue2_num; ?> </span></strong>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="boardnum_reply" id="reply2_screen" style="display: none;" >
                    <fieldset id="reply2" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply_iframe">
                            <input type="hidden" name="reply_boardnum" value="7">
                            <input type="hidden" name="reply_choice" value="<?php echo $row2_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reply_boardnum" value="7">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply2_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <div class="reply2_background">
                            <span>비회원은 의견을 남길 수 없습니다.</span></br>
                            <span>의견을 선택하고 남기기 위해서는 로그인을 해주십시오.</span></br>
                            <a href="http://www.whatthinkkr.com/login_view.php">로그인 하러 가기</a>
                        </div>            
                        <iframe name="reply_iframe" style="display: none;"></iframe>
                        <div id="replys">
                            <div id="rep7">
                            <?php // 댓글 본문
                                $sql2_reply = "SELECT * FROM reply WHERE reply_boardnum = '7' ORDER BY reply.reply_no DESC LIMIT 100";
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
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row2_reply['reply_contents'])); ?>
                                        </div>
                                        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                            <span class="reply_agree">인정 <?php echo $row2_reply['reply_like']; ?></span>
                                            <span class="reply_not_agree" ><?php echo $row2_reply['reply_unlike']; ?> 노인정</span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    .reply2_background {
                        background-color: #9C9393;
                        height: 80px;
                        border: 1px solid #9C9393;
                        text-align: center;
                    }
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
                 
                <div class="dpt" style="padding-top: 80px;">
                    <div id="dp3">
                        <h4> 이성친구간 친구는 가능한가? </h4>
                        <div class="ngraph">
                            <div style="display: flex; justify-content: space-between; height: 50px; line-height: 50px;">
                                <span class="result_choice">가능하다</span>
                                <span class="result_vote" id="result3_vote">결과보기</span>
                                <span class="result_choice">불가능하다</span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        if (document.getElementById("result3_vote").click) {
                            document.getElementById("result3_vote").addEventListener('click', function() {
                            document.getElementById("dp3").style.display = "none"; 
                            document.getElementById("result3_dp").style.display = "inline";
                            })
                        }
                    </script>
                    <div id="result3_dp" style="display: none; padding-top: 80px;">
                        <?php
                        $res3_choice = mysqli_query($db, "select choice from dp_select where boardnum = 8");
                        $row3_choice = mysqli_fetch_row($res3_choice);
                        $res3_red_num = mysqli_query($db, "select * from dp_select where boardnum = 8 and choice = 'red'");
                        $res3_blue_num = mysqli_query($db, "select * from dp_select where boardnum = 8 and choice = 'blue'");
                        $red3_num = mysqli_num_rows($res3_red_num);
                        $blue3_num = mysqli_num_rows($res3_blue_num);

                        $sum3 = $red3_num + $blue3_num;
                        $red3_per = round($red3_num / $sum3 * 100, 1);
                        $blue3_per = round($blue3_num / $sum3 * 100, 1);
                        $blue3_per = 100 - $blue3_per;
                        
                        if ($red3_num >= $blue3_num) { ?>
                            <h4> 이성친구간 친구는 가능한가? </h4>
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
                            <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                <strong><span class="result_choice_red" style="color: crimson;">가능하다<?php echo $red3_num; ?> </span></strong> 
                                <strong><span class="opinion" id="reply3_button" type="button" style="text-align: center;">의견</span></strong>
                                <strong><span class="result_choice_blue" style="color: deepskyblue;">불가능하다 <?php echo $blue3_num; ?></span></strong>
                            </div>
                        <?php } 
                        elseif ($blue3_num >= $red3_num) { ?>
                            <h4> 이성친구간 친구는 가능한가? </h4>
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
                            <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                <strong><span class="result_choice_red" style="color: crimson;">가능하다 <?php echo $red3_num; ?></span></strong> 
                                <strong><span class="opinion" id="reply3_button" type="button" style="text-align: center;">의견</span></strong>
                                <strong><span class="result_choice_blue" style="color: deepskyblue;"> 불가능하다 <?php echo $blue3_num; ?> </span></strong>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="boardnum_reply" id="reply3_screen" style="display: none;" >
                    <fieldset id="reply3" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply_iframe">
                            <input type="hidden" name="reply_boardnum" value="8">
                            <input type="hidden" name="reply_choice" value="<?php echo $row3_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reply_boardnum" value="8">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply3_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <div class="reply3_background">
                            <span>비회원은 의견을 남길 수 없습니다.</span></br>
                            <span>의견을 선택하고 남기기 위해서는 로그인을 해주십시오.</span></br>
                            <a href="http://www.whatthinkkr.com/login_view.php">로그인 하러 가기</a>
                        </div>            
                        <iframe name="reply_iframe" style="display: none;"></iframe>
                        <div id="replys">
                            <div id="rep8">
                            <?php // 댓글 본문
                                $sql3_reply = "SELECT * FROM reply WHERE reply_boardnum = '8' ORDER BY reply.reply_no DESC LIMIT 100";
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
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row3_reply['reply_contents'])); ?>
                                        </div>
                                        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                            <span class="reply_agree">인정 <?php echo $row3_reply['reply_like']; ?></span>
                                            <span class="reply_not_agree" ><?php echo $row3_reply['reply_unlike']; ?> 노인정</span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    .reply3_background {
                        background-color: #9C9393;
                        height: 80px;
                        border: 1px solid #9C9393;
                        text-align: center;
                    }
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
                
                <div class="dpt" style="padding-top: 80px;">
                    <div id="dp4">
                        <h4> 붕어빵을 먹을 때 머리부터? 꼬리부터? </h4>
                        <div class="ngraph">
                            <div style="display: flex; justify-content: space-between; height: 50px; line-height: 50px;">
                                <span class="result_choice">머리</span>
                                <span class="result_vote" id="result4_vote">결과보기</span>
                                <span class="result_choice">꼬리</span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        if (document.getElementById("result4_vote").click) {
                            document.getElementById("result4_vote").addEventListener('click', function() {
                            document.getElementById("dp4").style.display = "none"; 
                            document.getElementById("result4_dp").style.display = "inline";
                            })
                        }
                    </script>
                    <div id="result4_dp" style="display: none; padding-top: 80px;">
                        <?php
                        $res4_choice = mysqli_query($db, "select choice from dp_select where boardnum = 9");
                        $row4_choice = mysqli_fetch_row($res4_choice);
                        $res4_red_num = mysqli_query($db, "select * from dp_select where boardnum = 9 and choice = 'red'");
                        $res4_blue_num = mysqli_query($db, "select * from dp_select where boardnum = 9 and choice = 'blue'");
                        $red4_num = mysqli_num_rows($res4_red_num);
                        $blue4_num = mysqli_num_rows($res4_blue_num);

                        $sum4 = $red4_num + $blue4_num;
                        $red4_per = round($red4_num / $sum4 * 100, 1);
                        $blue4_per = round($blue4_num / $sum4 * 100, 1);
                        $blue4_per = 100 - $blue4_per;
                        
                        if ($red4_num >= $blue4_num) { ?>
                            <h4> 붕어빵을 먹을 때 머리부터? 꼬리부터? </h4>
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
                            <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                <strong><span class="result_choice_red" style="color: crimson;">머리 <?php echo $red4_num; ?> </span></strong> 
                                <strong><span class="opinion" id="reply4_button" type="button" style="text-align: center;">의견</span></strong>
                                <strong><span class="result_choice_blue" style="color: deepskyblue;">꼬리 <?php echo $blue4_num; ?></span></strong>
                            </div>
                        <?php } 
                        elseif ($blue4_num >= $red4_num) { ?>
                            <h4> 붕어빵을 먹을 때 머리부터? 꼬리부터? </h4>
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
                            <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                <strong><span class="change_left" type="submit" name="changetored">머리 <?php echo $red4_num; ?></span></strong> 
                                <strong><span class="opinion" id="reply4_button" type="button" style="text-align: center;">의견</span></strong>
                                <strong><span class="result_choice_blue" style="color: deepskyblue;"> 꼬리 <?php echo $blue4_num; ?> </span></strong>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="boardnum_reply" id="reply4_screen" style="display: none;" >
                    <fieldset id="reply4" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply_iframe">
                            <input type="hidden" name="reply_boardnum" value="9">
                            <input type="hidden" name="reply_choice" value="<?php echo $row4_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reply_boardnum" value="9">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply4_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <div class="reply4_background">
                            <span>비회원은 의견을 남길 수 없습니다.</span></br>
                            <span>의견을 선택하고 남기기 위해서는 로그인을 해주십시오.</span></br>
                            <a href="http://www.whatthinkkr.com/login_view.php">로그인 하러 가기</a>
                        </div>            
                        <iframe name="reply_iframe" style="display: none;"></iframe>
                        <div id="replys">
                            <div id="9">
                            <?php // 댓글 본문
                                $sql4_reply = "SELECT * FROM reply WHERE reply_boardnum = '9' ORDER BY reply.reply_no DESC LIMIT 100";
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
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row4_reply['reply_contents'])); ?>
                                        </div>
                                        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                            <span class="reply_agree">인정 <?php echo $row4_reply['reply_like']; ?></span>
                                            <span class="reply_not_agree" ><?php echo $row4_reply['reply_unlike']; ?> 노인정</span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    .reply4_background {
                        background-color: #9C9393;
                        height: 80px;
                        border: 1px solid #9C9393;
                        text-align: center;
                    }
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

                <div class="dpt" style="padding-top: 80px;">
                    <div id="dp5">
                        <h4> 더 최악인 이별은? </h4>
                        <div class="ngraph">
                            <div style="display: flex; justify-content: space-between; height: 50px; line-height: 50px;">
                                <span class="result_choice" >환승이별</span>
                                <span class="result_vote" id="result5_vote">결과보기</span>
                                <span class="result_choice">잠수이별</span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        if (document.getElementById("result5_vote").click) {
                            document.getElementById("result5_vote").addEventListener('click', function() {
                            document.getElementById("dp5").style.display = "none"; 
                            document.getElementById("result5_dp").style.display = "inline";
                            })
                        }
                    </script>


                    <div id="result5_dp" style="display: none; padding-top: 80px;">
                        <?php
                        $res5_choice = mysqli_query($db, "select choice from dp_select where boardnum = 10");
                        $row5_choice = mysqli_fetch_row($res5_choice);
                        $res5_red_num = mysqli_query($db, "select * from dp_select where boardnum = 10 and choice = 'red'");
                        $res5_blue_num = mysqli_query($db, "select * from dp_select where boardnum = 10 and choice = 'blue'");
                        $red5_num = mysqli_num_rows($res5_red_num);
                        $blue5_num = mysqli_num_rows($res5_blue_num);

                        $sum5 = $red5_num + $blue5_num;
                        $red5_per = round($red5_num / $sum5 * 100, 1);
                        $blue5_per = round($blue5_num / $sum5 * 100, 1);
                        $blue5_per = 100 - $blue5_per;
                        
                        if ($red5_num >= $blue5_num) { ?>
                            <h4> 더 최악인 이별은? </h4>
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
                            <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                <strong><span class="result_choice_red" style="color: crimson;">환승이별 <?php echo $red5_num; ?> </span></strong> 
                                <strong><span class="opinion" id="reply5_button" type="button" style="text-align: center;">의견</span></strong>
                                <strong><span class="result_choice_blue" style="color: deepskyblue;">잠수이별 <?php echo $blue5_num; ?></span></strong>
                            </div>
                        <?php } 
                        elseif ($blue5_num >= $red5_num) { ?>
                            <h4> 더 최악인 이별은? </h4>
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
                            <div style="display: flex; justify-content: space-between; padding-top: 10px;">
                                <strong><span class="result_choice_red" style="color: crimson;">환승이별 <?php echo $red5_num; ?></span></strong> 
                                <strong><span class="opinion" id="reply5_button" type="button" style="text-align: center;">의견</span></strong>
                                <strong><span class="result_choice_blue" style="color: deepskyblue;"> 잠수이별 <?php echo $blue5_num; ?> </span></strong>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="boardnum_reply" id="reply5_screen" style="display: none;" >
                    <fieldset id="reply5" class="reply" style="overflow: auto;">
                        <form action="reply_menu.php" method="post" target="reply_iframe">
                            <input type="hidden" name="reply_boardnum" value="10">
                            <input type="hidden" name="reply_choice" value="<?php echo $row5_choice[0]; ?>">
                            <div class="reply_menu">
                                <input type="hidden" name="reply_boardnum" value="10">
                                <input class="reply_menu_button" type="submit" name="reply_sup" value="지지순"></input>
                                <input class="reply_menu_button" type="submit" name="reply_new" value="최신순"></input>
                                <input class="reply_menu_button" id="reply5_close" type="button" value="닫기"></input>
                            </div>
                        </form>
                        <div class="reply5_background">
                            <span>비회원은 의견을 남길 수 없습니다.</span></br>
                            <span>의견을 선택하고 남기기 위해서는 로그인을 해주십시오.</span></br>
                            <a href="http://www.whatthinkkr.com/login_view.php">로그인 하러 가기</a>
                        </div>            
                        <iframe name="reply_iframe" style="display: none;"></iframe>
                        <div id="replys">
                            <div id="rep10">
                            <?php // 댓글 본문
                                $sql5_reply = "SELECT * FROM reply WHERE reply_boardnum = '10' ORDER BY reply.reply_no DESC LIMIT 100";
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
                                        <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                                            <?php // 댓글내용 & 인정, 비인정 기능
                                            echo nl2br(str_replace("<", "&lt", $row5_reply['reply_contents'])); ?>
                                        </div>
                                        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                                            <span class="reply_agree">인정 <?php echo $row5_reply['reply_like']; ?></span>
                                            <span class="reply_not_agree" ><?php echo $row5_reply['reply_unlike']; ?> 노인정</span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <style>
                    .reply5_background {
                        background-color: #9C9393;
                        height: 80px;
                        border: 1px solid #9C9393;
                        text-align: center;
                    }
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
            </div>
        </section>
        <div class="page">
            <ul class="pagination modal">
                <li><a href="http://www.whatthinkkr.com/whatthink.php" class="first">처음페이지</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink.php" class="arrow left"><<</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink.php" class="num">1</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink2.php" class="active num">2</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink3.php" class="num">3</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink4.php" class="num">4</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink5.php" class="num">5</a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink5.php" class="arrow right">>></a></li>
                <li><a href="http://www.whatthinkkr.com/whatthink5.php" class="last">마지막페이지</a></li>
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