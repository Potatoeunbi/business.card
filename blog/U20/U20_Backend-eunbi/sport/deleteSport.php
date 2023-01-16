<?php
    include "../database/dbconnect.php";
    global $db;
	
	$id = $_GET['sportsid'];
    $sql = "DELETE FROM list_sports where sports_id='".$id."';";
    $row = $db->query($sql);
    echo "<script>alert('경기가 삭제되었습니다.'); location.href='../sport.php';</script>";
    exit;
?>