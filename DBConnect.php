 <?php
  session_start();
  $host = '220.69.247.23';
   $user = 'root';
   $pw = '';
   $db_name = 'business_card';

   $conn = mysqli_connect($host, $user, $pw, $db_name) or die("MariaDB 접속 실패"); //db 연결

  $conn->set_charset("utf8");

  function mq($sql){
    global $conn;
    return mysqli_query($conn, $sql);
    //$conn->query($sql);
  }

  ?>