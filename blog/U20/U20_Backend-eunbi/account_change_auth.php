<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="/fontawesome/js/all.min.js"></script>
    <title>U20</title>
    <?php 
        include_once "auth/config.php";
    ?>
</head>

<body>
    <!-- header -->
    <?php include './header.php' ?>

    <!-- sidebar -->
    <?php include './sidebar.php' ?>


    <!-- contents 본문 내용 -->
    <div class="container">
        <div class="contents something ptop--40">
            <div class="mypage">
                <h3>권한 변경</h3>
                <hr />
                <div class="mypage_notice">
                    <h5>권한을 변경해 주세요.</h5>
                    <p>- authEntrys : 참가자 관리</p>
                    <p>- authAthletes : 선수 관리</p>
                    <p>- authSchedules : 경기 관리</p>
                    <p>- authRecords : 기록 관리</p>
                    <p>- authStatics : 통계 관리</p>
                </div>

                <form action="auth/authUpdate.php" method="post" class="form">
                    <h3>권한 설정</h3>
                    <div class="input_row">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ;?>" />
                        <div class="form_check">
                            <label>
                                <span>참가자 관리 페이지</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authEntrysRead" name="authEntrysRead" class="" />
                                <span>읽기</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authEntrysUpdate" name="authEntrysUpdate" class="" />
                                <span>수정</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authEntrysDelete" name="authEntrysDelete" class="" />
                                <span>삭제</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authEntrysCreate" name="authEntrysCreate" class="" />
                                <span>등록</span>
                            </label>
                        </div>

                        <div class="form_check">
                            <label>
                                <span>경기 관리 페이지</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authSchedulesRead" name="authSchedulesRead" class="" />
                                <span>읽기</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authSchedulesUpdate" name="authSchedulesUpdate"
                                    class="" />
                                <span>수정</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authSchedulesDelete" name="authSchedulesDelete"
                                    class="" />
                                <span>삭제</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authSchedulesCreate" name="authSchedulesCreate"
                                    class="" />
                                <span>등록</span>
                            </label>
                        </div>

                        <div class="form_check">
                            <label>
                                <span>기록 관리 페이지</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authRecordsRead" name="authRecordsRead" class="" />
                                <span>읽기</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authRecordsUpdate" name="authRecordsUpdate" class="" />
                                <span>수정</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authRecordsDelete" name="authRecordsDelete" class="" />
                                <span>삭제</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authRecordsCreate" name="authRecordsCreate" class="" />
                                <span>등록</span>
                            </label>
                        </div>

                        <div class="form_check">
                            <label>
                                <span>통계 관리 페이지</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authStaticsRead" name="authStaticsRead" class="" />
                                <span>읽기</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authStaticsUpdate" name="authStaticsUpdate" class="" />
                                <span>수정</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authStaticsDelete" name="authStaticsDelete" class="" />
                                <span>삭제</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authStaticsCreate" name="authStaticsCreate" class="" />
                                <span>등록</span>
                            </label>
                        </div>

                        <div class="form_check">
                            <label>
                                <span>계정 관리 페이지</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authAccountsRead" name="authAccountsRead" class="" />
                                <span>읽기</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authAccountsUpdate" name="authAccountsUpdate" class="" />
                                <span>수정</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authAccountsDelete" name="authAccountsDelete" class="" />
                                <span>삭제</span>
                            </label>
                            <label>
                                <input type="checkbox" value="authAccountsCreate" name="authAccountsCreate" class="" />
                                <span>등록</span>
                            </label>
                        </div>
                    </div>

                    <div class="signup_submit">
                        <button type="submit" class="btn_login" name="signup">
                            <span>변경하기</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->

    <!-- sidebar js -->
    <script src="js/main.js"></script>

</body>

</html>