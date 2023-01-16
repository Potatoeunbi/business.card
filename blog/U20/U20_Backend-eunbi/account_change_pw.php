<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="/fontawesome/js/all.min.js"></script>
    <title>change_pw</title>
    <?php
        include_once "auth/config.php";
    ?>
</head>

<body>
    <!-- header -->
    <?php include 'header.php' ?>

    <!-- sidebar -->
    <?php include 'sidebar.php' ?>

    <!-- contents 본문 내용 -->
    <div class="container">
        <div class="contents something ptop--40">
            <div class="mypage">
                <h3>비밀번호 변경</h3>
                <hr />
                <div class="mypage_notice">
                    <h5>새로운 비밀번호를 입력해 주세요.</h5>
                    <p>
                        - 비밀번호는 8 ~ 32 자의 영문 대소문자, 숫자,
                        특수문자를 조합하여 설정해 주세요.
                    </p>
                </div>

                <form action="auth/pwUpdate.php" method="post" class="form">
                    <!-- #2 PASSWORD VERIFICATION -->
                    <script>
                    const check = function() {
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
                        <input placeholder="비밀번호" type="password" name="pw" id="pw" class="input_text" value=""
                            minlength="8" maxlength="32" required="" onkeyup="check();" />
                    </div>

                    <div class="input_row">
                        <input placeholder="비밀번호 재확인" type="password" name="cpassword" id="cpassword" class="input_text"
                            value="" minlength="8" maxlength="32" required="" onkeyup="check();" />
                    </div>

                    <span id="message"></span>
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
    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
</body>

</html>