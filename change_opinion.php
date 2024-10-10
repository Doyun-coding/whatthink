<div id="send">
<?php 

include('db.php');
session_start();

$pre_page = $_SERVER['HTTP_REFERER'];

if(isset($_SESSION['mb_nick'])) {
    $user_nick = $_SESSION['mb_nick'];

    if(isset($_POST['changetoblue'])) {
        $boardnum = $_POST['boardnum'];
        $choice = "blue";
        $sql = "UPDATE dp_select SET choice = '$choice' WHERE boardnum = '$boardnum' and user_nick = '$user_nick' and choice = 'red' ";
        $res = mysqli_query($db, $sql);
        
    }
    elseif(isset($_POST['changetored'])) {
        $boardnum = $_POST['boardnum'];
        $choice = "red";
        $sql = "UPDATE dp_select SET choice = '$choice' WHERE boardnum = '$boardnum' and user_nick = '$user_nick' and choice = 'blue' ";
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