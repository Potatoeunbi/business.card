<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="sport/addSport.php" />
    <script src="/fontawesome/js/all.min.js"></script>
    <script src="js/restrict.js"></script>
    <title>signup</title>
</head>

<body>
    <!-- contents 본문 내용 -->
    <div class="container ptop--40">
        <!-- <div class="contents something">-->
        <div class="something">
            <div class="mypage">
                <h3>경기 등록</h3>
                <hr />
                <form action="#" method="post" class="form">
                    <!-- #2 PASSWORD VERIFICATION -->
                    <!--<script>
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
                            } else {@@@@@@
                                document.getElementById(
                                    "message"
                                ).style.color = "red";
                                document.getElementById(
                                    "message"
                                ).innerHTML = "비밀번호가 다릅니다.";
                            }
                        };
                    </script> -->
                    <div class="input_row">
                        <input placeholder="경기종목 고유번호" type="number" name="pw" class="input_text" value="" minlength="4"
                            maxlength="11" required="" oninput="maxLengthCheck(this)" />
                    </div>
                    <div class="input_row">
                        <input placeholder="경기종목 코드" type="text" name="gender" id="wr_1" class="input_text" value="" minlength="4"
                            maxlength="64" required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)" />
                    </div>
                    <div class="input_row">
                        <input placeholder="경기종목 이름" type="text" name="round"  id="wr_1" class="input_text" value="" minlength="4"
                            maxlength="64" required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)" />
                    </div>
                    <span id="message"></span>

                    <div class="input_row">
                        <input placeholder="경기종목 이름(한글)" type="text" name="name" id="wr_1" class="input_text" value="" minlength="4"
                            maxlength="64" required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)"/>
                    </div>

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
