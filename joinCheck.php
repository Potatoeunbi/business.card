<?php
	include "./DBConnect.php";
	include "./hashpassword.php";



    


    if($_POST['uemail']==''||$_POST['pwd']==''||$_POST['enterprise']==''||$_POST['team']==''||$_POST['jobgrade']==''||$_POST['loginName']==''||$_POST['nameeng']==''||$_POST['compnumber']==''||$_POST['prinumber']==''||$_POST['address']==''){
        echo '<script> alert("모두 입력하세요."); history.back(); </script>';
    }else{
    if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST['uemail'])!=true)
    {
        echo '<script> alert("잘못된 이메일 형식입니다."); history.back();</script>';
    }else{
	$email = $_POST['uemail'];
    $enterprise = $_POST['enterprise'];
    $team = $_POST['team'];
    $jobgrade =$_POST['jobgrade'];
    $name=$_POST['loginName'];
    $nameeng=$_POST['nameeng'];
    $compnumber=$_POST['compnumber'];
    $prinumber=$_POST['prinumber'];
    $address=$_POST['address'];
    
    
    $userpw = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$sql = mq("insert into userinfo (Email,Pwd,Enterprise,Team,Jobgrade,Name,Name_eng,Com_num,Pri_num, Address) values('".$email."','".$userpw."','".$enterprise."','".$team."','".$jobgrade."','".$name."',
'".$nameeng."','".$compnumber."','".$prinumber."','".$address."')");
    

echo "<script>alert('회원가입되었습니다.'); location.href='./index.php';</script>";

}
}
?>


?>