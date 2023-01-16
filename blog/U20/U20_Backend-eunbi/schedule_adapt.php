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
</head>

<body>

    <!-- contents 본문 내용 -->
    <div class="container ptop--40">
        <!-- <div class="contents something">-->
        <div class="something">
            <div class="mypage">
                <h3>일정 등록</h3>
                <hr />
                <form action="#" method="post" class="form">
                    <!-- #2 PASSWORD VERIFICATION -->
                    <!-- <script>
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
                    </script> -->
                    <div class="input_row">
                        <input placeholder="경기 종목" type="text" name="pw" id="wr_1" class="input_text" value="" minlength="4"
                            maxlength="20" required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)" />
                    </div>
                    <div class="input_row">
                        <input placeholder="경기 이름" type="text" name="gender" id="wr_1" class="input_text" value="" minlength="4"
                            maxlength="20" required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)" />
                    </div>
                    <div class="input_row">
                            <select class="input_text" name="" id="" style="   color: var(  --color-light-grey)" >
                                <option value="1" >경기 성별(m:남성,f:여성,c:혼성)</option>
                                <option value="2" >m:남성</option>
                                <option value="3" >f:여성</option>
                                <option value="4" >c:혼성</option>
                            </select>
                    </div>
                    <span id="message"></span>

                    <div class="input_row">
                        <input placeholder="경기 라운드" type="number" name="name" id="wr_1" class="input_text" value="" maxlength="50"
                            required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)"/>
                    </div>
                    <div class="input_row">
                        <input placeholder="경기 장소" type="text" name="name" id="wr_1" class="input_text" value="" maxlength="50"
                            required="" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)"/>
                    </div>
                    <div class="input_row">
                        <input placeholder="경기 시작 시간(시)" type="number" name="name" class="input_text" value=""  style="float:left; width: 200px; padding-right: 5px;"
                        maxlength="2" required="" oninput="maxLengthCheck(this)" />
                            <div style="float:left;">:
                            </div>
                        <input placeholder="경기 시작 시간(분)" type="number" name="name" class="input_text" value="" style="width: auto;padding-left: 5px;float: left; margin-right: 5px;"
                        maxlength="2" oninput="maxLengthCheck(this)" />
                        <!-- <input placeholder="" type="text" name="gameresult" class="input_text" value="" maxlength="3" required="" onkeyup="inputNumberFormat2(this)" style="
                                width: auto;
                                padding-left: 5px;
                                float: left;
                                margin-right: 5px;
                            "> -->
                    </div>
                    <div class="input_row">
                        <input placeholder="경기 마감 시간(시)" type="number" name="name" class="input_text" value=""
                          maxlength="2"  maxlength="2" required="" style="float:left; width: 200px; padding-right: 5px;" oninput="maxLengthCheck(this)"/>
                            <div style="float:left;">:
                            </div>
                        <input placeholder="경기 마감 시간(분)" type="number" name="name" class="input_text" value=""  style="width: auto;padding-left: 5px;float: left; margin-right: 5px;"
                         maxlength="2" style="float:left; width: 200px; padding-right: 5px;" oninput="maxLengthCheck(this)"/>
                    </div>
                    <div class="input_row">
<!--                        <input placeholder="경기 진행 상태(n:준비, c:취소됨, o:경기중, y:마감)" type="text" name="name" class="input_text" value="" maxlength="50"
                            required="" />-->
                            <select class="input_text" name="" id="" style="   color: var(  --color-light-grey)" >
                                <option value="1" >경기 진행 상태(n:준비, c:취소됨, o:경기중, y:마감)</option>
                                <option value="2" >n:준비</option>
                                <option value="3" >c:취소됨</option>
                                <option value="4" >o:경기중</option>
                                <option value="5" >y:마감</option>
                            </select>
                    </div>
                    <div class="input_row">
                      <input placeholder="경기 날짜(년)" type="number" name="name" class="input_text" value=""
                            maxlength="4"  maxlength="2" required="" style="float:left; width: 200px; padding-right: 5px;" oninput="maxLengthCheck(this)"/>
                            <div style="float:left;">-
                            </div>
                        <input placeholder="경기 날짜(월)" type="number" name="name" class="input_text" value=""
                              maxlength="2"  maxlength="2" required="" style="float:left; width: 200px; padding-right: 5px;" oninput="maxLengthCheck(this)"/>
                                <div style="float:left;">-
                                </div>
                        <input placeholder="경기 날짜(일)" type="number" name="name" class="input_text" value=""  style="width: auto;padding-left: 5px;float: left; margin-right: 5px;"
                             maxlength="2" style="float:left; width: 200px; padding-right: 5px;" oninput="maxLengthCheck(this)"/>
                    </div>

                    <div class="signup_submit">
                        <button type="submit" class="btn_login" name="signup">
                            <span>수정</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
