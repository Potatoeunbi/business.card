<?php

session_start();

include "../database/dbconnect.php";
global $db;

$code = $_POST['sportsCode'];
$name = $_POST['sportsName'];
$namekr = $_POST['sportsNameKr'];

$sql="SELECT * from list_sports where sports_code='".$code."';";
$key=$db->query($sql);

if(!mysqli_fetch_array($key)){

            $sql = " INSERT into list_sports (sports_code, sports_name, sports_name_kr)  values ('".$code."','".$name."','".$namekr."');";
            $row = $db->query($sql); 
            echo "<script>alert('경기가 생성되었습니다.'); location.href='../sport.php';</script>";
            exit;
        
}else{
    echo "<script>alert('해당 국가는 이미 존재합니다.'); history.back();</script>";
}
?>