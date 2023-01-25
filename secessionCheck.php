<?php
   include "./DBConnect.php";
   include "./hashpassword.php";


   $Email = $_SESSION['Email'];
      $pw = $_POST['SPass'];
      
      $q = "SELECT * FROM userinfo WHERE Email = '".$Email."'";
      $result = mq($q);
      
      $row = mysqli_fetch_array($result);
      $number=$row['number'];
      $hash_pw=$row['Pwd'];
      
      if (password_verify($pw, $hash_pw)) {
        

        $q1 = "DELETE FROM userinfo WHERE number = '".$number."'";
        $result1 = mq($q1);
        
         echo "<script>alert('탈퇴되었습니다.'); location.href='./index.php';</script>";
         session_destroy();
         exit;
      

      
      }else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
         echo "<script>alert('비밀번호를 확인하세요.'); history.back();</script>";
      }





      ?>