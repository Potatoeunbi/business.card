<?php
	require_once "auth/config.php";
	include_once "./lib.php";

	$page_name = "관리자회원관리";
	$menu_out = 2;
	$menu_in = "admin";

	$page_size = 10;
	$page_list_size = 5;
	$page = 1;
	
	$sql_add = " WHERE admin_id > 0";
	
	$order_add = " ORDER BY admin_datetime DESC ";
	$link_add = "";
	$search = "";
	$sc = "";

	if(isset($_GET['page']))
		$page = trim($_GET['page']);
	if ($page < 1) $page = 1;
	
	$page_list_count = ($page-1) * $page_size;



	if(isset($_GET['order']) && isset($_GET['sc']))
	{
		$order = trim($_GET['order']);
		$sc = trim($_GET['sc']);

		$order_col = "admin_".$order;
		$order_add = " ORDER BY $order_col $sc ";

		$link_add .= "&order=".$order."&sc=".$sc;
	}

	$sql = "SELECT * FROM list_admin $sql_add";
	$result=$db->query($sql);
	$total_count  = mysqli_num_rows($result);

	//require_once "head.php";
?>

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
</head>

<body>
    <div class="container_wr">
        <div class="local_ov01 local_ov">
            <a href="admin_list.php" class="ov_listall">전체목록</a> <span class="btn_ov01"><span class="ov_txt">관리자수
                </span><span class="ov_num"> <?=$total_count?>명 </span></span>
        </div>
        <form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
            <div class="sch_last">
                <input type="text" name="search" value="<?=$search?>" required class="required frm_input" />
                <input type="submit" class="btn_submit" value="검색" />
            </div>
        </form>
        <form name="list" id="list" action="member_delete.php" method="post">
            <div class="tbl_head01 tbl_wrap">
                <table>
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" name="chkall" value="1" id="chkall"
                                    onclick="check_all(this.form)" /></th>
                            <th scope="col">번호</th>
                            <th scope="col">아이디</th>
                            <th scope="col">이름</th>
                            <th scope="col"><a href="<?=Get_Sort_Link("datetime", $page, $link_add, $sc)?>">관리자등록일</a>
                            </th>
                            <th scope="col"><a
                                    href="<?=Get_Sort_Link("latest_datetime", $page, $link_add, $sc)?>">최종접속일</a>
                            </th>
                            <th scope="col">관리</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$i = $total_count - $page_list_count;
						$j = 0;
						$sql = "SELECT * FROM list_admin $sql_add $order_add LIMIT $page_list_count, $page_size";
						$result=$db->query($sql);
						while($rs = mysqli_fetch_array($result)){
					 ?>
                        <tr class="bg<?=$j%2?>">
                            <td class="td_chk"><input type="checkbox" name="chk[]" value="<?=$rs['admin_id']?>"
                                    id="chk_<?=$rs['admin_id']?>" /></td>
                            <td class="td_num"><?=$i?></td>
                            <td class="td_center"><?=$rs['admin_account']?></td>
                            <td class="td_center"><?=$rs['admin_name']?></td>
                            <td class="td_datetime"><?=$rs['admin_datetime']?></td>
                            <td class="td_datetime"><?=$rs['admin_latest_datetime']?></td>
                            <td class="td_mng td_mng_s"><a href="admin_modify.php?id=<?=$rs['admin_id']?>"
                                    class="btn btn_03">수정</a></td>
                        </tr>
                        <?php $i--; $j++; } ?>
                    </tbody>
                </table>
            </div>
            <div class="btn_fixed_top">
                <input type="submit" name="act_button" value="선택삭제" class="btn btn_02" />
                <a href="admin_write.php" class="btn btn_01">관리자등록</a>
            </div>
        </form>
        <nav class="pg_wrap">
            <?=Get_Pagenation($page_list_size, $page_size, $page, $total_count, $link_add)?>
        </nav>
        <script>
        $(function() {
            $("#list").submit(function() {
                if (confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                    if (!is_checked("chk[]")) {
                        alert("선택삭제 하실 항목을 하나 이상 선택하세요.");
                        return false;
                    }
                    return true;
                } else {
                    return false;
                }
            });
        });
        </script>
    </div>
    <?
	require_once "footer.php";
?>

</body>