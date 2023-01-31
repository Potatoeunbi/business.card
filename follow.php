<?php

include "./DBConnect.php";

echo "<script>console.log( 'PHP_Console: " .$_GET['number']. "' );</script>";

$follower=$_SESSION['num'];
$follwed=$_GET['number'];

   $sql = mq("insert into followinfo (follower_id,followed_user_id) values('".$follower."','".$follwed."')");
   
echo "<script>alert('팔로우하였습니다.'); history.back();</script>";
    



?>