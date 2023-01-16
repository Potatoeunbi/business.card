<?php include_once "./backheader.php"; 
$id=$_SESSION['Id'];
?>

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
                        <li><a href="entry_judge.php">심판 목록</a></li>
                        <li><a href="entry_director.php">임원 목록</a></li>
                        <li><a href="entry_coach.php">코치 목록</a></li>
                        <li><a href="entry_athelete.php">선수 목록</a></li>
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
                            <a href="sportmanagement.php">경기 목록</a>
                        </li>
                        <li>
                            <a href="countrymanagement.php">국가 목록</a>
                        </li>
                        <li>
                            <a href="schedulemanagement.php">일정 목록</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="accordion_li">
                <p class="menu_button">
                    <i class="fa-solid fa-angle-right"></i>
                    기록 관리
                </p>
                <div class="accordion_content">
                    <ul>
                        <li>
                            <a href="resultManagement.php">경기결과 목록</a>
                        </li>
                        <li>
                            <a href="recordHistory.php">역대기록 목록</a>
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
                            <a href="playerRankListing.php">선수별 순위보기</a>
                        </li>
                        <li>
                            <a href="newRecordListing.php">신기록 경기기록</a>
                        </li>
                        <li>
                            <a href="scheduleRankListing.php">경기별 순위보기</a>
                        </li>
                        <li>
                            <a href="scheduleListing.php">경기별 메달보기</a>
                        </li>
                        <li>
                            <a href="countryListing.php">국가별 순위보기</a>
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
                        <li><a href="account_mypage.php">계정 정보</a></li>
                        <li>
                            <a href="account_change_pw.php">비밀번호 변경</a>
                        </li>
                        <li><a href="account_signup.php">계정 생성</a></li>

                        <li>
                            <a href="<?=authCheck($db,$id,"authAccountsRead","account_user.php")?>">계정
                                목록</a>
                        </li>

                        <li>
                            <a href="account_log.php">로그 목록</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>