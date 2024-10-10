<div id="send">
<?php 

include('db.php');
session_start();

$pre_page = $_SERVER['HTTP_REFERER'];

$board_page = $_POST['board_page'];

if (isset($_SESSION['mb_nick'])) {
    $user_nick = $_SESSION['mb_nick'];

    if (isset($_POST['dp_red'])) {
        $boardnum = $_POST['boardnum'];
        $choice = "red";
        $sql = "insert into dp_select(boardnum, user_nick, choice) VALUES ('$boardnum', '$user_nick', '$choice')";
        $res = mysqli_query($db, $sql);
        
    } 
    else if (isset($_POST['dp_blue'])) {
        $boardnum = $_POST['boardnum'];
        $choice = "blue";
        $sql = "insert into dp_select(boardnum, user_nick, choice) VALUES ('$boardnum', '$user_nick', '$choice')";
        $res = mysqli_query($db, $sql);
    } 
    else {
        header("location:".$pre_page);
        exit();
    }
}
?>
</div>
<script>
parent.location.reload();
</script>