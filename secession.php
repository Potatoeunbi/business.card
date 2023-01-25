<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=".\css\login.css" />
    <link rel="stylesheet" href="./css/container.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/mypagemain.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/mypage.css">

    <link rel="shortcut icon" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body class="manage_comm" style="overflow:hidden;">

    <?php

include "./DBConnect.php";
$Email = $_SESSION['Email'];


$q = "SELECT * FROM userinfo WHERE Email = '".$Email."'";
$result = mq($q);

$row = mysqli_fetch_array($result);
    $Jobgrade=$row['Jobgrade'];
    $Name=$row['Name'];
    $Name_eng=$row['Name_eng'];
    $Enterprise=$row['Enterprise'];
    $Team=$row['Team'];
    $Address=$row['Address'];
    $Com_num=$row['Com_num'];

?>


    <div class="container">
        <header id="flex" class="head" style="padding-top: 25px;height: 45px;">
            <div onclick="location.href='index.php'" id="flex" class="h_left" style="cursor:pointer;">
                <h1 id="flex">비즈니스</h1>
                <p id="flex">.card</p>
            </div>

            <nav id="Gnb">
                <u1 class="list_gnb">
                    <li>
                        <a href="mypage.php" class="">계정 정보</a>
                        <a href="mypagepass.php" class="">비밀번호 변경</a>
                        <a href="secession.php" class="">계정 탈퇴</a>
                    </li>
                </u1>
            </nav>

            <div style="  height: 45px;
  padding-left: 230px;
  font-size: 14px;
  white-space: nowrap;">
                <div id="flex">
                    <p style="margin-top : 15px;font-size: 12px; margin-left:190px;">
                        <?php echo $_SESSION['Name']; ?>&nbsp님
                    </p>
                    <p style="margin-top : 12px"> | </p>
                    <input value="로그아웃" type='button' id='Logoutbt'
                        style="background-color : transparent; text-align: center; font-size: 12px; border: none; cursor:pointer margin-left:2px"
                        onClick="location.href='./logout.php'">
                </div>
            </div>
        </header>

    </div>

    <main>
        <div class="main-container"
            style="width:600px; height : 300px; padding:30px; margin-left:465px; margin-top:25px ">

            <form method="post" action="secessionCheck.php">
                <div class="temp-info" style="height:270px">
                    <p
                        style="font-size:25px;text-align: left; margin-left:25px; margin-top:10px;width:550px;border-bottom: 1px solid #ebebeb;">
                        계정 탈퇴</p>




                    <div class="info-box">
                        <p style="color:red">정말로 탈퇴하시겠습니까? </p>

                    </div>

                    <div class="info-box">
                        <p style="width:200px">비밀번호 재입력 </p>
                        <p><input type="text" value="" name="SPass"></p>
                    </div>

                    <div class="info-box">
                        <button type="submit"
                            style="text-align:center; margin-left:200px;margin-top:20px; height:35px; font-family: 'Noto Sans KR', sans-serif; font-size:18px">탈퇴하기</button>
                    </div>

                </div>
            </form>

        </div>
    </main>










</body>

</html>