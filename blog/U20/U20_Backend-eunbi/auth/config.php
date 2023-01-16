<?php
    include_once "backheader.php";

	$ID = false;
	$Session = false;

	if(isset($_SESSION['Id']) && $_SESSION['Id'])
		$ID = addslashes($_SESSION['Id']);
	if(isset($_SESSION['Session']) && $_SESSION['Session'])
		$Session = addslashes($_SESSION['Session']);

	if ($ID && $Session) {
		$sqlAdmin = "SELECT * FROM list_admin WHERE admin_account='$ID'";
		$resultAdmin = $db->query($sqlAdmin);
		$RsAuthAdmin = mysqli_fetch_array($resultAdmin);

        $sqlJudge = "SELECT * FROM list_judge WHERE judge_account='$ID'";
		$resultJudge = $db->query($sqlJudge);
		$RsAuthJudge = mysqli_fetch_array($resultJudge);
        

		if(!$RsAuthAdmin&&!$RsAuthJudge) {
			mysqli_close($db);
			echo '<script>location.replace("../login.php");</script>';
			exit;
		}

		if($RsAuthAdmin&&$RsAuthAdmin['admin_session'] != $Session) {
			mysqli_close($db);
			echo '<script>location.replace("../logout.php");</script>';
			exit;
		}

        if($RsAuthJudge&&$RsAuthJudge['judge_session'] != $Session) {
			mysqli_close($db);
			echo '<script>location.replace("../logout.php");</script>';
			exit;
		}

	}
	else {
		mysqli_close($db);
		echo '<script>location.replace("../login.php");</script>';
		exit;
	}


	function auth_Check($db,$action){
		$sql = " SELECT admin_level FROM list_admin WHERE admin_account = '".$_SESSION['Id']."';";
        $row = $db->query($sql);
        $result = mysqli_fetch_array($row);

        if(!in_array($action,explode(',',$result['admin_level']))){
            echo "<script>alert('해당 권한이 없습니다.'); history.back();</script>";
            exit;
        }
	}
?>