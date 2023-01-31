<?php

include "./DBConnect.php";
$search = $_POST['search'];

$q = "SELECT * FROM userinfo WHERE b_number = '".$search."'";
$result = mq($q);

if($row = mysqli_fetch_array($result)){


    echo "<script> location.href='card.php?number=$search';</script>";

}else{
echo "<script>
alert('해당 회원 번호는 존재하지 않습니다.');
history.back();
</script>";
}



?>