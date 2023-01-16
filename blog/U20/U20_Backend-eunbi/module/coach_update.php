<?php

    if(
        !isset($_POST["coach_name"]) ||
        !isset($_POST["coach_contry"]) ||
        !isset($_POST["coach_division"]) ||
        !isset($_POST["coach_region"]) ||
        !isset($_POST["coach_gender"]) ||
        !isset($_POST["coach_birth_year"]) ||
        !isset($_POST["coach_birth_month"]) ||
        !isset($_POST["coach_birth_day"]) ||
        !isset($_POST["coach_age"]) ||
        !isset($_POST["coach_duty"]) ||
        !isset($_POST["coach_sports"])
    ) {
        echo "<script>alert('기입하지 않은 정보가 있습니다.');window.close();</script>";
        exit;
    }
    require_once "../database/dbconnect.php"; //B:데이터베이스 연결
    require_once "./imgUpload.php"; //B:데이터베이스 연결
    require_once "./dictionary.php"; //B:서치 select 태크 사용하기 위한 자료구조

    $coach_id=$_POST["coach_id"];
    $coach_name=trim($_POST["coach_name"]);
    $coach_contry=trim($_POST["coach_contry"]);
    $coach_region=trim($_POST["coach_region"]);
    $coach_division=trim($_POST["coach_division"]);
    $coach_duty=trim($_POST["coach_duty"]);
    $coach_gender=trim($_POST["coach_gender"]);
    $coach_birth=trim($birth_day);
    $coach_age=trim($_POST["coach_age"]);
    $coach_sports_id=trim($sports_id);

    if($_POST["coach_birth_month"] >12 || $_POST["coach_birth_month"]<0){
        echo "<script>alert('생일 항목을 입력을 잘못 입력하셨습니다.');window.close();</script>";
        exit;
    } 
    if($month_dic[$_POST["coach_birth_month"]] < $_POST["coach_birth_day"]){
        echo "<script>alert('생일 항목을 입력을 잘못 입력하셨습니다.');window.close();</script>";
        exit;
    } 


    $sports_id="[".implode( ',', $_POST["coach_sports"] )."]";
    $birth_day=$_POST["coach_birth_year"]."-".$_POST["coach_birth_month"]."-".$_POST["coach_birth_day"];
    $profile=$_POST["coach_name"].$birth_day."_profile";
   
    
    if($_FILES['coach_imgFile']["size"] ==0){

        $sql = "UPDATE list_coach SET 
        coach_name=?,
        coach_country_id=?,
        coach_region=?,
        coach_division=?,
        coach_duty=?,
        coach_gender=?,
        coach_birth=?,
        coach_age=?,
        coach_sports_id=?
        WHERE coach_id=?";
        $stmt= $db->prepare($sql);        
        
        $stmt->bind_param("ssssssssss", 
                    $coach_name,
                    $coach_contry,
                    $coach_region,
                    $coach_division,
                    $coach_duty,
                    $coach_gender,
                    $coach_birth,
                    $coach_age,
                    $coach_sports_id,
                    $coach_id
        );
        $stmt->execute();
    }
    else{ //이미지를 수정했을 경우

        $coach_profile=str_replace(' ','', $coach_profile);
        $coach_profile=Img_Upload($_FILES['coach_imgFile'],"coach_img",$profile);

        $sql = "UPDATE list_coach SET 
        coach_name=?,
        coach_country_id=?,
        coach_region=?,
        coach_division=?,
        coach_duty=?,
        coach_gender=?,
        coach_birth=?,
        coach_age=?,
        coach_sports_id=?,
        coach_profile=?
        WHERE coach_id=?";
        $stmt= $db->prepare($sql);        
        $stmt->bind_param("sssssssssss", 
                    $coach_name,
                    $coach_contry,
                    $coach_region,
                    $coach_division,
                    $coach_duty,
                    $coach_gender,
                    $coach_birth,
                    $coach_age,
                    $coach_sports_id,
                    $coach_profile,
                    $coach_id
        );
        $stmt->execute();
    }
    

    
    echo "<script>alert('수정되었습니다.');window.close();</script>";
?>

