<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=".\css\login.css" />
    <link rel="stylesheet" href="./css/container.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="shortcut icon" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>







<body>

    <?php

    include "./DBConnect.php";


        $q1 = "SELECT * FROM companyinfo where com_num = '".$_GET['com_num']."'";
        $result1=mq($q1);

        if($com = mysqli_fetch_array($result1)){
        $com_img=$com['com_img'];
        $com_name=$com['com_name'];
        $com_indu=$com['com_indu'];
        $com_emcount=$com['com_emcount'];
        $com_scale=$com['com_scale'];
        $com_foundingdate=$com['com_foundingdate'];
        $com_home=$com['com_home'];
        $com_address=$com['com_address'];
        $com_capital=$com['com_capital'];
        $com_take=$com['com_take'];
        }


    ?>




    <div class="container">
        <header id="flex" class="head" style="padding-top: 25px;height: 45px;">
            <div onclick="location.href='index.php'" id="flex" class="h_left" style="cursor:pointer;">
                <h1 id="flex">비즈니스</h1>
                <p id="flex">.card</p>
            </div>
            <div id="flex" class="h_center" style="border-radius:3px">
                <form action="cardCheck.php" method="post">
                    <input class="h_c_people" type="image" src="./img/people-icon.png" style="pointer-events: none;">
                    <input class="h_c_input" type="text" placeholder="회원 번호 입력" name="search" required="required">
                    <input class="h_c_search" type="image" src="./img/search-icon.png" name="" value=""
                        style=" margin-left:3px; " ;>
                </form>
            </div>
            <div class=" h_right">
                <div id="flex">
                    <?php
        if(!isset($_SESSION['Email'])){ ?>
                    <input value="로그인" class='btn' type='button' id='btnOpen'
                        style="background-color : transparent; text-align: center;  font-size: 12px;  border: none; cursor:pointer">
                    <p style="margin-top : 12px"> | </p>
                    <input type='button' class='btn' value='회원가입' id='btnOpen'
                        style="background-color : transparent; text-align: center; font-size: 12px;  border: none; cursor:pointer; margin-left:2px">

                    <?php }else{ ?>
                    <input value="마이페이지" type='button' id='mypage' class="btn"
                        style="background-color : transparent; text-align: center;  font-size: 12px;     border: none;  cursor:pointer">
                    <p style="margin-top : 12px"> | </p>
                    <input value="로그아웃" type='button' id='Logoutbt'
                        style="background-color : transparent; text-align: center; font-size: 12px; border: none; cursor:pointer margin-left:2px"
                        onClick="location.href='./logout.php'">

                    <?php }?>
                </div>
            </div>
        </header>

    </div>



    <main>
        <div class="main-container"
            style="width:1280px; height : 550px; padding:30px; margin-left:190px; margin-top:25px ">
            <div class="temp-box"> <input style="height:150px; width:200px;margin-top:15px" type="image"
                    src="<?php echo $com_img ?>">
            </div>
            <div class="temp-box  box-four">
                <div class="gap-box"></div>
                <div class="border-dee3eb" style="display:flex;">
                    <p style="font-size:22px;margin-top:40px; margin-left:30px">기업명&nbsp&nbsp:&nbsp &nbsp</p>
                    <p style="margin-top:20px;"><?php echo $com_name ?></p>
                </div>
            </div>
            <div class="temp-info">
                <p style="font-size:25px;text-align: left; margin-left:25px; margin-top:10px">▶ 기업 정보</p>
                <div></div>
                <div class="info-box">
                    <p style="width:150px">산업 </p>
                    <p><?php echo $com_indu ?></p>
                </div>
                <div class="info-box">
                    <p style="width:150px">사원 수 </p>
                    <p><?php echo $com_emcount ?>명</p>
                </div>
                <div class="info-box">
                    <p style="width:150px">기업 구분 </p>
                    <p><?php echo $com_scale ?></p>
                </div>
                <div class="info-box">
                    <p style="width:150px">설립일 </p>
                    <p><?php echo $com_foundingdate ?></p>
                </div>
                <div class="info-box">
                    <p style="width:150px">자본금 </p>
                    <p><?php echo $com_capital ?></p>
                </div>
                <div class="info-box">
                    <p style="width:150px">매출액 </p>
                    <p><?php echo $com_take ?></p>
                </div>
                <div class="info-box">
                    <p style="width:150px">홈페이지 </p>
                    <p><?php echo $com_home ?></p>
                </div>
                <div class="info-box">
                    <p style="width:150px">주소 </p>
                    <p><?php echo $com_address ?></p>
                </div>


            </div>


        </div>
    </main>











    <?php if(!isset($_SESSION['Email'])){ ?>
    <div class='modal' id='modal'>

        <div id='content'>
            <legend class="title">로그인</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>로그인 정보를 입력하세요</label>
            <form method="post" action="loginCheck.php">
                <div class="inp_text">
                    <input type="text" style="vertical-align: 0px" id='id' name="id" class="id" placeholder="이메일">
                </div>

                <div class="inp_text">
                    <input type='password' name='pw' id='pw' placeholder="비밀번호" autoComplete="on">
                </div>


                <button type="submit" id='btnCheck' class="btn_login" style="text-align:center">로그인</button>

                <div class="bottomText" style="margin-top:10px">
                    <label>아직 회원이 아니세요??</label>
                    <a href="#" id="btnchangejoin" style="margin:5px">회원가입</a>
                </div>
            </form>
        </div>

    </div>







    <div class='modal' id='modal'>

        <div id='content'>
            <legend class="title">회원가입</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>회원 정보를 입력하세요</label>
            <form method="post" action="joinCheck.php">

                <div class="inp_text">
                    <input type='text' name='uemail' id='uemail' placeholder="명함에 기재된 이메일 주소">
                </div>

                <div class=" inp_text">
                    <input type='password' name='pwd' id='pwd' placeholder="비밀번호" autoComplete="on">
                </div>

                <div class=" inp_text">
                    <input type='text' name='enterprise' id='enterprise' placeholder="기업명">
                </div>

                <div class=" inp_text">
                    <input type='text' name='team' id='team' placeholder="부서명">
                </div>


                <div class=" inp_text">
                    <input type='text' name='jobgrade' id='jobgrade' placeholder="직급">
                </div>

                <div class="inp_text">
                    <input type='text' name='loginName' id='loginName' placeholder="이름">
                </div>


                <div class="inp_text">
                    <input type='text' name='nameeng' id='nameeng' placeholder="영어 이름(정확히 기재)">
                </div>

                <div class="inp_text">
                    <input type='text' name='compnumber' id='compnumber' placeholder="회사 연락처  ('-' 함께 입력)">
                </div>

                <div class="inp_text">
                    <input type='text' name='prinumber' id='prinumber' placeholder="본인 연락처  ('-' 함께 입력)">
                </div>

                <div class="inp_text">
                    <input type='text' name='address' id='address' placeholder="회사 주소">
                </div>





                <button type="submit" id='btnJoin' class="btn_login">회원가입</button>

                <div class="bottomText" style="margin-top:10px">
                    <label>이미 가입하셨나요?</label>
                    <a href="#" id="btnlogin" style="margin:5px">로그인</a>
                </div>
            </form>
        </div>
    </div>



    <?php }else{?>
    <div class='modal' id='modal'>
        <div id='content'>
            <legend class="title">비밀번호 입력</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>비밀번호를 입력하세요</label>
            <form method="post" action="passCheck.php">
                <div class="inp_text">
                    <input type='password' name='accpw' id='accpw' placeholder="비밀번호" autoComplete="on">
                </div>

                <button type="submit" id='btnPass' class="btn_login" style="cursor:pointer">확인</button>
            </form>
        </div>
    </div>
    <?php } ?>
    </div>




    <script type=text/javascript src=".\js\login.js"></script>


</body>

</html>