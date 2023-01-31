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


    <link rel="shortcut icon" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>







<body style="overflow:hidden;">
    <?php

    include "./DBConnect.php";
    $search = $_GET['number'];


    $q = "SELECT * FROM userinfo WHERE b_number = '".$search."'";
    $result = mq($q);
    
    $row = mysqli_fetch_array($result);
        $Jobgrade=$row['Jobgrade'];
        $Name=$row['Name'];
        $Name_eng=$row['Name_eng'];
        $Enterprise=$row['Enterprise'];
        $Team=$row['Team'];
        $Address=$row['Address'];
        $Com_num=$row['Com_num'];
        $number=$row['number'];

        $q1 = "SELECT c.* FROM companyinfo AS c INNER JOIN userinfo AS u ON c.com_name = '".$Enterprise."'";
        $result1=mq($q1);

        if($com = mysqli_fetch_array($result1)){
        $com_img=$com['com_img'];
        $company=$com['com_num'];
        }
    ?>


    <div class="bigcard">

        <div class="container">
            <header id="flex" class="head" style="padding-top: 25px;height: 45px;">
                <div onclick="location.href='index.php'" id="flex" class="h_left" style="cursor:pointer;">
                    <h1 id="flex">비즈니스</h1>
                    <p id="flex">.card</p>
                </div>
                <div id="flex" class="h_center" style="border-radius:3px">
                    <form action="cardCheck.php" method="post">
                        <input class="h_c_people" type="image" src="./img/people-icon.png"
                            style="pointer-events: none;">
                        <input class="h_c_input" type="text" placeholder="회원 번호 입력" name="search" required="required">
                        <input class="h_c_search" type="image" src="./img/search-icon.png" name="" value=""
                            style=" margin-left:3px; " onClick="" ;>
                    </form>
                </div>
                <div id="flex" class=" h_right">
                    <div id="flex">
                        <?php
        if(!isset($_SESSION['Email'])){ ?>
                        <input value="로그인" class='btn' type='button' id='btnOpen'
                            style="background-color : transparent; text-align: center;  font-size: 12px;  border: none; cursor:pointer">
                        <p style="margin-top : 12px"> | </p>
                        <input type='button' class='btn' value='회원가입' id='btnOpen'
                            style="background-color : transparent; text-align: center; font-size: 12px;  border: none; cursor:pointer; margin-left:2px">

                        <?php }else{ ?>
                        <input value="마이페이지" class='btn' type='button' id='btnOpen'
                            style="background-color : transparent; text-align: center;  font-size: 12px;   border: none;  cursor:pointer">
                        <p style="margin-top : 12px"> | </p>
                        <input value="로그아웃" type='button' id='mypage'
                            style="background-color : transparent; text-align: center; font-size: 12px; border: none; cursor:pointer; margin-left:2px"
                            onClick="location.href='./logout.php'">

                        <?php }?>
                    </div>
                </div>
            </header>

        </div>


        <main>


            <div class="card"
                style="width:1280px; height : 550px; padding:30px; border: 4px solid #2c1a0b; margin-left:110px; margin-top:25px; background-color:#FFFFFF">


                <div style="height: 100px;width:100px;position:relative;left:50px;top:-20px; ">

                    <input onClick="location.href='company.php?com_num=<?php echo $company; ?>'"
                        style="height:350px; width:475px;" type="image" src="<?php echo $com_img ?>">
                </div>


                <div style="position:relative;left:1110px;top:-110px; ">
                    <?php if(isset($_SESSION['Number'])&&($search==$_SESSION['Number'])){ ?>
                    <button
                        style="height:40px; width:180px; font-size:17px; border: 1px solid #2c1a0b;background-color: #FDF5FF; border-radius:4px;font-family: 'Noto Sans KR', sans-serif; cursor:pointer"
                        class="btn createpass">마이페이지</button>

                    <?php }else if(isset($_SESSION['Number'])&&mysqli_num_rows(mq("select * from followinfo where follower_id = '".$_SESSION['num']."' and followed_user_id = '".$row['number']."';"))){ ?>

                    <button
                        style="height:40px; width:180px; font-size:17px; border: 1px solid #2c1a0b;background-color: #FDF5FF; border-radius:4px;font-family: 'Noto Sans KR', sans-serif; cursor:pointer" <?php if(isset($_SESSION['Email'])){ 
                ?> onClick="location.href='unfollow.php?number=<?php echo $number; ?>'" <?php }else{ ?>
                        class="createsite" <?php
            } ?>>팔로우 취소</button>




                    <?php }
                    
                    else{ ?>

                    <button
                        style="height:40px; width:180px; font-size:17px; border: 1px solid #2c1a0b;background-color: #FDF5FF; border-radius:4px;font-family: 'Noto Sans KR', sans-serif; cursor:pointer" <?php if(isset($_SESSION['Email'])){ 
                ?> onClick="location.href='follow.php?number=<?php echo $number; ?>'" <?php }else{ ?>
                        class="createsite" <?php
            } ?>>팔로우하기</button>

                    <?php }?>
                </div>

                <div style="position:relative;left:800px;top: 125px; ">
                    <p style="font-size:30px;font-family: 'Noto Sans KR', sans-serif; "><?php echo $Jobgrade ?></p>
                </div>

                <div style="width:200px;position:relative;left:1020px;top: 50px; ">
                    <p style="font-size:55px;font-family: 'Noto Sans KR', sans-serif; "><?php echo $Name ?></p>
                </div>

                <div style="position:relative;left:1025px;top: 60px; ">
                    <p style="font-size:25px;font-family: 'Noto Sans KR', sans-serif; "><?php echo $Name_eng ?></p>
                </div>


                <div style="height: 100px;width:450px;position:relative;left:70px;top:70px; font-weight:600 ">
                    <p style="font-size:32px;font-family: 'Noto Sans KR', sans-serif; ">
                        <?php echo $Enterprise." ".$Team ?>
                    </p>
                </div>

                <div style="height: 100px;width:700px;position:relative;left:70px;top:20px; ">
                    <p style="font-size:22px;font-family: 'Noto Sans KR', sans-serif; ">
                        <?php echo $Address.", ".$Com_num ?>
                    </p>
                </div>


                <div style="position:relative;left:80px; top:-10px;">
                    <?php if(isset($_SESSION['Number'])&&($search==$_SESSION['Number'])){ ?>
                    <button onClick="location.href='./chat/index.php'"
                        style="height:55px; width:250px; font-size:23px; border: 1px solid #2c1a0b;background-color: #FDF5FF; border-radius:7px; font-family: 'Noto Sans KR', sans-serif; cursor:pointer">채팅하러
                        가기</button>
                    <?php }else{ ?>
                    <button
                        style="height:55px; width:250px; font-size:23px; border: 1px solid #2c1a0b;background-color: #FDF5FF; border-radius:7px; font-family: 'Noto Sans KR', sans-serif; cursor:pointer" <?php if(isset($_SESSION['Email'])){ 
                ?> onClick="location.href='./chat/index.php'" <?php }else{ ?> <?php ?>class="createsite" <?php
            } ?>>채팅하러 가기</button>
                    <?php }?>
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
    <script type=text/javascript src=".\js\modallogin.js"></script>
    <script type=text/javascript src=".\js\modalpass.js"></script>

</body>

</html>