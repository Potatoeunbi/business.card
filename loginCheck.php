<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <?php
   include "./DBConnect.php";
   include "./hashpassword.php";

	//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
	if($_POST["id"] == "" || $_POST["pw"] == ""){
		echo '<script> alert("이메일이나 패스워드 입력하세요"); history.back(); </script>';
	}else{

      //login.php에서 입력받은 id, password
      $Email = $_POST['id'];
      $pw = $_POST['pw'];
      
      $q = "SELECT * FROM userinfo WHERE Email = '".$Email."'";
      $result = mq($q);
      
      $row = mysqli_fetch_array($result);
      $hash_pw=$row['Pwd'];
    
      
      if (password_verify($pw, $hash_pw)) {
        
         $_SESSION['Email'] = $row['Email'];
         $_SESSION['Name'] = $row['Name'];
         $_SESSION['Number']=$row['b_number'];
         $_SESSION['num']=$row['number'];
         echo "<script>console.log( 'PHP_Console: " .$_SESSION['Email']. "' );</script>";
         echo "<script>alert('로그인되었습니다.'); location.href='./index.php';</script>";
         exit;
      

      
      }else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
         echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
      }


   }


      ?>
</body>