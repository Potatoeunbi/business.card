<?php
	include "../db.php";
	include "../password.php";

	$userid = $_POST['uid'];



	function passwordCheck($str){
    $pw = $str;
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
 
    if(strlen($pw) < 10 || strlen($pw) > 30)
    {
        return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.");
        exit;
    }
 
    if(preg_match("/\s/u", $pw) == true)
    {
        return array(false, "비밀번호는 공백없이 입력해주세요.");
        exit;
    }
 
    if( $num == 0 || $eng == 0 || $spe == 0)
    {
        return array(false, "영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
        exit;
    }
 
    return array(true);
}
 
// 사용예
$result = passwordCheck($_POST['pwd']);
if ($result[0] == false)
{
	echo "<script>alert('{$result[1]}'); history.back();</script>";
    exit;
}

	$userpw = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    $accpw=$_POST['Adpwd'];
	$username = $_POST['loginName'];
	$num = $_POST['loginPhone'];
	$birth = $_POST['Birth'];

    $id_check = mq("select * from member where id='$userid'");
	$id_check = $id_check->fetch_array();
	if($id_check >= 1){
		echo "<script>alert('아이디가 중복됩니다.'); history.back();</script>";
	}else{

$sql = mq("insert into member (id,pw,accpw,name,num,birth) values('".$userid."','".$userpw."','".$accpw."','".$username."','".$num."','".$birth."')");

?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">
<?php } ?>