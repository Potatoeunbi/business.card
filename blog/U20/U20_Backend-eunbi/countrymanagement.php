<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>U20</title>
</head>

<body>
  <!-- header -->
  <?php include 'header.php' ?>

  <!-- sidebar -->
  <?php include 'sidebar.php' ?>

    <!-- contents 본문 내용 -->
    <div class="container">
        <div class="contents main-table">
            <div class="country_table space">
                <div class="team_tabs-content tab">
                    <table class="table table-hover team_table">
                        <h2 class="country_h2">국가 목록</h2>
                        <div class="selectArea float_l">
                            <div class="btn_base base_mar col_left">
                                <input type="button" onclick="" class="btn_excel bold" value="엑셀 출력" />
                            </div>
                        </div>
                        <div class="selectArea float_r">
                            <div class="select_box mr10">
                                <select class="d_select" title="국가 이름" style="width: 122px">
                                    <option value="" hidden="">
                                        국가 이름
                                    </option>
                                    <option value="1">Korea</option>
                                    <option value="2">Japan</option>
                                </select>
                            </div>

                            <div class="select_box mr10">
                                <select class="d_select" title="지역" style="width: 172.667px">
                                    <option value="" hidden="">국가 코드</option>
                                    <option value="" >KOR</option>
                                    <option value="1">JAP</option>
                                </select>
                            </div>

                            <div class="search" style="width: 50px">
                                <button type="submit" class="btn_search" title="검색"></button>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th colspan="3" scope="col">국가 이름</th>
                                <th colspan="3" scope="col">국가 코드</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col">0</td>
                                <td colspan="3" scope="col">Korea</td>
                                <td colspan="3" scope="col">KOR</td>
                            <tr>
                                <td scope="col">1</td>
                                <td colspan="3" scope="col">
                                    Japan
                                </td>
                                <td colspan="3" scope="col">
                                    JAP
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                    <div class="selectArea float_r">
                        <div class="btn_base base_mar col_right">
                            <input class="btn_add btn_txt bold" type="button"
                                onclick="window.open('newcountry.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
                                value="등록" class="btn_view">
                        </div>
                        <colgroup>
                            <col width="auto" />
                            <col width="auto" />
                            <col width="auto" />
                            <col width="auto" />
                            <col width="auto" />
                            <col width="auto" />
                        </colgroup>
                    </div>
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
    <script src="js/main.js"></script>
</body>

</html>
