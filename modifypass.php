<?php
   include "./DBConnect.php";
   include "./hashpassword.php";


   $Email = $_SESSION['Email'];


   if($_POST['Pass']!=$_POST['PassCheck']){
    echo '<script> alert("비밀번호 확인과 비밀번호가 맞지 않습니다."); history.back(); </script>';
}else{

    $userpw = password_hash($_POST['Pass'], PASSWORD_DEFAULT);
      
      $q = "UPDATE userinfo SET Pwd = '".$userpw."' WHERE Email = '".$Email."'";
      $result = mq($q);
      
      echo "<script>alert('수정이 완료되었습니다.'); history.back();</script>";

}
      ?>