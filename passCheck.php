<?php
   include "./DBConnect.php";
   include "./hashpassword.php";


   $Email = $_SESSION['Email'];
      $pw = $_POST['accpw'];
      
      $q = "SELECT * FROM userinfo WHERE Email = '".$Email."'";
      $result = mq($q);
      
      $row = mysqli_fetch_array($result);
      $number=$row['number'];
      $hash_pw=$row['Pwd'];
      
      if (password_verify($pw, $hash_pw)) {
        

  
         echo "<script>location.href='./mypage.php';</script>";
         exit;
      

      
      }else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
         echo "<script>alert('비밀번호를 확인하세요.'); history.back();</script>";
      }





      ?>