<!DOCTYPE html>
<html lang="ko">

<head>

    <title>Trade Page</title>
    <meta charset="UTF-8">
    </meta>
    <script src="https://kit.fontawesome.com/1e25dcd7a8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <link rel="stylesheet" href="application\views\css\Treadbutton.css">
    <link rel="stylesheet" href="application\views\css\left.css">
    <link rel="stylesheet" href="application\views\css\slidebar.css">
    <link rel="stylesheet" href="application\views\css\UserInfo.css">
    <link rel="stylesheet" type="text/css" href="application\views\css\login.css" />

    <style>
    * {
        margin: 0px;
    }

    .container {
        width: 100%;
        display: flex;
        margin: 0;
        -ms-overflow-style: none;
        margin-top: 5%;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .blue {
        height: 100%;
        width: 100px;
        background-color: #00C0FF;
    }

    .Tcenter {
        height: 95%;
        width: 100%;
    }

    .trade {
        border-collapse: collapse;
        text-align: left;
        line-height: 1.5;
        display: block;
    }


    /* 테이블 id로 줘서 수정하기 */

    table[id*="table_sample"] {
        border-collapse: collapse;
        width: 100%;
    }

    .table_top>th {
        text-align: center;
        padding: 10px;
        font-weight: bold;
        vertical-align: top;
        color: #70DBFA;
        font-size: 30px;
        border-bottom: 3px solid #9DD3EB;
    }

    .C {
        text-align: center;
        align: right;
        vertical-align: top;
        line-height: 50px;
        font-size: 17px;
    }

    .mypag1 {
        width: 100%;
    }


    .C>tr:nth-child(2n) {
        background-color: #EFEFEF;
    }

    .C>tr:nth-child(2n+1) {
        background-color: #F7F7F7;
    }


    thead[id*="D"] tr:nth-child(n+1) {
        background-color: #EFEFEF;
    }

    .table_top>th {
        width: 20%;
    }
    </style>
</head>

<body style="background-color: #f1f2f4;">
    <div>
        <div class="sidebar">
            <ul class="Menu">
                <li onclick="location.href='board'">
                    <table>
                        <tr>
                            <td><i class="fa-brands fa-ethereum fa-6x"></i></td>
                            <td>
                                <p>SmartContract</p>
                            </td>
                        </tr>
                    </table>
                </li>
                <li onclick="location.href='create'">
                    <table>
                        <tr>
                            <td><i class="fa-solid fa-folder-plus fa-4x"></i></td>
                            <td>
                                <p>Create</p>
                            </td>
                        </tr>
                    </table>
                </li>
                <li onclick="location.href=''">
                    <table>
                        <tr style="color:#00C0FF">
                            <td><i class="fa-solid fa-money-bill-trend-up fa-4x"></i></td>
                            <td>
                                <p>Trade</p>
                            </td>
                        </tr>
                    </table>
                </li>
                <li onclick="location.href='mylist'">
                    <table>
                        <tr>
                            <td><i class="fa-solid fa-wallet fa-4x"></i></td>
                            <td>
                                <p>My list</p>
                            </td>
                        </tr>
                    </table>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="right" style="padding-left:6%;">
            <div class="top">
                <h1 style="font-size:50px;">Trade</h1>
                <div id="UserInfoDiv">
                    <h1 class="User">&nbspUser Info</h1>
                    <i class="fa-solid fa-user fa-2x" id="UserInfo"></i>
                </div>
                <div id="UserInfoCard">
                    <table style="width:100%; text-align: center; height: 100%; color:white;">
                        <tr>
                            <td colspan="2"><i class="fa-solid fa-circle-user fa-5x"></i></td>
                        </tr>
                        <tr>
                            <td colspan="2">지갑</td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo $Wallet['message'] ?></td>
                        </tr>
                        <tr>
                            <td>아이디</td>
                            <td>코인수</td>
                        </tr>
                        <tr>
                            <td id="infoid" value="<?php echo( $_SESSION['id']);?>">
                                <?php echo( $_SESSION['id']);?></td>
                            <td><?php echo $Account['message'] ?></td>
                        </tr>
                    </table>
                </div>


                <div class="center">
                    <div class="trade" id="imypage" style="display: block; width: 100%;">
                        <div class="table_div"
                            style="height: 600px; width: 100%; overflow: scroll; border-radius: 30px; box-shadow: 5px 5px 20px grey;">
                            <table id="table_sample001" class="maintable">
                                <tr class="table_top" style="background-color: white;">
                                    <th>이름</th>
                                    <th>소유자</th>
                                    <th>가격</th>
                                    <th>내용</th>
                                    <th></th>
                                </tr>
                                <tbody id="tbody1">
                                    <?php if(isset($BlockCount)){for($i=1; $i<count($BlockCount); $i++) {
                                        if(strtolower($BlockCount['message'.$i]["addr"]) != strtolower($Wallet['message'])
                                        && $BlockCount['message'.$i]["auction"] == 'true'){
                                    ?>
                                <tbody id="A" class="C">
                                    <tr>
                                        <!-- 현재 소지하고 있는 항목 및 auction이 false(판매 신청상태가 아닌 경우)은 안나오게 if문을 줘야함  -->
                                        <td class="blockname" value="<?php echo $BlockCount['message'.$i]["name"]?>">
                                            <?php echo $BlockCount['message'.$i]["name"]?></td>
                                        <td class="blockaddr" value="<?php echo $BlockCount['message'.$i]["addr"]?>">
                                            <?php echo $BlockCount['message'.$i]["addr"]?></td>
                                        <td class="blockcoin" value="<?php echo $BlockCount['message'.$i]["coin"]?>">
                                            <?php echo $BlockCount['message'.$i]["coin"]?></td>
                                        <td class="blockcontent"
                                            value="<?php echo $BlockCount['message'.$i]["content"]?>">
                                            <?php echo $BlockCount['message'.$i]["content"]?></td>
                                        <td><button id="btn" class="TDetails" type="button" name="button"
                                                value="$1">Details</button></td>
                                    </tr>
                                    <tr colspan="5">
                                        <td colspan="5">
                                            <div id="test1" class="test"
                                                style="display: none; height:300px; overflow:scroll;">
                                                <table id="table_b" style="width:100%; padding: 30px; border:0;">
                                                    <thead class="C" id="D">
                                                        <tr>
                                                            <th colspan="4" style="text-align:left;"><b>거래 내역</b></th>
                                                        </tr>
                                                        <tr>
                                                            <td>거래일자</td>
                                                            <td>구매자</td>
                                                            <td>판매자</td>
                                                            <td>코인 수</td>
                                                        </tr>
                                                        <?php 
                                                    if(isset($list[$BlockCount['message'.$i]["name"]]["message1"])){
                                                        for($j=1;$j<count($list[$BlockCount['message'.$i]["name"]]);$j++){ ?>
                                                        <tr>
                                                            <td style="width: 17%;">
                                                                <?php echo $list[$BlockCount['message'.$i]["name"]]['message'.$j]["time"];?>
                                                            </td>
                                                            <td style="width: 24%;">
                                                                <?php echo $list[$BlockCount['message'.$i]["name"]]['message'.$j]["postaddr"];?>
                                                            </td>
                                                            <td><?php echo $list[$BlockCount['message'.$i]["name"]]['message'.$j]["getaddr"];?>
                                                            </td>
                                                            <td style="width: 18%;">
                                                                <?php echo $list[$BlockCount['message'.$i]["name"]]['message'.$j]["coin"];?>
                                                            </td>
                                                        </tr>
                                                        <?php }}?>
                                                        <td colspan="4"><input type="button" class="TradeTbtn btn"
                                                                name="button" value="구매 신청" id="btnOpen"
                                                                style="cursor:pointer"></td>
                                                    </thead>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } }}?>
                                <!-- 카테고리 추가 할 경우 여기서 시작-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php if(!isset($_SESSION['id'])){ ?>
    <div class='modal' id='modal'>
        <div id='content'>
            <legend class="title">로그인</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>로그인 정보를 입력하세요</label>
            <form>
                <div class="inp_text">
                    <input type="text" style="vertical-align: 0px" id='id' name="id" class="id" placeholder="아이디">
                </div>

                <div class="inp_text">
                    <input type='password' name='pw' id='pw' placeholder="비밀번호" autoComplete="on">
                </div>
            </form>

            <input type="button" id='btnCheck' class="btn_login" value="로그인" style="text-align:center">
            <div class="bottomText" style="margin-top:10px">
                <label>계정이 없으신가요?</label>
                <a href="#" id="btnchangejoin" style="margin:5px">회원가입</a>
            </div>
        </div>
    </div>

    <div class='modal' id='modal'>
        <div id='content'>
            <legend class="title">회원가입</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>회원 정보를 입력하세요</label>
            <form>
                <div class="inp_text">
                    <input type="text" style="vertical-align: 0px" name="userid" id="uid" class="id" placeholder="아이디">
                </div>
                <input type="hidden" name="decide_id" id="decide_id">
                <p><span id="decide" style='color:red;font-size: 15px'> ID 중복 여부를 확인해주세요. </span>
                    <button type='button' style='font-size: 13px' class="username_button" id="check_button">중복
                        확인</button>
                <div class="inp_text">
                    <input type='password' name='pwd' id='pwd' placeholder="비밀번호" autoComplete="on">
                </div>

                <div class="inp_text">
                    <input type='password' id='Adpwd' placeholder="계좌 비밀번호" autoComplete="on">
                </div>

                <div class="inp_text">
                    <input type='text' id='loginName' placeholder="이름">
                </div>
                <div class="inp_text">
                    <input type='text' id='loginPhone' placeholder="전화번호">
                </div>

                <div class="inp_text">
                    <input type='text' id='Birth' placeholder="생년월일   ex) 2000-01-01">
                </div>
            </form>

            <button type="submit" id='btnJoin' class="btn_login">회원가입</button>
            <div class="bottomText" style="margin-top:10px">
                <label>이미 가입하셨나요?</label>
                <a href="#" id="btnlogin" style="margin:5px">로그인</a>
            </div>

        </div>
    </div>
    <?php }else{?>
    <div class='modal' id='modal'>
        <div id='content'>
            <legend class="title">구매</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>계좌 비밀번호를 입력하세요</label>
            <form>
                <div class="inp_text">
                    <input type='password' name='accpw' id='accpw' placeholder="계좌 비밀번호" autoComplete="on">
                </div>
            </form>
            <button type="submit" id='btnBuy' class="btn_login" style="cursor:pointer">확인</button>
        </div>
    </div>
    <?php } ?>

    <script src="application\views\js\Tradedetails.js"></script>

    <script type=text/javascript src="application\views\js\login.js"></script>
    <script type=text/javascript src="application\views\js\logincheck.js"></script>
    <script type=text/javascript src="application\views\js\join.js"></script>
    <script type=text/javascript src="application\views\js\idcheck.js"></script>


</body>


</html>