<!DOCTYPE html>
<html lang="en">

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

        //auth_Check($db,'authAccountsRead');

        $page_size = 10;
        $page_list_size = 10;
        $page = 1;
        $sql_add = " WHERE admin_id > 0";
        $order_add = " ORDER BY admin_id DESC ";
        $link_add = "";
        $sc = "";

        if(isset($_GET['page']))
		    $page = trim($_GET['page']);
	    if ($page < 1) $page = 1;
        $page_list_count = ($page-1) * $page_size;
        
        if(isset($_GET["search_user"])){
            $param=trim("%{$_GET['search_user']}%");
            $sql_add .= " AND (admin_account LIKE ? OR admin_name LIKE ?) ";
            $link_add .= "&search_user=".$_GET['search_user'];
        }

        if(isset($_GET['order']) && isset($_GET['sc']))
        {
            $order = trim($_GET['order']);
            $sc = trim($_GET['sc']);
    
            $order_col = "admin_".$order;
            $order_add = " ORDER BY $order_col $sc ";
    
            $link_add .= "&order=".$order."&sc=".$sc;
        }

        $sql = "SELECT * FROM list_admin $sql_add";


        if(isset($_GET["search_user"])){
            $stmt= $db->prepare($sql); 
            $stmt->bind_param("ss", $param,$param); 
            $stmt->execute();
            $count = $stmt->get_result(); 

            $sql .= " $order_add LIMIT $page_list_count, $page_size";
            $stmt= $db->prepare($sql); 
            $stmt->bind_param("ss", $param,$param); 
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
                <h3>계정 목록</h3>
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
                        <col style="width: 15%" />
                        <col style="width: 15%" />
                        <col style="width: 40%" />
                        <col style="width: 10%" />
                        <col style="width: 10%" />

                    </colgroup>
                    <thead>
                        <tr>
                            <th>순번</th>
                            <th>아이디</th>
                            <th>이름</th>
                            <th>권한</th>
                            <th>권한변경</th>
                            <th>삭제</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = $total_count - $page_list_count;
                        $j=0;
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr>';
                            echo "<td>".$i."</td>";
                            echo "<td>".htmlspecialchars($row["admin_account"])."</td>";
                            echo "<td>".htmlspecialchars($row["admin_name"])."</td>";
                            echo "<td>".htmlspecialchars($row["admin_level"])."</td>";
                            echo  "<td><input type='button' onclick=location.href='./account_change_auth.php?id=".$row["admin_account"]."' value='수정' class='btn_modify'></td>";
                            echo "<td scope='col'><input type='button' onclick="."admin_Delete(".$row["admin_id"].")"." value='삭제' class='btn_delete'></td>";
                            echo '</tr>';
                            
                            $i--; $j++;}    
                        ?>

                        <script type="text/javascript" language="javascript">
                        function admin_Delete(admin_id_num) {
                            let form = document.createElement('form');
                            form.setAttribute('method', 'post');
                            form.setAttribute('action', '');
                            let admin_id = document.createElement('input');
                            admin_id.setAttribute('type', 'hidden');
                            admin_id.setAttribute('name', 'admin_delete');
                            admin_id.setAttribute('value', admin_id_num);
                            form.appendChild(admin_id);
                            document.body.appendChild(form);
                            form.submit();
                        }
                        </script>
                        <?php
                            if(isset($_POST["admin_delete"])){
                                $sql = "DELETE FROM list_admin WHERE admin_id=?";
                                $stmt= $db->prepare($sql);
                                $stmt->bind_param("s", $_POST["admin_delete"]);
                                $stmt->execute();
                                echo "<script>location.href='./account_user.php';</script>";
                            }
                        ?>
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