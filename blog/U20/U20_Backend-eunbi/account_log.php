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
    <title>U20</title>
    <?php 
        include_once "auth/config.php";
        include_once "./lib.php";

        //auth_Check($db,'authAccountsRead'); //권한 확인

        $page_size = 10; //한 페이지당 몇 개씩 보이게 할 거냐
        $page_list_size = 10; //10페이지마다 넘기기 이런 거
        $page = 1;
        $sql_add = " WHERE log_id > 0";
        $order_add = " ORDER BY log_id DESC ";
        $link_add = "";
        $sc = "";
        
        if(isset($_GET['page']))
		    $page = trim($_GET['page']);
	    if ($page < 1) $page = 1;
        $page_list_count = ($page-1) * $page_size;
        
        if(isset($_GET["search_user"])){
            $param=trim("%{$_GET['search_user']}%");
            $sql_add .= " AND (log_account LIKE ? OR log_name LIKE ? OR log_activity LIKE ?) ";
            $link_add .= "&search_user=".$_GET['search_user'];
        }

        if(isset($_GET['order']) && isset($_GET['sc']))
        {
            $order = trim($_GET['order']);
            $sc = trim($_GET['sc']);
    
            $order_col = "log_".$order;
            $order_add = " ORDER BY $order_col $sc ";
    
            $link_add .= "&order=".$order."&sc=".$sc;
        }

        $sql = "SELECT * FROM list_log $sql_add";

        if(isset($_GET["search_user"])){
            $stmt= $db->prepare($sql); 
            $stmt->bind_param("sss", $param,$param, $param); 
            $stmt->execute();
            $count = $stmt->get_result(); 

            $sql .= " $order_add LIMIT $page_list_count, $page_size";
            $stmt= $db->prepare($sql); 
            $stmt->bind_param("sss", $param,$param, $param); 
            $stmt->execute();
            $result = $stmt->get_result(); 
        }else{
            $count=$db->query($sql);

            $sql .= " $order_add LIMIT $page_list_count, $page_size";
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
        <div class="something contents ptop--40">
            <div class="mypage_100">
                <h3>로그 목록</h3>
                <div class="mypage_notice">
                </div>
            </div>

            <div class="table_wrap">
                <div class="btn_base base_mar">
                    <input type="button" onclick="" class="btn_excel bold" value="엑셀 출력">
                </div>
                <form action="" enctype="multipart/form-data" class="searchForm" name="judge_searchForm" method="get"
                    style="display: flex; flex-wrap: wrap; align-items: center; justify-content: flex-end;">
                    <div class="selectArea float_r">

                        <div class="search" style="width: 260px; ">
                            <input type="text" id="search_user" class="word" name="search_user"
                                placeholder="검색어를 입력해주세요" maxlength="30" style="width: 260px;
                            height: 40px;
                            padding-left: 20px;
                            font-size: var(--font-small);">
                            <button name="search" value="search" type="submit" class="btn_search" title="검색"></a>
                        </div>
                    </div>
                </form>
            </div>

            <div>
                <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover team_table">
                    <colgroup>
                        <col style="width: 10%" />
                        <col style="width: 10%" />
                        <col style="width: 10%" />
                        <col style="width: 10%" />
                        <col style="width: 30%" />
                        <col style="width: 15%" />
                        <col style="width: 15%" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>순번</th>
                            <th>아이디</th>
                            <th>이름</th>
                            <th>계정</th>
                            <th>활동내역</th>
                            <th>IP</th>
                            <th><a href="<?=Get_Sort_Link("datetime", $page, $link_add, $sc)?>">시간</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = $total_count - $page_list_count;
                        $j=0;
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr>';
                            echo "<td>".$i."</td>";
                            echo "<td>".htmlspecialchars($row["log_account"])."</td>";
                            echo "<td>".htmlspecialchars($row["log_name"])."</td>";
                            echo "<td>".htmlspecialchars($row["log_division"]=='a'?'관리자':'심판')."</td>";
                            echo "<td>".htmlspecialchars($row["log_activity"]).($row["log_sub_activity"] ? '('.htmlspecialchars($row["log_sub_activity"]).')' : '')."</td>";
                            echo "<td>".htmlspecialchars($row["log_ip"])."</td>";
                            echo "<td>".htmlspecialchars($row["log_datetime"])."</td>";
                            echo '</tr>';
                            $i--; $j++; }    ?>

                    </tbody>
                </table>
            </div>

            <div class="page_wrap">
                <div class="page_nation">
                    <?=Get_Pagenation($page_list_size, $page_size, $page, $total_count, '')?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'footer.php'; ?>

    <script src="js/main.js"></script>
</body>

</html>