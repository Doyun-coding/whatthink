<div id="send">
<?php 

include('db.php');
session_start();
header("Content-Type: text/html; charset=UTF-8");

$user_nick = $_SESSION['mb_nick'];
$reply_boardnum = $_POST['reply_boardnum'];
$reply_contents = $_POST['reply_contents'];
$reply_choice = $_POST['reply_choice'];
$rep = $_POST['reps'];

$reply_contents = addslashes($reply_contents);

$starttime = time();

$sql = "SELECT MAX(reply_no) AS reply_no FROM reply WHERE reply_boardnum = '$reply_boardnum'";
$res = mysqli_query($db, $sql);
$row = mysqli_fetch_array($res);

$reply_no = ($row['reply_no']+1);

$sql2 = "insert into reply(reply_boardnum, reply_no, user_nick, reply_contents, starttime, reply_like, reply_unlike, reply_choice) 
values('$reply_boardnum', '$reply_no', '$user_nick','$reply_contents', '$starttime', '0', '0', '$reply_choice')";
$res2 = mysqli_query($db, $sql2);

$sql3 = "SELECT * from reply WHERE reply_boardnum = '$reply_boardnum' and reply_no ='$reply_no' and 
user_nick = '$user_nick' and reply_contents = '$reply_contents' and starttime = '$starttime'";
$res3 = mysqli_query($db, $sql3);
$row3 = mysqli_fetch_array($res3);


?>
<div style="height: auto; border: 1px solid #9C9393; overflow: auto;
<?php if($row3['reply_choice'] == "red") { ?> background-color: #EBBFBB; <?php } 
elseif ($row3['reply_choice'] == "blue") { ?> background-color: #AED4E8 <?php } else { ?>
background-color: #9C9393; <?php }?>">
    <div style="padding-top: 6px; padding-right: 6px; padding-left: 6px; font-size:13px;">
        <strong><span><?php echo $row3['user_nick']; ?></span></strong>
        <span style="float: right;"><?php echo date('y/m/d', $row3['starttime']); ?></span> 
    </div>
    <?php // 댓글 삭제 수정
    if($_SESSION['mb_nick'] == $row3['user_nick']) { ?>
        <form action="re_reply.php" method="post" target="re_reply_iframe">
            <input type="hidden" name="reps" value="<?php echo $rep; ?>">
            <input type="hidden" name="reply_boardnum" value="<?php echo $reply_boardnum; ?>">
            <input type="hidden" name="reply_no" value="<?php echo $row1_reply['reply_no']; ?>">
            <!-- <input class="reply_modi" type="submit" name="reply_modify" value="수정"></input> -->
            <input class="reply_del" type="submit" name="reply_delete" value="삭제"></input>
        </form>
                                            
        <iframe name="re_reply_iframe" style="display: none;"></iframe>
    <?php } ?>
    <div style="padding-top: 6px; padding-left: 16px; padding-right: 16px; font-size: 14px;">
        <?php
        echo nl2br(str_replace("<", "&lt", $row3['reply_contents'])); ?>
    </div>

    <form action="reply_like.php" method="post" target="like_iframe">
        <div style="padding-top: 2px; padding-right: 6px; paddding-left: 1px; padding-bottom: 6px;">
            <input type="hidden" name="reps" value="rep1">
            <input type="hidden" name="reply_boardnum" value="1">
            <input type="hidden" name="reply_no" value="<?php echo $row1_reply['reply_no']; ?>">
            <input class="reply_agree" style="font-size: 12px;" type="submit" name="reply_like" value="인정 <?php echo $row1_reply['reply_like']; ?>"></input>
            <input class="reply_not_agree" style="font-size: 12px;" type="submit" name="reply_unlike" value="<?php echo $row1_reply['reply_unlike']; ?> 노인정"></input>
        </div>
    </form>
    
</div>

</div>
<script>
parent.document.getElementById("<?php echo $reply_boardnum; ?>").innerHTML = document.getElementById("send").innerHTML + parent.document.getElementById("<?php echo $reply_boardnum; ?>").innerHTML;
alert("의견이 작성되었습니다.");
parent.location.reload();
</script>