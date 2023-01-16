<!DOCTYPE html>
<html lang="ko">

<head>
    <?php
        include_once "../database/dbconnect.php"; //B:데이터베이스 연결
        include_once "../module/dictionary.php"; //B:서치 select 태크 사용하기 위한 자료구조
    ?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <script src="../fontawesome/js/all.min.js"></script>
    <title>U20</title>
</head>
<body>
    <div class="container">
        <div class="something_1">
            <div class="mypage">
                <h3>코치 정보 등록</h3>
                <hr />
                <form action="../module/coach_Insert.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="text-center">
                            <img src="../img/judge_image.jpg" class="image_resize" alt="avatar" />
                            <h6>새로운 이미지를 입력해주세요</h6>
                            <input type="file" name="coach_imgFile" class="form-control" />
                        </div>
                    </div>
                    <div class="input_row">
                        <span class="input_guide">이름</span>
                        <input type="text" name="coach_name" id="coach_name" value="" class="input_text" />
                    </div>
                    <div class="input_row">
                        <span class="input_guide">국가</span>
                        <select name="coach_contry" style="border:1px solid">
                            <option value='' selected disabled hidden>국가</option>
                            <?php
                                foreach($country_dic as $key => $value)
                                        echo "<option value=".$value.">".$key."</option>";
                            ?>
                        </select>
                        <!-- <input type="text" name="nation" id="nation" value="" class="input_text" /> -->
                    </div>
                    <div class="input_row">
                        <span class="input_guide">지역</span>
                        <input type="text" name="coach_division" id="coach_division" value="" class="input_text" />
                    </div>
                    <div class="input_row">
                        <span class="input_guide">소속</span>
                        <input type="text" name="coach_region" id="coach_region" value="" class="input_text" />
                    </div>
                    <div class="input_row">
                        <span class="input_guide">성별</span>
                        <!-- 수정 바람 -->
                        <select name="coach_gender" style="border: 1px solid">
                            <option value="m">남자</option>
                            <option value="f">여자</option>
                        </select>
                    </div>
                    <div class="input_row">
                        <span class="input_guide">생년월일</span>
                        <input type="text" name="coach_birth_year" style="border: 1px solid">
                        <input type="text" name="coach_birth_month" style="border: 1px solid">
                        <input type="text" name="coach_birth_day" style="border: 1px solid">
                        <!-- <input type="text" name="coach_birth" id="coach_birth" value="" class="input_text" /> -->
                    </div>
                    <div class="input_row">
                        <span class="input_guide">나이</span>
                        <input type="text" name="coach_age" id="coach_age" value="" class="input_text" />
                    </div>
                    <div class="input_row">
                        <span class="input_guide">직무</span>
                        <select name="coach_duty" style="border: 1px solid">
                            <option value="h">헤드 코치</option>
                            <option value="s">서브 코치</option>
                        </select>
                        <!-- <input type="text" name="coach_role" id="coach_role" value="" class="input_text" /> -->
                    </div>
                    <div class="input_row">
                        <span class="input_guide">참가경기</span>
                        <div class="attendent_game">
                                <div class="input_row">
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="1" id="100m" />
                                            <span>100m</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="2" id="200m" />
                                            <span>200m</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="3" id="400m" />
                                            <span>400m</span>
                                        </label>
                                    </div>
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="4" id="800m" />
                                            <span>800m</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="5" id="1500m" />
                                            <span>1500m</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="6" id="3000m" />
                                            <span>3000m</span>
                                        </label>
                                    </div>
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="7" id="5000m" />
                                            <span>5000m</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="8" id="10000m" />
                                            <span>10000m</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="9" id="3000mSC" />
                                            <span>3000m 장애물</span>
                                        </label>
                                    </div>
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox"  name="coach_sports[]" value="10" id="100m_hurdle" />
                                            <span>100m 허들</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="11" id="110m_hurdle" />
                                            <span>110m 허들</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="12" id="3000m" />
                                            <span>400m 허들</span>
                                        </label>
                                    </div>
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="13" id="highjump" />
                                            <span>높이뛰기</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="14" id="polevault" />
                                            <span>장대 높이뛰기</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="15" id="longjump" />
                                            <span>멀리뛰기</span>
                                        </label>
                                    </div>
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="16" id="triplejump" />
                                            <span>세단뛰기</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="17" id="shotput" />
                                            <span>투포환</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]"  value="18" id="discusthrow" />
                                            <span>원반던지기</span>
                                        </label>
                                    </div>
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="19" id="hammerthrow" />
                                            <span>해머던지기</span>
                                        </label>
                                        <label>
                                            <input type="checkbox"  name="coach_sports[]" value="20" id="javelinthrow" />
                                            <span>창던지기</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="21" id="heptathlon" />
                                            <span>7종경기(여)</span>
                                        </label>
                                    </div>
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="22" id="decathlon" />
                                            <span>10종경기(남)</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="23" id="racewalk" />
                                            <span>경보</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="24" id="4x100relay" />
                                            <span>4x100 릴레이</span>
                                        </label>
                                    </div>
                                    <div class="form_check">
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="25" id="4x400relay" />
                                            <span>4x400 릴레이</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="coach_sports[]" value="26" id="4x400mR" />
                                            <span>4x400 믹스릴레이</span>
                                        </label>
                                    </div>
                        </div>
                    </div>
                    <div class="btn_base base_mar col_right">
                        <button type="submit" class="btn_add" name="coach_edit">
                            <span class="btn_txt bold">확인</span>
                        </button>
                    </div>
                    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
                    <script src="chosen.jquery.js" type="text/javascript"></script>
                    <script src="prism.js" type="text/javascript" charset="utf-8"></script>
                    <script src="init.js" type="text/javascript" charset="utf-8"></script>
                </form>
            </div>
        </div>
    </div>

    <script src="docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="chosen.jquery.js" type="text/javascript"></script>
    <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>