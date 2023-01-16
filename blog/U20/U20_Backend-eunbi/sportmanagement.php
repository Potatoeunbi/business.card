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
    <link rel="stylesheet" href="sport/updateSport.php" />  
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="/fontawesome/js/all.min.js"></script>
    <title>U20</title>
    <?php
    
    include_once "auth/config.php";
    include_once "./module/pagination.php";

    $searchValue = getSearchValue($_GET["search_sports"] ?? NULL);
    $pageValue = getPageValue($_GET["page"] ?? NULL);
    $categoryValue = getCategoryValue($_GET["order"] ?? NULL);
    $orderValue = getOrderValue($_GET["sc"] ?? NULL);
    $pagesizeValue = getPageSizeValue($_GET["page_size"] ?? NULL);

    $page_list_size = 10;
    $link = "";

    $tableName = "list_sports";
    $columnStartsWith = "sports_";
    $id = $columnStartsWith . "id";


    $sql_where = " WHERE $id > 0";
    $sql_order = " ORDER BY $id DESC ";
    $sql_like = " AND (sports_code LIKE ? OR sports_name LIKE ? OR sports_name_kr LIKE ?)";
    
    $page_list_count = ($pageValue - 1) * $pagesizeValue;
    $param = null;

    if(isset($searchValue)){
        $param=trim("%{$_GET['search_sport']}%");
        $sql_where = addLikeToWhereStmt($sql_where, $sql_like);
        $link = addToLink($link, "&search_sports=", $searchValue);
    }

    if (isset($pagesizeValue)){
        $link = addToLink($link, "&page_size=", $pagesizeValue);
    } 

    if (isset($categoryValue) && isset($orderValue)) {
        $sql_order = makeOrderBy($columnStartsWith, $categoryValue, $orderValue);
        $link = addToLink($link, "&order=", $categoryValue);
        $link = addToLink($link, "&sc=", $orderValue);
    }


    $sql = "SELECT sports_id, sports_name, sports_code FROM  $tableName $sql_where";

    if(isset($searchValue)){
        $stmt= $db->prepare($sql); 
        $stmt->bind_param("sss", $param,$param,$param); 
        $stmt->execute();
        $count = $stmt->get_result(); 

        $sql .= " $sql_order LIMIT $page_list_count, $pagesizeValue";
        $stmt= $db->prepare($sql); 
        $stmt->bind_param("sss", $param,$param,$param); 
        $stmt->execute();
        $result = $stmt->get_result(); 
    }else{
        $count=$db->query($sql);

        $sql .= " $sql_order LIMIT $page_list_count, $pagesizeValue";
        $result=$db->query($sql);
    }
    $total_count = mysqli_num_rows($count);




?>
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
                        <h2 class="country_h2">경기 목록</h2>
                        <div class="page_size">
                            <label class=>페이지당
                                <select name="page_size" onchange="changeTableSize(this);" id="changePageSize"
                                    class="changePageSize">
                                    <?php
                                    echo '<option value="5"' .($pagesizeValue==5?'selected':''). '>5</option>';
                                    echo '<option value="10"' . ($pagesizeValue==10?'selected':'') . '>10</option>';
                                    echo '<option value="15"' . ($pagesizeValue==15?'selected':'') . '>15</option>';
                                    echo '<option value="20"' .($pagesizeValue==20?'selected':'') . '>20</option>';
                                    ?>
                                </select> 개씩 보기
                            </label>
                        </div>

                        <div class="selectArea float_l">
                            <form action="./execute_excel.php" method="post" enctype="multipart/form-data">
                                <input type="submit" name="query" id="execute_excel" value="<?php echo $sql ?>"
                                    hidden />
                                <?php if ($param != null) {
                                    $param = str_replace('%', '', $param);
                                    $param = array_fill(0, 3, $param);
                                    echo '<input type="text" name="keyword" value=' . implode(',', $param) . ' hidden />';
                                }
                                ?>
                                <input type="text" name="role" value="sport_management" hidden />

                                <label for="execute_excel" class="btn_excel label_for_excel_import bold float_l">엑셀
                                    출력</label>
                            </form>
                        </div>

                        <!-- <div class="selectArea float_l">
                            <div class="btn_base base_mar col_left">
                                <input type="button" onclick="" class="btn_excel bold" value="엑셀 출력" />
                            </div>
                        </div> -->
                        <!-- <div class="selectArea float_r">
                            <div class="select_box mr10">
                                <select class="d_select" title="경기종목 고유번호" style="width: 160px;">
                                    <option value="1">경기종목 고유번호</option>
                                    <option value="2">20230604</option>
                                    <option value="3">20230605</option>
                                    <option value="4">20230606</option>
                                    <option value="5">20230607</option>
                                </select>
                            </div>

                            <div class="select_box mr10">
                                <select class="d_select" title="경기종목 코드" style="width: 140px;">
                                    <option value="" hidden="">경기종목 코드</option>
                                    <option value="1">1111111</option>
                                    <option value="2">1212111</option>
                                </select>
                            </div>

                            <div class="select_box mr10">
                                <select class="d_select" title="구분" style="width: 172.667px;">
                                    <option value="" hidden="">종목</option>
                                    <option value="" disabled="">단거리달리기</option>
                                    <option value="1">100M</option>
                                    <option value="2">200M</option>
                                    <option value="3">400M</option>
                                    <option value="" disabled="">중/장거리</option>
                                    <option value="4">800M</option>
                                    <option value="5">1500M</option>
                                    <option value="6">3000M(여)</option>
                                    <option value="7">5000M</option>
                                    <option value="8">10000M(남)</option>
                                    <option value="9">3000M 장애물</option>
                                    <option value="" disabled="">허들달리기</option>
                                    <option value="10">100M 허들(여)</option>
                                    <option value="11">110M 허들(남)</option>
                                    <option value="12">400M 허들</option>
                                    <option value="" disabled="">점프경기</option>
                                    <option value="13">높이뛰기</option>
                                    <option value="14">장대높이뛰기</option>
                                    <option value="15">멀리뛰기</option>
                                    <option value="16">삼단뛰기</option>
                                    <option value="" disabled="">던지기</option>
                                    <option value="17">투포환</option>
                                    <option value="18">원반던지기</option>
                                    <option value="19">해머던지기</option>
                                    <option value="20">창던지기</option>
                                    <option value="" disabled="">종합</option>
                                    <option value="21">7종 경기</option>
                                    <option value="22">10종 경기</option>
                                    <option value="" disabled="">경보</option>
                                    <option value="23">10000M 경보</option>
                                    <option value="" disabled="">릴레이</option>
                                    <option value="24">4x100M 릴레이</option>
                                    <option value="25">4x400M 릴레이</option>
                                    <option value="26">4x400M 혼성</option>
                                </select>
                            </div> -->

                            <form action="" enctype="multipart/form-data" class="searchForm" name="judge_searchForm"
                            method="get"
                            style="display: flex; flex-wrap: wrap; align-items: center; justify-content: flex-end;">
                            <div class="selectArea float_r">

                                <div class="search" style="width: 260px; ">
                                    <input type="text" id="search_sports" class="word" name="search_sports"
                                        placeholder="검색어를 입력해주세요" maxlength="30"
                                        value="<?php echo isset($searchValue) ? $searchValue : ''; ?>" style="width: 260px;
                            height: 40px;
                            padding-left: 20px;
                            font-size: var(--font-small);">
                                    <button name="search" value="search" type="submit" class="btn_search"
                                        title="검색"></a>
                                </div>
                            </div>
                        </form>
                        </div>
                </div>
                <thead>
                    <tr>
                        <th scope="col">구분</th>
                        <th colspan="2" scope="col">경기종목 고유번호</th>
                        <th scope="col">경기종목 코드</th>
                        <th scope="col">경기종목 이름</th>
                        <th scope="col">경기종목 이름(한글)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="col">0</td>
                        <td colspan="2" scope="col">000001</td>
                        <td scope="col">123123</td>
                        <td scope="col">100m</td>
                        <td scope="col">100미터</td>
                    <tr>
                        <td scope="col">1</td>
                        <td colspan="2" scope="col">000101</td>
                        <td scope="col">1231234</td>
                        <td scope="col">200m</td>
                        <td scope="col">200미터</td>
                    </tr>
                    <tr>
                        <td scope="col">2</td>
                        <td colspan="2" scope="col">000011</td>
                        <td scope="col">1231235</td>
                        <td scope="col">400m</td>
                        <td scope="col">400미터</td>
                    </tr>
                    <?php
                    $i = $total_count - $page_list_count;
                    $j=0;
                    while($row = mysqli_fetch_array($result)){
                        echo '<tr>';
                        echo "<td scope='col'>".$i."</td>";
                        echo "<td colspan='2' scope='col'>".htmlspecialchars($row["sports_id"])."</td>";
                        echo "<td scope='col'>".htmlspecialchars($row["sports_code"])."</td>";
                        echo "<td scope='col'>".htmlspecialchars($row["sports_name"])."</td>";
                        echo "<td scope='col'>".htmlspecialchars($row["sports_name_kr"])."</td>";
                        echo "</td>";
                        echo "</tr>";
                        $i--; $j++;
                    }    ?>
            

                </tbody>
                </table>
                <div class="selectArea float_r">
                    <div class="btn_base base_mar col_right">
                        <input class="btn_add btn_txt bold" type="button"
                            onclick="window.open('newsport.php','창 이름','width=900,height=512,location=no,status=no,scrollbars=yes')"
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
                    <?=Get_Pagenation($page_list_size, $pagesizeValue, $pageValue, $total_count, $link)?>
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
