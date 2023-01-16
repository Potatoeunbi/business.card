<!DOCTYPE html>
<html lang="ko">

<head>
    <?php
        include_once "../database/dbconnect.php";
        include_once "../module/dictionary.php";

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
                ON coach_country_id=country_id";
        $result=$db->query($sql); 
        if(isset($_GET["search"])){
            $keyword=array();
            $bindarray=array();
            $sql = "SELECT * FROM list_coach INNER JOIN list_country  ON coach_country_id=country_id";


            if($_GET["coach_country"] !="non"){
                array_push($bindarray, $_GET["coach_country"]);
                array_push($keyword, "coach_country_id=?");
            }  
            if($_GET["coach_gender"] !="non"){
                array_push($bindarray, $_GET["coach_gender"]);
                array_push($keyword, "coach_gender=?");
            }
            if($_GET["coach_duty"] != "non"){
                array_push($bindarray, $_GET["coach_duty"]);
                array_push($keyword, "coach_duty=?");
            } 
            if($_GET["coach_sports"] != "non"){
                $sql="SELECT
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
                    FROM list_coach coach
                    join JSON_TABLE(
                        coach.coach_sports_id,
                      '$[*]' columns (sports_id varchar(50) path '$')
                    ) id 
                    INNER JOIN list_country  
                    ON coach_country_id=country_id";
                array_push($bindarray,$_GET["coach_sports"]);
                array_push($keyword, "id.sports_id=?");
            }
            if($_GET["coach_search_categrory"] == "non"){
                echo "<script>alert('검색 키워드를 설정하세요.');history.back();</script>";
            }

            if($_GET["coach_search_judge"] != "" && $_GET["coach_search_categrory"] != "non"){
                array_push($bindarray, "%".$_GET["coach_search_judge"]."%");
                array_push($keyword,$_GET["coach_search_categrory"]." Like ?");
            }
            if(count($keyword)) $sql=$sql." where ";
            for($count = 0; $count<count($keyword); $count++){
                $sql = $sql.$keyword[$count].($count+1==count($keyword) ? ";":" and ");
            }
            $stmt= $db->prepare($sql);
            $types = str_repeat('s', count($bindarray)); 
            $stmt->bind_param($types, ...$bindarray); 
            $stmt->execute();
            $result = $stmt->get_result(); 
        }
        
    ?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- style.css -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <script src="../fontawesome/js/all.min.js"></script>
    <!-- Data Tables
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
        <script type="text/javascript" src="js/useDataTables.js"></script> -->
    <!-- script -->
    <script type="text/javascript" src="../js/script.js"></script>
    <title>U20</title>
</head>

<body>
    <!-- header -->
    <?php include '../header.php' ?>

    <!-- sidebar -->
    <?php include '../sidebar.php' ?>

    <!-- contents 본문 내용 -->
    <div class="container">
        <div class="contents main-table">
            <div class="country_table space">
                <div class="team_tabs-content tab">
                    <h2 class="country_h2">코치진</h2>
                    <!-- 엑셀 출력 버튼 -->
                    <div class="btn_base base_mar col_left">
                        <input type="button" onclick="" class="btn_excel bold" value="엑셀 출력">
                    </div>
                    <!-- 엑셀 입력 버튼 -->
                    <form action="" enctype="multipart/form-data">
                        <input type="file" id="upload_judge" hidden /><label for="upload_judge"
                            class="btn_excel label_for_excel_import bold float_l">엑셀
                            입력</label>
                    </form>
                    <!-- 검색 -->
                    <form action="" enctype="multipart/form-data" class="searchForm" name="judge_searchForm"
                        method="get"
                        style="display: flex; flex-wrap: wrap; align-items: center; justify-content: flex-end;">
                        <div class="selectArea float_r">
                            <div class="select_box mr10">
                                <select class="d_select" title="국가" name="coach_country" style="width: 8em;">
                                    <option value='non' selected>국가</option>
                                    <?php
                                        foreach($country_dic as $key => $value)
                                            echo "<option value=".$value.">".$key."</option>";
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="select_box mr10">
                                <select class="d_select" title="지역" style="width: 8em;">
                                    <option value="" hidden="">지역</option>
                                    <option value="1">서울</option>
                                    <option value="2">도쿄</option>
                                </select>
                            </div> -->
                            <!-- <div class="select_box mr10">
                                <select class="d_select" title="소속" style="width: 8em;">
                                    <option value="" hidden="">소속</option>
                                    <option value="1">국제코치협회</option>
                                    <option value="2">한국코치연맹</option>
                                </select>
                            </div> -->
                            <div class="select_box mr10">
                                <select class="d_select" title="성별" name="coach_gender" style="width:5em;">
                                    <option value="non">성별</option>
                                    <option value="m">남자</option>
                                    <option value="f">여자</option>
                                </select>
                            </div>
                            <div class="select_box mr10">
                                <select class="d_select" title="직무" name="coach_duty" style="width:8em;">
                                    <option value="non">직무</option>
                                    <option value="h">헤드 코치</option>
                                    <option value="s">서브 코치</option>
                                </select>
                            </div>
                            <div class="select_box mr10">
                                <select class="d_select" title="참가경기" name="coach_sports" style="width: 8em;">
                                    <option value='non' selected>참가경기</option>
                                    <option value="" disabled="">단거리달리기</option>
                                    <option value="1">100M</option>
                                    <option value="2">200M</option>
                                    <option value="3">400M</option>
                                    <option value="" disabled="">중/장거리</option>
                                    <option value="4">800M</option>
                                    <option value="5">1500M</option>
                                    <option value="6">5000M</option>
                                    <option value="7">10000M</option>
                                    <option value="8">3000M 장애물</option>
                                    <option value="" disabled="">허들달리기</option>
                                    <option value="9">110M 허들</option>
                                    <option value="10">400M 허들</option>
                                    <option value="" disabled="">점프경기</option>
                                    <option value="11">높이뛰기</option>
                                    <option value="12">장대높이뛰기</option>
                                    <option value="13">멀리뛰기</option>
                                    <option value="14">삼단뛰기</option>
                                    <option value="" disabled="">던지기</option>
                                    <option value="15">투포환</option>
                                    <option value="16">원반던지기</option>
                                    <option value="17">해머던지기</option>
                                    <option value="18">창던지기</option>
                                    <option value="" disabled="">종합</option>
                                    <option value="19">10종 경기</option>
                                    <option value="" disabled="">경보</option>
                                    <option value="20">10000M 경보</option>
                                    <option value="" disabled="">릴레이</option>
                                    <option value="21">4x100M 릴레이</option>
                                    <option value="22">4x400M 릴레이</option>
                                    <option value="23">4x400M 혼성</option>
                                </select>
                            </div>
                            <div class="select_box mr10">
                                <select class="d_select" name="coach_search_categrory" title="검색 키워드" name="category"
                                    style="width:8em;">
                                    <option value="non">검색 키워드</option>
                                    <option value="coach_name">이름</option>
                                    <option value="coach_division">소속</option>
                                    <option value="coach_region">지역</option>
                                </select>
                            </div>
                            <div class="search" style="width: 15em;">
                                <input type="text" id="search_judge" class="word" name="coach_search_judge"
                                    placeholder="검색어를 입력해주세요" maxlength="30">
                                <button name="search" value=search type="submit" class="btn_search" title="검색"></a>
                            </div>
                        </div>
                    </form>
                    <!-- 코치 테이블 -->
                    <table class="table table-hover team_table" id="coach_table">
                        <colgroup>
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                            <col width="auto">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col">번호</th>
                                <th scope="col">이름</th>
                                <th scope="col">국가</th>
                                <th scope="col">지역</th>
                                <th scope="col">소속</th>
                                <th scope="col">성별</th>
                                <th scope="col">생년월일</th>
                                <th scope="col">나이</th>
                                <th scope="col">직무</th>
                                <th scope="col">참가경기</th>
                                <th scope="col">상세보기</th>
                                <th scope="col">수정</th>
                                <th scope="col">삭제</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $num=0;
                                while($row = mysqli_fetch_array($result)){
                                    $num++;
                                    echo '<tr>';
                                    echo "<td>".$num."</td>";
                                    echo "<td>".htmlspecialchars($row["coach_name"])."</td>";
                                    echo "<td>".htmlspecialchars($row["country_name_kr"])."</td>";
                                    echo "<td>".htmlspecialchars($row["coach_region"])."</td>";
                                    echo "<td>".htmlspecialchars($row["coach_division"])."</td>";
                                    echo "<td>";
                                    echo htmlspecialchars($row["coach_gender"]=="m" ? "남" : "여");
                                    echo "</td>";

                                    $date = explode('-', $row["coach_birth"]);
                                    echo "<td>".$date[0]."년".$date[1]."월".$date[2]."일"."</td>";
                                    echo "<td>".htmlspecialchars($row["coach_age"])."</td>";
                                    echo "<td>";
                                    echo htmlspecialchars($row["coach_duty"]=="h" ? "헤드 코치" : "서브 코치");
                                    echo "</td>";
                                    echo "<td>";
                                    
                                    $sports_id=explode(',' ,$row["coach_sports_id"]);

                                    if(count($sports_id) > 1){
                                    //  foreach($sports_id as $id)
                                    //      echo htmlspecialchars($sport_dic[$id])."\n";
                                        echo htmlspecialchars($sport_dic[$sports_id[0]])." 외 ".count($sports_id)."개";
                                    }
                                    else
                                        echo htmlspecialchars($sport_dic[$sports_id[0]]);
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<input type='button' onclick="."window.open('coach_info.php?id=".$row["coach_id"]."','팝업','width=900,height=512,location=no,status=no,scrollbars=yes')"." value='보기' class='btn_view'>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<input type='button' onclick="."updatePop(".$row["coach_id"].")"." value='수정' class='btn_modify'>";
                                    echo "</td>";
                                    echo "<td scope='col'><input type='button' onclick="."coach_Delete(".$row["coach_id"].")"." value='삭제' class='btn_delete'></td>";
                                    echo '</tr>';
                                }
                            ?>
                            <script type="text/javascript" language="javascript">
                            function updatePop(coach_id_num) {
                                let form = document.createElement('form');
                                form.setAttribute('method', 'post');
                                form.setAttribute('action', 'url');
                                let coach_id = document.createElement('input');
                                coach_id.setAttribute('type', 'hidden');
                                coach_id.setAttribute('name', 'coach_id');
                                coach_id.setAttribute('value', coach_id_num);
                                form.appendChild(coach_id);
                                document.body.appendChild(form);
                                // 값 집어 넣기

                                var pop_title = "팝업";
                                window.open("", pop_title, 'width=900,height=512,location=no,status=no,scrollbars=yes');
                                var forms = form;
                                forms.target = pop_title;
                                forms.action = "coach_modify.php";
                                forms.submit();
                                //팝업 만들기
                            }

                            function coach_Delete(coach_id_num) {
                                let form = document.createElement('form');
                                form.setAttribute('method', 'post');
                                form.setAttribute('action', '');
                                let coach_id = document.createElement('input');
                                coach_id.setAttribute('type', 'hidden');
                                coach_id.setAttribute('name', 'coach_delete');
                                coach_id.setAttribute('value', coach_id_num);
                                form.appendChild(coach_id);
                                document.body.appendChild(form);
                                form.submit();
                            }
                            </script>
                            <?php
                                        if(isset($_POST["coach_delete"])){
                                            $sql = "DELETE FROM list_coach WHERE coach_id=?";
                                            $stmt= $db->prepare($sql);
                                            $stmt->bind_param("s", $_POST["coach_delete"]);
                                            $stmt->execute();
                                            echo "<script>location.href='./coach.php';</script>";
                                        }
                                    ?>
                        </tbody>
                    </table>
                </div>
                <!-- 등록 버튼 -->
                <div class="btn_base base_mar col_right">
                    <input class="btn_add btn_txt bold" type="button"
                        onclick="window.open('./coach_input.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                        value="등록" class="btn_view">
                </div>
            </div>
            <!-- 코치 페이징
                <div class="page_wrap">
                    <div class="page_nation">
                    <a class="arrow pprev" href="#"></a>
                    <a class="arrow prev" href="#"></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">7</a>
                    <a href="#">8</a>
                    <a href="#">9</a>
                    <a href="#">10</a>
                    <a class="arrow next" href="#"></a>
                    <a class="arrow nnext" href="#"></a>
                    </div>
                </div> -->
        </div>
    </div>


    <!-- footer -->
    <footer>
        <p class="footer_text">
            Copyright © 2022, 20th Asian U20 Athletics Championships
            Yecheon. All rights reserved.
        </p>
    </footer>

    <script src="../js/main.js"></script>
</body>

</html>