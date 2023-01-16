<?php
	include "../db.php";

	$uid = $_GET["userid"];


	$result = file_get_contents("http://220.69.240.130:3000/select");


	//var_dump(json_decode($result, TRUE));
	$R = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($result, TRUE)),RecursiveIteratorIterator::SELF_FIRST);

	foreach ($R as $key => $val) {
		if($uid==$val) { 
		$found = true;
		break;
	 } else {
		$found=false;
	}}

/*	$sql = mq("select * from member where id='".$uid."'");
	$member = $sql->fetch_array();*/

	if($found==false)
	{
?>
	<div style='font-family:"malgun gothic"';><?php echo $uid; ?> 는 사용 가능한 아이디입니다.</div>
	<p><input type=button value="해당 ID 사용" onclick="opener.parent.decide(); window.close();"></p>
<?php 
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>는 중복된 아이디입니다.<div>
	<p><input type=button value="다른 ID 사용" onclick="opener.parent.change(); window.close()"></p>
<?php
	}
?>
