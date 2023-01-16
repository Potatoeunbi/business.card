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
    <script type="text/javascript" src="js/useDataTables.js"></script>
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
    <script>
        function openTextFile() {
            var input = document.createElement("input");
            input.type = "file";
            input.accept = "text/plain"; // 확장자가 xxx, yyy 일때, ".xxx, .yyy"
            input.onchange = function (event) {
                processFile(event.target.files[0]);
            };
            input.click();
        }
        function processFile(file) {
            var reader = new FileReader();
            reader.onload = function () {
                let ddd =reader.result.split("\r\n");
                for(i=0;i<ddd.length;i++){
                    let k=ddd[i].split(" ")
                    let on=document.querySelector("#"+k[1]).children
                    on[1].firstChild.value=k[0].slice(0,1)
                    on[4].firstChild.value=k[2]
                }
            };
            reader.readAsText(file, /* optional */ "utf-8");
        }
    </script>
    <title>U20</title>
</head>

<body>

    <!-- contents 본문 내용 -->
    <div class="container" style="padding-bottom:0">
        <!-- class="contents something" -->
        <div class="something" style="padding: 0px 60px 60px 60px;">
            <form action="#" method="post" class="form">
                <h3 style="margin-bottom: 10px;">조 편성</h3>
                <table cellspacing="0" cellpadding="0" class="team_table" style="border-top:0px">
                  <colgroup>
                      <!-- <col style="width:13%;">
                      <col style="width:10%;">
                      <col style="width:13%;">
                      <col style="width:10%;">
                      <col style="width:10%;">
                      <col style="width:10%;">
                      <col style="width:12%;">
                      <col style="width:10%;">
                      <col style="width:10%;"> -->
                      <!-- <col style="width: auto;"> -->
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                  </colgroup>
                    <thead>
                        <tr>
                            <th style="background: none;">순서</th>
                            <th style="background: none;">등수</th>
                            <th style="background: none;">이름</th>
                            <th style="background: none;">기록</th>
                            <th style="background: none;">비고</th>
                            <th style="background: none;">신기록</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="1" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="2" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="권 산"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required=""  style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="2" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="7" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="임지훈"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="3" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="5" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="천효민"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="4" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="4" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="이은비"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="5" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="1" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="김조은"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="6" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="8" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="최민정"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="7" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="3" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="김민지"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="8" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="6" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="황근원"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn_base base_mar col_right">
                    <input type="button"
                        onclick="window.open('addresult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                        class="btn_add bold  float_r" value="불러오기">
                </div>
                <h3>경기 비고</h3>
                <div class="input_row">
                    <input placeholder="비고" type="text" name="gamepass" class="input_text" value="" maxlength="100" />
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <!-- class="contents something" -->
        <div class="something" style="padding: 0px 60px 60px 60px; ">
            <form action="#" method="post" class="form">
                <h3 style="margin-bottom: 10px;">조 편성</h3>
                <table cellspacing="0" cellpadding="0" class="team_table" style="border-top:0px">
                  <colgroup>

                      <!-- <col style="width:13%;">
                      <col style="width:10%;">
                      <col style="width:13%;">
                      <col style="width:10%;">
                      <col style="width:10%;">
                      <col style="width:10%;">
                      <col style="width:12%;">
                      <col style="width:10%;">
                      <col style="width:10%;"> -->
                      <!-- <col style="width: auto;"> -->
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                  </colgroup>
                    <thead>
                        <tr>
                            <th style="background: none;">순서</th>
                            <th style="background: none;">등수</th>
                            <th style="background: none;">이름</th>
                            <th style="background: none;">기록</th>
                            <th style="background: none;">비고</th>
                            <th style="background: none;">신기록</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="1" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="2" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="권 산"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required=""  style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="2" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="7" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="임지훈"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="3" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="5" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="천효민"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="4" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="4" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="이은비"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="5" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="1" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="김조은"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="6" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="8" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="최민정"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="7" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="3" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="김민지"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="8" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="6" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="황근원"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn_base base_mar col_right">
                    <input type="button"
                        onclick="window.open('addresult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                        class="btn_add bold  float_r" value="불러오기">
                </div>
                <h3>경기 비고</h3>
                <div class="input_row">
                    <input placeholder="비고" type="text" name="gamepass" class="input_text" value="" maxlength="100" />
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <!-- class="contents something" -->
        <div class="something" style="padding: 0px 60px 60px 60px;">
            <form action="#" method="post" class="form">
                <h3 style="margin-bottom: 10px;">조 편성</h3>
                <table cellspacing="0" cellpadding="0" class="team_table" style="border-top:0px">
                  <colgroup>

                      <!-- <col style="width:13%;">
                      <col style="width:10%;">
                      <col style="width:13%;">
                      <col style="width:10%;">
                      <col style="width:10%;">
                      <col style="width:10%;">
                      <col style="width:12%;">
                      <col style="width:10%;">
                      <col style="width:10%;"> -->
                      <!-- <col style="width: auto;"> -->
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                  </colgroup>
                    <thead>
                        <tr>
                            <th style="background: none;">순서</th>
                            <th style="background: none;">등수</th>
                            <th style="background: none;">이름</th>
                            <th style="background: none;">기록</th>
                            <th style="background: none;">비고</th>
                            <th style="background: none;">신기록</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="1" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="2" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="권 산"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required=""  style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="2" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="7" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="임지훈"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="3" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="5" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="천효민"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="4" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="4" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="이은비"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="5" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="1" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="김조은"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="6" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="8" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="최민정"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="7" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="3" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="김민지"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="8" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="6" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="황근원"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn_base base_mar col_right">
                    <input type="button"
                        onclick="window.open('addresult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                        class="btn_add bold  float_r" value="불러오기">
                </div>
                <h3>경기 비고</h3>
                <div class="input_row">
                    <input placeholder="비고" type="text" name="gamepass" class="input_text" value="" maxlength="100" />
                </div>

            </form>
        </div>
    </div>
    <div class="container">
        <!-- class="contents something" -->
        <div class="something" style="padding: 0px 60px 60px 60px;">
            <form action="#" method="post" class="form">
                <h3 style="margin-bottom: 10px;">조 편성</h3>
                <table cellspacing="0" cellpadding="0" class="team_table" style="border-top:0px">
                  <colgroup>

                      <!-- <col style="width:13%;">
                      <col style="width:10%;">
                      <col style="width:13%;">
                      <col style="width:10%;">
                      <col style="width:10%;">
                      <col style="width:10%;">
                      <col style="width:12%;">
                      <col style="width:10%;">
                      <col style="width:10%;"> -->
                      <!-- <col style="width: auto;"> -->
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                      <col style="width: auto;">
                  </colgroup>
                    <thead>
                        <tr>
                            <th style="background: none;">순서</th>
                            <th style="background: none;">등수</th>
                            <th style="background: none;">이름</th>
                            <th style="background: none;">기록</th>
                            <th style="background: none;">비고</th>
                            <th style="background: none;">신기록</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="1" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="2" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="권 산"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required=""  style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="2" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="7" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="임지훈"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="3" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="5" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="천효민"
                                    maxlength="30" required="" readonly /></td>
                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="4" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="4" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="이은비"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="5" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="1" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="김조은"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="6" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="8" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="최민정"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="7" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="3" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="김민지"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="8" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="6" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="황근원"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rain" class="input_text" value="" min="1" max="12"
                                    required="" readonly /></td>
                            <td><input type="number" name="rank" class="input_text" value="" min="1" max="12"
                                    required="" /></td>
                            <td><input placeholder="선수 이름" type="text" name="playername" class="input_text" value="공백"
                                    maxlength="30" required="" readonly /></td>

                            <td><input placeholder="경기 결과" type="text" name="gameresult" class="input_text" value=""
                                    maxlength="3" required="" onkeyup="inputNumberFormat(this)" style="
                                    " /></td>
                            <td><input placeholder="비고" type="text" name="bigo" class="input_text" value=""
                                    maxlength="100" /></td>
                            <td><select>
                                    <option>해당없음</option>
                                    <option>대회신기록</option>
                                    <option>아시아신기록</option>
                                    <option>아시아U20신기록</option>
                                    <option>세계U20신기록</option>
                                    <option>세계신기록</option>
                                </select></td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn_base base_mar col_right">
                    <input type="button"
                        onclick="window.open('addresult.html','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                        class="btn_add bold  float_r" value="불러오기">
                </div>
                <h3>경기 비고</h3>
                <div class="input_row">
                    <input placeholder="비고" type="text" name="gamepass" class="input_text" value="" maxlength="100" />
                </div>

            </form>
        </div>
    </div>
    <div class="container">
        <div class="something" style="padding: 60px 60px 60px 60px;">
        <h3>조 구성원 변경</h3>
                <table cellspacing="0" cellpadding="0" class="team_table" style="border-top:0px">
                <tr>
                  <th></th>
                  <th>1조</th>
                  <th>2조</th>
                  <th>3조</th>
                  <th>4조</th>
                </tr>
                <tr>
                        <td>1번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">한국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">일본</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>

                </tr>
                <tr>
                        <td>2번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">일본</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>3번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>4번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">말레이시아</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>5번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">말레이시아</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">한국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>6번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">카타르</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">대만</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>7번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">한국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">일본</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>8번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">대만</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">홍콩</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>9번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">태국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">홍콩</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>10번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">쭝국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">홍콩</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>11번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">대만</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">홍콩</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                <tr>
                        <td>12번</td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">대만</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">홍콩</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">중국</a></td>
                        <td><a onclick="window.open('change_member.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')">인도</a></td>
                </tr>
                </table>
                <div class="signup_submit">
                    <button type="submit" class="btn_login" name="addresult">
                        <span>확인</span>
                    </button>
                </div>
                
        </div>
    </div>
</body>

</html>
