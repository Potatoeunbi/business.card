<?php
    include_once "database/dbconnect.php";
    
    //include "security/security.php";
    //include_once "auth/config.php";
    
    if(!isset($_SESSION)){
        session_start();
    }
    
    global $db;


    function logInsert($db,$id,$activity,$sub_activity){

    $currentDate=date('Y-m-d H:i:s');
        
    $adminsql = " SELECT * FROM list_admin WHERE admin_account = '".$id."';";
    $adminrow = $db->query($adminsql);
    
    $judgesql = " SELECT * FROM list_judge WHERE judge_account = '".$id."';";
    $judgerow = $db->query($judgesql);

    if (($admindata = mysqli_fetch_array($adminrow))) {

        $division="a";
        $sql = "INSERT into list_log (log_account, log_name, log_ip, log_division, log_activity,log_sub_activity,log_datetime) values (?,?,?,?,?,?,?);";
        $stmt=$db->prepare($sql);
        $stmt->bind_param("sssssss",$admindata['admin_account'], $admindata['admin_name'], $admindata['admin_latest_ip'],$division,$activity,$sub_activity, $currentDate);
        $stmt->execute();
            
    }else if($judgedata = mysqli_fetch_array($judgerow)){

        $division="j";
        $sql = "INSERT into list_log (log_account, log_name, log_ip, log_division,log_activity, log_sub_activity, log_datetime) values (?,?,?,?,?,?,?);";
        $stmt=$db->prepare($sql);
        $stmt->bind_param("sssssss",$judgedata['admin_account'], $judgedata['admin_name'],$judgedata['judge_latest_ip'],$division,$activity,$sub_activity, $currentDate);
        $stmt->execute();
    
    }

    }
    

    function authCheck($db, $id, $activity,$site){

        $sql = " SELECT admin_level FROM list_admin WHERE admin_account = '".$id."';";
        $row = $db->query($sql);
        $result = mysqli_fetch_array($row);

        if(!in_array($activity,explode(',',$result['admin_level']))){
            return "javascript:alert('해당 권한이 없습니다.')";
            exit;
        }else{
            return $site;
            exit;
        }
    }


?>