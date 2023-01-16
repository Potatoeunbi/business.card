<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <script src="../fontawesome/js/all.min.js"></script>
    <title>U20</title>
    <?php
        include_once "../database/dbconnect.php"; //B:데이터베이스 연결
        include_once "../module/dictionary.php"; //B:서치 select 태크 사용하기 위한 자료구조
        if(!isset($_GET["id"])) {
            echo "<script>alert('잘못된 유입경로입니다.')</script>";
            exit();
        }
        $sql = "SELECT 
                    coach_id,
                    coach_name,
                    coach_country_id,
                    coach_region,
                    coach_division,
                    coach_duty,
                    coach_gender,
                    coach_birth,
                    coach_age,
                    SUBSTRING(coach_sports_id,2,(LENGTH(coach_sports_id))-2) coach_sports_id,
                    coach_profile,
                    country_name_kr
                FROM list_coach
                INNER JOIN list_country  
                ON coach_country_id=country_id 
                where coach_id=".$_GET["id"];        
        $result=$db->query($sql); 
        $row = mysqli_fetch_array($result);
    ?>
</head>
<body cz-shortcut-listen="true">
<!-- 주석 제거 버전 -->
    <div class="container">
        <!-- <div class="contents something"> -->
        <div class="something ptop--40">
            <div class="judge_info">
                <h3>코치 정보</h3>
                <hr />
                <div class="row">
                    <div class="text-center">
                        <img src=<?php echo "../img/coach_img/".$row["coach_profile"] ?> class="image_resize" alt="avatar" />
                    </div>
                    <!-- <div class="judge_info_box">
                        <span>번호</span>
                        <span><?php //echo htmlspecialchars($row->coach_id) ?></span>
                    </div> -->
                    <div class="judge_info_box">
                        <span>이름</span>
                        <span><?php echo htmlspecialchars($row["coach_name"]) ?></span>
                    </div>
                    <div class="judge_info_box">
                        <span>국가</span>
                        <span><?php echo htmlspecialchars($row["country_name_kr"]) ?></span>
                    </div>
                    <div class="judge_info_box">
                        <span>지역</span>
                        <span><?php echo htmlspecialchars($row["coach_region"]) ?></span>
                    </div>
                    <div class="judge_info_box">
                        <span>소속</span>
                        <span><?php echo htmlspecialchars($row["coach_name"]) ?></span>
                    </div>
                    <div class="judge_info_box">
                        <span>성별</span>
                        <span><?php  echo htmlspecialchars($row["coach_gender"]=="m" ? "남" : "여") ?></span>
                    </div>
                    <div class="judge_info_box">
                        <span>생년월일</span>
                        <span>
                            <?php 
                                $date = explode('-', $row["coach_birth"]);
                                echo htmlspecialchars($date[0])."년 ".htmlspecialchars($date[1])."월 ".htmlspecialchars($date[2])."일";
                            ?>
                        </span>
                    </div>
                    <div class="judge_info_box">
                        <span>나이</span>
                        <span><?php echo htmlspecialchars($row["coach_age"])?></span>
                    </div>
                    <div class="judge_info_box">
                        <span>직무</span>
                        <span><?php echo htmlspecialchars($row["coach_duty"]=="h" ? "헤드 코치" : "서브 코치")?></span>
                    </div>
                    <div class="judge_info_box">
                        <span>참가경기</span>
                        <span>
                            <?php            
                                $sports_id=explode(',' ,$row["coach_sports_id"]);
                                foreach($sports_id as $id)
                                    echo htmlspecialchars($sport_dic[$id]).' ';
                            ?>
                        </span>
                    </div>
                </div>

                <div class="btn_base base_mar col_right" style="padding-top: 50px">
                    <button class="btn_add" onclick=<?php echo "updatePop(".$row["coach_id"].")" ?>>
                        <span class="btn_txt bold">수정</span>
                    </button>

                </div>
                <div class="btn_base base_mar col_right pbottom--40" style="padding-top: 50px">
                    <a href="" onclick="" class="btn_add">
                        <span class="btn_txt bold">카드발급</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" language="javascript">
        function updatePop(coach_id_num){
            let form = document.createElement('form');
            form.setAttribute('method','post');
            form.setAttribute('action','url');
            let coach_id = document.createElement('input');
            coach_id.setAttribute('type','hidden');
            coach_id.setAttribute('name','coach_id');
            coach_id.setAttribute('value',coach_id_num);
            form.appendChild(coach_id);
            document.body.appendChild(form);
            // 값 집어 넣기
            var pop_title = "팝업" ;
		    window.open("", pop_title,'width=900,height=512,location=no,status=no,scrollbars=yes') ;
		    var forms = form ;
		    forms.target = pop_title ;
            forms.action = "./coach_modify.php" ;
            forms.submit() ;
            //팝업 만들기
        }
    </script>

</body>

</html>