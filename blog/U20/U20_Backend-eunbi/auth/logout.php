<?php
    require_once "../backheader.php";

    logInsert($db,$_SESSION['Id'],'로그아웃','');
	session_destroy();
?>
<meta charset="utf-8">
<script>
alert("로그아웃되었습니다.");
location.href = "../index.php";
</script>