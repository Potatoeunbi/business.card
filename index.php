<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=".\css\login.css" />
    <link rel="stylesheet" href="./css/maincontainer.css">
    <link rel="stylesheet" href="./css/mainheader.css">

    <link rel="shortcut icon" href="#">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>







<body>

    <div class="container">


        <div id="flex" class=" h_right">
            <div id="flex">
                <?php
        if(!isset($_SESSION['Email'])){ ?>
                <input value="로그인" class='btn' type='button' id='btnOpen'
                    style="background-color : transparent; text-align: center;  font-size: 12px;  border: none; cursor:pointer">
                <p> | </p>
                <input type='button' class='btn' value='회원가입' id='btnOpen'
                    style="background-color : transparent; text-align: center; font-size: 12px;  border: none; cursor:pointer; margin-left:2px">

                <?php }else{ ?>

                <input value="채팅페이지" type='button'
                    style="background-color : transparent; text-align: center; font-size: 12px; border: none; cursor:pointer; margin-left:2px"
                    onClick="location.href='/chat/index.php'">
                <p> | </p>
                <input value="마이페이지" type='button' id='btnOpen' class='btn'
                    style="background-color : transparent; text-align: center;  font-size: 12px;     border: none;  cursor:pointer">
                <p> | </p>
                <input value="로그아웃" type='button' id='mypage'
                    style="background-color : transparent; text-align: center; font-size: 12px; border: none; cursor:pointer; margin-left:2px"
                    onClick="location.href='./logout.php'">

                <?php }?>
            </div>
        </div>

        <div id="flex" class="h_left">
            <h1 id="flex" style="margin :0">비즈니스</h1>
            <p id="flex">.card</p>
        </div>
        <div id="flex" class="h_center" style="border-radius:3px">
            <form action="cardCheck.php" method="post">
                <input class="h_c_people" type="image" src="./img/people-icon.png" style="pointer-events: none;">
                <input class="h_c_input" type="text" placeholder="회원 번호 입력" name="search" id="search"
                    required="required" value="">
                <input class="h_c_search" type="image" src="./img/search-icon.png" name="" value=""
                    style=" margin-left:3px; " ;>
            </form>
        </div>
    </div>


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
                    <input type='text' name='compnumber' id='compnumber' placeholder="회사 연락처  ('-' 포함하고 입력)">
                </div>

                <div class="inp_text">
                    <input type='text' name='prinumber' id='prinumber' placeholder="본인 연락처  ('-' 포힘하고 입력)">
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


    <script type=text/javascript src=".\js\login.js"></script>
    <script type=text/javascript src=".\js\cardnum.js"></script>
    <script type=text/javascript src=".\js\modalpass.js"></script>


</body>

</html>