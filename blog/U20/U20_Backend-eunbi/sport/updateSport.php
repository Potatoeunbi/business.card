<?php

    include "../database/dbconnect.php";
    global $db;
	$id = $_GET['sportsid'];
    $code = $_POST['sportsCode'];
    $name = $_POST['sportsName'];
    $namekr = $_POST['sportsNameKr'];

    
    $sql = " UPDATE list_sports SET sports_code='".$code."', sports_name='".$name."', sports_name_kr='".$namekr."'  WHERE sports_id= '".$id."';";
    $row = $db->query($sql);
                echo "<script>alert('경기가 수정되었습니다.'); location.href='../sport.php';</script>";
                exit;
?>