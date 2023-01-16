<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="/fontawesome/js/all.min.js"></script>
    <!--Data Tables-->
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="useDataTables.js"></script>
    <script>
        // 경기 결과 숫자만 입력 및 자동 양식 스크립트
        function inputNumberFormat(obj) {
            obj.style.textAlign = "right";
            obj.style.width = "35px";
            if (obj.value.length == 0) {
                obj.style.textAlign = "left";
                obj.style.width = "auto";
            }

            if (obj.value.length == obj.maxLength) {
                obj.nextElementSibling.nextElementSibling.focus();
                //   console.log(obj.nextElementSibling)
            } else {
                obj.value = comma(uncomma(obj.value));
            }
        }
        function inputNumberFormat2(obj) {
            if (obj.value.length > 0) {
                obj.style.textAlign = "right";
                obj.style.width = "35px";
            } else {
                obj.style.textAlign = "left";
                obj.style.width = "auto";
            }
            obj.value = comma(uncomma(obj.value));
        }
        function comma(str) {
            str = String(str);
            return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, "$1.");
        }

        function uncomma(str) {
            str = String(str);
            return str.replace(/[^\d]+/g, "");
        }
    </script>
    <title>U20</title>
</head>

<body>
    <!-- header 
        <input type="checkbox" id="sidebar_icon" />
        <header>
            <div>
                <ul class="navbar">
                    <li class="logo">
                        <a href="index.html"
                            ><img
                                src="img/logo.png"
                                alt="Logo"
                                class="logo_img"
                        /></a>
                    </li>
                    <li>
                        <label for="sidebar_icon" class="sidebar_btn">
                            메뉴
                            <i class="fas fa-bars"></i
                        ></label>
                    </li>
                </ul>
                <ul class="navbar right">
                    <li><a href="mypage.html">마이페이지</a></li>
                    <li>
                        <a href="login.html"
                            ><i class="fas fa-sign-out-alt"></i
                        ></a>
                    </li>
                </ul>
            </div>
        </header>
        -->

    <!-- sidebar 
        <div class="container">
            <div class="sidebar">
                <ul class="accordion">
                    <span class="target" id="accordion"></span>
                    <li class="accordion_li">
                        <span class="target" id="accordion1"></span>
                        <a
                            href="#accordion1"
                            class="open-accordion"
                            title="open"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-right"></i>
                                    참가자 관리
                                </p>
                            </div>
                        </a>
                        <a
                            href="#accordion"
                            class="close-accordion"
                            title="close"
                        >
                            <div class="ab">
                                <p>
                                    <i class="fa-solid fa-angle-down"></i>
                                    참가자 관리
                                </p>
                            </div>
                        </a>
                        <div class="accordion_content">
                            <ul>
                                <li><a href="judge.html">심판 목록</a></li>
                                <li><a href="director.html">임원 목록</a></li>
                                <li><a href="coach.html">코치 목록</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="accordion_li">
                        <span class="target" id="accordion2"></span>
                        <a
                            href="#accordion2"
                            class="open-accordion"
                            title="open"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-right"></i>
                                    선수 관리
                                </p>
                            </div>
                        </a>
                        <a
                            href="#accordion"
                            class="close-accordion"
                            title="close"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-down"></i>
                                    선수 관리
                                </p>
                            </div>
                        </a>
                        <div class="accordion_content">
                            <ul>
                                <li>
                                    <a href="athletemanagement.html"
                                        >선수 목록</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="accordion_li">
                        <span class="target" id="accordion3"></span>
                        <a
                            href="#accordion3"
                            class="open-accordion"
                            title="open"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-right"></i>
                                    경기 관리
                                </p>
                            </div>
                        </a>
                        <a
                            href="#accordion"
                            class="close-accordion"
                            title="close"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-down"></i>
                                    경기 관리
                                </p>
                            </div>
                        </a>
                        <div class="accordion_content">
                            <ul>
                                <li>
                                    <a href="sportmanagement.html">경기 목록</a>
                                </li>
                                <li>
                                    <a href="countrymanagement.html"
                                        >국가 목록</a
                                    >
                                </li>
                                <li>
                                    <a href="schedulemanagement.html"
                                        >일정 목록</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="accordion_li">
                        <span class="target" id="accordion4"></span>
                        <a
                            href="#accordion4"
                            class="open-accordion"
                            title="open"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-right"></i>
                                    기록 관리
                                </p>
                            </div>
                        </a>
                        <a
                            href="#accordion"
                            class="close-accordion"
                            title="close"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-down"></i>
                                    기록 관리
                                </p>
                            </div>
                        </a>
                        <div class="accordion_content">
                            <ul>
                                <li>
                                    <a href="resultManagement.html"
                                        >경기결과 목록</a
                                    >
                                </li>
                                <li>
                                    <a href="recordHistory.html"
                                        >역대기록 목록</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="accordion_li">
                        <span class="target" id="accordion5"></span>
                        <a
                            href="#accordion5"
                            class="open-accordion"
                            title="open"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-right"></i>
                                    통계 관리
                                </p>
                            </div>
                        </a>
                        <a
                            href="#accordion"
                            class="close-accordion"
                            title="close"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-down"></i>
                                    통계 관리
                                </p>
                            </div>
                        </a>
                        <div class="accordion_content">
                            <ul>
                                <li>
                                    <a href="playerRankListing.html"
                                        >선수별 순위보기</a
                                    >
                                </li>
                                <li>
                                    <a href="newRecordListing.html"
                                        >신기록 경기기록</a
                                    >
                                </li>
                                <li>
                                    <a href="scheduleRankListing.html"
                                        >경기별 순위보기</a
                                    >
                                </li>
                                <li>
                                    <a href="scheduleListing.html"
                                        >경기별 메달보기</a
                                    >
                                </li>
                                <li>
                                    <a href="countryListing.html"
                                        >국가별 순위보기</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="accordion_li">
                        <span class="target" id="accordion6"></span>
                        <a
                            href="#accordion6"
                            class="open-accordion"
                            title="open"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-right"></i>
                                    계정 관리
                                </p>
                            </div>
                        </a>
                        <a
                            href="#accordion"
                            class="close-accordion"
                            title="close"
                        >
                            <div>
                                <p>
                                    <i class="fa-solid fa-angle-down"></i>
                                    계정 관리
                                </p>
                            </div>
                        </a>
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
        -->

    <!-- contents 본문 내용 -->
    <div class="container">
        <!-- class="contents something" -->
        <div class="something" style="padding: 100px 60px 60px 60px">
            <form action="#" method="post" class="form">
                <div class="input_row">
                    <input placeholder="경기 이름" type="text" name="gamename" class="input_text" value="원반던지기 1차"
                        maxlength="16" required="" />
                </div>
                <div class="input_row">
                    <input placeholder="심판 이름" type="text" name="refereename" class="input_text" value="권 산"
                        maxlength="30" required="" />
                </div>
                <div class="input_row">
                    <input placeholder="선수 이름" type="text" name="playername" class="input_text" value="" maxlength="30"
                        required="" />
                </div>
                <div class="input_row">
                    <input placeholder="경기 통과 여부" type="text" name="gamepass" class="input_text" value="" maxlength="50"
                        required="" />
                </div>
                <div class="input_row">
                    <input placeholder="경기 등수" type="number" name="emdtn" class="input_text" value="" min="1" max="12"
                        required="" />
                </div>
                <div class="input_row">
                    <input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value="" maxlength="3"
                        required="" onkeyup="inputNumberFormat(this)" style="
                                float: left;
                                width: 200px;
                                padding-right: 5px;
                            " />
                    <div style="float: left">.</div>
                    <input placeholder="" type="text" name="gameresult" class="input_text" value="" maxlength="3"
                        required="" onkeyup="inputNumberFormat2(this)" style="
                                width: auto;
                                padding-left: 5px;
                                float: left;
                                margin-right: 5px;
                            " />
                    <div style="float: left; width: auto">m</div>
                </div>
                <h3>신기록 여부</h3>
                <div class="input_row">
                    <label>
                        <input type="radio" name="new" value="1" id="nope" class="radiobox" required="" />
                        <span>해당없음</span>
                    </label>
                    <label>
                        <input type="radio" name="new" value="2" id="competitonRecord" class="radiobox" required="" />
                        <span>대회신기록</span>
                    </label>
                    <label>
                        <input type="radio" name="new" value="3" id="asiaRecord" class="radiobox" required="" />
                        <span>아시아신기록</span>
                    </label>
                    <label>
                        <input type="radio" name="new" value="4" id="worldRecord" class="radiobox" required="" />
                        <span>세계신기록</span>
                    </label>
                </div>
                <div class="input_row">
                    <input placeholder="비고" type="text" name="gamepass" class="input_text" value="" maxlength="100" />
                </div>
                <div class="signup_submit">
                    <button type="submit" class="btn_login" name="addresult">
                        <span>확인</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>