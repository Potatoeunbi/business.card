<?php
   include "./DBConnect.php";


   if($_POST['Enterprise']==''||$_POST['Team']==''||$_POST['Jobgrade']==''||$_POST['Name_eng']==''||$_POST['Com_num']==''||$_POST['Address']==''){
    echo '<script> alert("모두 입력하세요."); history.back(); </script>';
}

    $Email = $_SESSION['Email'];

    $Enterprise = $_POST['Enterprise'];
    $Team = $_POST['Team'];
    $Jobgrade =$_POST['Jobgrade'];
    $Name_eng=$_POST['Name_eng'];
    $Com_num=$_POST['Com_num'];
    $Address=$_POST['Address'];
      
      $q = "UPDATE userinfo SET Enterprise = '".$Enterprise."', Team= '".$Team."', Jobgrade = '".$Jobgrade."', Name_eng = '".$Name_eng."', Com_num= '".$Com_num."',Address= '".$Address."' WHERE Email = '".$Email."'";
      $result = mq($q);
      
      echo "<script>alert('수정이 완료되었습니다.'); history.back();</script>";


      ?>