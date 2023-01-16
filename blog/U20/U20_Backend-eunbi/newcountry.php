<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="/fontawesome/js/all.min.js"></script>
    <script src="js/restrict.js"></script>
    <title>signup</title>
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
        --->
    <!-- contents 본문 내용 -->
    <div class="container pbottom--0">
        <!-- <div class="contents something"> -->
        <div class="something ptop--40">
            <div class="mypage">
                <h3>국가 등록</h3>
                <hr />
                <form action="#" method="post" class="form">
                    <div class="input_row">
                        <input placeholder="국가 고유 아이디" type="number" name="id" class="input_text" value="" minlength="1" maxlength="11"
                            required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)" />
                    </div>
                    <!-- #2 PASSWORD VERIFICATION -->
                    <script>
                        const check = function () {
                            if (
                                document.getElementById("pw").value ==
                                document.getElementById("cpassword").value
                            ) {
                                document.getElementById(
                                    "message"
                                ).style.color = "green";
                                document.getElementById(
                                    "message"
                                ).innerHTML = "비밀번호가 같습니다.";
                            } else {
                                document.getElementById(
                                    "message"
                                ).style.color = "red";
                                document.getElementById(
                                    "message"
                                ).innerHTML = "비밀번호가 다릅니다.";
                            }
                        };
                    </script>
                    <div class="input_row">
                        <input placeholder="국가 코드" type="text" id="wr_1" name="code"  class="input_text" value="" minlength="1"
                            maxlength="4" required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)" />
                    </div>
                    <div class="input_row">
                        <input placeholder="국가 이름" type="text" name="gender" id="wr_1" class="input_text" value="" minlength="4"
                            maxlength="64" required=""  onkeyup="characterCheck(this)" onkeydown="characterCheck(this)" />
                    </div>
                    <div class="input_row">
                        <input placeholder="국가 이름(한글)" type="text" name="round" id="wr_1" class="input_text" value="" minlength="4"
                            maxlength="32" required=""  onkeyup="characterCheck(this)" onkeydown="characterCheck(this)" />
                    </div>
                    <span id="message"></span>

                    <div class="signup_submit">
                        <button type="submit" class="btn_login" name="signup">
                            <span>등록</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
