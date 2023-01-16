<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- style.css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="/fontawesome/js/all.min.js"></script>
    <!-- Data Tables
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
        <script type="text/javascript" src="js/useDataTables.js"></script> -->
    <!-- script -->
    <script type="text/javascript" src="js/script.js"></script>
    <title>U20</title>
</head>

<body>
    <!-- header -->
    <?php include 'header.php' ?>

    <!-- sidebar -->
    <?php include 'sidebar.php' ?>

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
                        method="post"
                        style="display: flex; flex-wrap: wrap; align-items: center; justify-content: flex-end;">
                        <div class="selectArea float_r">
                            <div class="select_box mr10">
                                <select class="d_select" title="국가" style="width: 8em;">
                                    <option value="" hidden="">국가</option>
                                    <option value="1">한국</option>
                                    <option value="2">일본</option>
                                    <option value="3">사우디 아라비아</option>
                                    <option value="4">인도</option>
                                </select>
                            </div>
                            <div class="select_box mr10">
                                <select class="d_select" title="소속" style="width: 8em;">
                                    <option value="" hidden="">소속</option>
                                    <option value="1">국제코치협회</option>
                                    <option value="2">한국코치연맹</option>
                                </select>
                            </div>
                            <div class="select_box mr10">
                                <select class="d_select" title="성별" style="width:5em;">
                                    <option value="" hidden="">성별</option>
                                    <option value="1">남</option>
                                    <option value="2">여</option>
                                </select>
                            </div>
                            <div class="select_box mr10">
                                <select class="d_select" title="직무" style="width:8em;">
                                    <option value="" hidden="">직무</option>
                                    <option value="1">헤드 코치</option>
                                    <option value="2">서브 코치</option>
                                </select>
                            </div>
                            <div class="select_box mr10">
                                <select class="d_select" title="참가경기" style="width: 8em;">
                                    <option value="" hidden="">참가경기</option>
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
                            <div class="search" style="width: 15em;">
                                <input type="text" id="search_judge" class="word" name="search_judge"
                                    placeholder="검색어를 입력해주세요" maxlength="30">
                                <button type="submit" class="btn_search" title="검색"></a>
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
                            <col width="auto">
                            <col width="auto">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input type="checkbox" name="checkAthlete-all" id="checkAthlete-all"
                                        onclick="toggle(this)">
                                </th>
                                <th scope="col">번호</th>
                                <th scope="col">이름</th>
                                <th scope="col">국가</th>
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
                            <tr>
                                <td scope="col">
                                    <input type="checkbox" id="checkAthlete" name="checkAthlete">
                                </td>
                                <td scope="col">1</td>
                                <td scope="col">고길동</td>
                                <td scope="col">한국</td>
                                <td scope="col">팀 아누</td>
                                <td scope="col">남</td>
                                <td scope="col">1998년 11월 15일</td>
                                <td scope="col">25</td>
                                <td scope="col">헤드 코치</td>
                                <td scope="col">100m</td>
                                <td><input type="button"
                                        onclick="window.open('coach_info.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                        value="보기" class="btn_view"></td>
                                <td><input type="button"
                                        onclick="window.open('coach_modify.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                        value="수정" class="btn_modify"></td>
                                <td scope="col"><a href="#" onclick="" class="btn_delete">삭제</a></td>
                            </tr>
                            <tr>
                                <td scope="col">
                                    <input type="checkbox" id="checkAthlete" name="checkAthlete">
                                </td>
                                <td scope="col">2</td>
                                <td scope="col">고길동</td>
                                <td scope="col">한국</td>
                                <td scope="col">팀 아누</td>
                                <td scope="col">남</td>
                                <td scope="col">1998년 11월 15일</td>
                                <td scope="col">25</td>
                                <td scope="col">헤드 코치</td>
                                <td scope="col">100m</td>
                                <td><input type="button"
                                        onclick="window.open('coach_info.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                        value="보기" class="btn_view"></td>
                                <td><input type="button"
                                        onclick="window.open('coach_modify.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                        value="수정" class="btn_modify"></td>
                                <td scope="col"><a href="#" onclick="" class="btn_delete">삭제</a></td>
                            </tr>
                        </tbody>
                        <script language="JavaScript">
                        function toggle(box) {
                            checkboxes = document.getElementsByName('checkAthlete');
                            for (var i = 0, n = checkboxes.length; i < n; i++) {
                                checkboxes[i].checked = box.checked;
                            }
                        };
                        </script>
                    </table>
                </div>
                <!-- 등록 버튼 -->
                <div class="btn_base base_mar col_left">
                    <input class="btn_issueId btn_txt bold" type="button"
                        onclick="window.open('athlete_issue.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                        value="ID발급" class="btn_view">
                </div>
                <div class="btn_base base_mar col_right">
                    <input class="btn_add btn_txt bold" type="button"
                        onclick="window.open('coach_input.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
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
    <?php include 'footer.php'; ?>

    <script src="js/main.js"></script>
</body>

</html>