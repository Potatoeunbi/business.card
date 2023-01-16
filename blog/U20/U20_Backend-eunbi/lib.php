<?php
    require_once "./backheader.php";

function Get_Pagenation($write_pages, $page_size, $cur_page, $total_count, $add="")
{
	$url = "?page=";
	$total_page  = ceil($total_count / $page_size);

	$str = '';
	if ($cur_page > 1) {
		$str .= '<a href="'.$url.'1'.$add.'" class="arrow pprev"></a>'.PHP_EOL;
	}

	$start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
	$end_page = $start_page + $write_pages - 1;

	if ($end_page >= $total_page) $end_page = $total_page;

	if ($start_page > 1) $str .= '<a href="'.$url.($start_page-1).$add.'" class="arrow prev"></a>'.PHP_EOL;

	if ($total_page > 1) {
		for ($k=$start_page;$k<=$end_page;$k++) {
			if ($cur_page != $k)
				$str .= '<a href="'.$url.$k.$add.'" class="pg_page">'.$k.'</a>'.PHP_EOL;
			else
				$str .= '<a class="active">'.$k.'</a>'.PHP_EOL;
		}
	}

	if ($total_page > $end_page) $str .= '<a href="'.$url.($end_page+1).$add.'" class="arrow next"></a>'.PHP_EOL;

	if ($cur_page < $total_page) {
		$str .= '<a href="'.$url.$total_page.$add.'" class="arrow nnext"></a>'.PHP_EOL;
	}

	if ($str)
		return "<div class=\"page_nation\"><span class=\"pg\">{$str}</span></div>";
	else
		return "";
}

function Get_Sort_Link($col, $page, $link_add, $flag='asc')
{
	if ($flag == 'asc')
		$flag = 'desc';
	else
		$flag = 'asc';

	$qstr = "?page=".$page.explode("&order",$link_add)[0]."&order=".$col."&sc=".$flag;

	return $qstr;
}
?>