<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <script src="../fontawesome/js/all.min.js"></script>
    <!--Data Tables-->
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css" />
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../js/useDataTables.js"></script>
    <title>U20</title>
</head>

<body>
    <!-- header -->
    <input type="checkbox" id="sidebar_icon" />
    <header>
        <div>
            <ul class="navbar">
                <li class="logo">
                    <a href="index.html"><img src="../img/logo.png" alt="Logo" class="logo_img" /></a>
                </li>
                <li>
                    <label for="sidebar_icon" class="sidebar_btn">
                        메뉴
                        <i class="fas fa-bars"></i></label>
                </li>
            </ul>
            <ul class="navbar right">
                <li><a href="mypage.html">마이페이지</a></li>
                <li>
                    <a href="login.html"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </header>

    <!-- sidebar -->
    <div class="container">
        <div class="sidebar">
            <ul class="accordion">
                <li class="accordion_li">
                    <p class="menu_button">
                        <i class="fa-solid fa-angle-right"></i>
                        참가자 관리
                    </p>
                    <div class="accordion_content">
                        <ul>
                            <li><a href="judge.html">심판 목록</a></li>
                            <li><a href="director.html">임원 목록</a></li>
                            <li><a href="../participant/coach.php">코치 목록</a></li>
                        </ul>
                    </div>
                </li>

                <li class="accordion_li">
                    <p class="menu_button">
                        <i class="fa-solid fa-angle-right"></i>
                        선수 관리
                    </p>
                    <div class="accordion_content">
                        <ul>
                            <li>
                                <a href="athletemanagement.html">선수 목록</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="accordion_li">
                    <p class="menu_button">
                        <i class="fa-solid fa-angle-right"></i>
                        경기 관리
                    </p>
                    <div class="accordion_content">
                        <ul>
                            <li>
                                <a href="sportmanagement.html">경기 목록</a>
                            </li>
                            <li>
                                <a href="countrymanagement.html">국가 목록</a>
                            </li>
                            <li>
                                <a href="schedulemanagement.html">일정 목록</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="accordion_li active">
                    <p class="menu_button">
                        <i class="fa-solid fa-angle-down"></i>
                        기록 관리
                    </p>
                    <div class="accordion_content">
                        <ul>
                            <li class="active">
                                <a href="./resultManagement.php">경기결과 목록</a>
                            </li>
                            <li>
                                <a href="./recordHistory.php">역대기록 목록</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="accordion_li">
                    <p class="menu_button">
                        <i class="fa-solid fa-angle-right"></i>
                        통계 관리
                    </p>
                    <div class="accordion_content">
                        <ul>
                            <li>
                                <a href="playerRankListing.html">선수별 순위보기</a>
                            </li>
                            <li>
                                <a href="newRecordListing.html">신기록 경기기록</a>
                            </li>
                            <li>
                                <a href="scheduleRankListing.html">경기별 순위보기</a>
                            </li>
                            <li>
                                <a href="scheduleListing.html">경기별 메달보기</a>
                            </li>
                            <li>
                                <a href="countryListing.html">국가별 순위보기</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="accordion_li on">
                    <p class="menu_button">
                        <i class="fa-solid fa-angle-right"></i>
                        계정 관리
                    </p>
                    <div class="accordion_content">
                        <ul>
                            <li><a href="mypage.html">계정 정보</a></li>
                            <li>
                                <a href="change_pw.html">비밀번호 변경</a>
                            </li>
                            <li><a href="signup.html">계정 생성</a></li>
                            <li>
                                <a href="user.html">계정 목록</a>
                            </li>
                            <li>
                                <a href="log.html">로그 목록</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="something contents">
            <h2 class="country_h2">경기결과 목록</h2>
			<div class="btn_base base_mar" style="float: left;">
				<input type="button" onclick="" class="btn_excel bold" value="엑셀 출력">
			</div>
			<div class="selectArea float_r">
				<div class="select_box mr10">
					<select class="d_select" title="날짜" style="width: 140px;">
						<option value="1">날짜</option>
						<option value="2">2023-06-04</option>
						<option value="3">2023-06-05</option>
						<option value="4">2023-06-06</option>
						<option value="5">2023-06-07</option>
					</select>
				</div>

				<div class="select_box mr10">
					<select class="d_select" title="성별" style="width: 90px;">
						<option value="" hidden>성별</option>
						<option value="1">남</option>
						<option value="2">여</option>
					</select>
				</div>

				<div class="select_box mr10">
					<select class="d_select" title="기록 방식" style="width: 122px;">
						<option value="" hidden>기록 방식</option>
						<option value="1">자동</option>
						<option value="2">수동</option>
					</select>
				</div>

				<div class="select_box mr10">
					<select class="d_select" title="구분" style="width: 172.667px;">
						<option value="" hidden>종목</option>
						<option value="" disabled>단거리달리기</option>
						<option value="1">100M</option>
						<option value="2">200M</option>
						<option value="3">400M</option>
						<option value="" disabled>중/장거리</option>
						<option value="4">800M</option>
						<option value="5">1500M</option>
						<option value="6">5000M</option>
						<option value="7">10000M</option>
						<option value="8">3000M 장애물</option>
						<option value="" disabled>허들달리기</option>
						<option value="9">110M 허들</option>
						<option value="10">400M 허들</option>
						<option value="" disabled>점프경기</option>
						<option value="11">높이뛰기</option>
						<option value="12">장대높이뛰기</option>
						<option value="13">멀리뛰기</option>
						<option value="14">삼단뛰기</option>
						<option value="" disabled>던지기</option>
						<option value="15">투포환</option>
						<option value="16">원반던지기</option>
						<option value="17">해머던지기</option>
						<option value="18">창던지기</option>
						<option value="" disabled>종합</option>
						<option value="19">10종 경기</option>
						<option value="" disabled>경보</option>
						<option value="20">10000M 경보</option>
						<option value="" disabled>릴레이</option>
						<option value="21">4x100M 릴레이</option>
						<option value="22">4x400M 릴레이</option>
						<option value="23">4x400M 혼성</option>
					</select>
				</div>

				<div class="search" style="width: 50px;">
					<button type="submit" class="btn_search" title="검색"></a>
				</div>
			</div>
            <!-- select 선택에 따른 종목 결과 나열 -->
            <div class="tbl_area">
                <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover team_table">
                    <colgroup>
                        <col style="width:13%;">
                        <col style="width:10%;">
                        <col style="width:13%;">
                        <col style="width:10%;">
                        <col style="width:10%;">
                        <col style="width:10%;">
                        <col style="width:12%;">
                        <col style="width:10%;">
                        <col style="width:10%;">
                        <!-- <col style="width: auto;"> -->
                    </colgroup>
                    <thead>
                        <tr>
                            <th>날짜</th>
                            <th>종목</th>
                            <th>경기 이름</th>
                            <th>경기 라운드</th>
                            <th>선수 이름</th>
                            <th>심판 이름</th>
                            <th>기록</th>
                            <th>기록 방식</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-06-05</td>
                            <td>원반던지기</td>
                            <td>원반던지기(여)</td>
                            <td>1차</td>
                            <td>김아랑</td>
                            <td>tony Kim</td>
                            <td>12.54m</td>
                            <td>수동</td>
                            <td><input type="button"
                                    onclick="window.open('modifyResult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                    value="수정" class="btn_modify"></td>
                        </tr>
                        <tr>
                            <td>2023-06-05</td>
                            <td>원반던지기</td>
                            <td>원반던지기(남)</td>
                            <td>1차</td>
                            <td>권산</td>
                            <td>tony Kim</td>
                            <td>12.54m</td>
                            <td>수동</td>
                            <td><input type="button"
                                    onclick="window.open('modifyResult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                    value="수정" class="btn_modify"></td>
                        </tr>
                        <tr>
                            <td>2023-06-05</td>
                            <td>3000M 장애물</td>
                            <td>3000M 장애물 본선</td>
                            <td>3라운드</td>
                            <td>권산</td>
                            <td>tony Kim</td>
                            <td>07:43:34</td>
                            <td>자동</td>
                            <td><input type="button"
                                    onclick="window.open('modifyResult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                    value="수정" class="btn_modify"></td>
                        </tr>
                        <tr>
                            <td>2023-06-05</td>
                            <td>100M</td>
                            <td>100M 결승</td>
                            <td>3라운드</td>
                            <td>권산</td>
                            <td>tony Kim</td>
                            <td>07:43:34</td>
                            <td>자동</td>
                            <td><input type="button"
                                    onclick="window.open('modifyResult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                    value="수정" class="btn_modify"></td>
                        </tr>
                        <tr>
                            <td>2023-06-05</td>
                            <td>100M</td>
                            <td>100M 예선</td>
                            <td>3라운드</td>
                            <td>권산</td>
                            <td>tony Kim</td>
                            <td>07:43:34</td>
                            <td>자동</td>
                            <td><input type="button"
                                    onclick="window.open('modifyResult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                    value="수정" class="btn_modify"></td>
                        </tr>
                        <tr>
                            <td>2023-06-05</td>
                            <td>100M</td>
                            <td>100M 예선</td>
                            <td>3라운드</td>
                            <td>권산</td>
                            <td>tony Kim</td>
                            <td>07:43:34</td>
                            <td>자동</td>
                            <td><input type="button"
                                    onclick="window.open('modifyResult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                    value="수정" class="btn_modify"></td>
                        </tr>
                        <tr>
                            <td>2023-06-05</td>
                            <td>100M</td>
                            <td>100M 예선</td>
                            <td>3라운드</td>
                            <td>권산</td>
                            <td>tony Kim</td>
                            <td>07:43:34</td>
                            <td>자동</td>
                            <td><input type="button"
                                    onclick="window.open('modifyResult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                    value="수정" class="btn_modify"></td>
                        </tr>

                    </tbody>
                </table>
                <div class="btn_base base_mar col_right">
                    <input type="button"
                        onclick="window.open('addresult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                        class="btn_add bold" value="등록">
                </div>
            </div>
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
            </div>
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