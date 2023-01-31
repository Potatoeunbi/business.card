<?php

include "./DBConnect.php";


$follower=$_SESSION['num'];
$follwed=$_GET['number'];

$sql = mq("delete from followinfo where follower_id = '".$follower."' and followed_user_id = '".$follwed."'");
   
echo "<script>alert('팔로우 취소되었습니다.'); history.back();</script>";
    



?>