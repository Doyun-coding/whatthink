<div id="send">
<?php 

include('db.php');
session_start();

$pre_page = $_SERVER['HTTP_REFERER'];

$user_nick = $_SESSION['mb_nick'];
$reply_boardnum = $_POST['reply_boardnum'];
$reply_no = $_POST['reply_no'];
$rep = $_POST['reps'];

$sql_reply_like = "SELECT reply_like FROM reply WHERE reply_boardnum = '$reply_boardnum' and reply_no = '$reply_no'";
$res_reply_like = mysqli_query($db, $sql_reply_like);

$sql_reply_unlike = "SELECT reply_unlike FROM reply WHERE reply_boardnum = '$reply_boardnum' and reply_no = '$reply_no'";
$res_reply_unlike = mysqli_query($db, $sql_reply_unlike);

$row_reply_like = mysqli_fetch_array($res_reply_like);
$row_reply_unlike = mysqli_fetch_array($res_reply_unlike);

$new_reply_like = ($row_reply_like['reply_like'] + 1);
$new_reply_unlike = ($row_reply_unlike['reply_unlike'] + 1);

if(isset($_POST['reply_delete'])) { ?>
    <script>    
        alert("의견이 삭제되었습니다!");
    </script>
    <?php
    $sql_del = "DELETE FROM reply WHERE user_nick = '$user_nick' and reply_boardnum = '$reply_boardnum' and reply_no = '$reply_no'";
    $res_del = mysqli_query($db, $sql_del); ?>

    <script>
        parent.parent.document.getElementById("<?php echo $rep; ?>").style.display = 'none';
    </script>
    
    <div id="<?php echo $reply_boardnum; ?>">
        <div id="<?php echo $rep; ?>">
        <?php // 댓글 본문
            $sql1_reply = "SELECT * FROM reply WHERE reply_boardnum = '$reply_boardnum' ORDER BY reply.reply_like DESC LIMIT 100";
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
                    if($user_nick == $row1_reply['user_nick']) { ?>
                        <form action="reply_menu_server.php" method="post" target="re_reply_iframe">
                            <input type="hidden" name="reps" value="<?php echo $rep; ?>">
                            <input type="hidden" name="reply_boardnum" value="<?php echo $reply_boardnum; ?>">
                            <input type="hidden" name="reply_no" value="<?php echo $row1_reply['reply_no']; ?>">
                            <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
                            <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
                        </form>
                                                
                        <iframe name="re_reply_iframe" style="display: none;"></iframe>
                    <?php } ?>
                    <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                        <?php // 댓글내용 & 인정, 비인정 기능
                        echo nl2br(str_replace("<", "&lt", $row1_reply['reply_contents'])); ?>
                    </div>
        
                    <form action="reply_menu_sup_server.php" method="post" target="like_iframe">
                        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                            <input type="hidden" name="reps" value="<?php echo $rep; ?>">
                            <input type="hidden" name="reply_boardnum" value="<?php echo $reply_boardnum; ?>">
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
<?php }
elseif(isset($_POST['reply_like'])) {
    $like_count = "UPDATE reply SET reply_like = '$new_reply_like' WHERE reply_boardnum = '$reply_boardnum' and reply_no = '$reply_no'";
    $res_like_count = mysqli_query($db, $like_count); ?>

    <script>
        parent.parent.document.getElementById("<?php echo $rep; ?>").style.display = 'none';
    </script>
    
    <div id="<?php echo $reply_boardnum; ?>">
        <div id="<?php echo $rep; ?>">
        <?php // 댓글 본문
            $sql1_reply = "SELECT * FROM reply WHERE reply_boardnum = '$reply_boardnum' ORDER BY reply.reply_like DESC LIMIT 100";
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
                    if($user_nick == $row1_reply['user_nick']) { ?>
                        <form action="reply_menu_server.php" method="post" target="re_reply_iframe">
                            <input type="hidden" name="reps" value="<?php echo $rep; ?>">
                            <input type="hidden" name="reply_boardnum" value="<?php echo $reply_boardnum; ?>">
                            <input type="hidden" name="reply_no" value="<?php echo $row1_reply['reply_no']; ?>">
                            <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
                            <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
                        </form>
                                                
                        <iframe name="re_reply_iframe" style="display: none;"></iframe>
                    <?php } ?>
                    <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                        <?php // 댓글내용 & 인정, 비인정 기능
                        echo nl2br(str_replace("<", "&lt", $row1_reply['reply_contents'])); ?>
                    </div>
        
                    <form action="reply_menu_sup_server.php" method="post" target="like_iframe">
                        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                            <input type="hidden" name="reps" value="<?php echo $rep; ?>">
                            <input type="hidden" name="reply_boardnum" value="<?php echo $reply_boardnum; ?>">
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
<?php
}
elseif(isset($_POST['reply_unlike'])) {
    $unlike_count = "UPDATE reply SET reply_unlike = '$new_reply_unlike' WHERE reply_boardnum = '$reply_boardnum' and reply_no = '$reply_no'";
    $res_unlike_count = mysqli_query($db, $unlike_count); ?>
    
    <script>
        parent.parent.document.getElementById("<?php echo $rep; ?>").style.display = 'none';
    </script>
    <div id="<?php echo $reply_boardnum; ?>">
        <div id="<?php echo $rep; ?>">
        <?php // 댓글 본문
            $sql1_reply = "SELECT * FROM reply WHERE reply_boardnum = '$reply_boardnum' ORDER BY reply.reply_like DESC LIMIT 100";
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
                    if($user_nick == $row1_reply['user_nick']) { ?>
                        <form action="reply_menu_server.php" method="post" target="re_reply_iframe">
                            <input type="hidden" name="reps" value="<?php echo $rep; ?>">
                            <input type="hidden" name="reply_boardnum" value="<?php echo $reply_boardnum; ?>">
                            <input type="hidden" name="reply_no" value="<?php echo $row1_reply['reply_no']; ?>">
                            <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
                            <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
                        </form>
                                                
                        <iframe name="re_reply_iframe" style="display: none;"></iframe>
                    <?php } ?>
                    <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
                        <?php // 댓글내용 & 인정, 비인정 기능
                        echo nl2br(str_replace("<", "&lt", $row1_reply['reply_contents'])); ?>
                    </div>
        
                    <form action="reply_menu_sup_server.php" method="post" target="like_iframe">
                        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
                            <input type="hidden" name="reps" value="<?php echo $rep; ?>">
                            <input type="hidden" name="reply_boardnum" value="<?php echo $reply_boardnum; ?>">
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
<?php
}
else {
    header("location:".$pre_page);
    exit();
}
?>
</div>
<script>
parent.parent.document.getElementById("<?php echo $reply_boardnum; ?>").innerHTML = document.getElementById("send").innerHTML + parent.parent.document.getElementById("<?php echo $reply_boardnum; ?>").innerHTML;
</script>